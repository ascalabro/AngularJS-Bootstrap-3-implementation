<?php

interface Contact_Form {

    public function validate();

    public function sendEmail($send_to, $from);
}

interface listings_utils {

    public function update_db_row($listing_assoc_array);

    public function insert_new_listing($listing_assoc_array);
    
    public function delete_row($listing_id);
}

?>
