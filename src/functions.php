<?php

// get pages dynamically
function get_pages($fileName, $dir, $default = 'error')
{

    // php file extention 
    $extention = '.php';

    $path = $dir . $fileName . $extention;


    // check if the file exist in page dir and include it 
    if (!file_exists($path)) {

        //else return the default home destination
        return $dir . $default . $extention;
    }

    return $path;
}

// redirect page 
function redirect_page($location)
{
    header("Location: $location");
    exit();
}


#return true if there is no error message 
function no_errors($errors)
{
    return count($errors) === 0;
}


#set error message
function set_error(&$errors, $name, $error = 'This field is required'): void
{
    $errors[$name] = $error;
}

#get input
function get_error(&$errors, $name): mixed
{
    return isset($errors[$name]) ? $errors[$name] : null;
}



#set input
function set_input(&$inputs, $name, $value): void
{
    $inputs[$name] = $value;
}



#get input
function get_input(&$inputs, $name): mixed
{
    return isset($inputs[$name]) ? $inputs[$name] : null;
}




#upload file and return the name of the file being uploaded on success
function upload_file(array $file, $dir = null): string
{
    $file_name = $file['name'];

    $extention =
        pathinfo($file_name, PATHINFO_EXTENSION); // get file extension

    // add random string name
    $hash_name = uniqid('DICT_', true) . ".$extention";

    $tmp_name = $file['tmp_name'];

    if (move_uploaded_file($tmp_name, $dir . "/$hash_name")) {
        return $hash_name;
    }
}


#return true if email is valid
function is_email($email)
{
    $sanitized_email = filter_var($email, FILTER_SANITIZE_EMAIL);
    return filter_var($sanitized_email, FILTER_VALIDATE_EMAIL);
}


function validPasswordLeng($password)
{
    return strlen($password) >= 8;
}


function show_status($status, $name)
{

    $result = '';
    $class = '';

    switch ($status) {
        case 'added':
            $result = "New $name successfully Added";
            $class = 'primary';
            break;

        case 'updated':
            $result = "$name successfully updated";
            $class = 'success';
            break;

        case 'deleted':
            $result = "$name successfully deleted";
            $class = 'danger';
            break;
    }

    return "<div class='alert alert-{$class} alert-dismissible'>
             {$result}
         <button class='btn-close' data-bs-dismiss='alert'></button>
     </div>";
}
