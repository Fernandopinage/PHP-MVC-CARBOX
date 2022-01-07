<?php 
include_once "../dao/DAO.php";
include_once "../class/ClassRestrito.php";


class RestritoDAO  extends DAO{




    public function primeiroAcesso($ClassRestrito){
                
        $sql = "SELECT * from restrito  WHERE RESTRITO_EMAIL = :RESTRITO_EMAIL";
        $select = $this->con->prepare($sql);
        $select->bindValue(':RESTRITO_EMAIL', $ClassRestrito->getEmail());

        $select->execute();


        if ($select->fetch(PDO::FETCH_ASSOC)) {

           
            $sql2 = "UPDATE `restrito` SET `RESTRITO_SENHA`= :RESTRITO_SENHA WHERE `RESTRITO_EMAIL` = :RESTRITO_EMAIL ";
            $update = $this->con->prepare($sql2);
            $update->bindValue(':RESTRITO_EMAIL', $ClassRestrito->getEmail());
            $update->bindValue(':RESTRITO_SENHA', $ClassRestrito->getSenha());
            $update->execute();
            
        }
        
        header('Location: ../php/index.php');
        
    }


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

        $sql = "SELECT * FROM `restrito` WHERE RESTRITO_SENHA = :RESTRITO_SENHA and RESTRITO_EMAIL= :RESTRITO_EMAIL and RESTRITO_STATUS = :RESTRITO_STATUS";
        $select = $this->con->prepare($sql);
        $select->bindValue(':RESTRITO_SENHA', $ClassRestrito->getSenha());
        $select->bindValue(':RESTRITO_EMAIL', $ClassRestrito->getEmail());
        $select->bindValue(':RESTRITO_STATUS', 'S');
        $select->execute();

        $_SESSION['user'] = array();

        if($row = $select->fetch(PDO::FETCH_ASSOC)){
            session_start();
            $_SESSION['user'] = array(

                'id' => $row['RESTRITO_ID'],
                'nome' => $row['RESTRITO_NOME'],
                'email' => $row['RESTRITO_EMAIL'],
                'status' => $row['RESTRITO_STATUS']
            );
            header('Location: ../php/home.php?p=cliente/');

        }else{
            header('Location: ../php/index.php');
        }
    }

    public function listarRestrito(){

        $sql = "SELECT * FROM `restrito` WHERE RESTRITO_STATUS = 'S'";
        $select = $this->con->prepare($sql);
        $select->execute();
        $array = array();
        while($row = $select->fetch(PDO::FETCH_ASSOC)){ 

            $Restrito = new ClassRestrito();

            $Restrito->setID($row['RESTRITO_ID']);
            $Restrito->setNome($row['RESTRITO_NOME']);
            $Restrito->setEmail($row['RESTRITO_EMAIL']);
            $Restrito->setSenha($row['RESTRITO_SENHA']);
            $Restrito->setStatus($row['RESTRITO_STATUS']);
            $array[] = $Restrito;
        }
        return $array;
    }
    public function editarRegistro(ClassRestrito $ClassRestrito){

        $sql = "UPDATE `restrito` SET `RESTRITO_NOME`= :RESTRITO_NOME,`RESTRITO_SENHA`= :RESTRITO_SENHA,`RESTRITO_EMAIL`=:RESTRITO_EMAIL,`RESTRITO_STATUS`= :RESTRITO_STATUS WHERE `RESTRITO_ID`=:RESTRITO_ID";
        $insert = $this->con->prepare($sql);
        $insert->bindValue(':RESTRITO_ID', $ClassRestrito->getID());
        $insert->bindValue(':RESTRITO_NOME', $ClassRestrito->getNome());
        $insert->bindValue(':RESTRITO_SENHA', $ClassRestrito->getSenha());
        $insert->bindValue(':RESTRITO_EMAIL', $ClassRestrito->getEmail());
        $insert->bindValue(':RESTRITO_STATUS', $ClassRestrito->getStatus());
        
        
        try {
            $insert->execute();

            ?>
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Registro alterado com sucesso',
                    showConfirmButton: false,
                    timer: 3000
                })
            </script>

                

        <?php

            header('Refresh: 3.5; url=home.php?p=restrito/');    

            
        } catch (\Throwable $th) {
            ?>
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Registro não alterado',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>

                

        <?php
        }


    }

    public function delete($delete){

        $sql = "UPDATE `restrito` SET `RESTRITO_STATUS`= :RESTRITO_STATUS WHERE `RESTRITO_ID`=:RESTRITO_ID";
        $insert = $this->con->prepare($sql);
        $insert->bindValue(':RESTRITO_ID', $delete);
        $insert->bindValue(':RESTRITO_STATUS', 'N');
        $insert->execute();
        header('Location: ../php/home.php?p=restrito/');

    }

}




?>