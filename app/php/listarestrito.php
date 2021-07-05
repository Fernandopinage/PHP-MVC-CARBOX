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
                <th scope="col"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editar<?php echo $obj->getID(); ?>">Editar</button></th>
                <th scope="col"><a class="btn btn-danger" href="?delete=<?php echo $obj->getID(); ?>">Excluir</a></th>
            </tr>



            <!-- Modal -->
            <div class="modal fade" id="editar<?php echo $obj->getID(); ?>" tabindex="-1" role="dialog" aria-labelledby="editar<?php echo $obj->getID(); ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editar"><?php echo $obj->getNome() ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="form-cliente" action="" method="POST">
 
                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Nome <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control form-control-sm is-invalid" name="nome" id="nome" value="<?php echo $obj->getNome(); ?>" >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">E-mail <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control form-control-sm is-invalid" id="email" name="email" placeholder="" value="<?php echo $obj->getEmail(); ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Senha <span style="color: red;">*</span></label>
                                        <input type="password" class="form-control form-control-sm is-invalid" id="senha" name="senha" placeholder="" value="<?php echo $obj->getSenha(); ?>">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-primary">Editar</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        <?php


        }


        ?>

    </tbody>

</table>