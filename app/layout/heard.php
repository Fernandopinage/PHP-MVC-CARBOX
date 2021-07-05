<?php

session_start();

if (empty($_SESSION['user']['nome'])) {
  header('Location: ../php/index.php');
}


?>
<!doctype html>
<html lang="pt-br">

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!------------------------------- Sweet Alert ---------------------------------->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <!-- ---------------------------------------------------------------------------->


  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;600&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> <!-- jquery CDN  -->

  <title>Carbox</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light " style="background-color:#136132;">
    <a class="navbar-brand" href="?p=home/" style="color:#fff;"><img src="../img/LOGO carboxi gases original.png" alt="" width="120" height="44"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff;">
            Solicitar
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="?p=pedido/">Orçamento</a>
          </div>
        </li>

        <?php
        if ($_SESSION['user']['status'] != 'N') {
        ?>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff;">
              Cadastro
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="?p=cliente/">Cliente</a>
              <a class="dropdown-item" href="?p=add/produto/">Produto</a>
              <a class="dropdown-item" href="?p=restrito/">Usuário</a>
            </div>
          </li>
        <?php
        }
        ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff;">
            Logout
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <div class="dropdown-divider"></div>
            <?php
            if (!empty($_SESSION['user']['comprador'])) {

              if ($_SESSION['user']['comprador'] == 'S') {
            ?>
                <a class="dropdown-item" href="?p=exit/">Sair</a>
              <?php
              } else {

              ?>
                <?php
                ?>
                <a class="dropdown-item" href="?p=sair/">Sair</a>
            <?php
              }
            }
            if (!isset($_SESSION['user']['comprador'])) {
              ?>
              <a class="dropdown-item" href="?p=sair/">Sair</a>
              <?php

            }

           
            ?>
          </div>
        </li>
      </ul>

    </div>
    <div class="text-right" style="color: #fff;">
      <?php echo '<span style="color: #f9d228; font-size: 15px;">Olá,  </span> ' . $_SESSION['user']['nome']; ?>
    </div>
  </nav>

  <?php
  /*
  } else {
    //header("location: http://localhost/carbox/app/php/index.php");
  }
*/

  ?>