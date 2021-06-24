<?php 

 if(isset($_POST['produtosalvar'])){

    echo "ok";
 }



?>

<link rel="stylesheet" href="../css/cliente.css">
<form id="form-cliente" action="" method="POST">
    <div class="text-left" id="title">
        <h2> CADASTRO PEDIDO </h2>
        <hr>
    </div>
    <div class="form-row">
        <div class="form-group col-md-10">
            <label for="inputEmail4">Descrição<span style="color: red;">*</span></label>
            <input type="text" class="form-control form-control-sm" id="desc" name="desc" placeholder="">
        </div>
        <div class="form-group col-md-2">
            <label for="inputEmail4">Unidade de Médida<span style="color: red;">*</span></label>
            <input type="text" class="form-control form-control-sm" id="unidade" name="unidade" placeholder="">
        </div>

    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputEmail4">Imagem <span style="color: red;">*</span></label>
            <input type="file" class="form-control form-control-sm" id="img" name="img" placeholder="">
        </div>
    </div>
    <div class="text-right">

        <button type="submit" class="btn btn-success" name="produtosalvar">Salvar Produto</button>
    </div>

</form>