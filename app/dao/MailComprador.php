<?php 

include_once "../class/ClassComprador.php";

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require_once "../vendor/autoload.php";

class CompradorEmail{

    public function emailComprador($ClassComprador){

        
      

        $mail = new PHPMailer(true);

        try {
         //Server settings
            //$mail->SMTPDebug = 1;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'mail.carboxigases.com';                     //Set the SMTP server to send through HOTMAIL -> "smtp.live.com" GMAIL -> "smtp.gmail.com"
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->SMTPSecure = 'SSL';  // GMAIL -> "SSL" REQUERIDO pelo GMail  HOTMAIL -> TLS
            $mail->Username   = 'portal@carboxigases.com';                     //SMTP username
            $mail->Password   = 'pr0gr!d@2021';                               //SMTP password
            //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            //Recipients
            $mail->setFrom('portal@carboxigases.com', 'CARBOXI');
            $mail->addAddress($ClassComprador->getEmail(), 'destinatalho');     //Add a recipient $contatoemail
            // $mail->addAddress('ellen@example.com');               //Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
            //Content
            $mail->CharSet = 'utf-8';
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = "Cadastro de compradores";    // titulo da mensagem exibida 
            $mail->Body    = '<!DOCTYPE html>
            <html lang="pt-br">
            
            <head>

            </head>
            
            <body style="margin-left: 200px; margin-right:200px;">
            
                <div class="container">
                    <div class="row" style="background-color: #136132; border-radius: 30px 30px 0px 0px;">
            
                        <div class="input-group mb-3" style="margin-left: 20px; margin-top: 40px;">
                            <img src="http://carboxigases.agenciaprogride.com.br/wp-content/uploads/2021/07/Design-sem-nome-24.png" width="190px" height="160px">
                        </div>
                    </div>
                    
            
                    <div class="row" style="margin-top: 150px; text-align: center;">
                        <div class="col-sm">
                            <div>
                                <h1 class="font-weight-light" style="font-weight:Arial;">Seja bem-vindo ao Portal de Vendas da CARBOXI.</h1>
                                <h3 class="font-weight-light">Olá, <b style="color:#136132;">' . $ClassComprador->getNome() . '</b> você foi cadastrado no sistema de compras da Carboxi.</h3>
                                <h3 class="font-weight-light">Para efetuar o primeiro acesso  <a href="https://carboxigases.com/carboxi_sistema/app/php/acesso.php?email='.$ClassComprador->getEmail().'&senha='.$ClassComprador->getSenha().'"> click no link </a> para definir uma senha.</h3>
                            </div>
                        </div>
                    </div>
            
                </div>
                
               
                <div>
                
                    <div class="row" style="text-align: center;">
                            <p style="color:#fff;"> Desenvolvido por Progride ®</p>           
                    </div>
                </div>
            
            </body>
            
            </html>';
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            //echo 'Message has been sent';   

        }catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

}

?>