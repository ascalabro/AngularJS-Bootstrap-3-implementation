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
            //output each listing to it's own row
            $listings_table .= "<tr>";
            $listings_table .= "<td><a class='ajaxGet' href='{$listings_assoc_array['listing_id']}'><img alt='computer repair, tampa, it, solutions, software, web design, laptop sales, laptops, used laptops, used computers, computer service, service' class='smalldefaultpic' src='" . $listings_assoc_array['default_img'] . "'></a></td>";
            $listings_table .= "<td><a class='ajaxGet' href='{$listings_assoc_array['listing_id']}'>" . ucfirst($listings_assoc_array['brand_name']) . "</a></td>";
            $listings_table .= "<td><a class='ajaxGet' href='{$listings_assoc_array['listing_id']}'><span class='title'>" . $listings_assoc_array['title'] . "</span></a></td>";
            $listings_table .= "<td><a class='ajaxGet' href='{$listings_assoc_array['listing_id']}'>$" . $listings_assoc_array['price'] . "</a></td>";
            $listings_table .= "<td><a class='ajaxGet' href='{$listings_assoc_array['listing_id']}'>" . $listings_assoc_array['last_change_date'] . "</a></td>";
            $listings_table .= "<td><a class='ajaxGet' href='{$listings_assoc_array['listing_id']}'><input type='button' vale='More Info' class='button'></a></td>";
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
            
            //output each listing to it's own row
            $listings_table .= "<tr>";
            $listings_table .= "<td><img alt='computer repair, tampa, it, solutions, software, web design, laptop sales, laptops, used laptops, used computers, computer service, service' class='smalldefaultpic' src='../" . $listings_assoc_array['default_img'] . "'></td>";
            $listings_table .= "<td>" . ucfirst($listings_assoc_array['brand_name']) . "</td>";
            $listings_table .= "<td><span class='title'>" . $listings_assoc_array['title'] . "</span></td>";
            $listings_table .= "<td><span class='title'>" . $listings_assoc_array['description'] . "</span></td>";
            $listings_table .= "<td>$" . $listings_assoc_array['price'] . "</td>";
            $listings_table .= "<td>$" . $listings_assoc_array['discount'] . "</td>";
            $listings_table .= "<td>" . $listings_assoc_array['last_change_date'] . "</td>";
            $listings_table .= "<td><a href='?listing_id=" . $listings_assoc_array['listing_id'] . "'><input type='button' value='Edit' class='editor_button'></a><a href='../lib/scripts/delete_listing.php?listing_id=" . $listings_assoc_array['listing_id'] . "'><input type='button' value='Delete' class='editor_button'></a></td>";
            $listings_table .= "</tr>";
        }
        $listings_table .= "</table><div style='clear:both;'></div>";
        $listings_set->close();
        echo $listings_table;
    }

}

?>
