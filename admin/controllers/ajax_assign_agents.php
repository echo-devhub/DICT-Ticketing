<?php


include __DIR__ . '/../init.php';



if (isset($_REQUEST['assign_agents'])) {

    $assigner = trim($_POST['ticket_assigner']);
    $agentId = trim($_POST['agent_id']);
    $ticketNumber = trim($_POST['ticket_number']);

    $ticket = new Tickets();

    $ticket->assign_ticket_to_agent($ticketNumber, $agentId);
    //UPDATE TICKET STATUS
    $ticket->update_ticket_status($ticketNumber, 2);



    // PREPARE SENDING EMAIL TO AGENT
    $agent = new Agent();

    // Admin assigner
    $admin = $agent->get_agent_by_id($assigner);

    $admin_name = $admin['first_name'] . ' ' . $admin['last_name'];


    // Agent to assign ticket
    $agentInfo = $agent->get_agent_by_id($agentId);
    $agnt_name = $agentInfo['first_name'] . ' ' . $agentInfo['last_name'];
    $to_agent = $agentInfo['email_address'];


    // PREPARE TO SEND EMAIL TO CUSTOMER
    $customer = new Customer();
    $customerInfo = $customer->get_customer_by_ticket($ticketNumber);

    $customer_name = $customerInfo['full_name'];
    $to_customer = $customerInfo['email_address'];


    // SEND EMAIL TO AGENT
    $agnt_msg = "Hi {$agnt_name}! there's a new ticket assign to you by Admin <{$admin_name}>.";
    if (!send_email($to_agent, 'Assigned new ticket', $agnt_msg)) {
        echo "Email is not send to agent {$agnt_name} please try again";
        return;
    }

    //SEND EMAIL TO CUSTOMER
    $customer_msg = "Hi {$customer_name}! your ticket is now on pending state. \r\n";

    $customer_msg .= "<{$ticketNumber}> Use this code to open your ticket.";

    // SEND EMAIL TO CUSTOMER
    if (!send_email($to_customer, 'MISS SUPPORT - Ticket status', $customer_msg)) {
        echo "Email is not send to customer {$customer_name} please try again";
        return;
    }

    echo 'SUCCESS';
    return;
}
