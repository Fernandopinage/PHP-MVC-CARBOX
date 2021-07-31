<!DOCTYPE html>
<html lang="pt-br">

<?php


?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/acesso.css">
    <title>Esqueci minha senha</title>
</head>

<body>

    <div class="container">

        <form class="form-signin" method="POST">
            <div class="text-center" id="logo">
                <h2 class="form-signin-heading">Esqueci senha</h2>
                <hr>
            </div>
            <input type="text" class="form-control" name="email" placeholder="Digite o e-mail cadastrado" required="" autofocus="" />
            <br>


            <div class="text-right">
                <input type="submit" name="primeiro" class="btn btn-success btn-lg btn-block" value="Enviar">
            </div>

        </form>

    </div>
    <?php include_once "../layout/footer.php"; ?>
</body>

</html>