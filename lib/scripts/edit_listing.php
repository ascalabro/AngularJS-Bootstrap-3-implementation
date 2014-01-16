<?php
//require_once('../functions.php');

if (isset($_POST)){
    if($_POST['isNewListing'] == 'TRUE'){
        //  treat this as a new listing
        echo'new listing';
    } else {
        //  treat this as an existing listing 
        echo 'existing';
    }
} else {
    redirect_to('../../');
}
?>
