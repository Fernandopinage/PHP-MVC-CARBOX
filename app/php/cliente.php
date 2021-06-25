<?php
include_once "../layout/heard.php";
include_once "../class/ClassCliente.php";
include_once "../dao/ClienteDAO.php";
include_once "../class/ClassComprador.php";

if (isset($_POST['clientesalva'])) {


    if ($_POST['cnpj'] != '' and $_POST['razao'] != '' and  $_POST['email'] != '' and $_POST['sap'] != '') {

        $ClassCliente = new ClassCliente();
        $ClassCliente->setCnpj($_POST['cnpj']);
        $ClassCliente->setRazao($_POST['razao']);
        $ClassCliente->setEmail($_POST['email']);
        $ClassCliente->setSap($_POST['sap']);
        $Cliente = new ClienteDAO();
        $Cliente->insertCliente($ClassCliente);

        $ClassComprador =  new ClassComprador();
        $ClassComprador->setCnpj($_POST['cnpj']);
        $ClassComprador->setNome(implode(",",$_POST['comprador_nome']));
        $ClassComprador->setEmail(implode(",",$_POST['comprador_nome']));
        $ClassComprador->setSenha(implode(",",$_POST['comprador_nome']));

        $Comprador = new CompradorDAO();
        $Comprador->inserComprador($ClassComprador);

   

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
        <h2> CADASTRO CLIENTE </h2>
        <hr>
    </div>
    <div class="form-row">

        <div class="form-group col-md-4">
            <label for="inputEmail4">CNPJ <span style="color: red;">*</span></label>
            <input type="text" class="form-control form-control-sm is-invalid" id="cnpj" name="cnpj" placeholder="">
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
            <label for="inputEmail4">Email<span style="color: red;">*</span></label>
            <input type="email" class="form-control form-control-sm is-invalid" id="email" name="email" placeholder="">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-8">
            <p for="inputEmail4">Campos Obrigatórios<span style="color: red;">*</span></p>
        </div>
    </div>


    <div class="text-left" id="title" style="margin-top: 20px;">
        <h2> COMPRADORES </h2>
        <hr>
    </div>



    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputEmail4">Nome <span style="color: red;">*</span></label>
            <input type="text" class="form-control form-control-sm" id="comprador_nome" name="comprador_nome[]" placeholder="">
        </div>
        <div class="form-group col-md-4">
            <label for="inputEmail4">E-mail<span style="color: red;">*</span></label>
            <input type="text" class="form-control form-control-sm" id="comprador_email" name="comprador_email[]" placeholder="">
        </div>
        <div class="form-group col-md-3">
            <label for="inputEmail4">Senha </label>
            <input type="text" class="form-control form-control-sm" id="comprador_senha" name="comprador_senha[]" placeholder="">
        </div>
        <div class="form-group col-md-1">
            <button type="button" class="btn btn-primary btn-sm" id="mais" style="margin-top: 28px;">+</button>
        </div>
    </div>

    <div id="lista">
    
    </div>

    <hr>
    <div class="text-right">

        <button type="submit" class="btn btn-success" name="clientesalva">Salvar</button>
    </div>

</form>


<script>
    $("#cpf").change(function() {

        if (document.getElementById('cpf').value != "") {
            $('#cpf').removeClass("form-control form-control is-invalid").addClass("form-control form-control is-valid");

        } else {
            $('#cpf').removeClass("form-control form-control is-valid").addClass("form-control form-control is-invalid");

        }

    });


    $("#razao").change(function() {

        if (document.getElementById('razao').value != "") {
            $('#razao').removeClass("form-control form-control is-invalid").addClass("form-control form-control is-valid");

        } else {
            $('#razao').removeClass("form-control form-control is-valid").addClass("form-control form-control is-invalid");

        }

    });


    $("#nome").change(function() {

        if (document.getElementById('nome').value != "") {
            $('#nome').removeClass("form-control form-control is-invalid").addClass("form-control form-control is-valid");

        } else {
            $('#nome').removeClass("form-control form-control is-valid").addClass("form-control form-control is-invalid");

        }

    });

    $("#sap").change(function() {

        if (document.getElementById('sap').value != "") {
            $('#sap').removeClass("form-control form-control is-invalid").addClass("form-control form-control is-valid");

        } else {
            $('#sap').removeClass("form-control form-control is-valid").addClass("form-control form-control is-invalid");

        }

    });

    $("#email").change(function() {

        if (document.getElementById('email').value != "") {
            $('#email').removeClass("form-control form-control is-invalid").addClass("form-control form-control is-valid");

        } else {
            $('#email').removeClass("form-control form-control is-valid").addClass("form-control form-control is-invalid");

        }

    });
</script>
<script>
    var cont = 0;


    $('#mais').click(function() {
  

        $('#lista').append(' <div class="form-row" id="campo' + cont + '"> <div class="form-group col-md-4"> <label for="inputEmail4">Nome <span style="color: red;">*</span></label> <input type="text" class="form-control form-control-sm" id="comprador_nome" name="comprador_nome[]" placeholder=""></div> <div class="form-group col-md-4"><label for="inputEmail4">E-mail<span style="color: red;">*</span></label> <input type="text" class="form-control form-control-sm" id="comprador_email" name="comprador_email[]" placeholder=""> </div> <div class="form-group col-md-3"> <label for="inputEmail4">Senha </label> <input type="text" class="form-control form-control-sm" id="comprador_senha" name="comprador_senha[]" placeholder=""> </div> <div class="form-group col-md-1"> <a class="btn btn-danger btn-sm"  id="' + cont + '" style="margin-top:26px;color: #fff;"> - </a>  </div></div>');

        cont++

    });

    $("form").on("click", ".btn-danger", function() {

        var btn_id = $(this).attr("id");
        $('#campo' + btn_id + '').remove();
        console.log(btn_id)
    });
</script>



<?php include_once "../layout/footer.php"; ?>