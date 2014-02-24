<?php
require_once '../functions.php';
require_once '../classes/db_updater.php';

// check if request is POST
if (!isset($_GET)) {
    echo 'error you aren\'t supposed to be here';
}  elseif (isset($_GET['new_default_image']) && is_numeric($_GET['assoc_listing_id'])) {   
    $update_data = array(
        "new_image_url" => $_GET['new_default_image'],
        "assoc_listing_id" => $_GET['assoc_listing_id']
    );
    $updater = new db_updater();
    $updater->updateDefaultImage($update_data['new_image_url'], $update_data['assoc_listing_id']);
    
    echo json_encode($update_data);
} elseif (isset($_GET['delete_img_id']) && is_numeric($_GET['delete_img_id'])){
    
    echo 'done ' . $remove_img_id = $_GET['delete_img_id'];
    $updater = new db_updater();
    $updater->removeImage($remove_img_id);
} elseif (isset($_POST['new_img_url'])){
    echo json_encode($_POST);
} else {
    echo 'You are here by error';
}


?>


