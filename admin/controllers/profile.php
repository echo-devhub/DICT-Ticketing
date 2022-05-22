<?php

$userId =  $logUser->get('user_id');

if (!$userId) {
    die();
}

$tickets = new Tickets();


// GET ALL TICKET OF THIS PARTICULAR AGENT
$allTickets = $tickets->users_assigned_tickets($userId);
