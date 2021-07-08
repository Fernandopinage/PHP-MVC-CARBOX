<?php

include_once "../class/ClassCliente.php";
include_once "../dao/ClienteDAO.php";


$Cliente = new ClienteDAO();
$dados = $Cliente->listaCliente();


if (isset($_POST['editacliente'])) {

    $ClassCliente = new ClassCliente();

    $ClassCliente->setID($_POST['id']);
    $ClassCliente->setCnpj($_POST['cpf']);
    $ClassCliente->setRazao($_POST['razao']);
    $ClassCliente->setSap($_POST['sap']);
    $ClassCliente->setEmail($_POST['email']);

    $Cliente->editarCliente($ClassCliente);

}



?>
<br><br>
<link href='../css/table.css' rel='stylesheet' />
<div class="text-right">
    <a class="btn btn-primary" href="?p=add/cliente/">Adicionar Usuário</a>
</div>
<br><br>
<style>
.table-overflow {
    max-height:400px;
    overflow-y:auto;
}

</style>
<div class="table-overflow">
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

        foreach ($dados as $dado => $obj) {

            if (empty($obj)) {
        ?>
                <tr>
                    <th></th>
                    <th></th>
                    <th>
                        <p class="text-center">Não existe nenhum registro</p>
                    </th>
                    <th></th>
                    <th></th>
                </tr>
            <?php

            } else {


            ?>
                <tr>
                    <th scope="col" style="text-align: center;"><?php echo  $obj->getSap(); ?></th>
                    <th scope="col"><?php echo  $obj->getCnpj(); ?></th>
                    <th scope="col"><?php echo  $obj->getRazao(); ?></th>
                    <th scope="col"><?php echo  $obj->getEmail(); ?></th>
                    <th scope="col"><button type="button" class="btn btn-success btn-sm" id="editarBTN" data-toggle="modal" data-target="#editar<?php echo $obj->getID(); ?>">Editar</button></th>
                    <th scope="col"><a class="btn btn-danger btn-sm" href="?delete=<?php echo $obj->getID(); ?>">Excluir</a></th>

                </tr>
                <div class="modal fade" id="editar<?php echo $obj->getID(); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $obj->getID(); ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><?php echo  $obj->getRazao(); ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST">
                                    <input type="hidden" name="id" id="id" value="<?php echo $obj->getID(); ?>">
                                    <div class="form-row">

                                        <div class="form-group col-md-12">
                                            <label for="inputEmail4">CNPJ <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control form-control-sm is-invalid" value="<?php echo $obj->getCnpj(); ?>" onfocus="javascript: retirarFormatacao(this);" onblur="javascript: formatarCampo(this);" name="cpf" id="cpf" placeholder="99.999.999/9999-99">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputEmail4">Razão Social <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control form-control-sm is-invalid" id="razao" name="razao" placeholder="" value="<?php echo $obj->getRazao(); ?>">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputEmail4">Cod SAP<span style="color: red;">*</span></label>
                                            <input type="text" class="form-control form-control-sm is-invalid" id="sap" name="sap" placeholder="" value="<?php echo $obj->getSap(); ?>">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputEmail4">E-mail<span style="color: red;">*</span></label>
                                            <input type="email" class="form-control form-control-sm is-invalid" id="email" name="email" placeholder="" value="<?php echo $obj->getEmail(); ?>">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <p for="inputEmail4">Campos Obrigatórios<span style="color: red;">*</span></p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" name="editacliente" class="btn btn-primary">Editar</button>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
        <?php

            }
        }
        ?>


    </tbody>
</table>
</div>
<script>
    $("#cpf").change(function() {

        if (document.getElementById('cpf').value != "") {
            $('#cpf').removeClass("form-control form-control is-invalid").addClass("form-control form-control is-valid");

        } else {
            $('#cpf').removeClass("form-control form-control is-valid").addClass("form-control form-control is-invalid");

        }

    });


    $("#razao").change(function() {

        if (document.getElementById('razao').value != "") {
            $('#razao').removeClass("form-control form-control is-invalid").addClass("form-control form-control is-valid");

        } else {
            $('#razao').removeClass("form-control form-control is-valid").addClass("form-control form-control is-invalid");

        }

    });


    $("#nome").change(function() {

        if (document.getElementById('nome').value != "") {
            $('#nome').removeClass("form-control form-control is-invalid").addClass("form-control form-control is-valid");

        } else {
            $('#nome').removeClass("form-control form-control is-valid").addClass("form-control form-control is-invalid");

        }

    });

    $("#sap").change(function() {

        if (document.getElementById('sap').value != "") {
            $('#sap').removeClass("form-control form-control is-invalid").addClass("form-control form-control is-valid");

        } else {
            $('#sap').removeClass("form-control form-control is-valid").addClass("form-control form-control is-invalid");

        }

    });

    $("#email").change(function() {

        if (document.getElementById('email').value != "") {
            $('#email').removeClass("form-control form-control is-invalid").addClass("form-control form-control is-valid");

        } else {
            $('#email').removeClass("form-control form-control is-valid").addClass("form-control form-control is-invalid");

        }

    });
</script>