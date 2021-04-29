<?php include_once "../layout/heard.php";
include_once "../class/ClassCliente.php";
include_once "../dao/ClienteDAO.php";
if (isset($_POST['acessar'])) {

    $ClassCliente = new ClassCliente();
    $ClassCliente->setCPF($_POST['valor']);
    $ClassCliente->setSenha(md5($_POST['password']));
    $Cliente = new ClienteDAO();
    $Cliente->login($ClassCliente);
}

?>
<link rel="stylesheet" href="../css/index.css">


<div class="container">

    <form class="form-signin" method="POST">
        <div class="text-center" id="logo">
            <h2 class="form-signin-heading">ÁREA RESTRITA</h2>
            <hr>
        </div>
        <input type="text" class="form-control" name="valor" placeholder="Email ou CPF:" required="" autofocus="" />
        <br>
        <input type="password" class="form-control" name="password" placeholder="Senha:" required="" />
        <br>
        <div class="text-left" id="cadastro">

        </div>

        <div class="text-right">
            <input type="submit" name="acessar" class="btn btn-success btn-lg btn-block" value="Acessar">
        </div>

    </form>

</div>

<?php include_once "../layout/footer.php"; ?>