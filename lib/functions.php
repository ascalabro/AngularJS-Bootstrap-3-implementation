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

function getNewestImgID(){
    global $public_connection;
    if($stmt = $public_connection->prepare("SELECT img_id FROM images ORDER BY img_id DESC LIMIT 1")){
        $stmt->execute();
        $stmt->bind_result($newest_img_id);
        $stmt->fetch();
        $stmt->close();
        return $newest_img_id;        
    } else {
        return "enrror";
    }
}


?>
