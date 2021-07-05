<?php include_once "../layout/heard.php";
include_once "../dao/ClienteDAO.php";
include_once "../dao/RestritoDAO.php";
$Cliente = new ClienteDAO();

?>
<link rel="stylesheet" href="../css/home.css">
<div class="container">
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

            case 'add/restrito/':
                include_once "../php/addrestrito.php";
                
                break;

            case 'restrito/':
                include_once "../php/listarestrito.php";
                break;

            case 'sair/':
                include_once "../php/logout.php";
                break;
            case 'exit/':
                include_once "../php/logout_cliente.php";
                break;
            default:

                break;
        }
    }

    if(isset($_GET['edit/restrito/'])){

        $edit = $_GET['edit/restrito/'];

        
    }

    if(isset($_GET['delete'])){

        $delete = $_GET['delete'];

        $Restrito = new RestritoDAO();
        $Restrito->delete($delete);
    }

    ?>
</div>

<?php include_once "../layout/footer.php" ?>