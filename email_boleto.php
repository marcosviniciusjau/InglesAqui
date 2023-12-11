<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Controller\ApostilasController;
require 'vendor/autoload.php';

$mail = new PHPMailer(true); 

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'marcosviniciusjahu@gmail.com';
    $mail->Password   = 'mgtq hdvv xzdi fugr';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('marcosviniciusjahu@gmail.com', 'Marcos Vinicius');
    $mail->addAddress($email, $fullName);
    $mail->Subject = mb_encode_mimeheader('Falta pouco para concluir sua compra com boleto! ');
     $mail->isHTML(true);
     
    $mail->Body    = "
<html>
<head> <style>
                   @font-face {
                        font-family: 'Forum', serif;
                        src: url('https://fonts.googleapis.com/css2?family=Forum&display=swap');
                        font-family: 'Forum', serif;
                        src: url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
                    }
                    body {
                        background:url(/View/Imagens/fundo_celular.png);
                    }
                    h1{
                       font-family: 'Forum', serif;
                        src: url('https://fonts.googleapis.com/css2?family=Forum&display=swap');
                    }
                     h2 {
                        font-weight: bold; 
                       font-family: 'Forum', serif;
                        src: url('https://fonts.googleapis.com/css2?family=Forum&display=swap');
                    }
                    p {
                        src:url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
                    }
                </style></head>
<body>
    <h1>Olá $fullName</h1>
    
    <p>Falta pouco para concluir sua compra! 🚀</p>
    <h2> Copie esse código de barras no app do seu banco: $id</h2>
   
    <h3> Ou baixe nesse link: <a href='$model'>Link Boleto</a></h3>
   
 
    <h4>Atenciosamente,<br>Equipe do Inglês Aqui</h4>
</body>
</html>
";
    $mail->send();
    echo 'E-mail enviado com sucesso!';
} catch (Exception $e) {
    echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
}
?>
