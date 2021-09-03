<?php
include_once "../layout/heard.php";
include_once "../class/ClassCliente.php";
include_once "../dao/ClienteDAO.php";
include_once "../class/ClassComprador.php";
include_once "../dao/CompradorDAO.php";
include_once "../dao/Produto.DAO.php";
include_once "../class/ClassProduto.php";
include_once "../class/ClassClienteProduto.php";
include_once "../dao/ClienteProdutoDAO.php";


$produto = new ProdutoDAO();
$dados = $produto->listaProduto();

if (isset($_POST['clientesalva'])) {


    if ($_POST['cpf'] != '' and $_POST['razao'] != '' and  $_POST['email'] != '' and $_POST['sap'] != '') {

        $ClassCliente = new ClassCliente();
        $ClassCliente->setCnpj($_POST['cpf']);
        $ClassCliente->setRazao($_POST['razao']);
        $ClassCliente->setEmail($_POST['email']);
        $ClassCliente->setSap($_POST['sap']);
        $Cliente = new ClienteDAO();
        $Cliente->insertCliente($ClassCliente);

        $ClassCliPro = new ClassClienteProduto();
        $ClassCliPro->setProduto($_POST['produtoC']);
        $ClassCliPro->setCnpj($_POST['cpf']);
        $ClassCliPro->setSap($_POST['sap']);
        
        $CliPro = new ClienteProdutoDAO();
        $CliPro->insertClienteProduto($ClassCliPro);
        

    }
}


?>

<link rel="stylesheet" href="../css/cliente.css">
<form id="form-cliente" action="" method="POST">
    <div class="text-left" id="title">
        <h2> CLIENTE </h2>
    </div>
    <hr>
    <div class="form-row">

        <div class="form-group col-md-4">
            <label for="inputEmail4">CNPJ <span style="color: red;">*</span></label>
            <input type="text" class="form-control form-control-sm is-invalid" onfocus="javascript: retirarFormatacao(this);" onblur="javascript: formatarCampo(this);" name="cpf" id="cpf" placeholder="99.999.999/9999-99">
        </div>
        <div class="form-group col-md-8">
            <label for="inputEmail4">Razão Social <span style="color: red;">*</span></label>
            <input type="text" class="form-control form-control-sm is-invalid" id="razao" name="razao" placeholder="">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="inputEmail4">Cod SAP<span style="color: red;">*</span></label>
            <input type="text" class="form-control form-control-sm is-invalid" id="sap" name="sap" placeholder="">
        </div>
        <div class="form-group col-md-10">
            <label for="inputEmail4">E-mail<span style="color: red;">*</span></label>
            <input type="email" class="form-control form-control-sm is-invalid" id="email" name="email" placeholder="">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-8">
            <p for="inputEmail4">Campos Obrigatórios<span style="color: red;">*</span></p>
        </div>
    </div>

    <div class="text-left" id="title">
        <h2> PRODUTO </h2>
        <hr>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <select class="custom-select custom-select-sm" id="produto">
                <option selected></option>
                <?php

                foreach ($dados as $dados) {
                    echo "<option value='" . $dados->getSap() . "'>" . $dados->getSap() . " - " . $dados->getProduto() . "</option>";
                }

                ?>
            </select>
        </div>
        <div class="form-group col-md-3">
            <button type="button" class="btn btn-primary btn-sm" id="mais">Adicionar</button>
        </div>
    </div>

    <div id="lista">
        <h6  style="margin-bottom: 20px; margin-top:20px;">Lista de Produtos</h6>

    </div>
    <div id="msg">

    </div>

    <div class="text-right">
        <a href="?p=cliente/" class="btn btn-danger">Cancelar</a>
        <button type="submit" class="btn btn-success" name="clientesalva">Salvar Cliente</button>
    </div>

</form>

<script>
    var cont = 0;
    $('#mais').click(function() {


        var produto = document.getElementById('produto').value;
        

        if (produto != '') {

            console.log(produto)
            $('#lista').append('<div id="campo' + cont + '"><div class="form-row"><label>Código Produto: </label><div class="form-group col-md-2"><input type="text" class="form-control form-control-sm" name="produtoC[]" value="' + produto + '" > </div> <div class="form-group col-md-1"><a class="btn btn-danger btn-sm" onclick="remove(' + cont + ')" id="' + cont + '" style="color: #fff;"> Remover </a></div></div>');
            cont++
            document.getElementById('msg').innerHTML = "";

        } else {
            document.getElementById('msg').innerHTML = "<p style='color:red;margin-left:20px'>Preenchar os campos obrigatorios";
        }

    });


    function remove(id) {


        $('#campo' + id).hide("#campo" + id)
        document.getElementById('campo' + id).innerHTML = "";

    }
</script>

<?php include_once "../layout/footer.php"; ?>