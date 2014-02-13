<?php

include_once('forms/interface.php');
include_once('/../functions.php');
include_once('/../db_connection.php');

class Listing implements listings_utils {

    private $listing_id;
    private $default_img;
    private $brand_name;
    private $title;
    private $description;
    private $price;
    private $discount = 0;
    private $last_change_date;

    function __construct($listing_assoc_array, $isNewListing) {
        if ($isNewListing == 'TRUE') {
            //first validate the fields before assigning to variables
            if ($this->validateFields($listing_assoc_array)) {
                $this->insert_new_listing($listing_assoc_array);
            } else {
                echo form_errors($_SESSION['errors']);
                return false;
            }
        } else { // this must not be a new listing
            //just assign the variables if this object is not a new listing
            $this->assign_local_vars($listing_assoc_array);
            $this->update_db_row($listing_assoc_array);
        }
    }

    private function assign_local_vars($listing_assoc_array) {
        $this->listing_id = isset($listing_assoc_array['listing_id']) ? $listing_assoc_array['listing_id'] : null;
        $this->default_img = isset($listing_assoc_array['default_img']) ? $listing_assoc_array['default_img'] : null;
        $this->brand_name = isset($listing_assoc_array['brand_name']) ? $listing_assoc_array['brand_name'] : null;
        $this->title = isset($listing_assoc_array['title']) ? $listing_assoc_array['title'] : null;
        $this->description = isset($listing_assoc_array['description']) ? $listing_assoc_array['description'] : null;
        $this->price = isset($listing_assoc_array['price']) ? $listing_assoc_array['price'] : null;
        $this->discount = isset($listing_assoc_array['discount']) ? $listing_assoc_array['discount'] : null;
        $this->last_change_date = isset($listing_assoc_array['last_change_date']) ? $listing_assoc_array['last_change_date'] : null;
    }

    public function get_listing_id() {
        return $this->listing_id;
    }

    public function get_default_img() {
        return $this->default_img;
    }

    public function get_brand_name() {
        return ucfirst($this->brand_name);
    }

    public function get_title() {
        return $this->title;
    }

    public function get_description() {
        return $this->description;
    }

    public function get_price() {
        return $this->price;
    }

    public function get_discount() {
        return $this->discount;
    }

    public function get_change_date() {
        return $this->last_change_date;
    }

    private function validateFields(&$listing_assoc_array) {
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
        $data_connection = new mysqli(DB_HOST, DB_DATA_USERNAME, DB_DATA_PASSWORD, LISTINGS_DB_NAME);
        // TEST IF CONNECTION SUCCEEDED
        if ($data_connection->connect_errno) {
            die("Database connection failed: " . $data_connection->msyqli_connect_error . " (" . $data_connection->mysqli_connect_errno . ")");
        }
        $date = (string) date("Y-m-d");
        $hit_count = 0;
        if ($stmt = $data_connection->prepare('INSERT INTO laptops (brand_name, title, description, price, discount, last_change_date, hit_count) VALUES (?,?,?,?,?,?,?)')) {
            /* bind parameters for markers */
            $stmt->bind_param("sssdiss", $listing_assoc_array['brand'], $listing_assoc_array['title'], $listing_assoc_array['description'], $listing_assoc_array['price'], $listing_assoc_array['discount'], $date, $hit_count);

            /* execute query */
            $stmt->execute();

            /* close statement */
            $stmt->close();
        } else {
            /* Error */
            printf("Prepared Statement Error: %s\n", $data_connection->error);
        }
        $data_connection->close();
    }

    public function update_db_row($listing_assoc_array) {
        $data_connection = new mysqli(DB_HOST, DB_DATA_USERNAME, DB_DATA_PASSWORD, LISTINGS_DB_NAME);
        // TEST IF CONNECTION SUCCEEDED
        if ($data_connection->connect_errno) {
            die("Database connection failed: " . $data_connection->msyqli_connect_error . " (" . $data_connection->mysqli_connect_errno . ")");
        }
        if (!isset($listing_assoc_array['listing_id'])) {
            //make sure this is is has an id which means it exists already
            echo 'listing doesnt exist';
        } elseif (isset($listing_assoc_array['listing_id'])) {
            // run update query on affaedco_listings.laptops
            $date = (string) date("Y-m-d");
            if ($stmt = $data_connection->prepare('UPDATE laptops SET brand_name=?, title=?, description=?, price=?, discount=?, last_change_date=?, hit_count=? WHERE listing_id=?')) {
                /* bind parameters for markers */
                $stmt->bind_param("sssdissi", $listing_assoc_array['brand'], $listing_assoc_array['title'], $listing_assoc_array['description'], $listing_assoc_array['price'], $listing_assoc_array['discount'], $date, $hit_count, $listing_assoc_array['listing_id']);

                /* execute query */
                $stmt->execute();
                /* close statement */
                $stmt->close();
            } else {
                /* Error */
                printf("Prepared Statement Error: %s\n", $data_connection->error);
            }
            $data_connection->close();
        }
    }

    public function delete_row($listing_id) {
        
    }

}

?>
