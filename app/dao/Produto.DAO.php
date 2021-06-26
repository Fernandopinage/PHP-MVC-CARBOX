<?php 

include_once "../dao/DAO.php";

class ProdutoDAO extends DAO{


    public function insertProduto(ClassProduto $ClassProduto){

        $sql = "INSERT INTO `produto`(`PRODUTO_ID`, `PEDIDO_CODSAP`, `PRODUTO_PRODUTO`, `PRODUTO_UNIDADE`, `PRODUTO_IMG`, `PRODUTO_FIXA`)
         VALUES (null, :PEDIDO_CODSAP, :PRODUTO_PRODUTO, :PRODUTO_UNIDADE, :PRODUTO_IMG, :PRODUTO_FIXA)";
        $insert = $this->con->prepare($sql);
        $insert->bindValue(":PEDIDO_CODSAP", $ClassProduto->getSap());
        $insert->bindValue(":PRODUTO_PRODUTO", $ClassProduto->getProduto());
        $insert->bindValue(":PRODUTO_IMG", $ClassProduto->getImg());
        $insert->bindValue(":PRODUTO_UNIDADE", $ClassProduto->getUnidade());
        $insert->bindValue(":PRODUTO_FIXA", $ClassProduto->getFicha());
        $insert->execute();
    }

}

?>