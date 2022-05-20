<?php

include __DIR__ . '/../init.php';

if (isset($_REQUEST['chats'])) {

    $messenger = new Messenger();



    $sender = $messenger->post('sender_id');
    $reciever = $messenger->post('reciever_id');
    $ticket_number = $messenger->post('ticket_number');
    $text = $messenger->post('msg_text');
    #img chat
    $img = $messenger->uploads('msg_img');


    if ($img) {
        $photo_url =   $messenger->upload_file($img, __DIR__ . '/../../assets/media/photos/messaging');
    }


    $data = [
        ':ticket_number' => $ticket_number,
        ':sender_id' => $sender,
        ':reciever_id' => $reciever,
    ];

    if ($text) {
        $data[':text_chat'] = $text;
    }

    if ($img) {
        $data[':image_chat'] = $photo_url;
    }

    $messenger->insert_chats($data);

    echo 'SUCCESS';
    return;
}
