<?php
include_once "../class/ClassRestrito.php";
include_once "../dao/RestritoDAO.php";

$Restrito = new RestritoDAO();
$dados = $Restrito->listarRestrito();

if (isset($_POST['edita-model'])) {

    $ClassRestrito =  new ClassRestrito();
    $ClassRestrito->setNome($_POST['nome']);
    $ClassRestrito->setEmail($_POST['email']);
    if(!empty($_POST['senha'])){

        $ClassRestrito->setSenha(md5($_POST['senha']));
    }
    $ClassRestrito->setID($_POST['id']);
    $ClassRestrito->setStatus($_POST['status']);
    $Restrito = new RestritoDAO($ClassRestrito);
    $Restrito->editarRegistro($ClassRestrito);
}


?>
<br>
<link href='../css/table.css' rel='stylesheet' />
<div class="text-right">
    <a class="btn btn-primary" href="?p=add/restrito/">Adicionar Usuário</a>
</div>
<br>

<style>
.table-overflow {
    max-height:440px;
    overflow-y:auto;
}

</style>
<div class="table-overflow">
<table class="table table-hover">
    <thead class="thead" style="background-color: #136132; color:#fff;">
        <tr>
            <th scope="col" style="text-align: center;">CÓD</th>
            <th scope="col">NOME</th>
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
                <th scope="col" style="text-align: center;"><?php echo $obj->getID(); ?></th>
                <th scope="col"><?php echo $obj->getNome(); ?></th>
                <th scope="col"><?php echo $obj->getEmail(); ?></th>
                <th scope="col"><button type="button" class="btn btn-success btn-block btn-sm" data-toggle="modal" data-target="#editar<?php echo $obj->getID(); ?>">Editar</button></th>
                <th scope="col"><a class="btn btn-danger btn-block btn-sm" href="?delete=<?php echo $obj->getID(); ?>">Excluir</a></th>
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
                                    <input type="hidden" name="id" id="id" value="<?php echo $obj->getID(); ?>">
                                    <input type="hidden" name="status" id="status" value="<?php echo $obj->getStatus(); ?>">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Nome</label>
                                        <input type="text" class="form-control form-control-sm is-invalid" name="nome" id="nome" value="<?php echo $obj->getNome(); ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">E-mail</label>
                                        <input type="text" class="form-control form-control-sm is-invalid" id="email" name="email" placeholder="" value="<?php echo $obj->getEmail(); ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Senha</label>
                                        <input type="password" class="form-control form-control-sm is-invalid" id="senha" name="senha" placeholder="" value="">
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <p for="inputEmail4">Campos Obrigatórios<span style="color: red;">*</span></p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary" name="edita-model">Editar</button>
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
</div>

<script>
    $("#nome").change(function() {

        if (document.getElementById('nome').value != "") {
            $('#nome').removeClass("form-control form-control is-invalid").addClass("form-control form-control is-valid");

        } else {
            $('#nome').removeClass("form-control form-control is-valid").addClass("form-control form-control is-invalid");

        }

    });

    $("#email").change(function() {

        if (document.getElementById('email').value != "") {
            $('#email').removeClass("form-control form-control is-invalid").addClass("form-control form-control is-valid");

        } else {
            $('#email').removeClass("form-control form-control is-valid").addClass("form-control form-control is-invalid");

        }

    });

    $("#senha").change(function() {

        if (document.getElementById('senha').value != "") {
            $('#senha').removeClass("form-control form-control is-invalid").addClass("form-control form-control is-valid");

        } else {
            $('#senha').removeClass("form-control form-control is-valid").addClass("form-control form-control is-invalid");

        }

    });

    $("#conf_senha").change(function() {

        if (document.getElementById('conf_senha').value != "") {
            $('#conf_senha').removeClass("form-control form-control is-invalid").addClass("form-control form-control is-valid");

        } else {
            $('#conf_senha').removeClass("form-control form-control is-valid").addClass("form-control form-control is-invalid");

        }

    });
</script>