<?php

include_once "../dao/DAO.php";
include_once "../class/ClassCliente.php";

class ClienteDAO extends DAO
{


    public function insertCliente(ClassCliente $ClassCliente)
    {

        $sql = "INSERT INTO `cliente`(`CLIENTE_ID`, `CLIENTE_CPF`, `CLIENTE_RAZAO`, `CLIENTE_NOME`, `CLIENTE_EMAIL`, `CLIENTE_SENHA`, `CLIENTE_CODSAP`) 
        VALUES (null, :CLIENTE_CPF, :CLIENTE_RAZAO, :CLIENTE_NOME, :CLIENTE_EMAIL, :CLIENTE_SENHA, :CLIENTE_CODSAP)";

        $insert = $this->con->prepare($sql);
        $insert->bindValue(":CLIENTE_CPF", $ClassCliente->getCPF());
        $insert->bindValue(":CLIENTE_RAZAO", $ClassCliente->getRazao());
        $insert->bindValue(":CLIENTE_NOME", $ClassCliente->getNome());
        $insert->bindValue(":CLIENTE_EMAIL", $ClassCliente->getEmail());
        $insert->bindValue(":CLIENTE_SENHA", $ClassCliente->getSenha());
        $insert->bindValue(":CLIENTE_CODSAP", $ClassCliente->getSap());
        $insert->execute();
    }

    public function reseteSenha(ClassCliente $ClassCliente)
    {
    }

    public function logaut()
    {

        session_destroy();

        header('location: ../php/index.php');
    }
}
