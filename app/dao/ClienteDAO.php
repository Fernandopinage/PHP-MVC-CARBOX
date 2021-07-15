<?php

include_once "../dao/DAO.php";
include_once "../class/ClassCliente.php";

class ClienteDAO extends DAO
{


    public function insertCliente(ClassCliente $ClassCliente)
    {

        $sql = "INSERT INTO `cliente`(`CLIENTE_ID`, `CLIENTE_CNPJ`, `CLIENTE_RAZAO`, `CLIENTE_FANTASIA`, `CLIENTE_EMAIL`, `CLIENTE_CODSAP`, `CLIENTE_STATUS`) VALUES (null, :CLIENTE_CNPJ, :CLIENTE_RAZAO, :CLIENTE_FANTASIA, :CLIENTE_EMAIL, :CLIENTE_CODSAP, :CLIENTE_STATUS)";

        $insert = $this->con->prepare($sql);
        $insert->bindValue(":CLIENTE_CNPJ", $ClassCliente->getCnpj());
        $insert->bindValue(":CLIENTE_RAZAO", $ClassCliente->getRazao());
        $insert->bindValue(":CLIENTE_FANTASIA", "");
        $insert->bindValue(":CLIENTE_EMAIL", $ClassCliente->getEmail());
        $insert->bindValue(":CLIENTE_CODSAP", $ClassCliente->getSap());
        $insert->bindValue(":CLIENTE_STATUS", 'S');
        $insert->execute();

        $email =  $ClassCliente->getEmail();
        //include_once "../class/ClassPedidoMAIL.php";
        header('Location: ../php/home.php?p=add/cliente/');
    }

    public function listaCliente(){

        $sql = "SELECT * FROM `cliente` WHERE CLIENTE_STATUS = 'S' ORDER BY `cliente`.`CLIENTE_ID` DESC";
        $select = $this->con->prepare($sql);
        $select->execute();
        $array = array();
        while($row = $select->fetch(PDO::FETCH_ASSOC)){

            $ClassCliente = new ClassCliente();
            $ClassCliente->setID($row['CLIENTE_ID']);
            $ClassCliente->setCnpj($row['CLIENTE_CNPJ']);
            $ClassCliente->setRazao($row['CLIENTE_RAZAO']);
            $ClassCliente->setEmail($row['CLIENTE_EMAIL']);
            $ClassCliente->setSap($row['CLIENTE_CODSAP']);
            $array[] =$ClassCliente;
        }
        return $array;
    }

    public function listaVendedores($id){

       $sql = "SELECT * FROM `cliente` inner join comprador on CLIENTE_CNPJ = COMPRADOR_CNPJ WHERE CLIENTE_ID = :CLIENTE_ID";
       $select = $this->con->prepare($sql);
       $select->bindValue(":CLIENTE_ID", $id);
       $select->execute();
       $lista = array();
       while($row = $select->fetch(PDO::FETCH_ASSOC)){
           
            $array = array(

                'id' => $row['COMPRADOR_ID'],
                'nome' => $row['COMPRADOR_NOME'],
                'email' => $row['COMPRADOR_EMAIL'],
                'password' => $row['COMPRADOR_SENHA'],
                'status' => $row['COMPRADOR_STATUS']
            );
           
            $lista[]  =$array;
            
       }
       return $lista;
    }

    public function editarCliente(ClassCliente $ClassCliente){
  
      
       
        $sql = "UPDATE `cliente` SET `CLIENTE_ID`=:CLIENTE_ID,`CLIENTE_CNPJ`=:CLIENTE_CNPJ,`CLIENTE_RAZAO`=CLIENTE_RAZAO,`CLIENTE_EMAIL`=:CLIENTE_EMAIL,`CLIENTE_CODSAP`=:CLIENTE_CODSAP WHERE `CLIENTE_ID`=:CLIENTE_ID"; 

        $update = $this->con->prepare($sql);
        $update->bindValue(':CLIENTE_ID', $ClassCliente->getID());
        $update->bindValue(':CLIENTE_CNPJ', $ClassCliente->getCnpj());
        $update->bindValue(':CLIENTE_RAZAO', $ClassCliente->getRazao());
        $update->bindValue(':CLIENTE_EMAIL', $ClassCliente->getEmail());
        $update->bindValue(':CLIENTE_CODSAP', $ClassCliente->getSap());
        $update->execute();
      
        header('Location: ../php/home.php?p=cliente/');
        
    }

    public function deleteCliente($delete){

              
       
        $sql = "UPDATE `cliente` SET `CLIENTE_STATUS`=:CLIENTE_STATUS WHERE `CLIENTE_ID`=:CLIENTE_ID"; 

        $update = $this->con->prepare($sql);
        $update->bindValue(':CLIENTE_ID', $delete);
        $update->bindValue(':CLIENTE_STATUS', 'N');
        $update->execute();
      
        header('Location: ../php/home.php?p=cliente/');
    }

    public function editarComprador(){

        
    }

    public function logaut()
    {

        session_destroy();

        header('location: ../php/index.php');
    }
}
