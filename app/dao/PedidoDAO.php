<?php


include_once "../dao/DAO.php";
include_once "../class/ClassPedido.php";
include_once "../class/ClassProduto.php";
include_once '../class/ClassPedido.php';


class PedidoDAO extends DAO
{


    public function insertPedido($ClassProduto)
    {

        try {
            //code...

            $sql = "INSERT INTO `pedido`(`PEDIDO_ID`, `PEDIDO_DESC`, `PEDIDO_UNIDADE`, `PEDIDO_PRODUTO`, `PEDIDO_QUANTIDADE`, `PEDIDO_DATAEMISSAO`, `PEDIDO_RAZAO`, `PEDIDO_CODSAP`, `PEDIDO_NUM`) VALUES
         (null, :PEDIDO_DESC, :PEDIDO_UNIDADE, :PEDIDO_PRODUTO, :PEDIDO_QUANTIDADE, :PEDIDO_DATAEMISSAO, :PEDIDO_RAZAO, :PEDIDO_CODSAP, :PEDIDO_NUM)";
            $insert = $this->con->prepare($sql);
            $insert->bindValue(":PEDIDO_DESC",  '');
            $insert->bindValue(":PEDIDO_UNIDADE", '');
            $insert->bindValue(":PEDIDO_PRODUTO", $ClassProduto->getProduto());
            $insert->bindValue(":PEDIDO_QUANTIDADE", $ClassProduto->getQuantidade());
            $insert->bindValue(":PEDIDO_DATAEMISSAO", $ClassProduto->getData());
            $insert->bindValue(":PEDIDO_RAZAO", $ClassProduto->getID());
            $insert->bindValue(":PEDIDO_CODSAP", $ClassProduto->getSap());
            $insert->bindValue(":PEDIDO_NUM", $ClassProduto->getNum());
            $insert->execute();

            
            //header('location: ../php/home.php?p=pedido/');
            
            ?>
            
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Pedido foi realizado com sucesso',
                    text: "Você vai receber um e-mail com seu pedidos",
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>

            
            <?php


        } catch (\Throwable $th) {
            ?>
            
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Falha ao solicitar pedido.',
                    text: 'Por favor entre em contato com administrador',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>

            
            <?php
        }
    }

    public function encode($ClassProduto){
            $cod =  $ClassProduto->getNum();
            
            $sql = "SELECT * FROM `pedido` WHERE PEDIDO_NUM  =:PEDIDO_NUM";
            $select = $this->con->prepare($sql);
            $select->bindValue(":PEDIDO_NUM", $cod);
            $select->execute();
            $linha = array();
            while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
                /*$ClassPedido = new ClassPedido();
                $ClassPedido->setProduto($row['PEDIDO_PRODUTO']);
                $ClassPedido->setQuantidade($row['PEDIDO_QUANTIDADE']);
                */
                $item = array(
                    'sap' => $row['PEDIDO_CODSAP'],
                    'quantidade' => $row['PEDIDO_QUANTIDADE'],
                );

                $linha[] = $item;
            }

            $pedido = array(

                'id' => $ClassProduto->getID(),
                'numero' => $ClassProduto->getNum(),
                'data' => $ClassProduto->getData(),
                'linha' => $linha
            );
            
            echo "<pre>";
            var_dump($pedido);
            echo "</pre>";


         // json_encode($linha);
          
    }

    public function selectProduto()
    {

        $sql = "SELECT * FROM `produto` WHERE 	PRODUTO_STATUS = 'S'";
        $select = $this->con->prepare($sql);
        $select->execute();
        $array = array();

        while ($row = $select->fetch(PDO::FETCH_ASSOC)) {

            $ClassProduto = new ClassProduto();
            $ClassProduto->setID($row['PRODUTO_ID']);
            $ClassProduto->setProduto($row['PRODUTO_PRODUTO']);
            $ClassProduto->setImg($row['PRODUTO_IMG']);
            $ClassProduto->setSap($row['PEDIDO_CODSAP']);
            $ClassProduto->setFicha($row['PRODUTO_FIXA']);
            $array[] = $ClassProduto;
        }
        return $array;
    }

    public function ListaProdutos($id)
    {

        $sql = "SELECT PRODUTO_IMG,PRODUTO_FIXA,PEDIDO_CODSAP FROM `produto` WHERE PRODUTO_ID ='$id' ";
        $select = $this->con->prepare($sql);
        $select->execute();
        $array = array();
        if ($row = $select->fetch(PDO::FETCH_ASSOC)) {

            echo ' <img  class="sticky-top" src="../imagens/' . $row['PRODUTO_IMG'] . '" id="img" width="100" height="150" style="margin-top:-10px;">';
            echo ' <a  href="../pdf/' . $row['PRODUTO_FIXA'] . '"style="margin-top:-10px;" target="_blank" >Descrição Técnica</a>';
            echo '<input type="hidden" class="form-control form-control-sm" id="codsap" value="' . $row['PEDIDO_CODSAP'] . '" placeholder="">';
        }
    }

    public function listaPedido($id)
    {

        //$sql = "SELECT * FROM `pedido` where PEDIDO_RAZAO = :PEDIDO_RAZAO ORDER BY `pedido`.`PEDIDO_ID` DESC";
        $sql = "SELECT DISTINCT  * FROM `pedido` where PEDIDO_RAZAO = :PEDIDO_RAZAO GROUP BY PEDIDO_NUM";
        $select = $this->con->prepare($sql);
        $select->bindValue(":PEDIDO_RAZAO", $id);
        $select->execute();
        $array = array();

        while ($row = $select->fetch(PDO::FETCH_ASSOC)) {

            $ClassPedido = new ClassPedido();
            $ClassPedido->setID($row['PEDIDO_ID']);
            $ClassPedido->setDesc($row['PEDIDO_DESC']);
            $ClassPedido->setUnidade($row['PEDIDO_UNIDADE']);
            $ClassPedido->setProduto($row['PEDIDO_PRODUTO']);
            $ClassPedido->setQuantidade($row['PEDIDO_QUANTIDADE']);
            $ClassPedido->setData($row['PEDIDO_DATAEMISSAO']);
            $ClassPedido->setRazao($row['PEDIDO_RAZAO']);
            $ClassPedido->setSap($row['PEDIDO_CODSAP']);
            $ClassPedido->setNum($row['PEDIDO_NUM']);
            $array[] = $ClassPedido;
        }
        return $array;
    }

    public function listaPedidoOrcamento($id)
    {

        $sql = "SELECT * FROM `pedido` WHERE PEDIDO_NUM = :PEDIDO_NUM";
        $select = $this->con->prepare($sql);
        $select->bindValue(":PEDIDO_NUM", $id);
        $select->execute();
        $array = array();
        while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
            $ClassPedido = new ClassPedido();
            $ClassPedido->setProduto($row['PEDIDO_PRODUTO']);
            $ClassPedido->setQuantidade($row['PEDIDO_QUANTIDADE']);
            $array[] = $ClassPedido;
        }
        return $array;
    }
}
