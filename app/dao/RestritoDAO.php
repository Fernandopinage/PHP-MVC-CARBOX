<?php 
include_once "../dao/DAO.php";
include_once "../class/ClassRestrito.php";
include_once "../dao/DAO.php";

class RestritoDAO extends DAO{


    public function insertRestrito(ClassRestrito $ClassRestrito){

        $sql = "INSERT INTO `restrito`(`RESTRITO_ID`, `RESTRITO_NOME`, `RESTRITO_SENHA`, `RESTRITO_EMAIL`) 
        VALUES (null , :ESTRITO_NOME, :RESTRITO_SENHA, :RESTRITO_EMAIL) ";
        $insert = $this->con->prepare($sql);
        $insert->bindValue(":RESTRITO_NOME", $ClassRestrito->getNome());
        $insert->bindValue(":RESTRITO_SENHA", $ClassRestrito->getSenha());
        $insert->bindValue(":RESTRITO_EMAIL", $ClassRestrito->getEmail());
        $insert->execute();

      var_dump($ClassRestrito);
    }

}




?>