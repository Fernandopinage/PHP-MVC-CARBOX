<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/acesso.css">
    <title>Carboxi</title>
</head>

<body>

    <div class="container" style="margin-right: 1250px;">

        <form class="form-signin" method="POST">
            <div class="text-center" id="logo">
                <h2 class="form-signin-heading">Primeiro Acesso</h2>
                <hr>
            </div>
            <input type="text" class="form-control" name="valor" placeholder="Digite seu e-mail" required="" autofocus="" />
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
    <?php include_once "../layout/footer.php"; ?>
</body>

</html>