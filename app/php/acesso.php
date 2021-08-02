<!DOCTYPE html>
<html lang="pt-br">

<?php

include_once "../class/ClassComprador.php";
include_once "../dao/CompradorDAO.php";

if (isset($_POST['primeiro'])) {

    if ($_POST['password1'] === $_POST['password2']) {

        $ClassComprador = new ClassComprador();
        $ClassComprador->setEmail($_POST['email']);
        $ClassComprador->setSenha(md5($_POST['senha']));
        $ClassComprador->setNovasenha(md5($_POST['password1']));

        $Comprador = new CompradorDAO();
        $Comprador->primeiroAcesso($ClassComprador);
    }
}

if (isset($_GET['email']) and isset($_GET['senha'])) {

    $email = $_GET['email'];
    $senha = $_GET['senha'];
}



?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/acesso.css">
    <title>Primeiro Acesso</title>
</head>

<body>

    <style>
        body {
            background-image: url('../img/04.JPG');
            background-repeat: no-repeat;
            background-size: cover;
            -webkit-background-size: cover;
            -moz-background-size: cover;


        }
    </style>


    <div class="container">

        <form class="form-signin" method="POST">
            <div class="text-center" id="logo">
                <h2 class="form-signin-heading">Primeiro Acesso</h2>
                <hr>
            </div>
            <input type="password" class="form-control" name="password1" placeholder="Digite uma nova senha" required="" />
            <br>
            <input type="password" class="form-control" name="password2" placeholder="Confirme a nova senha" required="" />
            <br>
            <div class="text-left" id="cadastro">

            </div>

            <div class="text-right">
                <input type="submit" name="primeiro" class="btn btn-success btn-lg btn-block" value="Acessar">
            </div>
            <input type="hidden" class="form-control" name="email" value="<?php echo $email; ?>" placeholder="Digite o e-mail cadastrado" required="" autofocus="" readonly />
            <br>
            <input type="hidden" class="form-control" name="senha" value="<?php echo $senha; ?>" placeholder="Digite a senha fornecida" required="" readonly />
            <br>

        </form>

    </div>
    <?php include_once "../layout/footer.php"; ?>
</body>

</html>