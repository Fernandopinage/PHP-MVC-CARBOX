<?php 
include_once "../dao/DAO.php";
include_once "../class/ClassComprador.php";


class CompradorDAO extends DAO{


    public function inserComprador(ClassComprador $ClassComprador){

     
            $sql = "INSERT INTO `comprador`(`COMPRADOR_ID`, `COMPRADOR_CNPJ`, `COMPRADOR_NOME`, `COMPRADOR_EMAIL`, `COMPRADOR_SENHA`, `COMPRADOR_STATUS`) VALUES (null, :COMPRADOR_CNPJ, :COMPRADOR_NOME, :COMPRADOR_EMAIL, :COMPRADOR_SENHA, :COMPRADOR_STATUS)";
            
            $insert = $this->con->prepare($sql);
            $insert->bindValue(":COMPRADOR_CNPJ", $ClassComprador->getCnpj());
            $insert->bindValue(":COMPRADOR_NOME", $ClassComprador->getNome());
            $insert->bindValue(":COMPRADOR_EMAIL", $ClassComprador->getEmail());
            $insert->bindValue(":COMPRADOR_SENHA", $ClassComprador->getSenha());
            $insert->bindValue(":COMPRADOR_STATUS", $ClassComprador->getStatus());
            $insert->execute();
            

    }

}

?>