<?php


include __DIR__ . '/../init.php';



if (isset($_REQUEST['assign_agents'])) {

    $agentId = trim($_POST['agent_id']);
    $ticketNumber = trim($_POST['ticket_number']);

    $ticket = new Tickets();


    $ticket->assign_ticket_to_agent($ticketNumber, $agentId);
    echo 'SUCCESS';
    return;
}
