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
            <th scope="col" style="text-align: center;">Cód</th>
            <th scope="col">Nome</th>
            <th scope="col">E-mail</th>
            <th scope="col"></th>
            <th scope="col"></th>

        </tr>
    </thead>
    <tbody style="background-color: #fff;">
        <?php

        foreach ($dados as $dados => $obj) {
        ?>
            <tr>
                <th scope="col" style="text-align: center;"><?php echo $obj->getID(); ?></th>
                <th scope="col"><?php echo $obj->getNome(); ?></th>
                <th scope="col"><?php echo $obj->getEmail(); ?></th>
                <th scope="col"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editar<?php echo $obj->getID();?>">Editar</button></th>
                <th scope="col"><a class="btn btn-danger" href="?delete=<?php echo $obj->getID(); ?>">Excluir</a></th>
            </tr>


        <?php
        }


        ?>

    </tbody>

</table>

<!-- Modal -->
<div class="modal fade" id="editar<?php  echo $obj->getID();?>" tabindex="-1" role="dialog" aria-labelledby="editar<?php echo $obj->getID();?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="editar"><?php echo $obj->getNome() ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>