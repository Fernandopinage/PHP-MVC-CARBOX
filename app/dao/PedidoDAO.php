<?php 

include_once "../dao/DAO.php";
include_once "../class/ClassPedido.php";
include_once "../class/ClassProduto.php";


class PedidoDAO extends DAO{


    public function insertProduto($ClassProduto){

        $sql = "INSERT INTO `pedido`(`PEDIDO_ID`, `PEDIDO_DESC`, `PEDIDO_UNIDADE`, `PEDIDO_PRODUTO`, `PEDIDO_QUANTIDADE`, `PEDIDO_DATAEMISSAO`, `PEDIDO_RAZAO`, `PEDIDO_CODSAP`)
         VALUES (null, `PEDIDO_DESC`, `PEDIDO_UNIDADE`, `PEDIDO_PRODUTO`, `PEDIDO_QUANTIDADE`, `PEDIDO_DATAEMISSAO`, `PEDIDO_RAZAO`, `PEDIDO_CODSAP`) ";
        $insert = $this->con->prepare($sql);
        $insert->bindValue(":PEDIDO_DESC", '');
        $insert->bindValue(":PEDIDO_UNIDADE", $ClassProduto->getUnidade());
        $insert->bindValue(":PEDIDO_PRODUTO", $ClassProduto->getProduto());
        $insert->bindValue(":PEDIDO_QUANTIDADE", $ClassProduto->getQuantidade());
        $insert->bindValue(":PEDIDO_DATAEMISSAO", "");
        $insert->bindValue(":PEDIDO_RAZAO", "");
        $insert->bindValue(":PEDIDO_CODSAP", "");
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

        $sql = "SELECT PRODUTO_IMG FROM `produto` WHERE PRODUTO_ID ='$id' ";
        $select = $this->con->prepare($sql);
        $select->execute();
        $array = array();
        if($row = $select->fetch(PDO::FETCH_ASSOC)){
            
            echo ' <div class="form-group col-md-2">
            <a type="button" class="btn btn-primary btn-sm" style="margin-top: 28px;">Ficha Técnica</a>
            </div>
        <div class="form-group col-md-2">
            <label for="inputEmail4">Imagem do Produto</label>
            <img src="../imagens/'.$row['PRODUTO_IMG'].'" id="img" width="100" height="100">
        </div>';
            
        }
        
        
    }

}
