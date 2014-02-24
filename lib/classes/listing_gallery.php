<?php
include_once('/../db_connection.php');

class Listing_Gallery{
    private $assoc_images;
    private $default_img_path;
    
    public function __construct($default_img_path, $listing_id) {
        global $public_connection;
        $query = self::construct_query($listing_id);
        $this->default_img_path = $default_img_path;
        $this->assoc_images = $public_connection->query($query);
    }
    
    private static function construct_query($listing_id){
        return 'SELECT * FROM images WHERE assoc_listing_id = ' . $listing_id;
    }
    
    public function create_listing_gallery(){
        $gallery_default_img = "<img alt='computer repair, tampa, it, solutions, software, web design, laptop sales, laptops, used laptops, used computers, computer service, service' id='gallery-main-img' src='{$this->default_img_path}'>";
        $gallery_thumbnails = '';
        while($images_assoc_array = $this->assoc_images->fetch_assoc()){
            $gallery_thumbnails .= "<img alt='computer repair, tampa, it, solutions, software, web design, laptop sales, laptops, used laptops, used computers, computer service, service' class='gallery_thumb' src='" . $images_assoc_array['img_path'] . "'>";
        }
        $this->assoc_images->close();
        return $gallery_default_img . $gallery_thumbnails;
    }
    
    public function edit_listing_images(){
        $gallery_default_img = "<div class='image_box'><h3>Default Image:</h3><img  id='edit_default_img' src='{$this->default_img_path}'></div> <hr>";
        $gallery_thumbnails = '';
        while($images_assoc_array = $this->assoc_images->fetch_assoc()){
            $gallery_thumbnails .= "<div class='image_box'>";
            $gallery_thumbnails .= "<label>Path: </label><input type='text' disabled value='"  . $images_assoc_array['img_path'] . "'>";
            $gallery_thumbnails .= "<img data-assoc-listing-id='" . $images_assoc_array['assoc_listing_id'] . "' class='edit_img' src='" . $images_assoc_array['img_path'] . "'>";
            $gallery_thumbnails .= "<button data-img-id='{$images_assoc_array['img_id']}' class='delete_img_button' type='button'>Remove</button><button data-img-id='{$images_assoc_array['img_id']}' class='make_default_button' type='button'>Make Default</button>";
            $gallery_thumbnails .= "</div>";
        }
        var_dump($images_assoc_array);
        $this->assoc_images->close();
        return "<div class='images_container'>" . $gallery_default_img . $gallery_thumbnails . "</div>";
    }
}

?>
