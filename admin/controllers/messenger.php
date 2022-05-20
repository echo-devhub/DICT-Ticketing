<?php


$messenger = new Messenger();
$ticket = new Tickets();
$agent = new Agent();

$user = new User();

$customer = new Customer();


$tknumber = $ticket->get('tknumber');

if (!$tknumber) die('ERROR 404 NOT FOUND!');


$ticket_information = $ticket->ticket_information($tknumber);
$agent_information = $agent->get_agent_by_id($ticket_information['agent_id']);




$users_assigned_tickets = $ticket->users_assigned_tickets($ticket_information['agent_id']);


// echo '<pre>';
// print_r($ticket_information);
// echo '</pre>';


// UPDATE TICKET STATUS
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $statusId = $ticket->post('status');


    if ($statusId) {
        $ticket->update_ticket_status($ticket_information['ticket_number'], $statusId);
        redirect_page($_SERVER['REQUEST_URI']);
    }
}

    // echo '<pre>';
    // print_r($last_chat);
    // echo '</pre>';
