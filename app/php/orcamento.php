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


    foreach ($dado as $dados => $obj) {

    ?>

            <div class=" d-inline-block text-center" style="padding: 8px;">

                <div class="form-row" <?php echo $obj->getID(); ?> style="border: 0px;">
                    <div class="form-group col-md-4">
                        <div class="card" style="width: 20rem;">
                            <img class="card-img-top" src="../imagens/<?php echo $obj->getImg(); ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title text-center"><spam id="produto<?php echo $obj->getProduto(); ?>"><?php echo $obj->getProduto(); ?></spam></h5>
                                <p class="card-text text-center"><a href="../pdf/<?php echo $obj->getFicha(); ?>" target="_blank" style="color:#FF5E14 ;">Ficha Técnica</a></p>
                                <div class="text-center">
                                    <a  class="btn btn a btn-sm" id="subtrair"onclick="subtrair(<?php echo $obj->getID(); ?> )" style="color:#fff ;background-color:#FF5E14;" >-</a>
                                    <input type="text" class="" size="2" id="quantidade<?php echo $obj->getID(); ?>" value="1" name="quantidade" style="text-align: center;" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                    <a  class="btn btn btn-sm" id="somar" onclick="somar(<?php echo $obj->getID(); ?> )" style="color:#fff ;background-color:#FF5E14;">+</a>
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


</form>

<script>
    var substr =1;
    var soma =1;
    var total = 0;

    
    function subtrair(id){

        var quantidade = parseInt(document.getElementById('quantidade'+id).value);

        if(quantidade != 1){
            total = quantidade - substr
            document.getElementById('quantidade'+id).value =total;
            
        }
    }

    function somar(id){

        var quantidade = parseInt(document.getElementById('quantidade'+id).value);
        
        total = quantidade + soma
        document.getElementById('quantidade'+id).value =total;
        
    }

</script>


<script>

    function btn(id){

        var id;
        var quantidado = document.getElementById('quantidade'+id).value
        var produto = document.getElementById('produto'+id).value
        console.log(produto)
    }
</script>