<?php
    define('PROJET', 'gestion_stock_php');
    // define('PROJET', 'souhila');
    define('URL', 'http://localhost/' . PROJET);
    define('APP', '/wamp64/www/' . PROJET);
    
    require 'app/tools/config.php';

    $url =  trim(
        preg_replace(
            "/[^a-zA-Z0-9\-\_\/\?\&\=]/",
            '',
            str_replace(
                ['/'.PROJET.'/'],
                '',
                $_SERVER['REQUEST_URI']
            )
        ),
        '/'
    );

    if($url === '') {
        header('Location: ' . URL . '/home/login.php');
        exit;
    }

    list($route) = explode('?', $url);
    
    $request = explode('/', $route);
    // if $request[0] isset take it else 'home' then if === ''
    $doss    = ($request[0] ?? 'home') ?: 'home';
    $action  = ($request[1] ?? 'dashboard') ?: 'dashboard';

    if (!is_connected() and ($doss !== 'home' or ($action !== 'login' and $action !== 'register'))) {
        header('Location: ' . URL . '/home/login');
    } elseif (is_connected() and $doss === 'home' and $action === 'login') {
        header('Location: ' . URL . '/home/dashboard');
    }

    {
        // $bool = isset($request[0]);
        // var_dump($_SERVER['REQUEST_URI']);
        // var_dump($url, $route);
        // var_dump($list);
        // var_dump($route);
        // var_dump($params);
        // print_r($request);
        // var_dump($request[0]);
        // var_dump($bool);
        // var_dump($doss);
        // var_dump($action);
        // var_dump($act);
        // die();
    }

    $page = 'app/front/' . $doss .'/'.$action. '.php';

    if (file_exists($page)) {
        require $page;
    } else {
        header('Location: ' . URL . '/home/login');
    }


    /**
     * TODOS
     * -----
     * création de la structure des controleurs
     */
