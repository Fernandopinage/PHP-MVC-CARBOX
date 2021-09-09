<?php

include_once "../class/ClassCliente.php";
include_once "../dao/ClienteDAO.php";
include_once "../dao/CompradorDAO.php";
include_once "../class/ClassComprador.php";
include_once "../class/ClassClienteProduto.php";
include_once "../dao/ClienteProdutoDAO.php";


$Cliente = new ClienteDAO();
$dados = $Cliente->listaCliente();

if (isset($_POST['novoproduto'])) {

    $ClassCliPro = new ClassClienteProduto();
    $ClassCliPro->setProduto($_POST['produtoC']);
    $ClassCliPro->setCnpj($_POST['cpf_produtos']);
    $ClassCliPro->setSap($_POST['sap_produtos']);

    $CliPro = new ClienteProdutoDAO();
    $CliPro->insertClienteProduto($ClassCliPro);
}



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

    if (!empty($_POST['comprador_nome']) and !empty($_POST['comprador_email'])) {

        $ClassComprador = new ClassComprador();

        $ClassComprador->setCodsap($_POST['codsap']);
        $ClassComprador->setCnpj($_POST['comprador_cnpj']);
        $ClassComprador->setNome($_POST['comprador_nome']);
        $ClassComprador->setEmail($_POST['comprador_email']);

        $Comprador = new CompradorDAO();
        $Comprador->inserComprador($ClassComprador);
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
                        <th scope="col"><button type="button" class="btn btn-primary btn-block btn-sm" id="novoBTN" data-toggle="modal" data-target="#novo<?php echo $obj->getID(); ?>">Adicionar Comprador / Produtos</button></th>
                        <th scope="col"><button type="button" class="btn btn-info btn-block btn-sm" id="editarBTN" data-toggle="modal" data-target="#listar<?php echo $obj->getID(); ?>">Listar Comprador / Produto</button></th>
                        <th scope="col"><button type="button" class="btn btn-success btn-block btn-sm" id="editarBTN" data-toggle="modal" data-target="#editar<?php echo $obj->getID(); ?>">Editar Cliente / Produtos</button></th>
                        <th scope="col"><a class="btn btn-danger btn-block btn-sm" href="?cliente/delete=<?php echo $obj->getCnpj(); ?>">Inativar Cliente</a></th>

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

                                            <input type="hidden" name="codsap" id="codsap" value="<?php echo  $obj->getSap(); ?>">
                                            <input type="hidden" name="comprador_cnpj" id="comprador_cnpj" value="<?php echo  $obj->getCnpj(); ?>">
                                            <div class="form-group col-md-5">
                                                <label for="inputEmail4">Nome <span style="color: red;">*</span></label>
                                                <input type="text" class="form-control form-control-sm" name="comprador_nome" id="comprador_nome" placeholder="">
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="inputEmail4">E-mail<span style="color: red;">*</span></label>
                                                <input type="email" class="form-control form-control-sm" name="comprador_email" id="comprador_email" placeholder="">
                                            </div>
                                            <!--
                                            <div class="form-group col-md-1">
                                                <button type="button" class="btn btn-primary btn-sm" id="mais" style="margin-top: 28px;">Adicionar</button>
                                            </div>
                                            -->
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

                                    <style>
                                        .table-overflow_2 {
                                            margin: 10px;
                                            max-height: 300px;
                                            overflow-y: auto;
                                        }
                                    </style>




                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Adicionar Produtos <button type="submit" style="margin-left: 25px;" class="btn btn-success btn-sm" onclick="addProdutos()">Add Produtos</button></h5>
                                    </div>
                                    <form method="POST">
                                        <input type="hidden" name="sap_produtos" id="codsap" value="<?php echo  $obj->getSap(); ?>">
                                        <input type="hidden" name="cpf_produtos" id="comprador_cnpj" value="<?php echo  $obj->getCnpj(); ?>">
                                        <div id="ProdutoNovos">


                                            <div class="table-overflow_2">


                                                <div class="form-row" style="margin-top: 30px;">
                                                    <div class="form-group col-md-9">


                                                        <?php
                                                        $produto = new ProdutoDAO();
                                                        $Pdados = $produto->listaProduto();

                                                        foreach ($Pdados as $Pdados) {
                                                            // echo "<option value='" . $Pdados->getSap() . "'>" . $Pdados->getSap() . " - " . $Pdados->getProduto() . "</option>";
                                                        ?>
                                                            <div class="form-check">
                                                                <input class="form-check-input" name="produtoC[]" type="checkbox" value="<?php echo $Pdados->getSap(); ?>" id="<?php echo $Pdados->getSap(); ?>">
                                                                <label class="form-check-label" for="<?php echo $Pdados->getSap(); ?>">
                                                                    <?php echo $Pdados->getProduto(); ?>
                                                                </label>
                                                            </div>
                                                        <?php

                                                        }

                                                        ?>


                                                    </div>

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" name="novoproduto" class="btn btn-primary">Salvar</button>
                                            </div>
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
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <input type="submit" name="editacliente" class="btn btn-primary" value="Editar">
                                        </div>
                                    </form>
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Compradores</h5>

                                    </div>
                                    <?php
                                    $id = $obj->getID();
                                    $lista = $Cliente->listaVendedores($id);

                                    if (isset($_POST['redefinir_comprador'])) {
                                        if (!empty($_POST['email_vendedor'])) {

                                            $email = $_POST['email_vendedor'];
                                            $vendedor = new CompradorDAO();
                                            $vendedor->esquecisenha($email);
                                        }
                                    }

                                    if (isset($_POST['desativar_comprador'])) {

                                        $id = $_POST['id_vendedor'];
                                        $vendedor = new CompradorDAO();
                                        $vendedor->inativarComprador($id);
                                    }

                                    foreach ($lista as $lista => $key) {

                                        echo '<div class="form-row" id="row' . $key['id'] . '">

                                                    <div class="form-group col-md-3">
                                                        <label for="inputEmail4">Nome </label>
                                                        <input type="hidden" class="form-control form-control-sm" name="id_comprador[]" value="' . $key['id'] . '" readonly>
                                                        <input type="text" class="form-control form-control-sm" name="nome_comprador[]" value="' . $key['nome'] . '" readonly>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4">E-mail</label>
                                                        <input type="text" class="form-control form-control-sm is-invalid" name="email_comprador[]" value="' . $key['email'] . '" placeholder="">
                                                    </div>
                                                    <div class="form-group col-md-5">
                                                    <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#blue' . $key['id'] . '" style="margin-top:31px;">
                                                            Redefinir senha
                                                    </button>
                                                    <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#red' . $key['id'] . '" style="margin-top:31px;">
                                                        Inativar 
                                                    </button>
                                                    </div>

                                                  </div>
                                                       
                                                ';

                                    ?>

                                        <div class="modal fade bd-example-modal-lg" id="blue<?php echo $key['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">

                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <h5 class="modal-title" id="exampleModalLabel">Deseja redefinir senha ? </h5>
                                                        </div>
                                                        <form method="post">
                                                            <input type="hidden" class="form-control form-control-sm" name="email_vendedor" value="<?php echo  $key['email']; ?>"><br>
                                                            <input type="text" class="form-control form-control-sm" name="" value="<?php echo  $key['email']; ?>" disabled><br>

                                                            <div class="modal-footer">

                                                                <button type="submit" name="redefinir_comprador" class="btn btn-success btn-sm">Confirmar</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade bd-example-modal-lg" id="red<?php echo $key['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">

                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <h5 class="modal-title" id="exampleModalLabel">Deseja desativar? </h5>
                                                        </div>
                                                        <form method="post">
                                                            <input type="hidden" class="form-control form-control-sm" name="email_vendedor" value="<?php echo  $key['email']; ?>"><br>
                                                            <input type="hidden" class="form-control form-control-sm" name="id_vendedor" value="<?php echo  $key['id']; ?>"><br>

                                                            <div class="modal-footer">

                                                                <button type="submit" name="desativar_comprador" class="btn btn-success btn-sm">Confirmar</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }


                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="listar<?php echo $obj->getID(); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
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

                                        echo "<strong>Cliente: </strong>" . $key['nome'] . "<br><strong> E-mail: </strong>" . $key['email'] . "<br>";

                                        if ($key['log'] === 'S') {
                                            echo "<strong>Status: </strong> <img src='../img/png-clipart-traffic-light-computer-icons-green-light-flashlight-search.png'height='20px' width='21px'><hr>";
                                        } else {
                                            echo "<strong>Status: </strong> <img src='../img/kisspng-traffic-light-computer-icons-red-clip-art-red-light-5abd00332878e2.5822707515223357951658.jpg'height='20px' width='21px'><hr>";
                                        }
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

<script>
    document.getElementById('ProdutoNovos').style.display = "none";

    function addProdutos() {

        if (document.getElementById('ProdutoNovos').style.display == 'none') {

            document.getElementById('ProdutoNovos').style.display = 'block'
        } else {
            document.getElementById('ProdutoNovos').style.display = 'none'
        }

    }
</script>