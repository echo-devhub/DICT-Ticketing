<?php


include __DIR__ . '/../init.php';



if (isset($_REQUEST['assign_agents'])) {


    $type = $_REQUEST['assign_agents'];

    if ($type == 'request') {

        $assigner = trim($_POST['ticket_assigner']);
        $agentId = trim($_POST['agent_id']);
        $ticketNumber = trim($_POST['ticket_number']);

        $ticket = new Tickets();

        $ticket->assign_ticket_to_agent($ticketNumber, $agentId);
        //UPDATE TICKET STATUS
        $ticket->update_ticket_status($ticketNumber, 2);


        $data = [
            'assigner' => $assigner,
            'agent_id' => $agentId,
            'ticket_number' => $ticketNumber
        ];

        echo json_encode($data);
        return;
    }


    if ($type == 'send_email') {


        $assigner = trim($_REQUEST['assigner']);
        $agentId = trim($_REQUEST['agent_id']);
        $ticketNumber = trim($_REQUEST['ticket_number']);

        // PREPARE SENDING EMAIL TO AGENT
        $agent = new Agent();

        // Admin assigner
        $admin = $agent->get_agent_by_id($assigner);

        $adminName = $admin['first_name'] . ' ' . $admin['last_name'];

        // PREPARE TO SEND EMAIL TO CUSTOMER
        $customer = new Customer();
        $customerInfo = $customer->get_customer_by_ticket($ticketNumber);

        $customerName = $customerInfo['full_name'];
        $to_customer = $customerInfo['email_address'];


        // Agent to assign ticket
        $agentInfo = $agent->get_agent_by_id($agentId);
        $agentName = $agentInfo['first_name'] . ' ' . $agentInfo['last_name'];
        $to_agent = $agentInfo['email_address'];


        // SEND EMAIL TO AGENT
        $agnt_msg = "Hi {$agentName}!\r\n\r\n there's a new ticket assign to you by Admin  
{$adminName}";
        if (!send_email($to_agent, 'Assigned new ticket', $agnt_msg)) {
            echo "Email is not send to agent {$agentName} please try again";
            return;
        }

        //SEND EMAIL TO CUSTOMER
        $customer_msg = "Hi {$customerName}!\r\n\r\n your ticket is now on pending state. ";

        $customer_msg .= "<{$ticketNumber}> Use this code to open your ticket.";

        // SEND EMAIL TO CUSTOMER
        if (!send_email($to_customer, 'MISS SUPPORT - Ticket status', $customer_msg)) {
            echo "Email is not send to customer {$customerName} please try again";
            return;
        }

        return;
    }
}
