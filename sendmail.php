<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
</head>

<body>
<?php
require 'vendor/autoload.php';
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['objet']);
    $message = htmlspecialchars($_POST['msg']);

    $mail = new PHPMailer(true);

    try {
        // Configuration du serveur SMTP  
        $mail->SMTPDebug = 0; // Désactiver la sortie de débogage verbose pour la production
        $mail->isSMTP(); // Envoyer via SMTP
        $mail->Host       = 'smtp.hostinger.com'; // Paramétrer le serveur SMTP
        $mail->SMTPAuth   = true; // Activer l'authentification SMTP
        $mail->Username   = 'info@malik-dev.tech'; // Nom d'utilisateur SMTP
        $mail->Password   = 'Malikdev123*'; // Mot de passe SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Activer le chiffrement SSL/TLS
        $mail->Port       = 465; // Port TCP à connecter

        // Destinataires
        $mail->setFrom('info@malik-dev.tech', 'Malik Dev'); // Utiliser l'adresse d'authentification
        $mail->addAddress('info@malik-dev.tech'); // Adresse de destination
        $mail->addReplyTo($email, $name); // Ajouter l'adresse de réponse

        // Contenu de l'e-mail
        $mail->isHTML(true); // Définir le format de l'e-mail au format HTML
        $mail->Subject = $subject;
        $mail->Body    = "
        <html>
        <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    line-height: 1.6;
                    color: #333;
                }
                .container {
                    width: 80%;
                    margin: 0 auto;
                    padding: 20px;
                    border: 1px solid #ddd;
                    border-radius: 10px;
                    background-color: #f9f9f9;
                }
                .header, .footer {
                    text-align: center;
                    padding: 10px 0;
                }
                .header {
                    border-bottom: 1px solid #ddd;
                }
                .footer {
                    border-top: 1px solid #ddd;
                    font-size: 12px;
                    color: #777;
                }
                .content {
                    padding: 20px 0;
                }
                .content p {
                    margin: 10px 0;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h2>Contact de Malik Dev</h2>
                </div>
                <div class='content'>
                    <p><strong>Nom :</strong> $name</p>
                    <p><strong>Email :</strong> $email</p>
                    <p><strong>Objet :</strong> $subject</p>
                    <p><strong>Message :</strong></p>
                    <p>$message</p>
                </div>
                <div class='footer'>
                    <p>Merci de nous avoir contacté. Nous vous répondrons dès que possible.</p>
                    <p>&copy; 2024 Malik Dev. Tous droits réservés.</p>
                </div>
            </div>
        </body>
        </html>";

       $mail->send();
        $message = "<div class='email-success'><span class='success-icon'>✔️</span> Le message a été envoyé avec succès.</div>";
    } catch (Exception $e) {
        $message = "<div class='email-error'><span class='error-icon'>❌</span> Le message n'a pas pu être envoyé. Erreur de PHPMailer: {$mail->ErrorInfo}</div>";
    }
    echo $message;
}
?>

</body>
</html>





