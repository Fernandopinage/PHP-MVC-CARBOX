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
                    $insert->bindValue(":COMPRADOR_SENHA", md5($senha));
                    $insert->bindValue(":COMPRADOR_STATUS", $status);
                    $insert->execute();
                    
                

    }
    public function validarLogin($ClassComprador){
        
        $sql = "SELECT * FROM `comprador` WHERE COMPRADOR_SENHA = :COMPRADOR_SENHA and COMPRADOR_EMAIL= :COMPRADOR_EMAIL";
        $select = $this->con->prepare($sql);
        $select->bindValue(':COMPRADOR_SENHA', $ClassComprador->getSenha());
        $select->bindValue(':COMPRADOR_EMAIL', $ClassComprador->getEmail());
        $select->execute();
 
        $_SESSION['user'] = array();

        if($row = $select->fetch(PDO::FETCH_ASSOC)){
           
            
            session_start();
            $_SESSION['user'] = array(

                'id' => $row['COMPRADOR_ID'],
                'nome' => $row['COMPRADOR_NOME'],
                'email' => $row['COMPRADOR_EMAIL'],
                'status' => 'N'
            );
            header('Location: ../php/home.php?p=home/');
            
        }else{
            header('Location: ../php/login.php');
        }
        
    }

}

?>