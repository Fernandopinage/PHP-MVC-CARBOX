<?php
include_once "../layout/heard.php";
include_once "../class/ClassPedido.php";
include_once "../dao/PedidoDAO.php";


$Produto = new PedidoDAO();
$dado = $Produto->selectProduto();


if (isset($_POST['pedidoosalva'])) {


    if (isset($_POST['produto'])) {

        $ClassProduto = new ClassPedido();
        $ClassProduto->setProduto(implode(",", $_POST['produto']));
        //$ClassProduto->setDesc(implode(",",$_POST['desc']));
        $ClassProduto->setQuantidade(implode(",", $_POST['quantidade']));
        $ClassProduto->setUnidade(implode(",", $_POST['unidade']));

        $Produto->insertProduto($ClassProduto);
    } else {
?>
        <script>
            Swal.fire({
                title: 'Error!',
                text: 'Preenchar todos os campos obrigatorios!',
                icon: 'error',
                confirmButtonText: 'OK'
            })
        </script>

<?php


    }
}


?>
<link rel="stylesheet" href="../css/cliente.css">
<form id="form-cliente" action="" method="POST">
    <div class="text-left" id="title">
        <h2> ORÇAMENTO </h2>
        <hr>
    </div>
    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="inputEmail4">Descrição <span style="color: red;">*</span></label>
            <select class="form-control form-control-sm" id="produto">
                <?php

                foreach ($dado as $dados) {
                ?>
                <option value="<?php echo  $dados->getID(); ?>"><?php echo $dados->getProduto(); ?></option>

                <?php

                }

                ?>
            </select>
        </div>
        <div class="form-group col-md-1">
            <label for="inputEmail4">Cód. SAP</label>
            <input type="text" class="form-control form-control-sm" id="codsap" placeholder="">
        </div>
        <div class="form-group col-md-1">
            <label for="inputEmail4">Qtd.</label>
            <input type="text" class="form-control form-control-sm" id="quantidade" placeholder="">
        </div>
        <div class="form-group col-md-2">
            <label for="inputEmail4">Ficha Técnica</label>
            <input type="text" class="form-control form-control-sm" id="quantidade" placeholder="">
        </div>
        <div class="form-group col-md-1">
            <button type="button" class="btn btn-primary btn-sm" id="mais" style="margin-top: 28px;">+</button>
        </div>
    </div>



    <table class="table">
        <thead class="thead" style="background-color: #136132;color:white;">
            <tr>

                <th scope="col">Descrição</th>
                <th scope="col">Quantidade</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody id="lista">

        </tbody>
    </table>





    <div class="text-right">
        <button type="submit" class="btn btn-success" name="pedidoosalva">Salvar</button>
    </div>

    <div class="form-row">
        <div class="form-group col-md-8">
            <p for="inputEmail4">Campos Obrigatórios<span style="color: red;">*</span></p>

        </div>

    </div>
    <hr>

</form>
<?php include_once "../layout/footer.php"; ?>

<script>
</script>