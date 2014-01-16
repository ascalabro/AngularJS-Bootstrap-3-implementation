<?php

class activity_monitor {
    public static function addPageHit($listing_obj){
        $robot_connection = new mysqli('localhost', 'affaedco_robot', 'r7o2b2o8t', 'affaedco_listings');
        $add_hit_query = "UPDATE laptops SET hit_count = hit_count + 1 WHERE listing_id = " . $listing_obj->get_listing_id();
        $add_hit_result = $robot_connection->query($add_hit_query);
        confirm_query($add_hit_result);
        $robot_connection->close();
    }
}

?>
