<?php

include_once "../class/ClassComprador.php";
include_once "../dao/CompradorDAO.php";

if (isset($_POST['acessar'])) {

    $ClassComprador = new ClassComprador();
    $ClassComprador->setEmail($_POST['email']);
    $ClassComprador->setSenha(md5($_POST['password']));

    $Comprador  =new CompradorDAO();
    $Comprador->validarLogin($ClassComprador);
    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;600&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> <!-- jquery CDN  -->
    <title>Área Restrita</title>
</head>

<body>



    <link rel="stylesheet" href="../css/index.css">


    <div class="container">

        <form class="form-signin" method="POST">
            <div class="text-center" id="logo">
                <h2 class="form-signin-heading">ÁREA DO CLIENTE</h2>
                <hr>
            </div>
            <input type="text" class="form-control" name="email" placeholder="Digite seu e-mail" required="" autofocus="" />
            <br>
            <input type="password" class="form-control" name="password" placeholder="Digite seu senha:" required="" />
            <br>
            <div class="text-left" id="cadastro">

            </div>

            <div class="text-right">
                <input type="submit" name="acessar" class="btn btn-success btn-lg btn-block" value="Acessar">
            </div>

        </form>

    </div>
    
    <img id="div2" src="../img/3.png">
    

    <?php include_once "../layout/footer.php"; ?>
</body>

</html>