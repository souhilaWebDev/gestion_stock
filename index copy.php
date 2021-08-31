<?php
$url = $_SERVER['REQUEST_URI'];
// var_dump($_SERVER);

// Remove all illegal characters from a url
if(filter_var($url, FILTER_SANITIZE_URL)){
// Validate url
// if(filter_var($sanitizedUrl, FILTER_VALIDATE_URL)){
    echo "The $url is a valid website url";
} else{
    echo "The $url is not a valid website url";
}
// die();
// require 'login.php';
    // is connected
    // if(is_connected()){
    //     header('Location: dashboard.php');
    // }else{
    //     header('Location: login.php');
    // }
    
?>