<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Certifique-se de que este caminho está correto

// Verifique se os dados foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor
        $mail->isSMTP();                                      // Defina o uso de SMTP
        $mail->Host = 'smtp.example.com';                     // Especifique o servidor de e-mail
        $mail->SMTPAuth = true;                               // Ative a autenticação SMTP
        $mail->Username = 'your_email@example.com';          // Seu endereço de e-mail
        $mail->Password = 'your_password';                    // Sua senha de e-mail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Ative a criptografia TLS
        $mail->Port = 587;                                   // Porta TCP para o TLS

        // Destinatários
        $mail->setFrom('your_email@example.com', 'Nexus SoftTech'); // Seu endereço de e-mail
        $mail->addAddress('nexussofttech@proton.me'); // Destinatário

        // Conteúdo do e-mail
        $mail->isHTML(true);                                  // Defina o formato do e-mail como HTML
        $mail->Subject = $_POST['subject'];
        $mail->Body    = '<strong>Mensagem:</strong> ' . nl2br($_POST['message']);
        $mail->AltBody = $_POST['message'];

        $mail->send();
        echo 'Mensagem enviada com sucesso';
    } catch (Exception $e) {
        echo "Mensagem não pôde ser enviada. Erro: {$mail->ErrorInfo}";
    }
}
?>
