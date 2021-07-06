<?php

include_once "../dao/DAO.php";
include_once "../class/ClassCliente.php";

class ClienteDAO extends DAO
{


    public function insertCliente(ClassCliente $ClassCliente)
    {

        $sql = "INSERT INTO `cliente`(`CLIENTE_ID`, `CLIENTE_CNPJ`, `CLIENTE_RAZAO`, `CLIENTE_FANTASIA`, `CLIENTE_EMAIL`, `CLIENTE_CODSAP`) VALUES (null, :CLIENTE_CNPJ, :CLIENTE_RAZAO, :CLIENTE_FANTASIA, :CLIENTE_EMAIL, :CLIENTE_CODSAP)";

        $insert = $this->con->prepare($sql);
        $insert->bindValue(":CLIENTE_CNPJ", $ClassCliente->getCnpj());
        $insert->bindValue(":CLIENTE_RAZAO", $ClassCliente->getRazao());
        $insert->bindValue(":CLIENTE_FANTASIA", "");
        $insert->bindValue(":CLIENTE_EMAIL", $ClassCliente->getEmail());
        $insert->bindValue(":CLIENTE_CODSAP", $ClassCliente->getSap());
        $insert->execute();
    }

    public function listaCliente(){

        $sql = "SELECT * FROM `cliente` ORDER BY `CLIENTE_CODSAP` ASC";
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

    public function logaut()
    {

        session_destroy();

        header('location: ../php/index.php');
    }
}
