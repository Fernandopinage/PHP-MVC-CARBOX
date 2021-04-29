<?php

include_once "../dao/DAO.php";
include_once "../class/ClassCliente.php";

class ClienteDAO extends DAO
{


    public function login(ClassCliente $ClassCliente)
    {

        $sql = "SELECT * FROM `cliente` WHERE :CLIENTE_CPF  and :CLIENTE_SENHA";
        $select = $this->con->prepare($sql);
        $select->bindValue(':CLIENTE_CPF', $ClassCliente->getCPF());
        $select->bindValue(':CLIENTE_SENHA', $ClassCliente->getSenha());
        $select->execute();

        $_SESSION['valor'] = array();

        if ($row = $select->fetch(PDO::FETCH_ASSOC)) {

            $_SESSION['valor'] = array(

                'id' => $row['CLIENTE_ID'],
                'cpf' => $row['CLIENTE_CPF'],
                'razao' => $row['CLIENTE_NOME'],
                'nome' => $row['CLIENTE_NOME'],
                'email' => $row['CLIENTE_EMAIL']

            );

            header('location: ../php/home.php');
        } else {

            header('location: ../php/index.php');
        }
    }

    public function insertCliente(ClassCliente $ClassCliente)
    {

        $sql = "INSERT INTO `cliente`(`CLIENTE_ID`, `CLIENTE_CPF`, `CLIENTE_RAZAO`, `CLIENTE_NOME`, `CLIENTE_EMAIL`, `CLIENTE_SENHA`) 
        VALUES (null, :CLIENTE_CPF, :CLIENTE_RAZAO, :CLIENTE_NOME, :CLIENTE_EMAIL, :CLIENTE_SENHA)";

        $insert = $this->con->prepare($sql);
        $insert->bindValue(":CLIENTE_CPF", $ClassCliente->getCPF());
        $insert->bindValue(":CLIENTE_RAZAO", $ClassCliente->getRazao());
        $insert->bindValue(":CLIENTE_NOME", $ClassCliente->getNome());
        $insert->bindValue(":CLIENTE_EMAIL", $ClassCliente->getEmail());
        $insert->bindValue(":CLIENTE_SENHA", $ClassCliente->getSenha());
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
