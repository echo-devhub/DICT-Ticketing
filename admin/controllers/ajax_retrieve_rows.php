<?php

include __DIR__ . '/../init.php';


if (isset($_REQUEST['agents'])) {

    $agent = new Agent();

    echo json_encode($agent->agents($currentUser['email_address']));
}

if (isset($_REQUEST['agents_list'])) {

    $agent = new Agent();

    echo json_encode($agent->all_agents());
}



if (isset($_REQUEST['category_id'])) {
    $ticket = new Tickets();

    $json = $ticket->get_category_by_id($_REQUEST['category_id']);

    echo json_encode($json);
}

if (isset($_REQUEST['chart'])) {

    $dashboard = new Dashboard();

    echo json_encode($dashboard->generate_chart_data());
}


if (isset($_REQUEST['request-profile'])) {
    $agent = new Agent();

    echo json_encode($agent->get_row_where('agent_id', $_REQUEST['request-profile']));
}


if (isset($_REQUEST['get-user-role'])) {
    $agent = new Agent();

    echo json_encode($agent->get_row_where('agent_id', $_REQUEST['get-user-role']));
}


if (isset($_REQUEST['chats'])) {
    $messenger = new Messenger();

    $sender =  $messenger->get('sender');
    $reciever = $messenger->get('reciever');
    $ticketNumber = $messenger->get('ticketNumber');

    $chats = $messenger->get_chats($ticketNumber, $sender, $reciever);
    $output = '';

    $customer = $messenger->get_col_by_id('customer_id', $reciever, 'customers');

    echo '<div class="profile">
        <div class="photo">
            <img src="../assets/media/photos/built_in/avatar.png" alt="">
        </div>

        <h1 class="display-4 text-center">' . $customer['full_name'] . '</h1>
        <h6 class="text-center">Customer</h6>
    </div>';

    if (count($chats) > 0) :

        include APP_ADMIN_INCLUDE_COMPONENT . '/-chats.php';

    else :
        $output .= '<div class="alert">
    <h6 class="display-6 text-center text-secondary">Start conversation <i class="fa-solid fa-comment-dots"></i></h6>
</div>';

    endif;

    echo $output;

    return;
}

if (isset($_REQUEST['customers'])) {

    $ticket_number = $_REQUEST['ticket_number'];
    $sender = $_REQUEST['sender'];
    $reciever = $_REQUEST['reciever'];


    $tickets = new Tickets();

    $messenger = new Messenger();



    $output = '';

    $users_assigned_tickets = $tickets->users_assigned_tickets($sender);





    $all_tickets =  $logUser->is_admin() ? $tickets->all_tickets()
        : $users_assigned_tickets;

    foreach ($all_tickets as $ticket) {
        $last_chat = $messenger->get_last_chat($ticket['ticket_number'], $ticket['agent_id'], $ticket['customer_id']);

        $output_last_msg = '';



        if ($last_chat) {
            if (!$last_chat['image_chat'] && $last_chat['text_chat']) {
                $output_last_msg = $ticket['agent_id'] == $last_chat['sender_id'] ? 'You: ' . $last_chat['text_chat'] : $last_chat['text_chat'];
            } elseif (!$last_chat['text_chat'] && $last_chat['image_chat']) {
                $output_last_msg = $ticket['agent_id'] == $last_chat['sender_id'] ? 'You: Send a photo' : 'Send a photo';
            } elseif ($last_chat['image_chat'] && $last_chat['text_chat']) {
                $output_last_msg = $ticket['agent_id'] == $last_chat['sender_id'] ? 'You: ' . $last_chat['text_chat'] : $last_chat['text_chat'];
            }
        }

        $output_last_msg = strlen($output_last_msg) <= 27 ? $output_last_msg : substr($output_last_msg, 0, 28) . '...';

        if ($ticket_number === $ticket['ticket_number']) {
            $output .= '<a href="?tknumber=' . $ticket['ticket_number'] . '" class="border-0 d-flex flex-column list-group-item list-group-item-action ' . ($ticket_number == $ticket['ticket_number'] ? 'active_link' : '') . '">
            <h6 class="fs-5 text-primary"><span> ' . $tickets->col_real_value('customer_id', $reciever, 'full_name', 'customers') . '</span></h6>
            <small class="mb-0 fw-bold">' . $output_last_msg . '</small>
            <small class="date fw-normal">' . date('l, F d, Y', strtotime($ticket['create_at'])) . '</small>
        </a>';
        }
    }



    echo $output;
}
