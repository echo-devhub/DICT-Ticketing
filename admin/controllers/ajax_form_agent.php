<?php

include __DIR__ . '/../init.php';


$agent = new Agent();


if (isset($_REQUEST['agents'])) {


    $type = $_REQUEST['agents'];

    if ($type == 'add_agent') {

        $first_name = $agent->post('first_name');
        $last_name = $agent->post('last_name');
        $email_address = $agent->post('email_address');
        $user_role = $agent->post('user_role');
        // $pwd = $agent->post('pwd');

        $upload = $agent->uploads('photo');


        if (!$first_name || !$last_name || !$email_address || !$user_role || !$upload) {

            echo json_encode(['valid' => false, 'data' => 'All fields is required']);
            return;
        }

        if (!is_email($email_address)) {
            echo json_encode(['valid' => false, 'data' =>  'Email is not valid']);
            return;
        }

        if ($agent->is_agent_exist($email_address)) {
            echo json_encode(['valid' => false, 'data' => 'User already exist']);
            return;
        }

        if ($agent->is_admin_full() && $user_role === 'Administrator') {
            echo json_encode(['valid' => false, 'data' => 'Administrator role is now full']);
            return;
        }

        // if (!validPasswordLeng($pwd)) {
        //     echo 'Password must be 8 characters long';
        //     return;
        // }


        if (!is_uploaded_file($upload['tmp_name']) && $upload['error'] !== 0) {
            echo json_encode(['valid' => false, 'data' => 'Please select a photo']);
            return;
        }

        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png", "PNG" => "image/PNG");

        $file_name = $upload['name'];
        $file_type = $upload['type'];
        $file_size = $upload['size'];


        // check if extension is valid
        $extention = pathinfo($file_name, PATHINFO_EXTENSION);

        if (!array_key_exists($extention, $allowed)) {
            echo json_encode(['valid' => false, 'data' => 'File format is not valid']);
            return;
        }

        // check image size
        $maxsize = 5 * 1024 * 1024;
        if (
            $file_size > $maxsize
        ) {
            echo json_encode(['valid' => false, 'data' => 'Image size is maximum of 5MB']);

            return;
        }


        // Verify MYME type of the file
        if (!in_array($file_type, $allowed)) {
            echo json_encode(['valid' => false, 'data' => 'Something wrong please try again']);
            return;
        }

        $upload_ready = upload_file($upload, __DIR__ . '/../../assets/media/photos/uploaded');

        if (!$upload_ready) {
            echo json_encode(['valid' => false, 'data' => 'File cannot be upload please try another']);
            return;
        }

        // GENERATE RANDOM PASSWORD
        $pwd = randomPassword();


        if ($agent->add_new_agent([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email_address' => $email_address,
            'user_role' => $user_role,
            'pwd' => $pwd,
            'photo' => $upload_ready,
        ])) {
        }

        $data = [
            'name' => $first_name . ' ' . $last_name,
            'email' => $email_address,
            'pwd' => $pwd
        ];

        echo json_encode(['valid' => true, 'data' => $data]);
        return;
    }


    if ($type == 'send_email') {

        $name = $agent->get('name');
        $email = $agent->get('email');
        $pwd = $agent->get('pwd');

        $msg = "Hi {$name} \r\n \r\n";
        $msg .= "This is your Login credential to MISS SUPPORT SYSTEM please dont share this to others. Thank you.\r\n\r\n";
        $msg .= "Username: {$email}\r\n";

        // SEND RANDOM PASSWORD
        $msg .= "Password: {$pwd} \r\n";
        $link = 'http://localhost/ticketing';
        $msg .= "Please follow this link to login:\r\n\r\n{$link}";

        // SEND EMAIL FOR CREDENTIALS
        if (!send_email($email, 'MISS - Login Credential', $msg)) {
            echo 'Something is wrong please try again';
            return;
        }

        return;
    }
}
