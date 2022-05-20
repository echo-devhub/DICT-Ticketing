<?php
session_start();

if (!isset($_SESSION['ticket']) || $_SESSION['ticket']['is_open_ticket'] !== true) {
    redirect_page('../../index.php');
}

$messenger = new Messenger();
$ticket = new Tickets();
$agent = new Agent();

$user = new User();

$customer = new Customer();



$ticket_information = $_SESSION['ticket']['ticket_information'];

// check if the ticket is already assign else redirect to 

// AGENT INFORMATION
$agent_information = $agent->get_agent_by_id($ticket_information['agent_id']);


// is already assign
$has_agent = $agent_information ? true : false;

// echo '<pre>';
// print_r($ticket_information);
// echo '</pre>';
