<?php
include_once "../layout/heard.php";
include_once "../class/ClassCliente.php";
include_once "../dao/ClienteDAO.php";

if (isset($_POST['clientesalva'])) {


    if ($_POST['cpf'] != '' and $_POST['razao'] != '' and $_POST['nome'] != '' and  $_POST['email'] != '' and $_POST['senha'] != '') {

        $ClassCliente = new ClassCliente();
        $ClassCliente->setCPF($_POST['cpf']);
        $ClassCliente->setRazao($_POST['razao']);
        $ClassCliente->setNome($_POST['nome']);
        $ClassCliente->setEmail($_POST['email']);
        $ClassCliente->setSenha(md5($_POST['senha']));
        $Cliente = new ClienteDAO();
        $Cliente->insertCliente($ClassCliente);
    } else {
?>
        <script>
            Swal.fire({
                title: 'Error!',
                text: 'Preenchar todos os campos obrigatorios!',
                icon: 'error',
                confirmButtonText: 'OK'
            })
        </script>

<?php


    }
}


?>

<link rel="stylesheet" href="../css/cliente.css">
<div class="container">

    <form id="form-cliente" action="" method="POST">
        <div class="text-left" id="title">
            <h2> CADASTRO CLIENTE </h2>
            <hr>
        </div>
        <div class="form-row">

            <div class="form-group col-md-4">
                <label for="inputEmail4">CPF/CNPJ <span style="color: red;">*</span></label>
                <input type="text" class="form-control form-control-sm is-invalid" id="cpf" name="cpf" placeholder="">
            </div>
            <div class="form-group col-md-4">
                <label for="inputEmail4">Razão Social <span style="color: red;">*</span></label>
                <input type="text" class="form-control form-control-sm is-invalid" id="razao" name="razao" placeholder="">
            </div>
            <div class="form-group col-md-4">
                <label for="inputEmail4">Nome Fantasia </label>
                <input type="text" class="form-control form-control-sm" id="nome" name="nome" placeholder="">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputEmail4">Email<span style="color: red;">*</span></label>
                <input type="email" class="form-control form-control-sm is-invalid" id="email" name="email" placeholder="">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Senha<span style="color: red;">*</span></label>
                <input type="password" class="form-control form-control-sm is-invalid" id="senha" name="senha" placeholder="">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">Confirmar Senha<span style="color: red;">*</span></label>
                <input type="password" class="form-control form-control-sm is-invalid" id="senha2" name="senha2" placeholder="">
            </div>
            <p id="obrigatorio"></p>
        </div>
        <div class="text-right">

            <button type="submit" class="btn btn-success" name="clientesalva">Salvar</button>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
                <p for="inputEmail4">Campos Obrigatórios<span style="color: red;">*</span></p>

            </div>

        </div>

    </form>

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
            var obg = document.getElementById('obrigatorio').innerHTML = "";
        } else {
            $('#senha').removeClass("form-control form-control is-valid").addClass("form-control form-control is-invalid");

        }

    });

    $("#senha2").change(function() {

        if (document.getElementById('senha').value === document.getElementById('senha2').value) {
            $('#senha2').removeClass("form-control form-control is-invalid").addClass("form-control form-control is-valid");
            var obg = document.getElementById('obrigatorio').innerHTML = "";
        } else {
            $('#senha2').removeClass("form-control form-control is-valid").addClass("form-control form-control is-invalid");
            var obg = document.getElementById('obrigatorio').innerHTML = "Os campos <strong style = 'color:red;'>Senha</strong> é <strong style = 'color:red;'>Confirmar Senha</strong> devem ser iguais";

            document.getElementById('senha2').value = '';
        }

    });
</script>



<?php include_once "../layout/footer.php"; ?>