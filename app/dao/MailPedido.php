<?php 
include_once "../class/ClassProduto.php";


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require_once "../vendor/autoload.php";

//Instantiation and passing `true` enables exceptions

class OrçamentoMAIL{
    
    public function emailOrçamento($orçamento, $data, $cliente, $produto,$quantidade, $sap )
    {

        $mail = new PHPMailer(true);
try {
    //Server settings
    //$mail->SMTPDebug = 1;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->SMTPSecure = 'SSL';  // SSL REQUERIDO pelo GMail
    $mail->Username   = 'luizfernandoluck@gmail.com';                     //SMTP username
    $mail->Password   = 'root36482681';                               //SMTP password
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('luizfernandoluck@gmail.com', 'CARBOXI');
    $mail->addAddress('rhuan.v@progride.com.br', 'destinatalho');     //Add a recipient $contatoemail
    // $mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Seu Pedido realizado com sucesso";    // titulo da mensagem exibida 
    $mail->Body    = '<div>

    <div style="background-color: #136132; text-align: center">
        <img style="background-color: #136132; text-align: justify;" src="../img/LOGO carboxi gases original.png" alt="" width="120" height="50">
    </div>
    <div style="text-align: justify; text-align: center">
        <p style="margin-left: 150px;">CADASTRO REALIZADO COM SUCESSO</p>
        <p>Olá Seja bem-vindo a <strong>CARBOXI</strong> Esperamos que encontre tudo o que você deseja,com melhores preços e condições de pagamento.</p>
    </div>
    <div style="text-align: justify; text-align: left; background-color: #FF5E14;color:#fff;">
        <p>Em caso de dúvidas entre em contato conosco:</p>
        <p>Telefone: </p>
        <p>Atenciosamente</p>
        <p>CARBOXI</p>
    </div>

</div>';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    //echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
 
    }
    
}
