<?php

include __DIR__ . '/../../config/app.php';


if (isset($_REQUEST['create_ticket'])) {

    $ticket = new Tickets();


    $name = $ticket->post('name');
    $email = $ticket->post('email');
    $category = $ticket->post('category');
    $priority = $ticket->post('priority');
    $description = $ticket->post('description');
    // img
    $photo = $ticket->uploads('photo');


    if (!$name || !$email || !$category || !$priority || !$description) {
        echo 'All field is required';
        return;
    }


    if (!$ticket->is_email('email')) {
        echo 'Email is not valid';
        return;
    }


    // validate photo format
    if ($photo) {
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png", "PNG" => "image/PNG");

        $file_name = $photo['name'];
        $file_type = $photo['type'];
        $file_size = $photo['size'];



        // check if extension is valid
        $extention = pathinfo($file_name, PATHINFO_EXTENSION);

        if (!array_key_exists($extention, $allowed)) {
            echo  'File format is not valid';
            return;
        }

        // check image size
        $maxsize = 5 * 1024 * 1024;
        if (
            $file_size > $maxsize
        ) {
            echo  'Image size is maximum of 5MB';
            return;
        }


        // Verify MYME type of the file
        if (!in_array($file_type, $allowed)) {
            echo  'image is not valid Please try another';
            return;
        }
    }


    $customer = new Customer();


    // construct data
    $newCustomer = [
        ':full_name' => $name,
        ':email_address' => $email,
    ];

    // insert customer
    $customerId =  $customer->new_customer($newCustomer);

    $newTicket = [
        ':ticket_number' => random_int(100000, 999999),
        ':category_id' => $category,
        ':description' => $description,
        ':status_id' => 1, #default to open
        ':priority_id' => $priority,
        ':customer_id' => $customerId
    ];

    // check if there is a selected photo and insert int
    if ($photo) {

        $photo_url =   $ticket->upload_file($photo, __DIR__ . '/../../assets/media/photos/tickets');

        $newTicket[':photo']  = $photo_url;
    }

    $ticket->new_ticket($newTicket);


    // send success response
    echo 'SUCCESS';
    return;
}
