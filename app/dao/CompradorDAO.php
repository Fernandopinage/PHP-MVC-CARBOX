<?php 
include_once "../dao/DAO.php";
include_once "../class/ClassComprador.php";


class CompradorDAO extends DAO{


    public function inserComprador($cnpj,$nome,$email,$senha,$status){

           
                   
                    $sql = "INSERT INTO `comprador`(`COMPRADOR_ID`, `COMPRADOR_CNPJ`, `COMPRADOR_NOME`, `COMPRADOR_EMAIL`, `COMPRADOR_SENHA`, `COMPRADOR_STATUS`) VALUES (null, :COMPRADOR_CNPJ, :COMPRADOR_NOME, :COMPRADOR_EMAIL, :COMPRADOR_SENHA, :COMPRADOR_STATUS)";
                    
                    $insert = $this->con->prepare($sql);
                    $insert->bindValue(":COMPRADOR_CNPJ",$cnpj);
                    $insert->bindValue(":COMPRADOR_NOME", $nome);
                    $insert->bindValue(":COMPRADOR_EMAIL", $email);
                    $insert->bindValue(":COMPRADOR_SENHA", $senha);
                    $insert->bindValue(":COMPRADOR_STATUS", $status);
                    $insert->execute();
                    
                

    }

}

?>