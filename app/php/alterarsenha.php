<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/alterarsenha.css">
    <!------------------------------- Sweet Alert ---------------------------------->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- ---------------------------------------------------------------------------->
    <title>Alterar Senha</title>
</head>

<body>

    <style>
        body {
            background-image: url('../img/04.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            -webkit-background-size: cover;
            -moz-background-size: cover;


        }
    </style>


    <div class="container">
        <form class="form-signin" method="POST">
            <div class="" id="logo">
                <h2 class="form-signin-heading">ALTERAR SENHA</h2>
                <hr>

                <input type="hidden" class="form-control form-control" id="email" name="email" value="<?php echo $email; ?>" placeholder="email" required="" autofocus="" />
                <input type="hidden" class="form-control form-control" id="senha" name="senha" value="<?php echo $senha; ?>" placeholder="senha" required="" autofocus="" />
                <label for="inputEmail4">Nova Senha</label>
                <input type="password" class="form-control form-control" id="novasenha" name="novasenha" placeholder="NOVA SENHA" required="" />
                <label for="inputEmail4">Confirmar Senha</label>
                <input type="password" class="form-control form-control" id="confirme" name="confirme" placeholder="CONFIRMAR SENHA" required="" />
                <p id="obrigatorio"></p>
                <div class="text-right" id="btn">
                    <input type="submit" name="acessar" class="btn btn-success btn-lg btn-block" value="ALTERAR SENHA">
                </div>
            </div>

        </form>

        <script>
            $("#novasenha").change(function() {

                if (document.getElementById('novasenha').value != "") {
                    $('#novasenha').removeClass("form-control form-control is-invalid").addClass("form-control form-control is-valid");

                } else {
                    $('#novasenha').removeClass("form-control form-control is-valid").addClass("form-control form-control is-invalid");

                }

            });

            $("#confirme").change(function() {

                if (document.getElementById('novasenha').value === document.getElementById('confirme').value) {
                    $('#confirme').removeClass("form-control form-control is-invalid").addClass("form-control form-control is-valid");

                } else {
                    $('#confirme').removeClass("form-control form-control is-valid").addClass("form-control form-control is-invalid");
                    var obg = document.getElementById('obrigatorio').innerHTML = "Os campos <strong style = 'color:red;'>Nova Senha</strong> é <strong style = 'color:red;'>Confirmar Senha</strong> devem ser iguais";


                    document.getElementById('senha2').value = '';
                }

            });
        </script>

        <?php
        include_once "../class/ClassCliente.php";
        include_once "../dao/CompradorDAO.php";

        if (isset($_POST['acessar'])) {

            if ($_POST['novasenha'] === $_POST['confirme']) {


                $email = $_POST['email'];
                $senha = $_POST['senha'];
                $novasenha = $_POST['novasenha'];

                $ClienteDAO = new CompradorDAO();
                $ClienteDAO->alterandoSenha($email, $senha, $novasenha);
                
            }else{
                ?>
                 <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Erro ao alterar senha',
                        showConfirmButton: false,
                        timer: 3500
                    })
                </script>";
                
                <?php
            }
        }
        if (isset($_GET['email']) and isset($_GET['senha'])) {

            $email = $_GET['email'];
            $senha = $_GET['senha'];
        }
        ?>