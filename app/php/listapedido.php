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
<table class="table table-hover">
    <thead class="thead" style="background-color: #136132; color:#fff;">
        <tr>
            <th scope="col" style="text-align: center;">ORÇAMENTO</th>
            <th scope="col">DT EMISSÃO</th>
            <th scope="col">CLIENTE</th>
            <th scope="col">PRODUTO</th>
            <th scope="col">QUANTIDADE</th>
            <th scope="col"></th>
            <th scope="col"></th>

        </tr>
    </thead>
    <tbody style="background-color: #fff;">
    <?php 

        foreach($dados as $dado => $obj){
    ?>
            <tr>
            <th scope="col" style="text-align: center;"><?php echo $obj->getNum(); ?></th>
            <th scope="col"><?php echo $obj->getData(); ?></th>
            <th scope="col"><?php echo $obj->getRazao(); ?></th>
            <th scope="col"><?php echo $obj->getProduto(); ?></th>
            <th scope="col"><?php echo $obj->getQuantidade(); ?></th>
            <th scope="col"></th>
            <th scope="col"></th>
            </tr>
    <?php
        }

    ?>
    </tbody>
</table>