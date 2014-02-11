<?php
//CHECK SESSION VARIABLES
require_once '../functions.php';


if(isset($_GET['listing_id'])){
        $listing_id = $_GET['listing_id'];
        $data_connection = new mysqli(DB_HOST, DB_DATA_USERNAME, DB_DATA_PASSWORD, LISTINGS_DB_NAME);
        // TEST IF CONNECTION SUCCEEDED
        if ($data_connection->connect_errno){
            die("Database connection failed: " . $data_connection->msyqli_connect_error . " (" . $data_connection->mysqli_connect_errno . ")");
        }
        // proceed to delete listing with id $id
        if($stmt = $data_connection->prepare("DELETE FROM laptops WHERE listing_id = ?")){
            $stmt->bind_param("i", $listing_id);
            if($stmt->execute()){
                $stmt->close();
                redirect_to("../../cms/?manage_listings");
            }
            
        }
    
} else {
    echo '4040404040404040404040404';
}
?>
