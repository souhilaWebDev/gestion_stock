<?php
    // define('PROJECT','gestion_stock_php');
    define('URL', 'http://localhost/gestion_stock_php');
    define('APP', '/wamp64/www/gestion_stock_php');

    $url = str_replace('/gestion_stock_php/', '', $_SERVER['REQUEST_URI']);

    if ($url === '') {
        $url = 'login';
    }

    require 'pages/' . $url . '.php';
