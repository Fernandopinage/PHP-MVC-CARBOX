<?php 

include_once "../dao/DAO.php";
include_once "../class/ClassPedido.php";


class PedidoDAO extends DAO{


    public function insertProduto($ClassProduto){

        $sql = "INSERT INTO `pedido`(`PEDIDO_ID`, `PEDIDO_DESC`, `PEDIDO_UNIDADE`, `PEDIDO_PRODUTO`, `PEDIDO_QUANTIDADE`) VALUES (null, :PEDIDO_DESC, :PEDIDO_UNIDADE, :PEDIDO_PRODUTO, :PEDIDO_QUANTIDADE)";
        $insert = $this->con->prepare($sql);
        $insert->bindValue(":PEDIDO_PRODUTO", $ClassProduto->getProduto());
        $insert->bindValue(":PEDIDO_DESC", '');
        $insert->bindValue(":PEDIDO_UNIDADE", $ClassProduto->getUnidade());
        $insert->bindValue(":PEDIDO_QUANTIDADE", $ClassProduto->getQuantidade());
        $insert->execute();
    }
}



?>