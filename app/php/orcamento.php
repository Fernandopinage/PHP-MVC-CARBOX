<?php
include_once "../layout/heard.php";
include_once "../class/ClassPedido.php";
include_once "../dao/PedidoDAO.php";
include_once "../function/numeroOrcamento.php";

$GerarNumero = new GerarNumero();


$Produto = new PedidoDAO();
$dado = $Produto->selectProduto();


if(isset($_POST['finalizarpedido'])){

    echo "ok";

}



if (isset($_POST['pedidoosalva'])) {


    if (isset($_POST['produto'])) {

        $ClassProduto = new ClassPedido();
        $ClassProduto->setNum($_POST['numero_orçamento']);
        $ClassProduto->setData(date('Y-m-d'));
        $ClassProduto->setRazao($_POST['razão_cliente']);
        if (isset($_POST['produto']) != '' and isset($_POST['quantidade']) != '' and isset($_POST['codsap'])) {

            $ClassProduto->setSap(implode(",", $_POST['codsap']));
            $ClassProduto->setProduto(implode(",", $_POST['produto']));
            $ClassProduto->setQuantidade(implode(",", $_POST['quantidade']));
        }



        $Pedido = new PedidoDAO();
        $Pedido->insertPedido($ClassProduto);
    } else {
?>
        <script>
            Swal.fire({
                title: 'Error!',
                text: 'Preenchar todos os campos obrigatorios!',
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
            max-height: 370px;
            max-width: 800px;
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
            <input type="submit" id="finalizar" name="finalizarpedido" value="FINALIZAR PEDIDO">
           
            
        </div>
    </form>
    <a class="btn-lista" onclick="div()"><img id="img-carrinho" src="../img/carrinho.svg"></a>
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
    var cont = 0;

    function btn(id) {


        var id;
        var quantidade = document.getElementById('quantidade' + id).value
        var produto = document.getElementById('produto' + id).value


        $('#produto_lista').append('<div class="form-row" id="campo' + cont + '"> <div class="form-group col-md-6"><input type="text" class="form-control form-control-sm" name="produto[]" value="' + produto + '" readonly></div> <div class="form-group col-md-2"><input type="text" class="form-control form-control-sm" name="quantidade[]" value="' + quantidade + '" ></div><div class="form-group col-md-2"><a class="btn btn-danger btn-sm"  id="' + cont + '" style="color: #fff;"> x </a></div></div>');
        cont++
        Swal.fire({
                    position: 'mid-end',
                    icon: 'success',
                    title: 'Produto adicionado',
                    showConfirmButton: false,
                    timer: 1500
                });

        $("form").on("click", ".btn-danger", function() {
            var btn_id = $(this).attr("id");
            $('#campo' + btn_id + '').remove();
            console.log(btn_id)
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