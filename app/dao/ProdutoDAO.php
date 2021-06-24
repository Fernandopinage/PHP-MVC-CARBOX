<?php 

include_once "../dao/DAO.php";
include_once "../class/ClassProduto.php";


class ProdutoDAO extends DAO{


    public function insertProduto($ClassProduto){

        $sql = "INSERT INTO `produto`(`PRODUTO_ID`, `PRODUTO_DESC`, `PRODUTO_UNIDADE`, `PRODUTO_PRODUTO`, `PRODUTO_QUANTIDADE`) VALUES (null, :PRODUTO_DESC, :PRODUTO_UNIDADE, :PRODUTO_PRODUTO, :PRODUTO_QUANTIDADE)";
        $insert = $this->con->prepare($sql);
        $insert->bindValue(":PRODUTO_PRODUTO", $ClassProduto->getProduto());
        $insert->bindValue(":PRODUTO_DESC", $ClassProduto->getDesc());
        $insert->bindValue(":PRODUTO_UNIDADE", $ClassProduto->getUnidade());
        $insert->bindValue(":PRODUTO_QUANTIDADE", $ClassProduto->getQuantidade());
        $insert->execute();
    }
}



?>