<?php

include __DIR__ . '/config/app.php';

session_start();

session_destroy();
$_SESSION['ticket_information'] = null;
redirect_page('./index.php');
