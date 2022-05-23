<?php

include __DIR__ . '/../../config/app.php';

$tickets = new Tickets();


$email = $tickets->post('open_ticket_email');
$number = $tickets->post('open_ticket_number');

if (!$email || !$number) {
    echo 'All field is required';
    return;
}


$foundTickets  = $tickets->customer_ticket_information($email, $number);

if ($foundTickets->rowCount() <= 0) {
    echo 'Ticket doesnt exist';
    return;
}


$ticket = $foundTickets->fetch(PDO::FETCH_ASSOC);

// CHECK if ticket is already assign
if (!$ticket['agent_id']) {
    echo 'Your ticket is currently on process. Please try again later.';
    return;
}

// CHECK if ticket is already assign
if ($ticket['status'] === 'Closed') {
    echo 'Your ticket is now closed and you cannot open it anymore.';
    return;
}


session_start();

$_SESSION['ticket'] = [
    'ticket_information' => $ticket,
    'is_open_ticket' => true
];

echo 'SUCCESS';
return;
