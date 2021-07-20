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

class OrçamentoMAIL
{

    public function emailOrçamento($ClassProduto, $emailCliente,$cliente,$tamanho)
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
            $mail->addAddress($emailCliente, 'destinatalho');     //Add a recipient $contatoemail
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
            $mail->Subject = "Seu Pedido realizado com sucesso";    // titulo da mensagem exibida 
            $mail->Body    = '<!DOCTYPE html>
            <html lang="pt-br">
            
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
                <title></title>
            </head>
            
            <body style="margin-left: 200px; margin-right:200px;">
            
                <div class="container">
                    <div class="row" style="background-color: #136132; border-radius: 30px 30px 0px 0px;">
            
                        <div class="input-group mb-3" style="margin-left: 20px; margin-top: 40px;">
                            <img src="http://carboxigases.agenciaprogride.com.br/wp-content/uploads/2021/07/gary.png" width="190px" height="160px">
                        </div>
                    </div>
                    <hr style="background-color: #FF5E14; border-top: 8px solid #FF5E14; margin-top:0px">
            
                    <div class="row" style="margin-top: 150px; text-align: center;">
                        <div class="col-sm">
                            <div>
                                <h1 class="font-weight-light" style="font-weight:Arial;">Seja bem-vindo ao Portal de Vendas da CARBOXI.</h1>
                                <h3 class="font-weight-light">Olá, ' . $cliente . ' seu pedido foi realizado com sucesso.</h3>';


                                for($i=0; $i< $tamanho; $i++ ){

                                  echo " Produto: ".$ClassProduto->getProduto()." Quantidade: ".$ClassProduto->getQuantidade()."<br>";

                                }
                                
                           '</div>
                        </div>
                    </div>
            
                </div>
                
                <hr style="background-color: #FF5E14; border-top: 8px solid #FF5E14;position: relative; margin-bottom:0px;margin-top: 200px;">
                <div class="container" style="background-color:#136132; bottom:0px; padding:50px; position: relative; border-radius: 0px 0px 30px 30px;">
                
                    <div class="row" style="text-align: center;">
                            <p style="color:#fff;"> Desenvolvido por Progride ®</p>           
                    </div>
                </div>
            
            </body>
            
            </html>';
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            //echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
       
    }
}
