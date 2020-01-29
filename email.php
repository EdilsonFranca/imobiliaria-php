<?php
$nome     =$_GET['nome'];
$sobreNome=$_GET['sobreNome'];
$email    =$_GET['email'];
$tell     =$_GET['tell'];
$mensagem =$_GET['mensagem']; 


require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';
require_once 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);
try {
    
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'tls';
  $mail->Username = 'imobiliaria2019martins@gmail.com';
  $mail->Password = '63286144';
  $mail->Port = 587;
   
  $mail->setFrom($email);
  $mail->addAddress('edilson18martins@gmail.com');
  $mail->isHTML(true);
    $mail->Subject = "Email de contato da Ubiras Imobiliaria";
    $mail->Body = "<html>
                     <body>
                           <span> Nome :$nome </span><br> 
                           <span> Sobre Nome :$sobreNome </span><br>
                           <span> Email :$email </span><br>
                           <span> Tell  :$tell </span><br>
                           <span> Mensagem :$mensagem </span>
                      </body>
                 </html>";
    
    if ($mail->send()) {
        header('Location: index.php?enviado=email enviado com sucesso !!!');
    } else {
        echo  "Erro ao enviar mensagem " . $mail->ErrorInfo;
    }
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
die();
?>
