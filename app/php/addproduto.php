<?php
include_once "../dao/Produto.DAO.php";
include_once "../class/ClassProduto.php";

  

    if(isset($_FILES['imagem']['name']) or isset($_FILES['ficha']['name'])){
        $imagem = $_FILES['imagem']['name'];
        $ficha = $_FILES['ficha']['name'];
    }

if (isset($_POST['produtosalvar'])) {

    $ClassProduto = new ClassProduto();
    $ClassProduto->setImg($imagem);
    $ClassProduto->setSap($_POST['sap']);
    $ClassProduto->setProduto($_POST['desc']);
    $ClassProduto->setFicha($ficha );

    $Produto = new ProdutoDAO();
    $Produto->insertProduto($ClassProduto);

   
}



?>

<link rel="stylesheet" href="../css/cliente.css">
<form id="form-cliente" action="" method="POST" enctype="multipart/form-data">
    <div class="text-left" id="title">
        <h2> CADASTRO PRODUTO </h2>
        <hr>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputEmail4">Imagem <span style="color: red;">*</span></label>
            <input type="file" class="form-control form-control-sm" id="imagem" name="imagem" placeholder="">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="inputEmail4">Cód. SAP<span style="color: red;">*</span></label>
            <input type="text" class="form-control form-control-sm" id="sap" name="sap" placeholder="">
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail4">Descrição<span style="color: red;">*</span></label>
            <input type="text" class="form-control form-control-sm" id="desc" name="desc" placeholder="">
        </div>
        <div class="form-group col-md-2">
            <label for="inputEmail4">Unidade</label>
            <input type="text" class="form-control form-control-sm" id="desc" name="desc" placeholder="">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputEmail4">Ficha Técnica<span style="color: red;">*</span></label>
            <input type="file" class="form-control form-control-sm" id="ficha" name="ficha" placeholder="">
        </div>
    </div>
    <div class="text-right">

        <button type="submit" class="btn btn-success" name="produtosalvar">Salvar Produto</button>
    </div>

</form>