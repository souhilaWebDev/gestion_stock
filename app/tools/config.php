<?php
    spl_autoload_register(function ($class) {
		if (file_exists($file = APP . '/tools/classes/' . $class . '.php')) {
			require $file;
		}
	});

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
    require 'app/tools/functions.php';



