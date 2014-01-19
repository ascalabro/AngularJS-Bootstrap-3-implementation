<?php
include_once('../lib/session.php');
include_once('../lib/classes/listing_model.php');
include_once('../lib/classes/listings_table.php');
include_once('../lib/classes/listing_page.php');
include_once('../lib/classes/listing_gallery.php');
include_once('includes/head.php');




if (isset($_GET['manage_listings'])) {
    $isPublic = FALSE;
    echo "<h4>Manage Listings</h4>";
    echo "<h4><a href='?add_listing'>Add New listing</a></h4></header>";
    new Listings_Table(FALSE);
} elseif (isset($_GET["listing_id"])) {
    echo "<h4><a href='?manage_listings'>Manage Listings</a></h4>";
    echo "<h4>Edit Listing with ID: <input type='text' class='input_inline' size='1' disabled value='" . $_GET['listing_id'] . "'></h4></header>";
    echo display_listing_form($_GET["listing_id"]);
} elseif (isset($_GET['add_listing'])) {
    echo "<h4><a href='?manage_listings'>Manage Listings</a></h4>";
    echo '<h4>Create New Listing</h4></header>';
    echo display_listing_form();
//    $new_listing = new Listing(get_listing_data(),TRUE);
//    if($new_listing->isValid()){
//        $listings_controller->create_listing($listing_obj);
//    } else{
//        
//    }
} else {
    
    
    echo "<h4><a href='?manage_listings'>Manage Listings</a></h4>";
    echo "<h4><a href='?add_listing'>Add New listing</a></h4></header>";
    
    
}
?>

</body>
</html>