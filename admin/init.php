<?php include __DIR__ . '/../config/app.php';

session_start();

if (!isset($_SESSION['is_signin']) && $_SESSION['is_signin'] !== true) {
    redirect_page('../index.php');
}

$logUser = new User();

// $logUser->set_id($_SESSION['id']);

$currentUser = $logUser->informaton($_SESSION['id']);

// SET ACTIVE STATUS OT CURRENT USER LOGIN
$logUser->set_active();
