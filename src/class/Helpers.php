<?php


trait Helpers
{

    public $inputs = [];
    public $errors = [];

    #check the input file
    public function checkup_uploads(string $name, array $file): void
    {

        if (isset($file) && !empty($file)) {
            // checkuploaded files
            if (is_uploaded_file($file['tmp_name']) && $file['error'] === 0) {

                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png", "PNG" => "image/PNG");

                $file_name = $file['name'];
                $file_type = $file['type'];
                $file_size = $file['size'];



                // check if extension is valid
                $extention = pathinfo($file_name, PATHINFO_EXTENSION);

                if (!array_key_exists($extention, $allowed)) {
                    $this->set_error($name, 'File format is not valid');
                }

                // check image size
                $maxsize = 5 * 1024 * 1024;
                if (
                    $file_size > $maxsize
                ) {
                    $this->set_error($name, 'Image size is maximum of 5MB');
                }


                // Verify MYME type of the file
                if (!in_array($file_type, $allowed)) {
                    $this->set_error($name, 'Something wrong please try again');
                }
            } else {
                $this->set_error($name, 'Please select a photo');
            }
        } else {
            $this->set_error($name);
        }
    }

    #upload file and return the name of the file being uploaded on success
    public function upload_file(array $file, $dir = null): string
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

    public function is_set($name)
    {

        isset($name) && !empty($_POST[$name]) ? $this->set_input($name, $_POST[$name]) : $this->set_error($name);
    }

    #return POST request
    public function post($name): mixed
    {

        $this->is_set($name);
        return isset($name) && !empty($_POST[$name]) ? trim($_POST[$name]) : null;
    }

    #return GET request
    public function get($name): mixed
    {
        return isset($name) && !empty($_GET[$name]) ? trim($_GET[$name]) : null;
    }

    public function uploads($name): mixed
    {

        return isset($_FILES[$name]) && $_FILES[$name]['error'] === 0 ? $_FILES[$name] : null;
    }

    #return true if email is valid
    public function is_email($name)
    {
        $email = filter_var($_POST[$name], FILTER_SANITIZE_EMAIL);
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    #iterate over post request and set||get errors&input message|data
    // public function checkup_input($post)
    // {
    //     foreach ($post as $name => $value) {
    //         if (isset($name) && !empty($value)) {
    //             $this->set_input($name, $value);
    //         } else {
    //             $this->set_error($name);
    //         }
    //     }
    // }


    #set error message
    public function set_error($name, $error = 'This field is required'): void
    {
        $this->errors[$name] = $error;
    }

    #get error message
    public function get_error($name): mixed
    {
        return isset($this->errors[$name]) ? $this->errors[$name] : null;
    }


    #set input
    public function set_input($name, $value): void
    {
        $this->inputs[$name] = $value;
    }

    #get input
    public function get_input($name): mixed
    {
        return isset($this->inputs[$name]) ? $this->inputs[$name] : null;
    }


    #return true if there is no error message 
    public function no_errors()
    {
        return count($this->errors) === 0;
    }

    #clear inputs
    public function clear_inputs()
    {
        $this->inputs = [];
    }



    #map columns
    function generate_name_parameters(array $post, string $photo = null): string
    {
        $names = array_keys($post);

        $names = array_map(function ($keys) {
            return ":$keys";
        }, $names);

        $names = implode(', ', $names);

        if (!is_null($photo)) $names .= ", :$photo";

        return trim($names);
    }


    #map columns
    function generate_columns(array $post, string $photo = null): string
    {
        $names = array_keys($post);

        $names = implode(', ', $names);

        if (!is_null($photo)) $names .= ", $photo";

        return trim($names);
    }

    #map columns
    function combine_columnvalues(array $post, $img_key = null, $img_value = null, $w_img = null): array
    {
        #get post keys
        $column = array_keys($post);
        #add column infront for each column keys
        $column = array_map(fn ($key) => ":$key", $column);

        #get post values
        $values = array_values($post);

        $columnvalues =  array_combine($column, $values);

        #check if image is exist
        if ($img_key && $img_value) {
            $w_img = true;
        }

        if ($w_img) {
            $columnvalues[$img_key] =  $img_value;
        }


        return $columnvalues;
    }


    public function send_email($to, $subject, $message)
    {

        // addtiona; parameters
        // To send HTML mail, the Content-type header must be set
        // $headers[] = 'MIME-Version: 1.0';
        // Content-Type: text/plain; charset=utf-8
        // $headers[] = 'Content-type: text/html; charset=iso-8859-1';

        // Additional headers
        // $headers[] = 'To: Mary <mary@example.com>, Kelly <kelly@example.com>';
        // $headers[] = 'From: Birthday Reminder <birthday@example.com>';
        // $headers[] = 'Cc: birthdayarchive@example.com';
        // $headers[] = 'Bcc: birthdaycheck@example.com';


        $headers = [
            'From' => EMAIL,
            'X-Mailer' => 'PHP/' . phpversion()
        ];
        return mail($to, $subject, $message, $headers);
    }
}

function build_update_parameters(array $post): string
{
    $post_keys = array_keys($post);

    $params = array_map(fn ($key) => "$key = :$key, ", $post_keys);
    $columns = implode('', $params);
    $columns = trim($columns);
    $columns = substr($columns, 0, -1);

    return $columns;
}
