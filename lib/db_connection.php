<?php
require_once('/../config.php');

    // CREATE A DATABASE CONNECTION
    // this is the connection to the database
    $public_connection = new mysqli(DB_HOST, PUBLIC_DB_USERNAME, PUBLIC_DB_PASSWORD, LISTINGS_DB_NAME);
    
    
    // TEST IF CONNECTION SUCCEEDED
    if($public_connection->connect_errno){
        die("Database connection failed: " . msyqli_connect_error() . " (" . mysqli_connect_errno() . ")");
    }
    
   
?>