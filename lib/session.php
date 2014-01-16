<?php

date_default_timezone_set('America/New_York'); 
$errors = array();
session_start();
function message(){
    if (isset($_SESSION['message'])){
        $output =  "<div class=\"message\">";
        $output .= "<h3>Last Action: </h3><p style='margin-top:20px;margin-left:10px;'><span style='font-size: larger;color:#606300;font-weight:lighter;';> ";
        $output .= htmlentities($_SESSION['message']);
        $output .= "</p></div>";
        //once displayed, were done so set it to null
        $_SESSION['message'] = null;
        return $output;
    }
}

function errors(){
    if (isset($_SESSION['errors'])){
        $errors = $_SESSION['errors'];
        $_SESSION['errors'] = null;
        return $errors;
    }
}

function check_logged(){
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == FALSE){
        redirect_to('cms/index.php');
    }
    //else continue to load page.
}

function check_sessionExp(){
    $now = time();
    if($now > $_SESSION['expire']){
        session_destroy();
        $_SESSION['message'] = 'Session Timed Out. Please Log In.';
        redirect_to('cms/index.php');
    }
}

function refreshSession(){
    $_SESSION['start'] = time(); // taking now logged in time
    $_SESSION['expire'] = $_SESSION['start'] + (75 * 60) ; // ending a session in 75 minutes from the starting time
}

function logOut(){
    session_destroy();
}


?>
