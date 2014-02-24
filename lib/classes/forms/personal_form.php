<?php
require 'Form.php';
require 'interface.php';

class personal_form extends Form implements Contact_Form {

    public $fields_array;

    public function __construct($fields_array) {
        $this->fields_array = $fields_array;
    }

    public function validate() {
        $errors = array();
        
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

    public function sendEmail($send_to,$from) {
        $headers = "From: " . $from;
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

       mail($send_to, "Contact Form Submission", $email_msg, $headers);
       
        
    }

}


?>
