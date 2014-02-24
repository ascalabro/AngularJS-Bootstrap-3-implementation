<?php

/**
 * Description of listing_form
 *
 * @author Angelo
 */


class listing_form {

    public function __construct($listing_id = null) {
        if ($listing_id == null){
            $this->display_listing_form();
        } else if(!is_int($listing_id)){
            $this->showErrorPage(505);
        }
        
    }

    private function display_listing_form($listing_id = null) {
        //if no argument is supplied, assume this is a new listing form
        $output = "<div class='form_container'>";
        $listing_assoc_array = Array();
        if ($listing_id == null) {
            $output .= "<form id='listing_form' action='../lib/scripts/edit_listing.php' method='post'>
        <input type='hidden' class='new_listing_value' name='isNewListing' value='TRUE'>";
        } elseif (is_numeric($listing_id)) {
            global $public_connection;
            $stmt = new mysqli_stmt($public_connection, 'SELECT * FROM laptops WHERE listing_id = ?');
            $stmt->bind_param('i', $listing_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $listing_assoc_array = $result->fetch_assoc();
            $stmt->close();
            $output .= "<form id='listing_form' action='../lib/scripts/edit_listing.php' method='post'>
        <input type='hidden' class='new_listing_value' name='isNewListing' value='FALSE'>";
        } else {
            new error_page(LISTING_NOT_FOUND);
        }
        $output .= "<input type='hidden' name='listing_id' id='listing_id' value='" . ($listing_id ? $listing_id : '') . "'>";
        $output .= "<label for='brand'>Brand Name: </label><input type='text' name='brand' id='brand' value='" . ($listing_id ? $listing_assoc_array['brand_name'] : '') . "'>";
        $output .= "<label for='title'>Title: </label><input size='74' type='text' name='title' id='title' value='" . ($listing_id ? $listing_assoc_array['title'] : 'Awesome Laptop' ) . "'>";
        $output .= "<label for='description'>Description: </label><textarea rows='6' cols='57' name='description' id='description'>" . ($listing_id ? $listing_assoc_array['description'] : '<h4>This is a great laptop.</h4>') . "</textarea>";
        $output .= "<label for='price'>Price: </label><input type='text' name='price' maxlength='8' size='10' id='price' value='" . ($listing_id ? $listing_assoc_array['price'] : '175') . "'><span style='left: -8px;position:relative;bottom: 23px;width: 0;'>$</span>";
        $output .= "<label for='discount'>Discount: </label><input type='text' maxlength='2' size='3' name='discount' id='discount' value='" . ($listing_id ? $listing_assoc_array['discount'] : '0') . "'><span style='left: 37px;position:relative;bottom: 24px;'>%</span>";
        $output .= "<input type='submit' value='Save' name='submit'><input type='reset' value='Reset' name='reset'></form>";
        if ($listing_id) {
            $listing_gallery = new Listing_Gallery($listing_assoc_array['default_img'], $listing_assoc_array['listing_id']);
            $output .= $listing_gallery->edit_listing_images();
        }
        $output .= <<<EOF
   <button id='choose_file'>Choose File From Dropbox</button>     
   <div id='pending_new_images'></div>
   <form id='add_img_form' action='#' method='POST'>
        
        <input type='hidden' name='file_url' id='file_url' value=''>
        <input type='submit' name='upload_file' value='Begin Upload'>
   </form>         
   </div>
EOF;
        return $output;
    }

}

?>
