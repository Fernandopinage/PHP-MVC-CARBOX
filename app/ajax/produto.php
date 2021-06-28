<?php 

include "../dao/PedidoDAO.php";

if(isset($_POST['id'])){

    $id = $_POST['id'];

    $contrato = new PedidoDAO();
    $contrato->ListaProdutos($id);


}

?>