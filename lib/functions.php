<?php
require_once("session.php"); 
require_once("db_connection.php"); 

$errors = array();

function confirm_query($result_set){
    if(!$result_set){
        die("Database query failed. . . . ");
    } else {
        return true;
    }
}

function redirect_to($new_location){
    header("Location: " . $new_location);
    exit;
}


    
function form_errors($errors = array()){
    $output = "";
    if (!empty($errors)){
        $output .= "<div style=\"border:1px solid red;font-family:\">";
        $output .= "Please fix the following errors: ";
        $output .= "<ul>";
        foreach ($errors as $key => $error){
            $output .= "<li>" . htmlentities($key . ' ' . $error) . "</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
    }
    $_SESSION['errors'] = null;
    return $output;
}

    
function display_listing_form($listing_id = null){
    //if no argument is supplied, assume this is a new listing form
    $output = "<div class='form_container'>";
    $listing_assoc_array = Array();
    if($listing_id == null){
        $output .= "<form id='listing_form' action='../lib/scripts/edit_listing.php' method='post'>
        <input type='hidden' name='isNewListing' value='TRUE'>";
    } elseif(is_numeric($listing_id)) {
        global $public_connection;
        $listing_assoc_array = Array();
        if($stmt = $public_connection -> prepare('SELECT * FROM laptops WHERE listing_id = ?')){
            $stmt -> bind_param('i', $listing_id);
            $stmt -> execute();
            $stmt -> close();
        } else {
            echo "errorrs";
        }
        $output .= "<form id='listing_form' action='../lib/scripts/edit_listing.php' method='post'>
        <input type='hidden' name='isNewListing' value='FALSE'>";
    } else {
        new error_page(LISTING_NOT_FOUND);
    }
    $output .= "<label for='brand'>Brand Name: </label><input type='text' name='brand' id='brand' value='" . ($listing_id ? $listing_assoc_array['brand_name'] : '') . "'>";
    $output .= "<label for='title'>Title: </label><input size='74' type='text' name='title' id='title' value='" . ($listing_id ? $listing_assoc_array['title'] : '' ) . "'>";
    $output .= "<label for='description'>Description: </label><textarea rows='6' cols='57' name='description' id='description'>" . ($listing_id ? $listing_assoc_array['description'] : '<h4>This is a great laptop.</h4>') . "</textarea>";
    $output .= "<label for='price'>Price: </label><input type='text' name='price' maxlength='8' size='10' id='price' value='" . ($listing_id ? $listing_assoc_array['price'] : '175') . "'><span style='left: -8px;position:relative;bottom: 23px;width: 0;'>$</span>";
    $output .= "<label for='discount'>Discount: </label><input type='text' maxlength='2' size='3' name='discount' id='discount' value='" . ($listing_id ? $listing_assoc_array['discount'] : '0') . "'><span style='left: 37px;position:relative;bottom: 24px;'>%</span>";
    $output .= "<input type='submit' value='Save' name='submit'><input type='reset' value='Reset' name='reset'></form>";
    if($listing_id){
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
    
    function fetch($result)
{    
    $array = array();
    
    if($result instanceof mysqli_stmt)
    {
        $result->store_result();
        
        $variables = array();
        $data = array();
        $meta = $result->result_metadata();
        
        while($field = $meta->fetch_field())
            $variables[] = &$data[$field->name]; // pass by reference
        
        call_user_func_array(array($result, 'bind_result'), $variables);
        
        $array = array();
        while($result->fetch())
        {
            
            foreach($data as $k=>$v)
                $array[$k] = $v;
            
            // don't know why, but when I tried $array[] = $data, I got the same one result in all rows
        }
    }
    elseif($result instanceof mysqli_result)
    {
        while($row = $result->fetch_assoc())
            $array[] = $row;
    }
    
    return $array;
}

    
?>
