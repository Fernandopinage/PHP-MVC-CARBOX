<?php
include_once "../layout/heard.php";
include_once "../class/ClassPedido.php";
include_once "../dao/PedidoDAO.php";
include_once "../function/numeroOrcamento.php";

$GerarNumero = new GerarNumero();


$Produto = new PedidoDAO();
$dado = $Produto->selectProduto();


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
<form id="form-cliente" action="" method="POST">
    <div class="text-left" id="title">
        <h2> PRODUTOS </h2>
        <hr>
    </div>

    <?php

    foreach ($dado as $dados) {

    ?>
        <div class=" d-inline-block">

            <div class="form-row" <?php echo $dados->getID(); ?>>
                <div class="form-group col-md-3">
                    <div class="card" style="width: 16rem;">
                        <img class="card-img-top" src="../imagens/<?php echo $dados->getImg(); ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-center"><?php echo $dados->getProduto(); ?></h5>
                            <p class="card-text text-center"><a href="../pdf/<?php echo $dados->getFicha(); ?>" target="_blank" style="color:#FF5E14 ;">Ficha Técnica</a></p>
                            <div class="text-center">
                                <a href="#" class="btn btn-primary ">COMPRAR</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php



    }


    ?>


</form>