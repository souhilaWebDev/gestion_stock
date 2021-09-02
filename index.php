<?php
    define('PROJET', 'gestion_stock_php');
    // define('PROJET', 'souhila');
    define('URL', 'http://localhost/' . PROJET);
    define('APP', '/wamp64/www/' . PROJET); 
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
    if($url === ''){
        // $url = 'home/login';
        header('Location: ' . URL.'/home/login.php');
        exit;
    }        
    $list = explode('?',$url);
    
    if( sizeof($list) > 1 ){
        $route = $list[0];
        $params = $list[1];
        // list($route,$params) = explode('?',$url);
    }else{
        $route = $list[0];
        $params = '';
    }
    
    $request =  explode('/',$route);  
 
    $doss   =  ($request[0] ?? 'home') ?: 'home';
    $action =  ($request[1] ?? 'dashboard') ?: 'dashboard';

    {
        // $bool = isset($request[0]);
        // var_dump($_SERVER['REQUEST_URI']);
        // var_dump($url);
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
        header('Location: ' . URL.'/home/login');
        // header('Location: ' . URL.'/app/front/home/login');
    }
