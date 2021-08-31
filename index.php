<?php

    define('URL', 'http://localhost/souhila');
    define('APP', '/wamp64/www/souhila');

    $url = str_replace('/souhila/', '', $_SERVER['REQUEST_URI']);

    if ($url === '') {
        $url = 'login';
    }

    require 'pages/' . $url . '.php';
