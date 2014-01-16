<?php
require_once('../functions.php');
require_once('listing_model.php');
require_once('listings_table.php');
require_once('listing_page.php');

?>
<script type="text/javascript" src="js/prod_scripts.js"></script>
                <?php
                $isPublic = TRUE;
                    if(!isset($_GET['listing_id'])){
                        //just display all listings
                        new Listings_Table($isPublic);    // display public table 
                    } elseif(isset($_GET['listing_id']) && is_numeric ($_GET['listing_id'])) {
                       //display individual listing page
                       $listing_page = new Listing_Page($_GET['listing_id'],$isPublic);
                        
                    } else{
                        echo 'helfklshafk';
                       // redirect_to('');
                    }
                    
                ?>
                