<?php

include __DIR__ . '/../../config/app.php';

// include APP_ADMIN_INCLUDE_CONTROLLER . '/customer-messenger.php';

if (isset($_REQUEST['chats'])) {

    $messenger = new Messenger();

    $sender =  $messenger->get('sender');
    $reciever = $messenger->get('reciever');
    $ticketNumber = $messenger->get('ticketNumber');


    $agent_img = $messenger->get_col_by_id('agent_id', $reciever, 'agents')['photo'];

    $agent = $messenger->get_col_by_id('agent_id', $reciever, 'agents');


    $chats = $messenger->get_chats($ticketNumber, $sender, $reciever);
    $output = '';


    $output .= '';

    echo '<div class="profile">
        <div class="photo">
            <img src="../../assets/media/photos/uploaded/' . $agent['photo'] . '" alt="">
        </div>

        <h6 class="text-center">' . $agent['first_name'] . ' ' . $agent['last_name'] . '</h6>
        <h6 class="text-center">' . $agent['user_role'] . '</h6>
    </div>';

    if (count($chats) > 0) :

        include APP_INCLUDE_COMPONENT . '/-chats.php';

    else :
        $output .= '<div class="alert">
    <h1 class="display-3 text-center text-secondary">No conversation <i class="fa-solid fa-comment-dots text-primary"></i></h1>
</div>';


    endif;

    echo $output;
}
