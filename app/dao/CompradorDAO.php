<?php
include_once "../dao/DAO.php";
include_once "../class/ClassComprador.php";
include_once "../class/GerarSenha.php";
include_once "../dao/MailComprador.php";

class CompradorDAO extends DAO
{

    public function inserComprador(ClassComprador $ClassComprador)
    {

        $senha = new GerarSenha();
        $rash = $senha->senha();
        $ClassComprador->setSenha(md5($rash));

        $sql = "INSERT INTO `comprador`(`COMPRADOR_ID`, `COMPRADOR_CNPJ`, `COMPRADOR_NOME`, `COMPRADOR_EMAIL`, `COMPRADOR_SENHA`, `COMPRADOR_STATUS`, `COMPRADOR_ACESSO`, `COMPRADOR_CODSAP`) VALUES (null, :COMPRADOR_CNPJ, :COMPRADOR_NOME, :COMPRADOR_EMAIL, :COMPRADOR_SENHA, :COMPRADOR_STATUS, :COMPRADOR_ACESSO, :COMPRADOR_CODSAP)";

        $insert = $this->con->prepare($sql);
        $insert->bindValue(":COMPRADOR_CNPJ", $ClassComprador->getCnpj());
        $insert->bindValue(":COMPRADOR_NOME", $ClassComprador->getNome());
        $insert->bindValue(":COMPRADOR_EMAIL", $ClassComprador->getEmail());
        $insert->bindValue(":COMPRADOR_SENHA",  $ClassComprador->getSenha());
        $insert->bindValue(":COMPRADOR_STATUS", 'Ativo');
        $insert->bindValue(":COMPRADOR_ACESSO", 'N');
        $insert->bindValue(":COMPRADOR_CODSAP", $ClassComprador->getCodsap());

        try {
            $insert->execute();
            $comprador = new CompradorDAO();
            $comprador->log($ClassComprador);
        } catch (PDOException $e) {

            // echo $e->getMessage();

        }


        if ($insert->rowCount()) {
            $EmailComprador = new CompradorEmail();
            $EmailComprador->emailComprador($ClassComprador);

            echo " <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Cadastro feito com sucesso',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>";
        } else {
            echo " <script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Duplicidade.',
                    text: '" . $ClassComprador->getEmail() . " Já possui este email na base de dados',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>";
        }
    }



    public function validarLogin($ClassComprador)
    {

        $sql = "SELECT * FROM `comprador` INNER join cliente_produto on cli_pro_cnpj = COMPRADOR_CNPJ WHERE COMPRADOR_SENHA = :COMPRADOR_SENHA and COMPRADOR_EMAIL= :COMPRADOR_EMAIL";
        $select = $this->con->prepare($sql);
        $select->bindValue(':COMPRADOR_SENHA', $ClassComprador->getSenha());
        $select->bindValue(':COMPRADOR_EMAIL', $ClassComprador->getEmail());
        $select->execute();

        $_SESSION['user'] = array();

        if ($row = $select->fetch(PDO::FETCH_ASSOC)) {


            session_start();
            $_SESSION['user'] = array(

                'id' => $row['COMPRADOR_ID'],
                'nome' => $row['COMPRADOR_NOME'],
                'email' => $row['COMPRADOR_EMAIL'],
                'status' => 'N',
                'status_comprador' => $row['COMPRADOR_STATUS'],
                'comprador' => 'S',
                'produtos' => $row['cli_pro_produto']
            );
            header('Location: ../php/home.php?p=home/');
        } else {
            header('Location: ../php/login.php');
        }
    }


    public function updateComprador($id, $email)
    {

        
        
        $sql = "UPDATE `comprador` SET  COMPRADOR_EMAIL = :COMPRADOR_EMAIL WHERE COMPRADOR_ID = :COMPRADOR_ID";
        $update = $this->con->prepare($sql);
        $update->bindValue(':COMPRADOR_ID', $id);
        $update->bindValue(':COMPRADOR_EMAIL', $email);

        try {
            $update->execute();

?>
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Registro',
                    text: 'Alterado com sucesso',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>

        <?php
            //header('Refresh: 3.5; url=home.php?p=cliente/');

        } catch (\Throwable $th) {

        ?>
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Erro',
                    text: 'ao alterar registro, entre em contato com o administrador',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>



        <?php
           // header('Refresh: 3.5; url=home.php?p=cliente/');
        }

        
    }

    public function primeiroAcesso(ClassComprador $ClassComprador)
    {

        $sql = "SELECT  * FROM `comprador` WHERE  `COMPRADOR_EMAIL`= :COMPRADOR_EMAIL";
        $select = $this->con->prepare($sql);

        $select->bindValue(':COMPRADOR_EMAIL', $ClassComprador->getEmail());
        $select->execute();

        if ($select->fetch(PDO::FETCH_ASSOC)) {

            $sql2 = "UPDATE `comprador` SET  COMPRADOR_ACESSO = :COMPRADOR_ACESSO, COMPRADOR_SENHA =:COMPRADOR_SENHA WHERE COMPRADOR_EMAIL = :COMPRADOR_EMAIL";
            $update = $this->con->prepare($sql2);
            $update->bindValue(':COMPRADOR_EMAIL', $ClassComprador->getEmail());
            //$update->bindValue(':COMPRADOR_STATUS',  $status);
            $update->bindValue(':COMPRADOR_ACESSO', 'S');
            $update->bindValue(':COMPRADOR_SENHA', $ClassComprador->getNovasenha());
            $update->execute();
        } else {
        }
        $comprador = new CompradorDAO();
        $comprador->logFist($ClassComprador);

        header('Location: ../php/login.php');
    }
    public function esquecisenha($email)
    {
        $senha = new GerarSenha();
        $rash = $senha->senha();

        $sql = "UPDATE `comprador` SET COMPRADOR_SENHA = :COMPRADOR_SENHA where COMPRADOR_EMAIL =:COMPRADOR_EMAIL";
        $update = $this->con->prepare($sql);
        $update->bindValue(':COMPRADOR_EMAIL', $email);
        $update->bindValue(':COMPRADOR_SENHA', md5($rash));
        
        try {
            $update->execute();
                  
        if ($update->rowCount()) {

            $redefinir = new RedefinirSenhaEmail();
            $redefinir->redefinir($email, $rash);

        ?>
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Sua senha foi redefinida',
                    text: 'Por favor verifique seu e-mail',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>";
        <?php
        } else {
        ?>
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'E-mail não cadastrado',
                    text: 'Informe um e-mail válido',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>";
        <?php
        }
        } catch (\Throwable $th) {
           
        }

    }


    public function alterandoSenha($email, $senha, $novasenha)
    {


        $sql = "SELECT * FROM `comprador` WHERE COMPRADOR_EMAIL =:COMPRADOR_EMAIL AND COMPRADOR_SENHA =:COMPRADOR_SENHA";
        $select = $this->con->prepare($sql);
        $select->bindValue(':COMPRADOR_EMAIL', $email);
        $select->bindValue(':COMPRADOR_SENHA', md5($senha));
        $select->execute();

        if ($select->fetch(PDO::FETCH_ASSOC)) {


            $sql = "UPDATE `comprador` SET COMPRADOR_SENHA = :COMPRADOR_SENHA where COMPRADOR_EMAIL =:COMPRADOR_EMAIL";
            $update = $this->con->prepare($sql);
            $update->bindValue(':COMPRADOR_EMAIL', $email);
            $update->bindValue(':COMPRADOR_SENHA', md5($novasenha));
            $update->execute();

            echo " <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Sucesso',
                        text: 'Sua senha foi alterada',
                        showConfirmButton: false,
                        timer: 3500
                    })
                    setInterval(document.location.href = 'https://carboxigases.com/carboxi_sistema/app/php/login.php', 5000);
                    </script>";
        } else {
        }
    }

    public function ClienteProduto($cnpj)
    {
        $sql = "SELECT * FROM `comprador` INNER join cliente_produto on cli_pro_cnpj = COMPRADOR_CNPJ WHERE CLIENTE_CNPJ = :CLIENTE_CNPJ";
        $select = $this->con->prepare($sql);
        $select->bindValue(':CLIENTE_CNPJ', $cnpj);
        $select->execute();
        $dados = array();
        if ($row = $select->fetch(PDO::FETCH_ASSOC)) {

            $dados = array(

                'produto' => $row['cli_pro_produto'],


            );
        }

        return $dados;
    }


    public function inativarComprador($id)
    {

        $sql2 = "UPDATE `comprador` SET `COMPRADOR_STATUS`=:COMPRADOR_STATUS WHERE `COMPRADOR_ID`=:COMPRADOR_ID";
        $update = $this->con->prepare($sql2);
        $update->bindValue(':COMPRADOR_ID', $id);
        $update->bindValue(':COMPRADOR_STATUS', 'Inativo');

        try {

        ?>
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Registro',
                    text: 'Inativado com sucesso',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>



        <?php


        } catch (\Throwable $th) {

        ?>
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Erro',
                    text: 'ao Inativa o registro, entre em contato com o administrador',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>



        <?php
        }

        $update->execute();
    }

    public function log($ClassComprador)
    {

        $strm = "INSERT INTO `log`(`log_id`, `log_comprador`, `log_data`, `log_status`) VALUES (null, :log_comprador, :log_data, :log_status)";
        $insert = $this->con->prepare($strm);
        $insert->bindValue(':log_comprador', $ClassComprador->getEmail());
        $insert->bindValue(':log_data', date('Y-m-d'));
        $insert->bindValue(':log_status', 'N');

        try {
            $insert->execute();
        ?>

            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Registro salvo com sucesso',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>

<?php
            header('Refresh: 3.5; url=home.php?p=cliente/');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function logFist($ClassComprador)
    {

        $smtp = "UPDATE `log` SET `log_status`= :log_status WHERE  `log_comprador` = :log_comprador";
        $update = $this->con->prepare($smtp);
        $update->bindValue(':log_status', 'S');
        $update->bindValue(':log_comprador', $ClassComprador->getEmail());
        $update->execute();
    }
}
