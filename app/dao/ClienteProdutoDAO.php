<?php 
include_once "../dao/DAO.php";
include_once "../class/ClassClienteProduto.php";



class ClienteProdutoDAO extends DAO{

    public function insertClienteProduto($ClassCliPro){

        $sql = "INSERT INTO `cliente_produto`(`cli_pro_id`, `cli_pro_cnpj`, `cli_pro_sap`, `cli_pro_produto`) VALUES (null, :cli_pro_cnpj, :cli_pro_sap, :cli_pro_produto)";
       
        $insert = $this->con->prepare($sql);
        $insert->bindValue(':cli_pro_cnpj', $ClassCliPro->getCnpj());
        $insert->bindValue(':cli_pro_sap', $ClassCliPro->getSap());
        $insert->bindValue(':cli_pro_produto', $ClassCliPro->getProduto());
        $insert->execute();
    }

}


?>