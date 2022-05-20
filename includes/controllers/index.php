<?php
session_start();


if (isset($_SESSION['is_signin']) && $_SESSION['is_signin'] === true) {
    redirect_page('./admin/index.php');
}

if (isset($_SESSION['ticket']) && $_SESSION['ticket']['is_open_ticket'] === true) {
    redirect_page('./admin/customer/messenger.php');
}


$ticket = new Tickets();
