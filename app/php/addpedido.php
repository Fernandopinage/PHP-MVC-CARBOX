<?php

include_once "../dao/MailPedido.php";
include_once "../layout/heard.php";
include_once "../class/ClassPedido.php";
include_once "../dao/PedidoDAO.php";
include_once "../function/numeroOrcamento.php";


$GerarNumero = new GerarNumero();


$Produto = new PedidoDAO();
$dado = $Produto->selectProduto();


if (isset($_POST['finalizarpedido'])) {

    if (isset($_POST['produto'])) {

        $ClassProduto = new ClassPedido();


        $Produto = $_POST['produto'];
        $quantidade = $_POST['quantidade'];
        $sap = $_POST['sap'];

        $tamanho = count($Produto);

        //for ($i = 0; $i < $tamanho; $i++) {

        $ClassProduto->setNum($_POST['numero_orçamento']);
        $ClassProduto->setData(date('Y-m-d'));
        $ClassProduto->setRazao($_POST['razão_cliente']);
        // $ClassProduto->setProduto($Produto[$i]);
        $ClassProduto->setProduto(implode(",", $_POST['produto']));
        // $ClassProduto->setQuantidade($quantidade[$i]);
        $ClassProduto->setQuantidade(implode(",", $_POST['quantidade']));
        // $ClassProduto->setSap($sap[$i]);
        $ClassProduto->setSap(implode(",", $_POST['sap']));
        $Pedido = new PedidoDAO();
        $Pedido->insertPedido($ClassProduto);
        $orçamentoEmail = new OrçamentoMAIL();
        $orçamentoEmail->emailOrçamento(
            $orçamento = $_POST['numero_orçamento'],
            $data = date('Y-m-d'),
            $cliente = $_POST['razão_cliente'],
            $produto = $_POST['produto'],
            $quantidade = $_POST['quantidade'],
            $sap =  $_POST['sap'],
            $emailCliente = $_SESSION['user']['email']
        );

?>
        <script>
            Swal.fire({
                title: 'Parabéns',
                text: 'Compra finalizada com sucesso',
                icon: 'success',
                //confirmButtonText: 'OK'
            })
        </script>
    <?php



        //}
    } else {

    ?>
        <script>
            Swal.fire({
                title: 'Error!',
                text: 'Carrinho vazio',
                icon: 'error',
                confirmButtonText: 'OK'
            })
        </script>
<?php

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
                                <a class="btn btn a btn-sm" id="subtrair" onclick="subtrair(<?php echo $obj->getID(); ?> )" style="color:#fff ;background-color:#FF5E14;">-</a>
                                <input type="text" class="" size="2" id="quantidade<?php echo $obj->getID(); ?>" value="1" name="quantidade" style="text-align: center;" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                <a class="btn btn btn-sm" id="somar" onclick="somar(<?php echo $obj->getID(); ?> )" style="color:#fff ;background-color:#FF5E14;">+</a>
                            </div>
                            <div class="text-center" style="margin-top: 20px;">
                                <button type="button" class="btn btn-success btn-lg btn-block" onclick="btn(<?php echo $obj->getID(); ?>)" data-toggle="modal" data-target="#visualizar<?php echo $obj->getID(); ?>" style="border-radius: 20px;">
                                    COMPRAR <img src="../img/carrinho.png">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->


    <?php

    }

    ?>
    <style>
        .table-overflow {
            max-height: 340px;
            overflow-y: auto;
            justify-content: center;
        }
    </style>

    <form action="" method="POST">
        <div class="lista" id="container">
            <h1 class="text-center">Meu Carrinho</h1>
            <hr>

            <div class="table-overflow">
                <div id="produto_lista">

                </div>
            </div>
            <!--
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputEmail4">Número do Orçamento</label>
                    <input type="text" class="form-control form-control-sm" id="numero_orçamento" name="numero_orçamento" value="<?php echo $GerarNumero->idONum(); ?>" placeholder="" readonly>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputEmail4">Data de Emissão</label>
                    <input type="text" class="form-control form-control-sm" id="data_emissao" name="data_emissao" value="<?php echo date('d/m/Y') ?>" placeholder="<?php echo date('d/m/Y') ?>" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputEmail4">Nome do Cliente</label>
                    <input type="text" class="form-control form-control-sm" id="razão_cliente" name="razão_cliente" placeholder="" value="<?php echo $_SESSION['user']['nome'] ?>" readonly>
                </div>
            </div>
            -->
            <input type="submit" id="finalizar" name="finalizarpedido" value="FINALIZAR ORÇAMENTO">

        </div>


    </form>
    <a class="btn-lista" onclick="div()"><img id="img-carrinho" src="../img/carrinho.svg" style="color:#fff">
        <spam id="carrinho" style="color:#fff"><input type="text" id="carrinho_input" value="0">0</spam>
    </a>
</div>
<!-- -------------------------------------------------------------------------------------- -->
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
</script>


<script>
    var substr = 1;
    var soma = 1;
    var total = 0;


    function subtrair_carrinho(id) {

        var quantidade = parseInt(document.getElementById('lista_quantidade' + id).value);

        if (quantidade != 1) {
            total = quantidade - substr
            document.getElementById('lista_quantidade' + id).value = total;

        }

    }

    function somar_carrinho(id) {

        var quantidade = parseInt(document.getElementById('lista_quantidade' + id).value);
        total = quantidade + soma
        document.getElementById('lista_quantidade' + id).value = total;
    }
</script>



<script>
    var cont = 0;

    function btn(id) {

        var id = parseInt(id);
        var quantidade = parseInt(document.getElementById('quantidade' + id).value);
        var produto = document.getElementById('produto' + id).value
        var sap = document.getElementById('sap' + id).value
        var input = parseInt(document.getElementById("carrinho_input").value);


        //var itemIndex = $("#produto_lista input.sap").length;
        //document.getElementById("carrinho").innerText = itemIndex+1;

        if (jQuery("input[id=" + sap + "]").length) {

            var valor = parseInt(document.getElementById('lista_quantidade' + id).value);
            total = valor + quantidade
            document.getElementById('lista_quantidade' + id).value = total;


        } else {

            $('#produto_lista').append('<div class="form-row" id="campo' + cont + '"><div class="form-group col-md-1"><input id="' + sap + '" type="text" class="form-control form-control-sm sap" name="sap[]" value="' + sap + '" readonly></div><div class="form-group col-md-5"><input type="text" class="form-control form-control-sm" name="produto[]" value="' + produto + '" readonly></div><div class="form-group col-md-1 text-right"><a class="btn btn-lg btn-block btn-sm" style="color:#fff; background-color:#FF5E14;" onclick="subtrair_carrinho(' + id + ')" >-</a></div><div class="form-group col-md-1"><input id="lista_quantidade' + id + '" type="text" class="form-control form-control-sm text-center ' + sap + '" name="quantidade[]" value="' + quantidade + '" readonly></div><div class="form-group col-md-1"><a class="btn btn-lg btn-block btn-sm" style="color:#fff; background-color:#FF5E14;" onclick="somar_carrinho(' + id + ')">+</a></div><div class="form-group col-md-2"><a class="btn btn-block btn-danger btn-sm" id="' + cont + '" style="color: #fff;"> Excluir </a></div></div>');
            cont++
            var inputs = $("#produto_lista").find($("input") );
            console.log(inputs.length)
        }

        $("form").on("click", ".btn-danger", function() {
            var btn_id = $(this).attr("id");
            $('#campo' + btn_id + '').remove();

        });



    }
</script>


<script>
    function div() {

        if (container.style.display === "block") {

            container.style.display = "none";

        } else {
            container.style.display = "block";
        }
    }
</script>