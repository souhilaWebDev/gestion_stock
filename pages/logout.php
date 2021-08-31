<?php
    require 'back/config.php';
    
    if(($_SESSION['connexion'] ?? '' ) === 'oui'){
    disconnected();
    header('Location: ' . URL);
    }
    
   