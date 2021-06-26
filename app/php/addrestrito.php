<?php 

include_once "../class/ClassRestrito.php";
include_once "../dao/RestritoDAO.php";

if(isset($_POST['restritosalvar'])){

    if($_POST['senha'] === $_POST['conf_senha']){

        $ClassRestrito = new ClassRestrito();
        $ClassRestrito->setNome($_POST['nome']);
        $ClassRestrito->setEmail($_POST['email']);
        $ClassRestrito->setSenha($_POST['senha']);
        $Restrito = new RestritoDAO();
        $Restrito->insertRestrito($ClassRestrito);
       
    }

}

?>

<link rel="stylesheet" href="../css/cliente.css">
<form id="form-cliente" action="" method="POST">
    <div class="text-left" id="title">
        <h2> CADASTRO RESTRITO </h2>
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
            <label for="inputEmail4">Senha <span style="color: red;">*</span></label>
            <input type="password" class="form-control form-control-sm is-invalid" id="senha" name="senha" placeholder="">
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail4">Confirmar Senha <span style="color: red;">*</span></label>
            <input type="password" class="form-control form-control-sm is-invalid" id="conf_senha" name="conf_senha" placeholder="">
        </div>
    </div>
    <div class="text-right">

        <button type="submit" class="btn btn-success" name="restritosalvar">Salvar Registro</button>
    </div>
</form>