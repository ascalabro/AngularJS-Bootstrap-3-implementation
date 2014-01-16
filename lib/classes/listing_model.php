<?php

class Listing {
    private $listing_id;
    private $default_img;
    private $brand_name;
    private $title;
    private $description;
    private $price;
    private $discount = 0;
    private $last_change_date;
    
    function __construct($listing_assoc_array,$isNewListing) {
        if($isNewListing == TRUE){
            //first validate the fields before assigning to variables
            $valid_listings_fields = Array();
            if($valid_listings_fields = $this->validateFields($listing_assoc_array)){
                $this->assign_local_vars($valid_listings_fields);
                $this->execute_query($this->constructQuery());
            }
        } else {
            //just assign the variables if this object is not a new listing
             $this->assign_local_vars($listing_assoc_array);
            //
        }
        
    }
    
    private function assign_local_vars($listing_assoc_array){
            $this->listing_id = $listing_assoc_array['listing_id'];
            $this->default_img = $listing_assoc_array['default_img'];
            $this->brand_name = $listing_assoc_array['brand_name'];
            $this->title = $listing_assoc_array['title'];
            $this->description = $listing_assoc_array['description'];
            $this->price = $listing_assoc_array['price'];
            $this->discount = $listing_assoc_array['discount'];
            $this->last_change_date = $listing_assoc_array['last_change_date'];
    }
    
    public function get_listing_id(){   return $this->listing_id;       }
    
    public function get_default_img(){  return $this->default_img;      }
    
    public function get_brand_name(){   return ucfirst($this->brand_name);       }
    
    public function get_title(){   return $this->title;       }
    
    public function get_description(){  return $this->description;      }
    
    public function get_price(){        return $this->price;            }
    
    public function get_discount(){     return $this->discount;         }
    
    public function get_change_date(){  return $this->last_change_date; }
    
    private function validateFields($listing_assoc_array){
        global $errors;
        
        return $valid_array;
    }
    
}



?>
