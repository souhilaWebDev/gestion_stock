<?php
    // define('PROJET', 'gestion_stock_php');
    define('PROJET', 'souhila');
    define('URL', 'http://localhost/' . PROJET);
    define('APP', '/wamp64/www/' . PROJET);

    $url = str_replace('/' . PROJET . '/', '', $_SERVER['REQUEST_URI']);

    if ($url === '') {
        $url = 'login';
    }

    $page = 'pages/' . $url . '.php';

    if (file_exists($page)) {
        require $page;
    } else {
        header('Location: ' . URL);
    }
