<?php
include_once "../layout/heard.php";
include_once "../class/ClassPedido.php";
include_once "../dao/PedidoDAO.php";



if (isset($_POST['pedidoosalva'])) {


    if (isset($_POST['produto'])) {

        $ClassProduto = new ClassPedido();
        $ClassProduto->setProduto(implode(",",$_POST['produto']));
        //$ClassProduto->setDesc(implode(",",$_POST['desc']));
        $ClassProduto->setQuantidade(implode(",",$_POST['quantidade']));
        $ClassProduto->setUnidade(implode(",",$_POST['unidade']));

        $Produto = new PedidoDAO();
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
        <h2> NOVO PEDIDO </h2>
        <hr>
    </div>
    <div class="form-row">

        <div class="form-group col-md-8">
            <label for="inputEmail4">Descrição <span style="color: red;">*</span></label>
            <select class="form-control form-control-sm" id="produto">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>

        <div class="form-group col-md-2">
            <label for="inputEmail4">UM.</label>
            <input type="text" class="form-control form-control-sm" id="unidade" placeholder="">
        </div>
        <div class="form-group col-md-1">
            <label for="inputEmail4">Qtd.</label>
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
                <th scope="col">Unidade</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Remover</th>
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