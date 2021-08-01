<?php

include_once "../class/ClassCliente.php";
include_once "../dao/ClienteDAO.php";
include_once "../dao/CompradorDAO.php";
include_once "../class/ClassComprador.php";


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


    $lista = array(
        'id' => $id = $_POST['id_comprador'],
        'nome' => $nome = $_POST['nome_comprador'],
        'email' => $email  = $_POST['email_comprador'],
        //'status' => $status = $_POST['status_comprador']
    );

    $tamanho = count($lista['email']);

    for ($i = 0; $i < $tamanho; $i++) {

        $id =  $lista['id'][$i];
        // $status =  $lista['status'][$i];
        $email =  $lista['email'][$i];
        //$status = $lista['status'][$i];

        $Comprador = new CompradorDAO();
        $Comprador->updateComprador($id, $email);
    }
}

if (isset($_POST['novocomprador'])) {



    $lista = array(

        'cnpj' => $_POST['comprador_cnpj'],
        'nome' => $nome = $_POST['comprador_nome'],
        'email' => $email = $_POST['comprador_email'],
        //'senha' => $senha  = $_POST['comprador_senha'],
        'status' => "Ativo"
    );

    $tamanho = count($lista['cnpj']);

    for ($i = 0; $i < $tamanho; $i++) {


        $cnpj =  $lista['cnpj'][$i];
        $nome =  $lista['nome'][$i];
        $email =  $lista['email'][$i];
        //$senha =  $lista['senha'][$i];
        //$status =  $lista['status'][$i];

        if (!empty($nome) and !empty($email)) {

            $Comprador = new CompradorDAO();
            $Comprador->inserComprador($cnpj, $nome, $email);
        }
    }
}


?>
<br>
<link href='../css/table.css' rel='stylesheet' />
<div class="text-right">
    <a class="btn btn-primary" href="?p=add/cliente/">Adicionar Cliente</a>
</div>
<br>
<style>
    .table-overflow {
        max-height: 440px;
        overflow-y: auto;
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
                        <th scope="col"><button type="button" class="btn btn-primary btn-block btn-sm" id="novoBTN" data-toggle="modal" data-target="#novo<?php echo $obj->getID(); ?>">Adicionar Comprador</button></th>
                        <th scope="col"><button type="button" class="btn btn-info btn-block btn-sm" id="editarBTN" data-toggle="modal" data-target="#listar<?php echo $obj->getID(); ?>">Lista</button></th>
                        <th scope="col"><button type="button" class="btn btn-success btn-block btn-sm" id="editarBTN" data-toggle="modal" data-target="#editar<?php echo $obj->getID(); ?>">Editar</button></th>
                        <th scope="col"><a class="btn btn-danger btn-block btn-sm" href="?cliente/delete=<?php echo $obj->getID(); ?>">Inativar</a></th>

                    </tr>


                    <!--------------------------------------  VIEW ---------------------------------->

                    <div class="modal fade bd-example-modal-lg" id="novo<?php echo $obj->getID(); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Adicionar Compradores</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">


                                    <form id="form-comprador" action="" method="POST">
                                        <div class="form-row">
                                            <input type="hidden" name="comprador_cnpj[]" id="comprador_cnpj" value="<?php echo  $obj->getCnpj(); ?>">
                                            <div class="form-group col-md-5">
                                                <label for="inputEmail4">Nome <span style="color: red;">*</span></label>
                                                <input type="text" class="form-control form-control-sm" name="comprador_nome[]" id="comprador_nome" placeholder="">
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="inputEmail4">E-mail<span style="color: red;">*</span></label>
                                                <input type="email" class="form-control form-control-sm" name="comprador_email[]" id="comprador_email" placeholder="">
                                            </div>
                                            <div class="form-group col-md-1">
                                                <button type="button" class="btn btn-primary btn-sm" id="mais" style="margin-top: 28px;">+</button>
                                            </div>
                                        </div>
                                        <div id="lista">


                                        </div>
                                        <div id="msg">

                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" name="novocomprador" class="btn btn-primary">Salvar</button>
                                        </div>

                                    </form>



                                </div>
                            </div>
                        </div>
                    </div>
                    <!-------------------------------------- **********---------------------------------->

                    <div class="modal fade bd-example-modal-lg" id="editar<?php echo $obj->getID(); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $obj->getID(); ?>" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Alteração no cadastro do Cliente</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="POST">
                                        <input type="hidden" name="id" id="id" value="<?php echo $obj->getID(); ?>">
                                        <div class="form-row">

                                            <div class="form-group col-md-2">
                                                <label for="inputEmail4">Cod SAP</label>
                                                <input type="text" class="form-control form-control-sm is-invalid" id="sap" name="sap" placeholder="" value="<?php echo $obj->getSap(); ?>">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputEmail4">CNPJ</label>
                                                <input type="text" class="form-control form-control-sm is-invalid" value="<?php echo $obj->getCnpj(); ?>" onfocus="javascript: retirarFormatacao(this);" onblur="javascript: formatarCampo(this);" name="cpf" id="cpf" placeholder="99.999.999/9999-99">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Razão Social</label>
                                                <input type="text" class="form-control form-control-sm is-invalid" id="razao" name="razao" placeholder="" value="<?php echo $obj->getRazao(); ?>">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="inputEmail4">E-mail</label>
                                                <input type="email" class="form-control form-control-sm is-invalid" id="email" name="email" placeholder="" value="<?php echo $obj->getEmail(); ?>">
                                            </div>
                                        </div>
                                        <hr>
                                        <?php
                                        $id = $obj->getID();
                                        $lista = $Cliente->listaVendedores($id);



                                        foreach ($lista as $lista => $key) {

                                            echo '<div class="form-row" id="row' . $key['id'] . '">

                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4">Nome </label>
                                                        <input type="hidden" class="form-control form-control-sm" name="id_comprador[]" value="' . $key['id'] . '" readonly>
                                                        <input type="text" class="form-control form-control-sm" name="nome_comprador[]" value="' . $key['nome'] . '" readonly>
                                                    </div>

                                                    <div class="form-group col-md-5">
                                                        <label for="inputEmail4">Email</label>
                                                        <input type="text" class="form-control form-control-sm is-invalid" name="email_comprador[]" value="' . $key['email'] . '" placeholder="">
                                                    </div>

                                                  </div>
                                                       
                                                ';
                                        }
                                        ?>


                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" name="editacliente" class="btn btn-primary">Editar</button>
                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="listar<?php echo $obj->getID(); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Lista de Compradores</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php

                                    $id =  $obj->getCnpj();
                                    $todos = $Cliente->listarCompradores($id);

                                    foreach ($todos as $todos => $key) {

                                        echo "<strong>Cliente: </strong>" . $key['nome'] . "<br><strong> E-mail: </strong>" . $key['email'] . "<br><hr>";
                                    }

                                    ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>

                                </div>
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
    var cont = 0;



    $('#mais').click(function() {

        if (document.getElementById('comprador_nome').value != '' && document.getElementById('comprador_email').value != '') {

            var cnpj = document.getElementById('comprador_cnpj').value

            $('#lista').append('<div id="campo' + cont + '"><div class="form-row"><div class="form-group col-md-5"><label for="inputEmail4">Nome <span style="color: red;">*</span></label><input type="hidden" name="comprador_cnpj" id="comprador_cnpj" value="' + cnpj + '"><input type="text" class="form-control form-control-sm" name="comprador_nome[]" id="comprador_nome' + cont + '" placeholder=""></div><div class="form-group col-md-5"><label for="inputEmail4">E-mail<span style="color: red;">*</span></label><input type="email" class="form-control form-control-sm" name="comprador_email[]" id="comprador_email' + cont + '" placeholder=""></div><div class="form-group col-md-1"><a class="btn btn-danger btn-sm" onclick="remove(' + cont + ')" id="' + cont + '" style="color: #fff; margin-top: 30px;"> Remover </a></div></div></div>');
            cont++
            document.getElementById('msg').innerHTML = "";


        } else {
            document.getElementById('msg').innerHTML = "<p style='color:red;'>Preenchar os campos obrigatorios";
        }

    });

    function remove(id) {

        $('#campo' + id).hide("#campo" + id)
        document.getElementById('campo' + id).innerHTML = "";

    }
</script>
<script>


</script>


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