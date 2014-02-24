<?php

include_once('/../../config.php');
include_once('forms/interface.php');

class db_updater implements listings_utils {

    private $data_connection;

    function __construct() {
        $this->data_connection = new mysqli(DB_HOST, DB_DATA_USERNAME, DB_DATA_PASSWORD, LISTINGS_DB_NAME);
        // TEST IF CONNECTION SUCCEEDED
        if ($this->data_connection->connect_errno) {
            die("Database connection failed: " . $this->data_connection->msyqli_connect_error . " (" . $this->data_connection->mysqli_connect_errno . ")");
        }
    }

    public function validateFields(&$listing_assoc_array) {
        global $errors;

        if ($listing_assoc_array['brand'] == '') {
            $errors['Brand'] = " must have a value";
        }

        if ($listing_assoc_array['price'] != '') {
            if (!is_numeric($listing_assoc_array['price'])) {
                $errors['Price'] = " must be a number.";
            }
        }
        if ($listing_assoc_array['discount'] != '') {
            if (!(is_numeric($listing_assoc_array['discount']) && $listing_assoc_array['discount'] <= 75 && $listing_assoc_array['discount'] >= 0)) {
                $errors['discount'] = " must be a number greater than or equal to 0 and less than or equal to 75.";
            }
        }

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            return false;
        } else {
            return true;
        }
    }

    public function insert_new_listing($listing_assoc_array) {

        $date = (string) date("Y-m-d");
        $hit_count = 0;
        if ($stmt = $this->data_connection->prepare('INSERT INTO laptops (brand_name, title, description, price, discount, last_change_date, hit_count) VALUES (?,?,?,?,?,?,?)')) {
            /* bind parameters for markers */
            $stmt->bind_param("sssdiss", $listing_assoc_array['brand'], $listing_assoc_array['title'], $listing_assoc_array['description'], $listing_assoc_array['price'], $listing_assoc_array['discount'], $date, $hit_count);

            /* execute query */
            $stmt->execute();

            /* close statement */
            $stmt->close();
        } else {
            /* Error */
            printf("Prepared Statement Error: %s\n", $this->data_connection->error);
        }
    }

    public function update_db_row($listing_assoc_array) {

        if (!isset($listing_assoc_array['listing_id'])) {
            //make sure this is is has an id which means it exists already
            echo 'listing doesnt exist';
        } elseif (isset($listing_assoc_array['listing_id'])) {
            // run update query on affaedco_listings.laptops
            $date = (string) date("Y-m-d");
            if ($stmt = $this->data_connection->prepare('UPDATE laptops SET brand_name=?, title=?, description=?, price=?, discount=?, last_change_date=?, hit_count=? WHERE listing_id=?')) {
                /* bind parameters for markers */
                $stmt->bind_param("sssdissi", $listing_assoc_array['brand'], $listing_assoc_array['title'], $listing_assoc_array['description'], $listing_assoc_array['price'], $listing_assoc_array['discount'], $date, $hit_count, $listing_assoc_array['listing_id']);

                /* execute query */
                $stmt->execute();
                /* close statement */
                $stmt->close();
            } else {
                /* Error */
                printf("Prepared Statement Error: %s\n", $this->data_connection->error);
            }
        }
    }

    public function delete_row($listing_id) {
        
    }

    public function updateDefaultImage($new_image_url, $assoc_listing_id) {
        if ($stmt = $this->data_connection->prepare('UPDATE laptops SET default_img = ? WHERE listing_id = ? ')) {
            /* bind parameters for markers */
            $stmt->bind_param("si", $new_image_url, $assoc_listing_id);

            /* execute query */
            $stmt->execute();
            /* close statement */
            $stmt->close();
        } else {
            /* Error */
            printf("Prepared Statement Error: %s\n", $this->data_connection->error);
        }
    }

    public function removeImage($img_id) {
        if ($stmt = $this->data_connection->prepare('DELETE FROM images WHERE img_id = ?')) {
            /* bind parameters for markers */
            $stmt->bind_param("s", $img_id);
            /* execute query */
            $stmt->execute();
            /* close statement */
            $stmt->close();
        } else {
            /* Error */
            printf("Prepared Statement Error: %s\n", $this->data_connection->error);
        }
    }

}

?>
