<?php
require_once('../classes/listing_model.php');


if (isset($_POST)){
    // check if hidden field indicates new listing
    if($_POST['isNewListing'] == 'TRUE'){
        //  treat this as a new listing
        if($new_listing = new Listing($_POST, $_POST['isNewListing'])){
            echo 'success creating new listing';
        } else {
            echo 'error creating listing object line 12, edit_listing.php';
        }
    } else {
        //  treat this as an existing listing 
        echo 'existing';
        print_r($_POST);
        $update_listing = new Listing($_POST, $_POST['isNewListing']);
    }
} else {
    redirect_to('../../');
}
?>
