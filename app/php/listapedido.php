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

        foreach ($dados as $dado => $obj) {
        ?>
            <tr>
                <th scope="col" style="text-align: center;"><?php echo $obj->getNum(); ?></th>
                <th scope="col"><?php echo $obj->getData(); ?></th>
                <th scope="col"><?php echo $obj->getRazao(); ?></th>
                <th scope="col"><button type="button" class="btn  btn-sm" id="editarBTN" style="background-color:#FF5E14; color:#fff;" data-toggle="modal" data-target="#visualizar<?php echo $obj->getID(); ?>">Pedidos</button></th>
                <th scope="col"><?php echo $obj->getQuantidade(); ?></th>
                <th scope="col"><button type="button" class="btn btn-success btn-sm" id="editarBTN" data-toggle="modal" data-target="#editar<?php echo $obj->getID(); ?>">Editar</button></th>
                <th scope="col"><a class="btn btn-danger btn-sm" href="?delete=<?php echo $obj->getID(); ?>">Excluir</a></th>
            </tr>

            <div class="modal fade" id="visualizar<?php echo $obj->getID(); ?>" tabindex="-1" role="dialog" aria-labelledby="visualizar<?php echo $obj->getID(); ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">PEDIDOS <?php echo $obj->getNum(); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }

        ?>
    </tbody>
</table>