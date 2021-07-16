<?php
include_once "../dao/DAO.php";
include_once "../class/ClassComprador.php";
include_once "../class/GerarSenha.php";


class CompradorDAO extends DAO
{


    public function inserComprador($cnpj, $nome, $email)
    {

        $senha = new GerarSenha();
        $rash = $senha->senha();
        $sql = "INSERT INTO `comprador`(`COMPRADOR_ID`, `COMPRADOR_CNPJ`, `COMPRADOR_NOME`, `COMPRADOR_EMAIL`, `COMPRADOR_SENHA`, `COMPRADOR_STATUS`) VALUES (null, :COMPRADOR_CNPJ, :COMPRADOR_NOME, :COMPRADOR_EMAIL, :COMPRADOR_SENHA, :COMPRADOR_STATUS)";

        $insert = $this->con->prepare($sql);
        $insert->bindValue(":COMPRADOR_CNPJ", $cnpj);
        $insert->bindValue(":COMPRADOR_NOME", $nome);
        $insert->bindValue(":COMPRADOR_EMAIL", $email);
        $insert->bindValue(":COMPRADOR_SENHA", md5($rash));
        $insert->bindValue(":COMPRADOR_STATUS", 'Ativo');
        $insert->execute();

        header('Location: ../php/home.php?p=cliente/');
    }
    public function validarLogin($ClassComprador)
    {

        $sql = "SELECT * FROM `comprador` WHERE COMPRADOR_SENHA = :COMPRADOR_SENHA and COMPRADOR_EMAIL= :COMPRADOR_EMAIL";
        $select = $this->con->prepare($sql);
        $select->bindValue(':COMPRADOR_SENHA', $ClassComprador->getSenha());
        $select->bindValue(':COMPRADOR_EMAIL', $ClassComprador->getEmail());
        $select->execute();

        $_SESSION['user'] = array();

        if ($row = $select->fetch(PDO::FETCH_ASSOC)) {


            session_start();
            $_SESSION['user'] = array(

                'id' => $row['COMPRADOR_ID'],
                'nome' => $row['COMPRADOR_NOME'],
                'email' => $row['COMPRADOR_EMAIL'],
                'status' => 'N',
                'comprador' => 'S'
            );
            header('Location: ../php/home.php?p=home/');
        } else {
            header('Location: ../php/login.php');
        }
    }


    public function updateComprador($lista)
    {

    $tamanho = count($lista['id']);

    
    for($i=0; $i <= $tamanho-1; $i++){
        
        
        $id =  $lista['id'][$i];
        $email =  $lista['email'][$i];
        $status =  $lista['status'][$i];
        
        try {
            
            $sql = "UPDATE `comprador` SET COMPRADOR_EMAIL = '$email' , COMPRADOR_STATUS = '$status' WHERE COMPRADOR_ID = '$id'";
            $update = $this->con->prepare($sql);
            $update->execute();
            
        } catch (PDOException $e) {
            echo $e;
        }
        
    }
    
    /*
        */
    }
}
