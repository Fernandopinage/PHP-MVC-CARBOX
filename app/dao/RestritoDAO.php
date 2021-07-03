<?php 
include_once "../dao/DAO.php";
include_once "../class/ClassRestrito.php";


class RestritoDAO  extends DAO{


    public function insertRestrito(ClassRestrito $ClassRestrito){

        $sql = "INSERT INTO `restrito`(`RESTRITO_ID`, `RESTRITO_NOME`, `RESTRITO_SENHA`, `RESTRITO_EMAIL`,`RESTRITO_STATUS`) 
        VALUES (null, :RESTRITO_NOME, :RESTRITO_SENHA, :RESTRITO_EMAIL, :RESTRITO_STATUS) ";
        $insert = $this->con->prepare($sql);


        $insert->bindValue(":RESTRITO_NOME", $ClassRestrito->getNome());
        $insert->bindValue(":RESTRITO_SENHA", $ClassRestrito->getSenha());
        $insert->bindValue(":RESTRITO_EMAIL", $ClassRestrito->getEmail());
        $insert->bindValue(":RESTRITO_STATUS", $ClassRestrito->getStatus());
        $insert->execute();

      
    }

    public function validarRegistro(ClassRestrito $ClassRestrito){

        $sql = "SELECT * FROM `restrito` WHERE RESTRITO_SENHA = :RESTRITO_SENHA and RESTRITO_EMAIL= :RESTRITO_EMAIL";
        $select = $this->con->prepare($sql);
        $select->bindValue(':RESTRITO_SENHA', $ClassRestrito->getSenha());
        $select->bindValue(':RESTRITO_EMAIL', $ClassRestrito->getEmail());
        $select->execute();

        $_SESSION['user'] = array();

        if($row = $select->fetch(PDO::FETCH_ASSOC)){
            session_start();
            $_SESSION['user'] = array(

                'id' => $row['RESTRITO_ID'],
                'nome' => $row['RESTRITO_NOME'],
                'email' => $row['RESTRITO_EMAIL']
            );
            header('Location: ../php/home.php?p=home/');

        }else{
            header('Location: ../php/index.php');
        }
    }

}




?>