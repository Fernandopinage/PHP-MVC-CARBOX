<link rel="stylesheet" href="../css/alterarsenha.css">

<?php
include_once "../class/ClassCliente.php";
include_once "../dao/ClienteDAO.php";

if (isset($_POST['acessar'])) {

    $ClassCliente = new ClassCliente();

    /** criar select para verificar se senha está correta  */
    if ($_POST['novasenha'] === $_POST['confirme']) {

        $ClassCliente->setSenha(md5($_POST['novasenha']));
        $Cliente = new ClienteDAO();
        $Cliente->reseteSenha($ClassCliente);
    }
}

?>
<form class="form-signin" method="POST">
    <div class="" id="logo">
        <h2 class="form-signin-heading">ALTERAR SENHA</h2>
        <hr>
        <label for="inputEmail4">Senha Atual</label>
        <input type="password" class="form-control form-control" id="senha" name="senha" placeholder="SENHA" required="" autofocus="" />
        <label for="inputEmail4">Nova Senha</label>
        <input type="password" class="form-control form-control" id="novasenha" name="novasenha" placeholder="NOVA SENHA" required="" />
        <label for="inputEmail4">Confirmar Senha</label>
        <input type="password" class="form-control form-control" id="confirme" name="confirme" placeholder="CONFIRMAR SENHA" required="" />
        <p id="obrigatorio"></p>
        <div class="text-right" id="btn">
            <input type="submit" name="acessar" class="btn btn-success btn-lg btn-block" value="ALTERAR SENHA">
        </div>
    </div>

</form>

<script>
    $("#novasenha").change(function() {

        if (document.getElementById('novasenha').value != "") {
            $('#novasenha').removeClass("form-control form-control is-invalid").addClass("form-control form-control is-valid");

        } else {
            $('#novasenha').removeClass("form-control form-control is-valid").addClass("form-control form-control is-invalid");

        }

    });

    $("#confirme").change(function() {

        if (document.getElementById('novasenha').value === document.getElementById('confirme').value) {
            $('#confirme').removeClass("form-control form-control is-invalid").addClass("form-control form-control is-valid");

        } else {
            $('#confirme').removeClass("form-control form-control is-valid").addClass("form-control form-control is-invalid");
            var obg = document.getElementById('obrigatorio').innerHTML = "Os campos <strong style = 'color:red;'>Nova Senha</strong> é <strong style = 'color:red;'>Confirmar Senha</strong> devem ser iguais";


            document.getElementById('senha2').value = '';
        }

    });
</script>