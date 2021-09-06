<?php

include_once "../class/ClassRestrito.php";
include_once "../dao/RestritoDAO.php";
include_once "../class/GerarSenha.php";
include_once "../dao/MailRestrito.php";
$senha = new GerarSenha();
$rash = $senha->senha();

if (isset($_POST['restritosalvar'])) {

    if ($_POST['senha'] === $_POST['conf_senha']) {

        $ClassRestrito = new ClassRestrito();
        $ClassRestrito->setNome($_POST['nome']);
        $ClassRestrito->setEmail($_POST['email']);
        
        $ClassRestrito->setSenha(md5($_POST['senha']));
        $ClassRestrito->setStatus('S');
        
        $Restrito = new RestritoDAO();
        $Restrito->insertRestrito($ClassRestrito);
        $RestritoMial = new RestritoMAIL();
        $RestritoMial->emailRestrito($ClassRestrito);
    }
    
}

?>

<link rel="stylesheet" href="../css/cliente.css">
<form id="form-cliente" action="" method="POST">
    <div class="text-left" id="title">
        <h2> RESTRITO </h2>
        <div class="text-right">
            <a href="?p=restrito/"  class="btn btn-danger">Cancelar</a>
            <button type="submit" class="btn btn-success" name="restritosalvar">Salvar Registro</button>
        </div>
        <hr>
    </div>
    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="inputEmail4">Nome <span style="color: red;">*</span></label>
            <input type="text" class="form-control form-control-sm is-invalid" name="nome" id="nome">
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail4">E-mail <span style="color: red;">*</span></label>
            <input type="text" class="form-control form-control-sm is-invalid" id="email" name="email" placeholder="">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">

            <input type="hidden" class="form-control form-control-sm is-invalid" id="senha" value="<?php echo $rash; ?>" name="senha" placeholder="">
        </div>
        <div class="form-group col-md-6">

            <input type="hidden" class="form-control form-control-sm is-invalid" id="conf_senha" value="<?php echo $rash ?>" name="conf_senha" placeholder="">
        </div>
    </div>
</form>

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