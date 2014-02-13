<?php

require_once("session.php");
require_once("db_connection.php");

$errors = array();

function confirm_query($result_set) {
    if (!$result_set) {
        die("Database query failed. . . . ");
    } else {
        return true;
    }
}

function redirect_to($new_location) {
    header("Location: " . $new_location);
    exit;
}

function form_errors($errors = array()) {
    $output = "";
    if (!empty($errors)) {
        $output .= "<div style=\"border:1px solid red;font-family:\">";
        $output .= "Please fix the following errors: ";
        $output .= "<ul>";
        foreach ($errors as $key => $error) {
            $output .= "<li>" . htmlentities($key . ' ' . $error) . "</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
    }
    $_SESSION['errors'] = null;
    return $output;
}

function display_listing_form($listing_id = null) {
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
        <form id='image_form' action='../lib/scripts/uploader.php' method='post'>
        <label>Upload New Image: </label><input name='file_upload' type='file'>
        <input type='submit' name='upload_file' value='Begin Upload'>
        </div>
EOF;
    return $output;
}

function getNewestListingID() {
    global $public_connection;
    if ($stmt = $public_connection->prepare("SELECT listing_id FROM laptops ORDER BY listing_id DESC LIMIT 1")) {

        $stmt->execute();

        /* bind result variables to prepared statement */
        $stmt->bind_result($newest_listing_id);
        $stmt->fetch();
        /* close statement */
        $stmt->close();
        
        return $newest_listing_id;
    } else {
        return "error";
    }
    
}

?>
