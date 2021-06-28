<?php 

include_once "../dao/DAO.php";
include_once "../class/ClassPedido.php";
include_once "../class/ClassProduto.php";


class PedidoDAO extends DAO{


    public function insertPedido($ClassProduto){

        $sql = "INSERT INTO `pedido`(`PEDIDO_ID`, `PEDIDO_DESC`, `PEDIDO_UNIDADE`, `PEDIDO_PRODUTO`, `PEDIDO_QUANTIDADE`, `PEDIDO_DATAEMISSAO`, `PEDIDO_RAZAO`, `PEDIDO_CODSAP`, `PEDIDO_NUM`) VALUES
         (null, :PEDIDO_DESC, :PEDIDO_UNIDADE, :PEDIDO_PRODUTO, :PEDIDO_QUANTIDADE, :PEDIDO_DATAEMISSAO, :PEDIDO_RAZAO, :PEDIDO_CODSAP, :PEDIDO_NUM)";
        $insert = $this->con->prepare($sql);
        $insert->bindValue(":PEDIDO_DESC",  '');
        $insert->bindValue(":PEDIDO_UNIDADE", '');
        $insert->bindValue(":PEDIDO_PRODUTO", $ClassProduto->getProduto());
        $insert->bindValue(":PEDIDO_QUANTIDADE", $ClassProduto->getQuantidade());
        $insert->bindValue(":PEDIDO_DATAEMISSAO", $ClassProduto->getData());
        $insert->bindValue(":PEDIDO_RAZAO", $ClassProduto->getRazao());
        $insert->bindValue(":PEDIDO_CODSAP", $ClassProduto->getSap());
        $insert->bindValue(":PEDIDO_NUM", $ClassProduto->getNum());
        $insert->execute();
    }

    public function selectProduto(){
     
        $sql = "SELECT * FROM `produto` WHERE 1";
        $select = $this->con->prepare($sql);
        $select->execute();
        $array = array();

        while($row = $select->fetch(PDO::FETCH_ASSOC)){

            $ClassProduto = new ClassProduto();
            $ClassProduto->setID($row['PRODUTO_ID']);
            $ClassProduto->setProduto($row['PRODUTO_PRODUTO']);
            $array[] = $ClassProduto;
        }
        return $array;

    }

    public function ListaProdutos($id){

        $sql = "SELECT PRODUTO_IMG,PRODUTO_FIXA,PEDIDO_CODSAP FROM `produto` WHERE PRODUTO_ID ='$id' ";
        $select = $this->con->prepare($sql);
        $select->execute();
        $array = array();
        if($row = $select->fetch(PDO::FETCH_ASSOC)){
            
            echo' <img  class="sticky-top" src="../imagens/'.$row['PRODUTO_IMG'].'" id="img" width="100" height="150" style="margin-top:-10px;">';
            echo ' <a  href="../pdf/'.$row['PRODUTO_FIXA'].'"style="margin-top:-10px;" >Descrição Técnica</a>';
            echo '<input type="hidden" class="form-control form-control-sm" id="codsap" value="'.$row['PEDIDO_CODSAP'].'" placeholder="">';
        }
        
        
    }

}
