<?php
require_once '../functions.php';
require_once '../classes/db_updater.php';


if (isset($_POST['data'])) {
    //print_r(json_encode($_POST['data']));
    $updater = new db_updater();
    $updater -> add_dpbx_images($_POST['data']);
//    $data_obj = array(
//        "link" => $_POST['url'],
//        "assoc_listing_id" => $_POST['assoc_listing_id']
//    );
//    $data_obj['img_id'] = getNewestImgID() + 1;
//    $json_obj = json_encode($data_obj);
//    print_r($json_obj);
} else {
    echo 'error';
}
?>