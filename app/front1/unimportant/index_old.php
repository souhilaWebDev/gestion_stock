<?php
require 'login.php';
    // is connected
    if(is_connected()){
        header('Location: dashboard.php');
    }else{
        header('Location: login.php');
    }
    
?>