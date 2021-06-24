<?php
include_once "../layout/heard.php";
include_once "../class/ClassProduto.php";
include_once "../dao/ProdutoDAO.php";



if (isset($_POST['produtosalva'])) {


    if ($_POST['codigo'] != '' and $_POST['desc'] != ''  and $_POST['unidade'] != '') {

        $ClassProduto = new ClassProduo();
        $ClassProduto->setCod($_POST['codigo']);
        $ClassProduto->setDesc($_POST['desc']);
        $ClassProduto->setUnidade($_POST['unidade']);

        $Produto = new ProdutoDAO();
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

        <div class="form-group col-md-5">
            <label for="inputEmail4">Produtos <span style="color: red;">*</span></label>
            <select class="form-control form-control-sm" id="produto" name="produto">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="inputEmail4">Descrição <span style="color: red;">*</span></label>
            <input type="text" class="form-control form-control-sm is-invalid" id="desc" name="desc" placeholder="">
        </div>
        <div class="form-group col-md-1">
            <label for="inputEmail4">Und. <span style="color: red;">*</span></label>
            <input type="text" class="form-control form-control-sm is-invalid" id="unidade" name="unidade" placeholder="">
        </div>
        <div class="form-group col-md-1">
            <label for="inputEmail4">Qtd. <span style="color: red;">*</span></label>
            <input type="text" class="form-control form-control-sm is-invalid" id="quantidade" name="quantidade" placeholder="">
        </div>
        <div class="form-group col-md-1">
            <button type="button" class="btn btn-primary btn-sm" id="mais" style="margin-top: 28px;">+</button>
        </div>
    </div>

        
   
        <table class="table">
            <thead class="thead"  style="background-color: #136132;color:white;">
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Unidade</th>
                    <th scope="col">Remover</th>
                    <th scope="col">Remover</th>
                </tr>
            </thead>
            <tbody id="lista">
            
            </tbody>
        </table>

   



    <div class="text-right">
        <button type="submit" class="btn btn-success" name="produtosalva">Salvar</button>
    </div>

    <div class="form-row">
        <div class="form-group col-md-8">
            <p for="inputEmail4">Campos Obrigatórios<span style="color: red;">*</span></p>

        </div>

    </div>
    <hr>

</form>



<script>
    var cont = 0;

    
    $('#mais').click(function() {
        var produto = document.getElementById('produto').value;
        var desc = document.getElementById('desc').value;
        var unidade = document.getElementById('unidade').value;
        var quantidade = document.getElementById('quantidade').value;

        $('#lista').append('<tr id="campo' + cont + '"> <th><input type="text" id="produto" name="produto[]" value="'+produto+'" placeholder=""></th> <td><input type="text"  id="desc" name="desc" value="'+desc+'" placeholder=""></td>  <td><input type="text"  id="unidade" name="unidade" value="'+unidade+'" placeholder=""></td> <td><input type="text"  id="quantidade" name="quantidade" value="'+quantidade+'" placeholder=""></td> </tr> ')

        cont++
    });

    $("form").on("click", ".btn-danger", function() {

        var btn_id = $(this).attr("id");
        $('#campo' + btn_id + '').remove();
        console.log(btn_id)
    });
</script>

<?php include_once "../layout/footer.php"; ?>