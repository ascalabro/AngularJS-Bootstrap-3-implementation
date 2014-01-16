<?php
require_once('/../functions.php');
require_once('/../db_connection.php');
require_once('activity_monitor.php');
require_once('listing_model.php');
require_once('listing_gallery.php');

class Listing_Page {
    public function __construct($listing_id,$isPublic) {
        global $public_connection;
        $query = 'SELECT * FROM laptops WHERE listing_id = ' . $listing_id;
        // this is the listing that is specified
        $selected_listing_row = $public_connection->query($query);
        // test if there was a query error.
        confirm_query($selected_listing_row);
        
        if($isPublic == TRUE){
            self::displayPublicListingPage($selected_listing_row);
        } else {
            self::displayManagementTable($selected_listing_row);
        }
        
        
    }
    
    private static function displayPublicListingPage($selected_listing_row){
        $listing_assoc_array = $selected_listing_row->fetch_assoc();
        $listing_obj = new Listing($listing_assoc_array ,FALSE);
        // ADD HIT TO HIT COUNTER for this listing
        activity_monitor::addPageHit($listing_obj);
        // DISPLAY THE RETURNED DATA
        $listing_page = <<<EOF
                
                <table border=1 id='listing_page' >
                <tr>
                    <td width='220px'>
                <div id='listing_gallery'>     
EOF;
        $listing_gallery = new Listing_Gallery($listing_obj->get_default_img(), $listing_obj->get_listing_id());
        $listing_page .= $listing_gallery->create_listing_gallery();
        $listing_page .= <<<EOF
                    </div>
                    </td>
                    <td width='100%' height='auto'>
                       <span class='title'>{$listing_obj->get_title()}</span><br>
                           <section class='description'>{$listing_obj->get_description()}</section>
                          </td>
                </tr>
                </table><div class='order_call_banner'></div>
                            <a class='back' href='products.php'></a>
                <div style='clear:both;'></div>
EOF;
        $selected_listing_row->close();
        
        echo $listing_page;
    }
    
    
    
    
}


?>
