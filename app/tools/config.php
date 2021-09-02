<?php
    // $host = 'localhost';
    // $db = 'gestion_stock';
    // $user = 'root';
    // $password = '';
    // PDO uses a data source name (DSN) : 
    session_start();
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=gestion_stock', 'root', '');
    } catch (Exception $e) {
        die("erreur technique : ");
        // die("erreur technique : " . $e->getMessage());
    }

    // if($bdd){
    //     $_SESSION['connexion'] = 'oui';
    // }
    require 'app/tools/functions.php';



