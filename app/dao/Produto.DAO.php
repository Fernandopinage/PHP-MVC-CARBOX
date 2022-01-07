<?php
include_once "../class/ClassProduto.php";
include_once "../dao/DAO.php";

class ProdutoDAO extends DAO
{


    public function insertProduto(ClassProduto $ClassProduto)
    {

        $sql = "INSERT INTO `produto`(`PRODUTO_ID`, `PEDIDO_CODSAP`, `PRODUTO_PRODUTO`, `PRODUTO_UNIDADE`, `PRODUTO_IMG`, `PRODUTO_FIXA`, `PRODUTO_STATUS`)
         VALUES (null, :PEDIDO_CODSAP, :PRODUTO_PRODUTO, :PRODUTO_UNIDADE, :PRODUTO_IMG, :PRODUTO_FIXA, :PRODUTO_STATUS)";


        $insert = $this->con->prepare($sql);
        $insert->bindValue(":PEDIDO_CODSAP", $ClassProduto->getSap());
        $insert->bindValue(":PRODUTO_PRODUTO", $ClassProduto->getProduto());
        $insert->bindValue(":PRODUTO_IMG", $ClassProduto->getImg());
        $insert->bindValue(":PRODUTO_UNIDADE", $ClassProduto->getUnidade());
        $insert->bindValue(":PRODUTO_FIXA", $ClassProduto->getFicha());
        $insert->bindValue(":PRODUTO_STATUS", $ClassProduto->getStatus());
        $insert->execute();
    }
    public function listaProduto()
    {

        $sql = "SELECT * FROM `produto` WHERE PRODUTO_STATUS = 'S'";
        $select = $this->con->prepare($sql);
        $select->execute();
        $array = array();

        while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
            $ClassProduto = new ClassProduto();
            $ClassProduto->setID($row['PRODUTO_ID']);
            $ClassProduto->setSap($row['PEDIDO_CODSAP']);
            $ClassProduto->setProduto($row['PRODUTO_PRODUTO']);
            $ClassProduto->setUnidade($row['PRODUTO_UNIDADE']);
            $ClassProduto->setFicha($row['PRODUTO_FIXA']);
            $ClassProduto->setImg($row['PRODUTO_IMG']);
            $array[] = $ClassProduto;
        }
        return $array;
    }

    public function listaProdutoCliente($ClassCliPro)
    {


        $query = "DELETE FROM `cliente_produto` WHERE cli_pro_sap =:cli_pro_sap";
        $delete = $this->con->prepare($query);
        $delete->bindValue(':cli_pro_sap', $ClassCliPro->getSap());
        $delete->execute();


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
                    text: 'Atualizado(s) com sucesso',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>



        <?php

            header('Refresh: 3.0; url=home.php?p=cliente/');
        } catch (\Throwable $th) {

        ?>

            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Erro',
                    text: 'ao atualizar o produto(s)',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>

<?php

            header('Refresh: 4.0; url=home.php?p=cliente/');
        }
    }


    public function editarProduto(ClassProduto $ClassProduto)
    {

        $sql = "UPDATE `produto` SET ";

        if (!empty($ClassProduto->getImg())) {
            $sql = $sql . " `PRODUTO_IMG` = '" . $ClassProduto->getImg() . "',";
        }

        if (!empty($ClassProduto->getProduto())) {
            $sql = $sql . " `PRODUTO_PRODUTO`= '" . $ClassProduto->getProduto() . "'";
        }

        if (!empty($ClassProduto->getFicha())) {
            $sql = $sql . ", `PRODUTO_FIXA` = '" . $ClassProduto->getFicha() . "'";
        }


        if (!empty($ClassProduto->getUnidade())) {
            $sql = $sql . " `PRODUTO_UNIDADE` = '" . $ClassProduto->getUnidade() . "',";
        }
        $sql = $sql . " WHERE `PRODUTO_ID` = " . $ClassProduto->getID();


        $update = $this->con->prepare($sql);



        try {
            $update->execute();

        ?>
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Produto(s)',
                    text: 'Atualizado(s) com sucesso',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>



        <?php
        header('Refresh: 2.5; url=home.php?p=produto/');

        } catch (PDOException $e) {
            echo $e;
        ?>

            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Erro',
                    text: 'ao atualizar o produto(s)',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>

<?php
        }
      
    }

    public function delete($delete)
    {

        $sql = "UPDATE `produto` SET `PRODUTO_STATUS` = :PRODUTO_STATUS   WHERE `PRODUTO_ID` = :PRODUTO_ID";

        $insert = $this->con->prepare($sql);
        $insert->bindValue(":PRODUTO_ID", $delete);
        $insert->bindValue(":PRODUTO_STATUS", 'N');
        $insert->execute();
        header('Location: ../php/home.php?p=produto/');
    }
}
