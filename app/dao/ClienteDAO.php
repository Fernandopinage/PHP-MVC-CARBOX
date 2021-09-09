<?php

include_once "../dao/DAO.php";
include_once "../class/ClassCliente.php";
include_once "../class/GerarSenha.php";
include_once "../dao/MailRedefinirsenha.php";
class ClienteDAO extends DAO
{


    public function insertCliente(ClassCliente $ClassCliente)
    {

        try {

            $sql = "INSERT INTO `cliente`(`CLIENTE_ID`, `CLIENTE_CNPJ`, `CLIENTE_RAZAO`, `CLIENTE_FANTASIA`, `CLIENTE_EMAIL`, `CLIENTE_CODSAP`, `CLIENTE_STATUS`) VALUES (null, :CLIENTE_CNPJ, :CLIENTE_RAZAO, :CLIENTE_FANTASIA, :CLIENTE_EMAIL, :CLIENTE_CODSAP, :CLIENTE_STATUS)";

            $insert = $this->con->prepare($sql);
            $insert->bindValue(":CLIENTE_CNPJ", $ClassCliente->getCnpj());
            $insert->bindValue(":CLIENTE_RAZAO", $ClassCliente->getRazao());
            $insert->bindValue(":CLIENTE_FANTASIA", "");
            $insert->bindValue(":CLIENTE_EMAIL", $ClassCliente->getEmail());
            $insert->bindValue(":CLIENTE_CODSAP", $ClassCliente->getSap());
            $insert->bindValue(":CLIENTE_STATUS", 'S');
            $insert->execute();

?>
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Registro salvo com sucesso',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>

                

        <?php
            return true;
        } catch (\Throwable $th) {

        ?>

            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Código SAP já cadastrado',
                    showConfirmButton: false,
                    timer: 4000
                })
            </script>


        <?php

                return false;
        }


        //include_once "../class/ClassPedidoMAIL.php";
        // header('Location: ../php/home.php?p=cliente/');
    }

    public function listaCliente()
    {

        $sql = "SELECT * FROM `cliente` WHERE CLIENTE_STATUS = 'S' ORDER BY `cliente`.`CLIENTE_ID` DESC";
        $select = $this->con->prepare($sql);
        $select->execute();
        $array = array();
        while ($row = $select->fetch(PDO::FETCH_ASSOC)) {

            $ClassCliente = new ClassCliente();
            $ClassCliente->setID($row['CLIENTE_ID']);
            $ClassCliente->setCnpj($row['CLIENTE_CNPJ']);
            $ClassCliente->setRazao($row['CLIENTE_RAZAO']);
            $ClassCliente->setEmail($row['CLIENTE_EMAIL']);
            $ClassCliente->setSap($row['CLIENTE_CODSAP']);
            $array[] = $ClassCliente;
        }
        return $array;
    }



    public function listaVendedores($id)
    {

        $sql = "SELECT * FROM `cliente` inner join comprador on CLIENTE_CNPJ = COMPRADOR_CNPJ WHERE CLIENTE_ID = :CLIENTE_ID and COMPRADOR_STATUS = :COMPRADOR_STATUS";
        $select = $this->con->prepare($sql);
        $select->bindValue(":CLIENTE_ID", $id);
        $select->bindValue(":COMPRADOR_STATUS", 'Ativo');
        $select->execute();
        $lista = array();

        while ($row = $select->fetch(PDO::FETCH_ASSOC)) {

            $array = array(

                'id' => $row['COMPRADOR_ID'],
                'nome' => $row['COMPRADOR_NOME'],
                'email' => $row['COMPRADOR_EMAIL'],
                'password' => $row['COMPRADOR_SENHA'],
                'status' => $row['COMPRADOR_STATUS']
            );

            $lista[]  = $array;
        }
        return $lista;
    }

    public function listarCompradores($id)
    {

        $sql = "SELECT * FROM `comprador` inner join `log` on COMPRADOR_EMAIL = log_comprador where COMPRADOR_CNPJ = :COMPRADOR_CNPJ";
        $select = $this->con->prepare($sql);
        $select->bindValue(":COMPRADOR_CNPJ", $id);
        $select->execute();
        $listacomprador = array();
        while ($row = $select->fetch(PDO::FETCH_ASSOC)) {

            $array = array(

                'id' => $row['COMPRADOR_ID'],
                'nome' => $row['COMPRADOR_NOME'],
                'email' => $row['COMPRADOR_EMAIL'],
                'password' => $row['COMPRADOR_SENHA'],
                'status' => $row['COMPRADOR_STATUS'],
                'log' => $row['log_status']
            );

            $listacomprador[]  = $array;
        }
        return $listacomprador;
    }

    public function editarCliente(ClassCliente $ClassCliente)
    {



        $sql = "UPDATE `cliente` SET `CLIENTE_ID`=:CLIENTE_ID,`CLIENTE_CNPJ`=:CLIENTE_CNPJ,`CLIENTE_RAZAO`=CLIENTE_RAZAO,`CLIENTE_EMAIL`=:CLIENTE_EMAIL,`CLIENTE_CODSAP`=:CLIENTE_CODSAP WHERE `CLIENTE_ID`=:CLIENTE_ID";

        $update = $this->con->prepare($sql);
        $update->bindValue(':CLIENTE_ID', $ClassCliente->getID());
        $update->bindValue(':CLIENTE_CNPJ', $ClassCliente->getCnpj());
        $update->bindValue(':CLIENTE_RAZAO', $ClassCliente->getRazao());
        $update->bindValue(':CLIENTE_EMAIL', $ClassCliente->getEmail());
        $update->bindValue(':CLIENTE_CODSAP', $ClassCliente->getSap());
        $update->execute();

        // não pode redirecionar
        header('Location: ../php/home.php?p=cliente/');
    }

    public function deleteCliente($delete)
    {

        $sql = "UPDATE `cliente` SET `CLIENTE_STATUS`=:CLIENTE_STATUS WHERE `CLIENTE_CNPJ`=:CLIENTE_CNPJ";

        $update = $this->con->prepare($sql);
        $update->bindValue(':CLIENTE_CNPJ', $delete);
        $update->bindValue(':CLIENTE_STATUS', 'N');

        try {
            
            $update->execute();

            $sql2 = "UPDATE `comprador` SET `COMPRADOR_STATUS`=:COMPRADOR_STATUS WHERE `COMPRADOR_CNPJ`=:COMPRADOR_CNPJ";
            $update = $this->con->prepare($sql2);
            $update->bindValue(':COMPRADOR_CNPJ', $delete);
            $update->bindValue(':COMPRADOR_STATUS', 'Inativo');
            $update->execute();
            
        } catch (PDOException $e) {
           
        }


        header('Location: ../php/home.php?p=cliente/');
    }

    public function editarComprador()
    {
    }


    public function logaut()
    {

        session_destroy();

        header('location: ../php/index.php');
    }
}
