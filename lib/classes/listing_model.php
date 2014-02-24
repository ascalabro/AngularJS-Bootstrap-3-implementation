<?php

include_once('forms/interface.php');
include_once('/../functions.php');
include_once('db_updater.php');

class Listing {

    private $listing_id;
    private $default_img;
    private $brand_name;
    private $title;
    private $description;
    private $price;
    private $discount = 0;
    private $last_change_date;

    function __construct($listing_assoc_array, $isNewListing) {
        $db_controller = new db_updater();
        if ($isNewListing == 'TRUE') {
            $return_data = Array();
            //first validate the fields before assigning to variables
            if ($db_controller->validateFields($listing_assoc_array)) {
                $db_controller->insert_new_listing($listing_assoc_array);
                echo getNewestListingID();
            } else {
                $return_data['success'] = 'FALSE';
                $return_data .= form_errors($_SESSION['errors']);
                echo json_encode($return_data);
                return false;
            }
            
        } else { // this must not be a new listing
            //just assign the variables if this object is not a new listing
            $this->assign_local_vars($listing_assoc_array);
            $db_controller->update_db_row($listing_assoc_array);
        }
    }

    private function assign_local_vars($listing_assoc_array) {
        $this->listing_id = isset($listing_assoc_array['listing_id']) ? $listing_assoc_array['listing_id'] : null;
        $this->default_img = isset($listing_assoc_array['default_img']) ? $listing_assoc_array['default_img'] : null;
        $this->brand_name = isset($listing_assoc_array['brand_name']) ? $listing_assoc_array['brand_name'] : null;
        $this->title = isset($listing_assoc_array['title']) ? $listing_assoc_array['title'] : null;
        $this->description = isset($listing_assoc_array['description']) ? $listing_assoc_array['description'] : null;
        $this->price = isset($listing_assoc_array['price']) ? $listing_assoc_array['price'] : null;
        $this->discount = isset($listing_assoc_array['discount']) ? $listing_assoc_array['discount'] : null;
        $this->last_change_date = isset($listing_assoc_array['last_change_date']) ? $listing_assoc_array['last_change_date'] : null;
    }

    public function get_listing_id() {
        return $this->listing_id;
    }

    public function get_default_img() {
        return $this->default_img;
    }

    public function get_brand_name() {
        return ucfirst($this->brand_name);
    }

    public function get_title() {
        return $this->title;
    }

    public function get_description() {
        return $this->description;
    }

    public function get_price() {
        return $this->price;
    }

    public function get_discount() {
        return $this->discount;
    }

    public function get_change_date() {
        return $this->last_change_date;
    }

}

?>
