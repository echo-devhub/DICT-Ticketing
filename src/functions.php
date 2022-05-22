<?php

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\OAuth;
//Alias the League Google OAuth2 provider class
use League\OAuth2\Client\Provider\Google;

require __DIR__ . '/../vendor/autoload.php';

// get pages dynamically
function get_pages($fileName, $dir, $default = 'error')
{

    // php file extention 
    $extention = '.php';

    $path = $dir . $fileName . $extention;


    // check if the file exist in page dir and include it 
    if (!file_exists($path)) {

        //else return the default home destination
        return $dir . $default . $extention;
    }

    return $path;
}

// redirect page 
function redirect_page($location)
{
    header("Location: $location");
    exit();
}


#return true if there is no error message 
function no_errors($errors)
{
    return count($errors) === 0;
}


#set error message
function set_error(&$errors, $name, $error = 'This field is required'): void
{
    $errors[$name] = $error;
}

#get input
function get_error(&$errors, $name): mixed
{
    return isset($errors[$name]) ? $errors[$name] : null;
}



#set input
function set_input(&$inputs, $name, $value): void
{
    $inputs[$name] = $value;
}



#get input
function get_input(&$inputs, $name): mixed
{
    return isset($inputs[$name]) ? $inputs[$name] : null;
}




#upload file and return the name of the file being uploaded on success
function upload_file(array $file, $dir = null): string
{
    $file_name = $file['name'];

    $extention =
        pathinfo($file_name, PATHINFO_EXTENSION); // get file extension

    // add random string name
    $hash_name = uniqid('DICT_', true) . ".$extention";

    $tmp_name = $file['tmp_name'];

    if (move_uploaded_file($tmp_name, $dir . "/$hash_name")) {
        return $hash_name;
    }
}


#return true if email is valid
function is_email($email)
{
    $sanitized_email = filter_var($email, FILTER_SANITIZE_EMAIL);
    return filter_var($sanitized_email, FILTER_VALIDATE_EMAIL);
}


function validPasswordLeng($password)
{
    return strlen($password) >= 8;
}


function show_status($status, $name)
{

    $result = '';
    $class = '';

    switch ($status) {
        case 'added':
            $result = "New $name successfully Added";
            $class = 'primary';
            break;

        case 'updated':
            $result = "$name successfully updated";
            $class = 'success';
            break;

        case 'deleted':
            $result = "$name successfully deleted";
            $class = 'danger';
            break;
    }

    return "<div class='alert alert-{$class} alert-dismissible'>
             {$result}
         <button class='btn-close' data-bs-dismiss='alert'></button>
     </div>";
}



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
        $mail->addAddress($to);

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
            return true;
        }

        return false;
    } catch (\Throwable $th) {
        //throw $th;
        return false;
    }
}


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
