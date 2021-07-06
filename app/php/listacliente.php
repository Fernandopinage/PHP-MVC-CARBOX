<?php
include_once "../class/ClassCliente.php";
include_once "../dao/ClienteDAO.php";


$Cliente = new ClienteDAO();
$dados = $Cliente->listaCliente();



?>
<br><br>
<link href='../css/table.css' rel='stylesheet' />
<div class="text-right">
    <a class="btn btn-primary" href="?p=add/cliente/">Adicionar Usuário</a>
</div>
<br><br>
<table class="table table-hover">
    <thead class="thead" style="background-color: #136132; color:#fff;">
        <tr>
            <th scope="col" style="text-align: center;">CÓD SAP</th>
            <th scope="col">CNPJ</th>
            <th scope="col">RAZÃO SOCIAL</th>
            <th scope="col">E-MAIL</th>
            <th scope="col"></th>
            <th scope="col"></th>

        </tr>
    </thead>
    <tbody style="background-color: #fff;">

        <?php

        foreach ($dados as $dados => $obj) {
        ?>
        <tr>
            <th scope="col" style="text-align: center;"><?php echo  $obj->getSap(); ?></th>
            <th scope="col"><?php echo  $obj->getCnpj(); ?></th>
            <th scope="col"><?php echo  $obj->getRazao(); ?></th>
            <th scope="col"><?php echo  $obj->getEmail(); ?></th>
            <th scope="col"></th>
            <th scope="col"></th>

        </tr>

        <?php
        }
        ?>


    </tbody>
</table>