<?php

include_once "../dao/PedidoDAO.php";
include_once "../class/ClassPedido.php";

$Pedido = new PedidoDAO();
$dados = $Pedido->listaPedido();

?>

<br><br>
<link href='../css/table.css' rel='stylesheet' />
<div class="text-right">
    <a class="btn btn-primary" href="?p=add/pedido/">Novo Pedido</a>
</div>
<br><br>
<style>
.table-overflow {
    max-height:400px;
    overflow-y:auto;
}

</style>
<div class="table-overflow">
<table class="table table-hover">
    <thead class="thead" style="background-color: #136132; color:#fff;">
        <tr>
            <th scope="col" style="text-align: center;">ORÇAMENTO</th>
            <th scope="col">DT EMISSÃO</th>
            <th scope="col">CLIENTE</th>
            <th scope="col">PRODUTO</th>



        </tr>
    </thead>
    <tbody style="background-color: #fff;">
        <?php

        foreach ($dados as $dado => $obj) {
        ?>
            <tr>
                <th scope="col" style="text-align: center;"><?php echo $obj->getNum(); ?></th>
                <th scope="col"><?php echo $obj->getData(); ?></th>
                <th scope="col"><?php echo $obj->getRazao(); ?></th>
                <th scope="col"><button type="button" class="btn  btn-sm" id="editarBTN" style="background-color:#FF5E14; color:#fff;" data-toggle="modal" data-target="#visualizar<?php echo $obj->getID(); ?>">Lista de Itens</button></th>
            </tr>

            <div class="modal fade" id="visualizar<?php echo $obj->getID(); ?>" tabindex="-1" role="dialog" aria-labelledby="visualizar<?php echo $obj->getID(); ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">PEDIDOS <span style="color: red;"><?php echo $obj->getNum(); ?></span></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                           <?php 
                           
                            $produto =  $obj->getProduto();
                            $produto = explode(',',$produto);
                            
                            
                            $quantidade =  $obj->getQuantidade();
                            $quantidade = explode(',',$quantidade);


                            $tamanho = count($produto);
                            
                            for($i=0; $i<$tamanho; $i++){

                                echo "<strong>Produdo: </strong>".$produto[$i]." <br> <strong>Qtd: </strong>".$quantidade[$i]."<br><hr>";

                            }

                           ?>
                           
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }

        ?>
    </tbody>
</table>
</div>