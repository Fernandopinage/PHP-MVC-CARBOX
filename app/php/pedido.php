<?php
include_once "../layout/heard.php";
include_once "../class/ClassPedido.php";
include_once "../dao/PedidoDAO.php";
include_once "../function/numeroOrcamento.php";

$GerarNumero = new GerarNumero();


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
        <div class="form-group col-md-3">
            <label for="inputEmail4">Número do Orçamento</label>
            <input type="text" class="form-control form-control-sm" id="numero_orçamento" name="numero_orçamento" value="<?php echo $GerarNumero->idONum(); ?>" placeholder="" readonly>
        </div>
        <div class="form-group col-md-3">
            <label for="inputEmail4">Data de Emissão</label>
            <input type="text" class="form-control form-control-sm" id="data_emissao" name="data_emissao" value="<?php echo date('d-m-Y') ?>" placeholder="" readonly>
        </div>
        <div class="form-group col-md-4">
            <label for="inputEmail4">Nome do Cliente</label>
            <input type="text" class="form-control form-control-sm" id="razão_cliente" name="razão_cliente" placeholder="" value="empresa teste" readonly>
        </div>
    </div>
    <hr>
    <div class="form-row">
        <div class="form-group col-md-5">
            <label for="inputEmail4">Descrição <span style="color: red;">*</span></label>
            <select class="form-control form-control-sm" id="produto">
                <option selected></option>
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
            <label for="inputEmail4">Qtd.</label>
            <input type="number" min="1" max="999" class="form-control form-control-sm" id="quantidade" placeholder="">
        </div>
        <div id="contrato">
        </div>
        <div class="form-group col-md-1">
            <button type="button" class="btn btn-primary btn-sm" id="mais" style="margin-top: 28px;">Incluir</button>
        </div>
        <input type="hidden" class="form-control form-control-sm" id="codsap" placeholder="">
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

<script>
    $("#produto").change(function() {

        var id = document.getElementById('produto').value

        $('#contrato').html('');

        $.ajax({

            type: 'POST', // Formado de envio
            url: '../ajax/contrato.php', // URL para onde vai ser enviados
            data: {
                id: id
            },
            success: function(data) {
                $('#contrato').html(data);
            }


        });
        return false;


    });
</script>
</form>
<?php include_once "../layout/footer.php"; ?>
