<?php include_once "../layout/heard.php";
include_once "../dao/ClienteDAO.php";
$Cliente = new ClienteDAO();

?>
<link rel="stylesheet" href="../css/home.css">
<div class="container-fluid">
    <?php

    if (isset($_GET['p'])) {

        $pagina = $_GET['p'];

        switch ($pagina) {
            case 'home/':
                //include_once "../php/cliente.php";
                break;
            case 'cliente/':
                include_once "../php/cliente.php";
                break;
            case 'alterarsenha/':
                include_once "../php/alterarsenha.php";
                break;

            case 'pedido/':
                include_once "../php/pedido.php";
                break;

            case 'add/produto/':
                include_once "../php/addproduto.php";
                break;


            case 'logaut/':
                $Cliente->logaut();
                break;
            default:

                break;
        }
    }



    ?>
</div>

<?php include_once "../layout/footer.php" ?>