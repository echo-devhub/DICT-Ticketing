<?php






use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require __DIR__ . '/vendor/autoload.php';


$mail = new PHPMailer(true);


try {
    //Server settings
    # $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'jerickorubioOfficial@gmail.com';                     //SMTP username
    $mail->Password   = 'jerickorubioofficial2022';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;

    //Recipients
    # from
    $mail->setFrom('jerickorubioOfficial@gmail.com', 'Mailer');
    #to
    $mail->addAddress('jerickorubiodev@gmail.com', 'Joe User');     //Add a recipient

    //Content
    # $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'Your code is ' . 000234;
    #$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
} catch (\Throwable $th) {
    //throw $th;
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
