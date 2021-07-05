<?php
include_once "../class/ClassRestrito.php";
include_once "../dao/RestritoDAO.php";

$Restrito = new RestritoDAO();
$dados = $Restrito->listarRestrito();


?>
<br><br>
<link href='../css/table.css' rel='stylesheet' />
<div class="text-right">
    <a class="btn btn-primary" href="?p=add/restrito/">Adicionar Usuário</a>
</div>
<br><br>
<table class="table table-hover">
    <thead class="thead" style="background-color: #136132; color:#fff;">
        <tr>
            <th scope="col">Cód</th>
            <th scope="col">Nome</th>
            <th scope="col">E-mail</th>
            <th scope="col"></th>
            <th scope="col"></th>

        </tr>
    </thead>
    <tbody style="background-color: #fff;">
        <?php

        foreach ($dados as $dados) {
        ?>
            <tr>
                <th scope="col"><?php echo $dados->getID(); ?></th>
                <th scope="col"><?php echo $dados->getNome(); ?></th>
                <th scope="col"><?php echo $dados->getEmail(); ?></th>
                <th scope="col"><a class="btn btn-success" href="?edit/restrito/=<?php echo $dados->getID(); ?>">Editar</a></th>
                <th scope="col"><a class="btn btn-danger" href="?delete=<?php echo $dados->getID(); ?>">Excluir</a></th>
            </tr>


        <?php
        }


        ?>

    </tbody>

</table>