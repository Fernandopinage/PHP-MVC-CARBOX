<?php 

include_once "../dao/DAO.php";
include_once "../class/ClassProduto.php";


class ProdutoDAO extends DAO{


    public function insertProduto($ClassProduto){

        $sql = "INSERT INTO `produto`(`PRODUTO_ID`, `PRODUTO_DESC`, `PRODUTO_UNIDADE`) VALUES (null, :PRODUTO_DESC, :PRODUTO_UNIDADE)";
        $insert = $this->con->prepare($sql);
        $insert->bindValue(":PRODUTO_DESC", $ClassProduto->getDesc());
        $insert->bindValue(":PRODUTO_UNIDADE", $ClassProduto->getUnidade());
        $insert->execute();
    }
}



?>