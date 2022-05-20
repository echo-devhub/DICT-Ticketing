<?php


include __DIR__ . '/../init.php';

$logUser->remove_active();

session_start();

session_destroy();
$_SESSION = [];
redirect_page('../../index.php');
