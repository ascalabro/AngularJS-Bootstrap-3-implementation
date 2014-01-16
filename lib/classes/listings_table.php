<?php

include("/../db_connection.php");
include("/../functions.php");

class Listings_Table {

    public function __construct($isPublic) {
        global $public_connection;
        $query = 'SELECT * FROM laptops';
        $listings_set = $public_connection->query($query);
        confirm_query($listings_set);

        if ($isPublic == TRUE) {
            self::displayPublicTable($listings_set);
        } else {
            self::displayManagementTable($listings_set);
        }
    }

    private static function displayPublicTable($listings_set) {
        $listings_table = <<<EOF
                <table id='listings_table'  border='1'>
                <tr>
                <td width="120px">Picture</td>
                <td width="90px">Brand</td>
                <td width="420px">Description</td>
                <td width="60px">Price</td>
                <td width="100px">Listing Date</td>
                <td>Info</td>
                </tr>
EOF;
        // DISPLAY THE RETURNED DATA
        while ($listings_assoc_array = $listings_set->fetch_assoc()) {
            //create new listing_obj for each property in $listings_set, FALSE tells constructor this is not a new listing
            $listing_obj = new Listing($listings_assoc_array, FALSE);
            //output each listing to it's own row
            $listings_table .= "<tr>";
            $listings_table .= "<td><a class='ajaxGet' href='{$listing_obj->get_listing_id()}'><img alt='computer repair, tampa, it, solutions, software, web design, laptop sales, laptops, used laptops, used computers, computer service, service' class='smalldefaultpic' src='" . $listing_obj->get_default_img() . "'></a></td>";
            $listings_table .= "<td><a class='ajaxGet' href='{$listing_obj->get_listing_id()}'>" . ucfirst($listing_obj->get_brand_name()) . "</a></td>";
            $listings_table .= "<td><a class='ajaxGet' href='{$listing_obj->get_listing_id()}'><span class='title'>" . $listing_obj->get_title() . "</span></a></td>";
            $listings_table .= "<td><a class='ajaxGet' href='{$listing_obj->get_listing_id()}'>$" . $listing_obj->get_price() . "</a></td>";
            $listings_table .= "<td><a class='ajaxGet' href='{$listing_obj->get_listing_id()}'>" . $listing_obj->get_change_date() . "</a></td>";
            $listings_table .= "<td><a class='ajaxGet' href='{$listing_obj->get_listing_id()}'><input TYPE='button' VALUE='More Info' class='button'></a></td>";
            $listings_table .= "</tr>";
        }
        $listings_table .= "</table><div style='clear:both;'></div>";
        $listings_set->close();
        echo $listings_table;
    }

    private static function displayManagementTable($listings_set) {
        $listings_table = <<<EOF
                <table id='listings_table'  border='1'>
                <tr>
                <td width="120px">Picture</td>
                <td width="90px">Brand</td>
                <td width="90px">Title</td>
                <td width="220px">Description</td>
                <td width="60px">Price</td>
                <td width="60px">Discount</td>
                <td width="100px">Listing Date</td>
                <td width="100px">Action</td>
                </tr>
EOF;
        // DISPLAY THE RETURNED DATA
        while ($listings_assoc_array = $listings_set->fetch_assoc()) {
            //create new listing_obj for each property in $listings_set, FALSE tells constructor this is not a new listing
            $listing_obj = new Listing($listings_assoc_array, FALSE);
            //output each listing to it's own row
            $listings_table .= "<tr>";
            $listings_table .= "<td><img alt='computer repair, tampa, it, solutions, software, web design, laptop sales, laptops, used laptops, used computers, computer service, service' class='smalldefaultpic' src='../" . $listing_obj->get_default_img() . "'></td>";
            $listings_table .= "<td>" . ucfirst($listing_obj->get_brand_name()) . "</td>";
            $listings_table .= "<td><span class='title'>" . $listing_obj->get_title() . "</span></td>";
            $listings_table .= "<td><span class='title'>" . $listing_obj->get_description() . "</span></td>";
            $listings_table .= "<td>$" . $listing_obj->get_price() . "</td>";
            $listings_table .= "<td>$" . $listing_obj->get_discount() . "</td>";
            $listings_table .= "<td>" . $listing_obj->get_change_date() . "</td>";
            $listings_table .= "<td><a href='?listing_id=" . $listing_obj->get_listing_id() . "'><input type='button' value='Edit' class='button'></a><input type='button' value='Delete' data-listing-id='" . $listing_obj->get_listing_id() . "'  class='button'></td>";
            $listings_table .= "</tr>";
        }
        $listings_table .= "</table><div style='clear:both;'></div>";
        $listings_set->close();
        echo $listings_table;
    }

}

?>
