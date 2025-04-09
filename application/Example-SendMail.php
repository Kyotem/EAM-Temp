<?php

// This is an example I made on how to use PHPMailer, I presume everything shown in here is self-explanatory.
// If this code is eventually used on the production environment, be sure to disable debugging and make sure error logs do not show any sensitive information to the end-user!

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function sendMail()
{

    $mail = new PHPMailer;

    /*
    (Use 3 in dev, 0 in Prod)
    SMTPDebug levels:
    0 = off
    1 = client
    2 = client + server
    3 = client + server + connection
    */
    $mail->SMTPDebug = 3;

    $mail->isSMTP();
    $mail->SMTPAuth = false;
    $mail->Port = 21031; // SMTP port = 21000 + group number
    $mail->Host = 'mail.ip.aimsites.nl';

    // Only setting up a basic template here, refer to the PHPMailer documentation for more functions
    $mail->setFrom('no-reply@EenmaalAndermaal.nl', 'EenmaalAndermaal');

    $mail->CharSet = 'UTF-8';
    $mail->isHTML(true);

    $mail->Subject = 'Subject'; // Set subject of the mail
    // Use `<<< EOT <body> EOT;` to keep HTML indentation!
    $mail->Body = <<<EOT
    This is the HTML message body <b>in bold!</b>
    <ol>
        <li>Item 1</li>
        <li>Item 2</li>
    </ol>
    EOT; // Body of mail in HTML
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; // Body of mail in plaintext


    // Attempts to send the mail
    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo; // !! Make sure to NOT print this on PRODUCTION !!
    } else {
        echo 'Message has been sent';
    }
}

