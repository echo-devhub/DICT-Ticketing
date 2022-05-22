<?php



//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\OAuth;
//Alias the League Google OAuth2 provider class
use League\OAuth2\Client\Provider\Google;

require __DIR__ . '/vendor/autoload.php';






// $redirectUri = 'http://localhost/ticketing/vendor/phpmailer/phpmailer/get_oauth_token.php';
// $clientId = '764910740809-t9j5r25a22ao3l3bqguf6r0j8ph4gah3.apps.googleusercontent.com';
// $clientSecret = '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';
// $refreshToken = '1//0eEwgW23hCG-gCgYIARAAGA4SNwF-L9Irf7JTnZHKoK_ST44I7r4szWADX2i144yfYYtvjkwWRbB7_J4vFh7bQtKRChjXpN61qQE';
// $mail = new PHPMailer(true);

// try {
//Server settings
// # $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
// $mail->isSMTP();                                            //Send using SMTP
// $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
// $mail->Port       = 465;

// $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
// $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
// $mail->AuthType = 'XOAUTH2';

// $email = 'dictregion4b@gmail.com';
// $clientId = '764910740809-t9j5r25a22ao3l3bqguf6r0j8ph4gah3.apps.googleusercontent.com';
// $clientSecret = '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';
// $refreshToken = '1//0eEwgW23hCG-gCgYIARAAGA4SNwF-L9Irf7JTnZHKoK_ST44I7r4szWADX2i144yfYYtvjkwWRbB7_J4vFh7bQtKRChjXpN61qQE';

// //Create a new OAuth2 provider instance
// $provider = new Google(
//     [
//         'clientId' => $clientId,
//         'clientSecret' => $clientSecret,
//     ]
// );

//Pass the OAuth provider instance to PHPMailer
// $mail->setOAuth(
//     new OAuth(
//         [
//             'provider' => $provider,
//             'clientId' => $clientId,
//             'clientSecret' => $clientSecret,
//             'refreshToken' => $refreshToken,
//             'userName' => $email,
//         ]
//     )
// );


//Set who the message is to be sent from
//For gmail, this generally needs to be the same as the user you logged in as
// $mail->setFrom($email, 'MISS SUPPORT');

//Set who the message is to be sent to
// $mail->addAddress('jerickorubiodev@gmail.com', 'Customer');

//Set the subject line
// $mail->Subject = 'PHPMailer GMail XOAUTH2 SMTP test';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
// $mail->CharSet = PHPMailer::CHARSET_UTF8;
// $mail->msgHTML(file_get_contents('contentsutf8.html'), __DIR__);

//Replace the plain text body with one created manually
// $mail->Body  = 'Your Ticket number is: ' . 8354214;
//Content
// $mail->isHTML(true);                                  //Set email format to HTML
// $mail->Subject = 'Here is the subject';
// $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

//Attach an image file
// $mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
//     if (!$mail->send()) {
//         echo 'Mailer Error: ' . $mail->ErrorInfo;
//     } else {
//         echo 'Message sent!';
//     }
// } catch (\Throwable $th) {
//     //throw $th;
//     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// }


function send_email($to, $subject, $message, $is_html = false)
{

    $mail = new PHPMailer(true);

    try {
        //Server settings
        # $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->Port       = 465;

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->AuthType = 'XOAUTH2';

        $email = 'dictregion4b@gmail.com';
        $clientId = '764910740809-t9j5r25a22ao3l3bqguf6r0j8ph4gah3.apps.googleusercontent.com';
        $clientSecret = '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';
        $refreshToken = '1//0eEwgW23hCG-gCgYIARAAGA4SNwF-L9Irf7JTnZHKoK_ST44I7r4szWADX2i144yfYYtvjkwWRbB7_J4vFh7bQtKRChjXpN61qQE';

        //Create a new OAuth2 provider instance
        $provider = new Google(
            [
                'clientId' => $clientId,
                'clientSecret' => $clientSecret,
            ]
        );

        //Pass the OAuth provider instance to PHPMailer
        $mail->setOAuth(
            new OAuth(
                [
                    'provider' => $provider,
                    'clientId' => $clientId,
                    'clientSecret' => $clientSecret,
                    'refreshToken' => $refreshToken,
                    'userName' => $email,
                ]
            )
        );


        //Set who the message is to be sent from
        //For gmail, this generally needs to be the same as the user you logged in as
        $mail->setFrom($email, 'MISS SUPPORT');

        //Set who the message is to be sent to
        $mail->addAddress($to, 'Customer');

        //Set the subject line
        // $mail->Subject = 'PHPMailer GMail XOAUTH2 SMTP test';

        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        // $mail->CharSet = PHPMailer::CHARSET_UTF8;
        // $mail->msgHTML(file_get_contents('contentsutf8.html'), __DIR__);

        //Replace the plain text body with one created manually
        // $mail->Body  = 'Your Ticket number is: ' . 8354214;
        //Content

        //Set email format to HTML
        if ($is_html) {
            $mail->isHTML(true);
        }


        $mail->Subject = $subject;
        $mail->Body    = $message;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        //Attach an image file
        // $mail->addAttachment('images/phpmailer_mini.png');

        //send the message, check for errors
        if ($mail->send()) {
            return 'Email sent';
        }

        return 'Email not Sent';
    } catch (\Throwable $th) {
        //throw $th;
        return 'Error while sending';
    }
}



// echo send_email('jerickorubiodev@gmail.com', 'sample', 'Hi');


function randomPassword()
{
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

echo randomPassword();
