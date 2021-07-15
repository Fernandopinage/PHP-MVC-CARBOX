<?php
include_once "../layout/heard.php";
include_once "../class/ClassCliente.php";
include_once "../dao/ClienteDAO.php";
include_once "../class/ClassComprador.php";
include_once "../dao/CompradorDAO.php";

if (isset($_POST['clientesalva'])) {


    if ($_POST['cpf'] != '' and $_POST['razao'] != '' and  $_POST['email'] != '' and $_POST['sap'] != '') {

        $ClassCliente = new ClassCliente();
        $ClassCliente->setCnpj($_POST['cpf']);
        $ClassCliente->setRazao($_POST['razao']);
        $ClassCliente->setEmail($_POST['email']);
        $ClassCliente->setSap($_POST['sap']);

        if (isset($_POST['comprador_nome']) != '' and  isset($_POST['comprador_email']) != '' and  isset($_POST['comprador_senha']) != '' and isset($_POST['comprador_status']) != '') {
           // $Cliente = new ClienteDAO();
           // $Cliente->insertCliente($ClassCliente);

            $ClassComprador =  new ClassComprador();
            /*
            $ClassComprador->setCnpj(implode(",", $_POST['CNPJ']));
            $ClassComprador->setNome(implode(",", $_POST['comprador_nome']));
            $ClassComprador->setEmail(implode(",", $_POST['comprador_email']));
            $ClassComprador->setSenha(implode(",", $_POST['comprador_senha']));
            $ClassComprador->setStatus(implode(",", $_POST['comprador_status']));
            */

            $lista = array(

                'cnpj' => $_POST['CNPJ'],
                'nome' => $nome = $_POST['comprador_nome'],
                'email' => $email = $_POST['comprador_email'],
                'senha' => $senha  = $_POST['comprador_senha'],
                'status' => $status = $_POST['comprador_status']
            );

            $tamanho = count($lista['cnpj']);

            for ($i = 0; $i < $tamanho; $i++) {


                $cnpj =  $lista['cnpj'][$i];
                $nome =  $lista['nome'][$i];
                $email =  $lista['email'][$i];
                $senha =  $lista['senha'][$i];
                $status =  $lista['status'][$i];
                $Comprador = new CompradorDAO();
                $Comprador->inserComprador($cnpj, $nome, $email, $status);
            }
        } else {
?>
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Your work has been saved',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>

        <?php


        }
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
        <h2> CLIENTE </h2>
        <hr>
    </div>
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


    <div class="text-left" id="title" style="margin-top: 20px;">
        <h2> COMPRADORES </h2>
        <hr>
    </div>



    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputEmail4">Nome <span style="color: red;">*</span></label>
            <input type="text" class="form-control form-control-sm" id="comprador_nome" placeholder="">
        </div>
        <div class="form-group col-md-4">
            <label for="inputEmail4">E-mail<span style="color: red;">*</span></label>
            <input type="email" class="form-control form-control-sm" id="comprador_email" placeholder="">
        </div>
        <div class="form-group col-md-1">
            <button type="button" class="btn btn-primary btn-block btn-sm" id="mais" style="margin-top: 32px;">Adicionar</button>
        </div>
        <div class="form-group col-md-3">
            <!--<label for="inputEmail4">Senha </label> -->
            <input type="hidden" class="form-control form-control-sm" id="comprador_senha" placeholder="">
        </div>
    </div>

    <table class="table">
        <thead class="thead" style="background-color: #136132;color:white; ">
            <tr>

                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col"></th>
                <th scope="col">Status</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody id="lista">

        </tbody>
    </table>

    <hr>
    <div class="text-right">

        <button type="submit" class="btn btn-success" name="clientesalva">Salvar</button>
    </div>

</form>


<script>
    $(document).ready(function() {
        $("#comprador_nome").attr('readonly', true);
        $("#comprador_email").attr('readonly', true);
        $("#comprador_senha").attr('readonly', true);
        $('#mais').hide();
    });
</script>

<script>
    $('#cpf').change(function() {



        var cnpj = document.getElementById('cpf').value
        if (cnpj != '') {


            $("#comprador_nome").attr('readonly', false);
            $("#comprador_email").attr('readonly', false);
            $("#comprador_senha").attr('readonly', false);
            $('#mais').show();
        } else {
            $("#comprador_nome").attr('readonly', true);
            $("#comprador_email").attr('readonly', true);
            $("#comprador_senha").attr('readonly', true);
            $('#mais').hide();
        }

    });
</script>


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

        var comprador_nome = document.getElementById('comprador_nome').value;
        var comprador_email = document.getElementById('comprador_email').value;
        var comprador_senha = document.getElementById('comprador_senha').value;
        var CNPJ = document.getElementById('cpf').value;
        var comprador_status = "Ativo";

        if (comprador_nome != '' && comprador_email != '') {

            $('#lista').append('<tr id="campo' + cont + '"> <th scope="col"><input type="text"  id="comprador_nome" name="comprador_nome[]" value="' + comprador_nome + '" style="border:0px" readonly></th> <th scope="col"><input type="hidden" name="CNPJ[]" value="' + CNPJ + '"><input type="email"  id="comprador_email" name="comprador_email[]" value="' + comprador_email + '" placeholder="" style="border:0px" readonly></th> <th scope="col"><input type="hidden"  id="comprador_senha" name="comprador_senha[]" value="' + comprador_senha + '" placeholder="" style="border:0px" readonly></th> <th scope="col"><input type="teste"  id="comprador_senha" name="comprador_status[]" value="' + comprador_status + '" placeholder="" style="border:0px" readonly></th><th scope="col"><a class="btn btn-danger btn-block btn-sm"  id="' + cont + '" style="color: #fff;"> Remover </a></th></tr>');
        }


        cont++

        var comprador_nome = document.getElementById('comprador_nome').value = "";
        var comprador_email = document.getElementById('comprador_email').value = "";
        var comprador_senha = document.getElementById('comprador_senha').value = "";

        var comprador_status = "Ativo";


    });

    $("form").on("click", ".btn-danger", function() {

        var btn_id = $(this).attr("id");
        $('#campo' + btn_id + '').remove();
        console.log(btn_id)
    });
</script>



<?php include_once "../layout/footer.php"; ?>