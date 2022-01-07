<?php
include_once "../dao/DAO.php";
include_once "../class/ClassClienteProduto.php";



class ClienteProdutoDAO extends DAO
{

    public function insertClienteProduto($ClassCliPro)
    {

        $sql = "INSERT INTO `cliente_produto`(`cli_pro_id`, `cli_pro_cnpj`, `cli_pro_sap`, `cli_pro_produto`) VALUES (null, :cli_pro_cnpj, :cli_pro_sap, :cli_pro_produto)";

        $insert = $this->con->prepare($sql);
        $insert->bindValue(':cli_pro_cnpj', $ClassCliPro->getCnpj());
        $insert->bindValue(':cli_pro_sap', $ClassCliPro->getSap());
        $insert->bindValue(':cli_pro_produto', json_encode($ClassCliPro->getProduto(), JSON_UNESCAPED_UNICODE));


        try {
            $insert->execute();
        ?>
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Produto(s)',
                    text: 'adicionado(s) com sucesso',
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
                    title: 'Erro',
                    text: 'ao adicionar o produto(s)',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>

        <?php

           
        }
        
    }

    public function listaPordutoCliente($id)
    {
        $sql = "SELECT  * FROM `cliente_produto` WHERE `cli_pro_cnpj` =:cli_pro_cnpj";
        $select = $this->con->prepare($sql);
        $select->bindValue(':cli_pro_cnpj', $id);
        $select->execute();
        $lista = array();


        if ($row = $select->fetch(PDO::FETCH_ASSOC)) {
            $row = $row['cli_pro_produto'];


            $lista = json_decode($row);
            $tanho = count($lista);

            for ($i = 0; $i < $tanho; $i++) {

                $sql2 = "SELECT * FROM `produto` WHERE `PEDIDO_CODSAP` =:PEDIDO_CODSAP";
                $select = $this->con->prepare($sql2);
                $select->bindValue(':PEDIDO_CODSAP', $lista[$i]);
                $select->execute();
                if ($row = $select->fetch(PDO::FETCH_ASSOC)) {
                    echo $row = $row['PRODUTO_PRODUTO'] . "<br>";
                }
            }
        }else{

            echo "<p style='color:red;'> Por favor cadastre pelo menos 1 produto! </p>";
        }

        // return $lista;

    }
}


?>