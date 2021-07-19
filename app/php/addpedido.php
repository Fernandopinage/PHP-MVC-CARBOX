<?php
include_once "../dao/MailPedido.php";
include_once "../layout/heard.php";
include_once "../class/ClassPedido.php";
include_once "../dao/PedidoDAO.php";
include_once "../function/numeroOrcamento.php";


$GerarNumero = new GerarNumero();
$Produto = new PedidoDAO();
$dado = $Produto->selectProduto();


if (isset($_POST['carrinho'])) {

    if (empty($_SESSION['carrinho'])) {

        $_SESSION['carrinho'] = array(

            'id' => $_POST['id'],
            'produto' => $_POST['produto'],
            'quantidade' => $_POST['quantidade']

        );

        $_SESSION['lista'][] = $_SESSION['carrinho'];
        header('Location: ../php/home.php?p=add/pedido/');

    } else {

        $_SESSION['carrinho'] = array(

            'id' => $_POST['id'],
            'produto' => $_POST['produto'],
            'quantidade' => $_POST['quantidade']

        );

        $_SESSION['lista'][] = $_SESSION['carrinho'];
        header('Location: ../php/home.php?p=add/pedido/');
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
        .tabela{
            max-height: 440px;
            overflow-y: auto;
            justify-content: center;
        }
    </style>

    <div class="lista" id="container">
        <div class="lista-produto">
            <h1>Lista de Produtos</h1>
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
                                <th scope="col">quantidade</th>

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
        <div class="submit" style="margin-top: 10px;">

            <button type="button" class="btn btn-primary btn-lg btn-block">Finalizar Pedido</button>

        </div>
    </div>

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
            }else{

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

        function div() {

            if (container.style.display === "block") {

                container.style.display = "none";

            } else {
                container.style.display = "block";
            }
        }
    </script>