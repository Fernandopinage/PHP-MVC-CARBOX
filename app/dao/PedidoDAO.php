<?php

include_once "../dao/MailPedido.php";
include_once "../dao/MailEmpresa.php";
include_once "../dao/DAO.php";
include_once "../class/ClassPedido.php";
include_once "../class/ClassProduto.php";
include_once '../class/ClassPedido.php';


class PedidoDAO extends DAO
{


    public function insertPedido($ClassProduto)
    {

        try {
           

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

    public function encode($ClassProduto, $emailCliente, $cliente, $tamanho)
    {
        $cod =  $ClassProduto->getNum();


        $sql = "SELECT PEDIDO_NUM,PEDIDO_CODSAP,PEDIDO_QUANTIDADE,COMPRADOR_CODSAP,cliente_email FROM pedido INNER JOIN comprador
        ON PEDIDO_RAZAO = comprador_id inner JOIN cliente 
        ON comprador_cnpj = CLIENTE_CNPJ WHERE PEDIDO_NUM = :PEDIDO_NUM";

        $select = $this->con->prepare($sql);
        $select->bindValue(":PEDIDO_NUM", $cod);
        $select->execute();


        /************************************************************************************************** */


        while ($row = $select->fetch(PDO::FETCH_ASSOC)) {

            $ClienteSAP = $row['COMPRADOR_CODSAP'];
            $EmailEmpresa = $row['cliente_email'];
            $item = array(
                'ItemCode' => $row['PEDIDO_CODSAP'],
                'Quantity' => intval($row['PEDIDO_QUANTIDADE']),
            );

            $linha[] = $item;
        }

        $API = array(

            'CardCode' => $ClienteSAP,
            /* 'ORCAMENTO' => $ClassProduto->getNum(),*/
            'DocDate' => $ClassProduto->getData(),
            'TaxDate' => $ClassProduto->getData(),
            'DocDueDate' => $ClassProduto->getData(),
            "BPL_IDAssignedToInvoice" => 1,
            'Lines' => $linha
        );

   
        /************************************************************************************************** */

        try {
            

            $info = array(

                "_postman_id" => "97f92a3b-fa8a-4bea-b288-56e734a508d4",
                "name" => "KONEC",
                "schema" => "https://schema.getpostman.com/json/collection/v2.1.0/collection.json"

            );

            $auth = array(

                "type" => "basic",
                "basic" => array(
                    [
                        "key" => "password",
                        "value" => "{{apiPass}}",
                        "type" => "string"
                    ],
                    [
                        "key" => "username",
                        "value" => "{{apiUser}}",
                        "type" => "string"
                    ]
                )
            );
            $dados = $API;
            $login = 'konecApiIntegration';
            $password = 'konecTest123';


            $endpointAPI = 'http://srvcaboxits01.b1cloud.com.br:10067/B1iXcellerator/exec/ipo/vP.0010000105.in_HCSX/com.sap.b1i.vplatform.runtime/INB_HT_CALL_SYNC_XPT/INB_HT_CALL_SYNC_XPT.ipo/proc/KNCsalQuot';
            $curl = curl_init();

            curl_setopt_array($curl, array(

                CURLOPT_URL => $endpointAPI,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode($dados),
                CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
                CURLOPT_USERPWD => $login . ':' . $password,
            ));


            echo $response = curl_exec($curl);
            $pieces = explode(":", $response);
            $pieces = explode( '"' ,$response);
    
           
            if($pieces[9] === "Inserida com sucesso no sistema."){
                $PedidoOrcamento = new OrçamentoMAIL();
                $PedidoOrcamento->emailOrçamento($ClassProduto, $emailCliente, $cliente, $tamanho);
                
                /*** Email da empresa ********/

                
                $EmpresaOrcamento = new OrçamentoEmpresaMAIL();
                $EmpresaOrcamento->emailOrçamento($ClassProduto, $EmailEmpresa,$cliente,$tamanho);

            }else{
                ?>
                 <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Erro ao tentar gravar dados',
                        text: 'Por favor entre em contato com administrador do sistema',
                        showConfirmButton: false,
                        timer: 3500
                    })
                </script>
                
                
                <?php



            }
                
        

            /************************************************************************************************** */
        } catch (PDOException $e) {
            
            echo $e->getMessage();
        }
    }

    public function selectProduto($produtos)
    {

        $sql = "SELECT * FROM `produto` WHERE 	PRODUTO_STATUS = 'S' and PEDIDO_CODSAP in ('$produtos')";
        
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
