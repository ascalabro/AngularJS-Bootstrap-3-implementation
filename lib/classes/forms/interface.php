<?php

interface Contact_Form {
    public function validate();
    public function sendEmail($send_to,$from);
}
?>
