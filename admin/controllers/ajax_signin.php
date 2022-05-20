<?php

include __DIR__ . '/../../config/app.php';


$signin = new Signin();


// GET EMAIL && PASSWORD

$email = $signin->post('signin_email');
$pwd = $signin->post('signin_pwd');




if (!$email || !$pwd) {
    echo "Please enter your email and password";
    return;
}


if (!$signin->is_user_exist($email)) {
    echo "User doesnt  exist";
    return;
}


$user = $signin->is_user($email, $pwd);

if ($user->rowCount() === 0) {
    echo 'Wrong username or password';
    return;
}


echo 'SUCCESS';


$user = $user->fetch(PDO::FETCH_ASSOC);

session_start();

$_SESSION['is_signin'] = true;
$_SESSION['id'] = $user['agent_id'];
return;
