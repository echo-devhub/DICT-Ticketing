<?php

#app name
define('APP_NAME', 'MISS SUPPORT CENTER');


#database server configuration
define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DB_NAME', 'ticketing_db');

define('EMAIL', '');

# paths 
include __DIR__ . '/paths.php';



//Import PHPMailer classes into the global namespace
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\OAuth;
//Alias the League Google OAuth2 provider class
// use League\OAuth2\Client\Provider\Google;

// require __DIR__ . '/../vendor/autoload.php';






#boostraper
include __DIR__ . '/../src/bootstrap.php';
