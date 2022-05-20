<?php


include __DIR__ . '/../init.php';

if (isset($_REQUEST['change_name'])) {

    $agent = new Agent();

    $first_name = $agent->post('first_name');
    $last_name = $agent->post('last_name');

    if (!$first_name || !$last_name) {
        echo 'All of this fields must not be empty, this is required to identify you';
        return;
    }

    $agent->update_name($_REQUEST['change_name'], $first_name, $last_name);

    echo 'SUCCESS';
    return;
}

if (isset($_REQUEST['change_photo'])) {

    $agent = new Agent();

    $photo = $agent->uploads('photo');

    if (!$photo) {
        echo 'Please select a photo first';
        return;
    }


    // validate images
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

    $photo_url =   $agent->upload_file($photo, __DIR__ . '/../../assets/media/photos/uploaded');

    $agent->update_photo($_REQUEST['change_photo'], $photo_url);

    echo 'SUCCESS';
    return;
}


if (isset($_GET['request_compare'])) {

    $input = $_REQUEST['request_compare'];

    $user = new User();

    // COMPARE WITH OLD PASSWORD
    echo $user->password_match($input);
    return;
}


if (isset($_POST['new_password'])) {
    $user = new User();

    $newPassword =  $user->post('new_password');
    $oldPassword =  $user->post('old_password');

    if (!$newPassword || !$oldPassword) {
        echo 'Something wrong please try again';
        return;
    }

    $user->update_password($newPassword);

    echo 'SUCCESS';
    return;
}



if (isset($_REQUEST['request_change_role'])) {

    $agent = new Agent();

    $role =  $agent->post('user_role');

    if (!$role) {
        echo 'Please choose a new user role';
        return;
    }


    $agent->change_system_role($_REQUEST['request_change_role'], $role);

    echo 'SUCCESS';
    return;
}
