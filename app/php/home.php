<?php include_once "../layout/heard.php";
include_once "../dao/ClienteDAO.php";
include_once "../dao/RestritoDAO.php";
include_once "../dao/Produto.DAO.php";

$Cliente = new ClienteDAO();

?>
<link rel="stylesheet" href="../css/home.css">
<div class="container-fluid">
    <?php

    if (isset($_GET['p'])) {

        $pagina = $_GET['p'];



        switch ($pagina) {


            case 'orcamento/':
                include_once "../php/orcamento.php";
                break;

            case 'home/':
                include_once "../php/listapedido.php";
                break;
            case 'cliente/':
                include_once "../php/listacliente.php";
                break;
            case 'add/cliente/':
                include_once "../php/addcliente.php";
                break;
            case 'alterarsenha/':
                include_once "../php/alterarsenha.php";
                break;

            case 'add/pedido/':
                include_once "../php/addpedido.php";
                break;
                
            case 'pedido/':
                include_once "../php/listapedido.php";
                break;

            case 'produto/':
                include_once "../php/listaproduto.php";
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

    if (isset($_GET['edit/restrito/'])) {

        $edit = $_GET['edit/restrito/'];
    }


    if (isset($_GET['delete'])) {

        $delete = $_GET['delete'];
        $Restrito = new RestritoDAO();
        $Restrito->delete($delete);
    }
    
    if (isset($_GET['produto/delete'])) {

         $delete = $_GET['produto/delete'];

         $Restrito = new ProdutoDAO();
         $Restrito->delete($delete);
    }

    if(isset($_GET['cliente/delete'])){
        $delete = $_GET['cliente/delete'];
        $Cliente->deleteCliente($delete);

    }

    ?>
</div>

<?php include_once "../layout/footer.php" ?>