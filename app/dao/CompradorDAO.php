<?php
include_once "../dao/DAO.php";
include_once "../class/ClassComprador.php";
include_once "../class/GerarSenha.php";
include_once "../dao/MailVendedor.php";

class CompradorDAO extends DAO
{


    public function inserComprador($cnpj, $nome, $email)
    {

        $senha = new GerarSenha();
        $rash = $senha->senha();
        $sql = "INSERT INTO `comprador`(`COMPRADOR_ID`, `COMPRADOR_CNPJ`, `COMPRADOR_NOME`, `COMPRADOR_EMAIL`, `COMPRADOR_SENHA`, `COMPRADOR_STATUS`, `COMPRADOR_ACESSO`) VALUES (null, :COMPRADOR_CNPJ, :COMPRADOR_NOME, :COMPRADOR_EMAIL, :COMPRADOR_SENHA, :COMPRADOR_STATUS, :COMPRADOR_ACESSO)";

        $insert = $this->con->prepare($sql);
        $insert->bindValue(":COMPRADOR_CNPJ", $cnpj);
        $insert->bindValue(":COMPRADOR_NOME", $nome);
        $insert->bindValue(":COMPRADOR_EMAIL", $email);
        $insert->bindValue(":COMPRADOR_SENHA", md5($rash));
        $insert->bindValue(":COMPRADOR_STATUS", 'Ativo');
        $insert->bindValue(":COMPRADOR_ACESSO", 'N');
        $insert->execute();

        $emailCliente = new VendedorMAIL();
        $emailCliente->vendedorMail($nome, $email,$rash);

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


    public function updateComprador($id, $email)
    {
 

           $sql = "UPDATE `comprador` SET  COMPRADOR_EMAIL = :COMPRADOR_EMAIL WHERE COMPRADOR_ID = :COMPRADOR_ID";
           $update = $this->con->prepare($sql);
           $update->bindValue(':COMPRADOR_ID', $id);
           //$update->bindValue(':COMPRADOR_STATUS',  $status);
           $update->bindValue(':COMPRADOR_EMAIL', $email);
           $update->execute();
        
        
    }

    public function primeiroAcesso(ClassComprador $ClassComprador){

        $sql = "SELECT * FROM `comprador` WHERE COMPRADOR_SENHA = :COMPRADOR_SENHA and COMPRADOR_EMAIL= :COMPRADOR_EMAIL";
        $select = $this->con->prepare($sql);
        $select->bindValue(':COMPRADOR_SENHA', $ClassComprador->getSenha());
        $select->bindValue(':COMPRADOR_EMAIL', $ClassComprador->getEmail());
        $select->execute();

        

        if ($select->fetch(PDO::FETCH_ASSOC)) {

            $sql2 = "UPDATE `comprador` SET  COMPRADOR_ACESSO = :COMPRADOR_ACESSO, COMPRADOR_SENHA =:COMPRADOR_SENHA WHERE COMPRADOR_EMAIL = :COMPRADOR_EMAIL";
            $update = $this->con->prepare($sql2);
            $update->bindValue(':COMPRADOR_EMAIL', $ClassComprador->getEmail());
            //$update->bindValue(':COMPRADOR_STATUS',  $status);
            $update->bindValue(':COMPRADOR_ACESSO', 'S');
            $update->bindValue(':COMPRADOR_SENHA', $ClassComprador->getNovasenha());
            $update->execute();
            
            header('Location: ../php/login.php');
        } else {
            header('Location: ../php/acesso.php');
        }


    }
}
