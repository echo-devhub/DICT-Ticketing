<?php

include __DIR__ . '/../init.php';


$agent = new Agent();


$first_name = $agent->post('first_name');
$last_name = $agent->post('last_name');
$email_address = $agent->post('email_address');
$user_role = $agent->post('user_role');
$pwd = $agent->post('pwd');
$upload = $agent->uploads('photo');


if (!$first_name || !$last_name || !$email_address || !$user_role || !$pwd || !$upload) {

    echo 'All fields is required';
    return;
}

if (!is_email($email_address)) {
    echo 'Email is not valid';
    return;
}

if ($agent->is_agent_exist($email_address)) {
    echo 'User already exist';
    return;
}

if (!validPasswordLeng($pwd)) {
    echo 'Password must be 8 characters long';
    return;
}


if (!is_uploaded_file($upload['tmp_name']) && $upload['error'] !== 0) {
    echo  'Please select a photo';
    return;
}

$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png", "PNG" => "image/PNG");

$file_name = $upload['name'];
$file_type = $upload['type'];
$file_size = $upload['size'];


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
    echo 'Image size is maximum of 5MB';
    return;
}


// Verify MYME type of the file
if (!in_array($file_type, $allowed)) {
    echo 'Something wrong please try again';
    return;
}

$upload_ready = upload_file($upload, __DIR__ . '/../../assets/media/photos/uploaded');

if (!$upload_ready) {
    echo 'File cannot be upload please try another';
    return;
}


if ($agent->add_new_agent([
    'first_name' => $first_name,
    'last_name' => $last_name,
    'email_address' => $email_address,
    'user_role' => $user_role,
    'pwd' => $pwd,
    'photo' => $upload_ready,
])) {

    echo 'SUCCESS';
    return;
}
