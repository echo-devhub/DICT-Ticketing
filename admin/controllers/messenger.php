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


// echo '<pre>';
// print_r(($ticket_information));
// echo '</pre>';


$users_assigned_tickets = $ticket->users_assigned_tickets($ticket_information['agent_id']);


// echo '<pre>';
// print_r($ticket_information);
// echo '</pre>';


// UPDATE TICKET STATUS
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $statusId = $ticket->post('status');


    if ($statusId) {
        $ticket->update_ticket_status($ticket_information['ticket_number'], $statusId);

        // SEND EMAIL TO CUSTOMER ABOUT THE TICKET STATUS
        $customerName = $ticket_information['full_name'];
        $customerEmail = $ticket_information['email_address'];


        $agentName = $agent_information['first_name'] . ' ' . $agent_information['last_name'];


        $newStatus = $ticket->col_real_value('status_id', $statusId, 'status', 'ticket_statuses');

        $msg = "Hi {$customerName}! \r\n\r\n";
        $msg .= "Agent {$agentName} update the status of your ticket to <{$newStatus}>.";
        send_email($customerEmail, 'MISS SUPPORT - Ticket status', $msg);

        redirect_page($_SERVER['REQUEST_URI']);
    }
}

    // echo '<pre>';
    // print_r($last_chat);
    // echo '</pre>';
