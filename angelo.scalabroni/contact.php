<?php

include_once('../lib/functions.php');
include_once('../lib/session.php');
include_once('../lib/constants.php');

if (!empty($_POST)) {
    $form_data_obj = new form_data_obj($_POST);
    if ($form_data_obj->validateData()) {
        $form_data_obj->sendMail();
    } else {
        //if data is not valid when javascript is disabled(using jquery validator plugin), redirect user immediately
        //redirect_to('index.php');
        //do nothing
        if (isset($_SESSION['errors'])) {
            echo form_errors($_SESSION['errors']);
        }
    }
} else {
    redirect_to('index.php');
}

class form_data_obj {

    public $fields_array;

    public function __construct($fields_array) {
        $this->fields_array = $fields_array;
    }

    public function validateData() {
        $errors = array();
        // test length of 'name' string
        if (strlen($this->fields_array['name']) > 60 || empty($this->fields_array['name'])) {
            $errors['name'] = " must be filled out with no more than 60 characters. " . $this->fields_array['name'];
        }
        //END test length of 'name' string
        // test for valid email address
        if (!filter_var($this->fields_array['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = " isn't a valid email or is too long: " . $this->fields_array['email'];
        }
        //END test for valid email address
        // validate phone number fields   
        if (empty($this->fields_array['message'])) {
            $errors['message'] = " message area cannot be blank.";
        }
        // END validate phone number fields    


        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            return false;
        } else {
            return true;
        }
    }

    public function sendMail() {
        $mail_to_send_to = 'angelo@affableitsolutions.com';
        $headers = "From: " . no_reply_email;
        $name = $this->fields_array['name'];
        $email = $this->fields_array['email'];
        $phone_number = isset($this->fields_array['phone']) ? $this->fields_array['phone'] : 'N/A';
        $message = $this->fields_array['message'];
        $email_msg = <<<MSG
   - Do Not Reply to this message - 
You are receiving this because a user has submitted the form on your personal website Angelo.
   Name: $name
   Email: $email
   Phone: $phone_number
   Message: $message
MSG;

       mail($mail_to_send_to, "Contact Form Submission", $email_msg, $headers);
       
        
    }

}

?>
