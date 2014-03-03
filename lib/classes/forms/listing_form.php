<?php

/**
 * Description of listing_form
 *
 * @author Angelo
 */
include 'Form.php';

class listing_form extends Form {

    public function __construct($listing_id = null) {
        if ($listing_id == null) {
            $this->display_listing_form();
        } else if (is_numeric($listing_id)) {
            $this->display_listing_form($listing_id);
        } else {
            $this->showErrorPage();
        }
    }

    private function display_listing_form($listing_id = null) {

        $output = "<div class='form_container'>";
        $listing_assoc_array = Array();

        //if no argument is supplied, assume this is a new listing form
        if ($listing_id == null) {
            /*  must be a new listing */
            $output .= "<form id='listing_form' action='../lib/scripts/edit_listing.php' method='post'>
        <input type='hidden' class='new_listing_value' name='isNewListing' value='TRUE'>";
        } elseif (is_numeric($listing_id)) {
            /*  listing_id is a number so let's query the db for this listing */
            global $public_connection;
            if ($stmt = $public_connection->prepare("SELECT * FROM laptops WHERE listing_id = ?")) {
                $stmt->bind_param('i', $listing_id);
                $stmt->execute();
                $result = $stmt->get_result();
                if($result->num_rows > 0){
                    $listing_assoc_array = $result->fetch_assoc();
                }
                $stmt->close();
                $output .= "<form id='listing_form' action='../lib/scripts/edit_listing.php' method='post'>
        <input type='hidden' class='new_listing_value' name='isNewListing' value='FALSE'>";
            }
        } else {
            $this->showErrorPage();
        }
        $output .= "<input type='hidden' name='listing_id' id='listing_id' value='" . ($listing_id ? $listing_id : '') . "'>";
        $output .= "<label for='brand'>Brand Name: </label><input type='text' name='brand' id='brand' value='" . (!empty($listing_assoc_array) ? $listing_assoc_array['brand_name'] : '') . "'>";
        $output .= "<label for='title'>Title: </label><input size='74' type='text' name='title' id='title' value='" . (!empty($listing_assoc_array) ? $listing_assoc_array['title'] : 'Awesome Laptop' ) . "'>";
        $output .= "<label for='description'>Description: </label><textarea rows='6' cols='57' name='description' id='description'>" . (!empty($listing_assoc_array) ? $listing_assoc_array['description'] : '<h4>This is a great laptop.</h4>') . "</textarea>";
        $output .= "<label for='price'>Price: </label><input type='text' name='price' maxlength='8' size='10' id='price' value='" . (!empty($listing_assoc_array) ? $listing_assoc_array['price'] : '175') . "'><span style='left: -8px;position:relative;bottom: 23px;width: 0;'>$</span>";
        $output .= "<label for='discount'>Discount: </label><input type='text' maxlength='2' size='3' name='discount' id='discount' value='" . (!empty($listing_assoc_array) ? $listing_assoc_array['discount'] : '0') . "'><span style='left: 37px;position:relative;bottom: 24px;'>%</span>";
        $output .= "<input type='submit' value='Save' name='submit'><input type='reset' value='Reset' name='reset'></form>";
        $output .= "<hr>";
        /*
         *  CHECK IF LISTING EXISTS, IF IT DOES, DISPLAY IMAGE UPLOAD SECTION, IF NOT WAIT FOR CREATION
         */
        if (!empty($listing_assoc_array)) {
            $listing_gallery = new Listing_Gallery($listing_assoc_array['default_img'], $listing_assoc_array['listing_id']);
            $output .= $listing_gallery->edit_listing_images();
            $output .= <<<EOF
   <button id='choose_file'></button>         
   </div>
EOF;
        } 
        echo $output;
    }

}

?>
