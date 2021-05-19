<?php 
include_once "../dao/DAO.php";

Class ClassIndex extends Dao{

   
    public function login(ClassCliente $ClassCliente)
    {
        
        
        $sql = "SELECT * FROM `cliente` WHERE  CLIENTE_EMAIL = :CLIENTE_EMAIL  and  CLIENTE_SENHA = :CLIENTE_SENHA";
        $select = $this->con->prepare($sql);
        $select->bindValue(':CLIENTE_EMAIL', $ClassCliente->getEmail());
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

}

?>