<?php
include_once('lib/functions.php');
include_once('lib/session.php');
include_once('lib/config.php');
include_once('lib/classes/forms/interface.php');

if(!empty($_POST)){
    $form_data_obj = new form_data_obj($_POST);
    if($form_data_obj->validate()){
        $form_data_obj->sendEmail(company_email,no_reply_email);
        } else {
            //if data is not valid when javascript is disabled(using jquery validator plugin), redirect user immediately
            redirect_to('contact.php');
        }
} else {
    redirect_to('index.php');
}

class form_data_obj implements Contact_Form{
    public $fields_array;
    
    public function __construct($fields_array) {
        $this->fields_array = $fields_array;
    }
    
    public function validate(){
        $errors = array();
        // test length of 'name' string
        if(strlen($this->fields_array['name']) > 99){
            $errors['name'] = " isn't valid name or is too long: " . $this->fields_array['name'];
        }
        //END test length of 'name' string
        
        // test for valid email address
        if(!filter_var($this->fields_array['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = " isn't valid email or is too long: " . $this->fields_array['email'];
        }
        //END test for valid email address
        
        // validate area code + phone number fields
        if((!empty($this->fields_array['area_code']) && empty($this->fields_array['phone_number'])) || (empty($this->fields_array['phone_number']) && !empty($this->fields_array['area_code']))){
            $errors['phone'] = " area code or phone number isn't valid or one is missing: " . $this->fields_array['area_code'] . "-" . $this->fields_array['phone_number'];
            
        } elseif(!empty($this->fields_array['area_code']) && !empty($this->fields_array['phone_number'])){
            if(strlen($this->fields_array['area_code']) != 3 || !filter_var($this->fields_array['area_code'], FILTER_VALIDATE_INT)){
                $errors['area_code'] = " area code isn't valid or is not an integer: " . $this->fields_array['area_code'];
            }
            if(strlen($this->fields_array['phone_number']) != 7 || !filter_var($this->fields_array['phone_number'], FILTER_VALIDATE_INT)){
                $errors['phone_number'] = " phone number only isn't valid or is not an integer: " . $this->fields_array['phone_number'];
            }
        } 
        // END validate area code + phone number fields
        
        if(!empty($errors)){
            $_SESSION['errors'] = $errors;
            return false;
        } else {
            return true;
        }
        
        
    }
    
    public function sendEmail($send_to,$from){
        $headers = "From: " . $from;
        $name = $this->fields_array['name'];
        $email = $this->fields_array['email'] ;
        $area_code = isset($this->fields_array['area_code']) ? $this->fields_array['area_code'] : 'N/A' ;
        $phone_number = isset($this->fields_array['phone_number']) ? $this->fields_array['phone_number'] : 'N/A' ;
        $interests = '';
        if(!empty($this->fields_array['interests'])) {
            foreach($this->fields_array['interests'] as $check) {
            $interests .= $check . ', ';
            }
        }
        $message = $this->fields_array['text'];
        echo $email_msg = <<<MSG
   - Do Not Reply to this message - 
You are receiving this because a user has submitted the form on your contact page
   Name: $name
   Email: $email
   Phone: ($area_code)$phone_number
   Interests: $interests
   Message: $message
MSG;
                
        $a = mail( $send_to, "Affable Website Comment Form Submission", $email_msg, $headers);
        if ($a) {
            print("Message was sent, you can send another one");
        } else {
            print("Message wasn't sent, please check that you have changed emails in the bottom");
        }
        
        
    }
    
//      FUNCTIONS TO BE USED FOR DATABASE UPDATES, AT THE MOMENT FEATUURE IS NOT BENEFICIAL 
//    public function ConstructQuery($fields_array){
//        $query = 'INSERT INTO cust_submissions(cust_name,cust_email,cust_phone_area_code,cust_phone_num,cust_category,cust_text,submission_date) ';
//        $name = strtolower($fields_array['name']);
//        $email = strtolower($fields_array['email']);
//        if(isset($fields_array['area_code'])){
//            $area_code = $fields_array['area_code'];
//        } else {
//            $area_code = 'null';
//        }
//        if(isset($fields_array['phone'])){
//            $phone = $fields_array['phone'];
//        } else {
//            $phone = 'null';
//        }
//        $category = $fields_array['category'];
//        $text = $fields_array['text'];
//        $query .= "VALUES('" . $name . "', '" . $email . "', " . $area_code . ", " . $phone . ", '" . $category . "', '" . $text . "', now());";
//        return $query;
//    }
    
//    public function addToDB($query){
//        $data_connection = new mysqli('localhost', 'affaedco_data', 'dataMiner81', 'affaedco_data');
//        if($data_connection->connect_errno){
//            die("Database connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ") for data user");
//        }
//    }
    
    
}




?>
