<?php
    require 'app/tools/config.php';
    
    if(($_SESSION['connexion'] ?? '' ) === 'oui'){
    disconnected();
    header('Location: ' . URL);
    }
    
   