<?php
    define('URL','http://localhost/myStructure');

    session_start();
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=gestion_stock', 'root', '');
    } catch (Exception $e) {
        die("erreur technique : ");
        // die("erreur technique : " . $e->getMessage());
    }
    
    function is_connected(){
        return(($_SESSION['connexion'] ?? '' ) === 'oui');
    }
    
    // require 'tools/functions.php';



