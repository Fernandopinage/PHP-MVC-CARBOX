<?php
include_once "../dao/MailPedido.php";
include_once "../layout/heard.php";
include_once "../class/ClassPedido.php";
include_once "../dao/PedidoDAO.php";
include_once "../function/numeroOrcamento.php";



$GerarNumero = new GerarNumero();
$Produto = new PedidoDAO();
$dado = $Produto->selectProduto();


if (isset($_POST['confirmarorcamento'])) {



    $tamanho = count($_POST['sap']);

    $ClassProduto = new ClassPedido();

    for ($i = 0; $i < $tamanho; $i++) {

        $ClassProduto->setNum($_POST['numero_orcamento']);
        $ClassProduto->setData(date('Y-m-d'));
        $ClassProduto->setID($_POST['razao_cliente']);
        $ClassProduto->setSap($_POST['sap'][$i]);
        $ClassProduto->setProduto($_POST['produto'][$i]);
        $ClassProduto->setQuantidade($_POST['quantidade'][$i]);
        $Pedido = new PedidoDAO();
        $Pedido->insertPedido($ClassProduto);
    }

    $Produto->encode($ClassProduto);


    $emailCliente = $_SESSION['user']['email'];
    $cliente = $_SESSION['user']['nome'];
    $ClassProduto->setProduto(implode(" ,", $_POST['produto']));
    $ClassProduto->setQuantidade(implode(" ,", $_POST['quantidade']));
    $PedidoOrcamento = new OrçamentoMAIL();
    $PedidoOrcamento->emailOrçamento($ClassProduto, $emailCliente, $cliente, $tamanho);
    unset($_SESSION['lista']);
    //header('location: ../php/home.php?p=pedido/');
}



if (isset($_POST['carrinho'])) {

    if (isset($_SESSION['lista'])) {

        $tamanho = count($_SESSION['lista']); // tamanho
        
    }

    if (empty($_SESSION['carrinho'])) {

        $_SESSION['carrinho'] = array(

            'id' => $_POST['id'],
            'produto' => $_POST['produto'],
            'quantidade' => $_POST['quantidade'],
            'sap' => $_POST['sap']

        );

        $_SESSION['lista'][] = $_SESSION['carrinho'];
      
    } else {


        $_SESSION['carrinho'] = array(

            'id' => $_POST['id'],
            'produto' => $_POST['produto'],
            'quantidade' => $_POST['quantidade'],
            'sap' => $_POST['sap']

        );


        for ($i = 0; $i < $tamanho; $i++) {

            if ($_SESSION['lista'][$i]['id'] == $_SESSION['carrinho']['id']) {

                $qtd = $_SESSION['lista'][$i]['quantidade'] + $_SESSION['carrinho']['quantidade'];
                $_SESSION['lista'][$i]['quantidade'] = $qtd;
                unset($_SESSION['carrinho']);
               header('Location: ../php/home.php?p=add/pedido/');
            }
        }

        
        if (isset($_SESSION['carrinho'])) {
            $_SESSION['lista'][] = $_SESSION['carrinho'];
            
        }

        //header('Location: ../php/home.php?p=add/pedido/');
    }
}


?>
<link rel="stylesheet" href="../css/cliente.css">
<div class="produtos-lista">
    <div class="text-left" id="title">
        <h2> PRODUTOS </h2>
        <hr>
    </div>

    <?php


    foreach ($dado as $dados => $obj) {

    ?>

        <div class=" d-inline-block text-center" style="padding: 8px;">

            <div class="form-row" <?php echo $obj->getID(); ?> style="border: 0px;">
                <div class="form-group col-md-4">
                    <div class="card" style="width: 20rem;">
                        <img class="card-img-top" src="../imagens/<?php echo $obj->getImg(); ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-center">
                                <spam><?php echo $obj->getProduto(); ?></spam>
                            </h5>
                            <p class="card-text text-center"><a href="../pdf/<?php echo $obj->getFicha(); ?>" target="_blank" style="color:#FF5E14 ;">Ficha Técnica</a></p>
                            <div class="text-center">
                                <input type="hidden" value="<?php echo $obj->getSap(); ?>" id="sap<?php echo $obj->getID(); ?>">
                                <input type="hidden" value="<?php echo $obj->getProduto(); ?>" id="produto<?php echo $obj->getID(); ?>">

                            </div>
                            <div class="text-center" style="margin-top: 20px;">
                                <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#visualizar<?php echo $obj->getID(); ?>" style="border-radius: 20px;">
                                    COMPRAR <img src="../img/carrinho.png">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" id="visualizar<?php echo $obj->getID(); ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $obj->getProduto(); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form method="POST" action="../php/home.php?p=add/pedido/">
                            <div class="form-group text-center">
                                <img class="card-img-top" src="../imagens/<?php echo $obj->getImg(); ?>" alt="Card image cap" style="width: 20rem;">
                            </div>
                            <div class="form-group text-center">
                                <input type="hidden" name="id" value="<?php echo $obj->getID(); ?>">
                                <input type="hidden" name="produto" value="<?php echo $obj->getProduto(); ?>">
                                <input type="hidden" name="sap" value="<?php echo $obj->getSap(); ?>">
                                <a class="btn btn a btn-lg" id="subtrair" onclick="subtrair(<?php echo $obj->getID(); ?> )" style="color:#fff ;background-color:#FF5E14;">-</a>
                                <input type="text" class="form-control-lg" size="25" id="quantidade<?php echo $obj->getID(); ?>" value="1" name="quantidade" style="text-align: center;" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                <a class="btn btn btn-lg" id="somar" onclick="somar(<?php echo $obj->getID(); ?> )" style="color:#fff ;background-color:#FF5E14;">+</a>
                                <div class="modal-footer">
                                    <button type="submit" name="carrinho" class="btn btn-success btn-lg btn-block">Adicionar no Carrinho</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->


    <?php

    }

    ?>

    <style>
        .tabela {
            max-height: 440px;
            overflow-y: auto;
            justify-content: center;
        }
    </style>

    <div class="lista" id="container">
        <div class="lista-produto">
            <h1>Meu Carrinho</h1>
            <hr>
            <div class="tabela">

                <?php

                if (!empty($_SESSION['lista'])) {
                ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Produto</th>
                                <th scope="col">Quantidade</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $tamanho = count($_SESSION['lista']);
                            for ($i = 0; $i < $tamanho; $i++) {
                            ?>

                                <tr>
                                    <th scope="row"><?php echo $i + 1; ?></th>
                                    <td><?php echo $_SESSION['lista'][$i]['produto'] ?></td>
                                    <td><?php echo $_SESSION['lista'][$i]['quantidade'] ?></td>

                                </tr>
                            <?php
                            }

                            ?>

                        </tbody>
                    </table>
                <?php
                }
                ?>
            </div>
        </div>

        <div class="submit" style="margin-top: 10px; margin-left:8%;">
            <button type="button" class="btn btn-primary btn-lg " data-toggle="modal" data-target="#finalizar" style="padding-left:25%; padding-right:25%;">Finalizar Orçamento</button>
            <button type="button" class="btn btn-success btn-lg " onclick="div()" data-toggle="modal" data-target="" style="padding-left:25%; padding-right:20%; margin-top:10px;">Continuar Comprando</button>
        </div>
    </div>

    <!-- Modal -->
    <?php

    if (!empty($_SESSION['lista'])) {
    ?>

        <div class="modal fade bd-example-modal-lg" id="finalizar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="lista-produto">
                        <h1 style="text-align: center;margin-top:20px;">Confirma Orçamento</h1>
                        <hr>
                        <form action="" method="POST" enctype="">
                            <div class="form-row" style="margin-left: 20px;">
                                <div class="form-group col-md-3">
                                    <label for="inputEmail4">Número do Orçamento</label>
                                    <input type="text" class="form-control form-control-sm" id="numero_orçamento" name="numero_orcamento" value="<?php echo $GerarNumero->idONum(); ?>" placeholder="" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputEmail4">Data de Emissão</label>
                                    <input type="text" class="form-control form-control-sm" id="data_emissao" name="data_emissao" value="<?php echo date('d/m/Y') ?>" placeholder="<?php echo date('d/m/Y') ?>" readonly>
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="inputEmail4">Nome do Cliente</label>
                                    <input type="hidden" name="razao_cliente" value="<?php echo $_SESSION['user']['id'] ?>">
                                    <input type="text" class="form-control form-control-sm" id="razão_cliente" name="" placeholder="" value="<?php echo $_SESSION['user']['nome'] ?>" readonly>

                                </div>
                            </div>
                            <div class="tabela">
                                <div class="modal-body">

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Produto</th>
                                                <th scope="col">Quantidade</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $total = 0;
                                            $tamanho = count($_SESSION['lista']);
                                            for ($i = 0; $i < $tamanho; $i++) {
                                            ?>

                                                <tr>
                                                    <th scope="row"><?php echo $i + 1; ?><input type="hidden" value="<?php echo $i + 1; ?>" min="1" max="3"><input type="hidden" value="<?php echo $_SESSION['lista'][$i]['sap']; ?>" name="sap[]"></th>
                                                    <td><?php echo $_SESSION['lista'][$i]['produto']; ?><input type="hidden" name="produto[]" id="produto" value="<?php echo $_SESSION['lista'][$i]['produto']; ?>"></td>
                                                    <td><a class="btn btn-sm a" id="subtrair" onclick="subtrair2(<?php echo $i + 1; ?>)" style="color:#fff ;background-color:#FF5E14;">-</a><input type="text" size="3" name="quantidade[]" id="<?php echo $i + 1; ?>" value="<?php echo $_SESSION['lista'][$i]['quantidade']; ?>" style="text-align: center;"><a class="btn btn-sm a" id="subtrair" onclick="somar2(<?php echo $i + 1; ?>)" style="color:#fff ;background-color:#FF5E14;">+</a></td>
                                                </tr>

                                            <?php

                                            }

                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success btn-block" name="confirmarorcamento">Finalizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php

    }

    ?>

    <a class="btn-lista" onclick="div()"><img id="img-carrinho" src="../img/carrinho.svg" style="color:#fff">
        <spam id="carrinho" style="color:#fff">
            <?php

            if (!empty($_SESSION['lista'])) {

                $total = 0;
                $tamanho = count($_SESSION['lista']);
                for ($i = 0; $i < $tamanho; $i++) {
                    $total = $total + $_SESSION['lista'][$i]['quantidade'];
                }
                echo $total;
            } else {

                echo "0";
            }

            ?>
        </spam>
    </a>
    <script>
        var substr = 1;
        var soma = 1;
        var total = 0;


        function subtrair(id) {

            var quantidade = parseInt(document.getElementById('quantidade' + id).value);

            if (quantidade != 1) {
                total = quantidade - substr
                document.getElementById('quantidade' + id).value = total;

            }
        }



        function somar(id) {

            var quantidade = parseInt(document.getElementById('quantidade' + id).value);

            total = quantidade + soma
            document.getElementById('quantidade' + id).value = total;

        }

        function subtrair2(id) {


            var quantidade = parseInt(document.getElementById(id).value);

            if (quantidade != 1) {
                total = quantidade - substr
                document.getElementById(id).value = total;

            }
        }

        function somar2(id) {



            var quantidade = parseInt(document.getElementById(id).value);

            total = quantidade + soma
            document.getElementById(id).value = total;
        }




        function div() {

            if (container.style.display === "block") {

                container.style.display = "none";

            } else {
                container.style.display = "block";
            }
        }
    </script>