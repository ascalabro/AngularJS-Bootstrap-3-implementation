<?php
require_once('../config.php');
require_once('../lib/classes/listing_model.php');
require_once('../lib/classes/listings_table.php');
require_once('../lib/classes/listing_page.php');
require_once('../lib/classes/listing_gallery.php');
require_once('../lib/classes/forms/listing_form.php');
require_once('includes/head.php');
require_once('includes/footer.php');


if (isset($_GET['manage_listings'])) {
    $isPublic = FALSE;
    echo "<h4>Manage Listings</h4>";
    echo "<h4><a href='?add_listing'>Add New listing</a></h4></header>";
    new Listings_Table(FALSE);
} elseif (isset($_GET["listing_id"])) {
    echo "<h4><a href='?manage_listings'>Manage Listings</a></h4>";
    echo "<h4>Edit Listing with ID: <input type='text' class='input_inline' size='1' disabled value='" . $_GET['listing_id'] . "'></h4></header>";
    new Listing_Form($_GET["listing_id"]);
} elseif (isset($_GET['add_listing'])) {
    
    echo "<h4><a href='?manage_listings'>Manage Listings</a></h4>";
    echo '<h4>Create New Listing</h4></header>';
    new Listing_Form();
} else {
    echo "<h4><a href='?manage_listings'>Manage Listings</a></h4>";
    echo "<h4><a href='?add_listing'>Add New listing</a></h4></header>";
}
?>

</body>
</html>