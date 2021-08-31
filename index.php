<?php
    require 'config.php';
    // var_dump($_SERVER['REQUEST_URI']);

    $request =  explode(
                    '/',
                    trim(
                        str_replace(
                            ['index.php','/myStructure'],
                            '',
                            $_SERVER['REQUEST_URI']
                        ),
                        '/'
                    )  
                );

    // var_dump($request);
    
    $request[0] = isset($request[0]) ? $request[0] : 'home';
    $request[1] = isset($request[1]) ? $request[1] : 'dashboard';
    
    $controller = array_shift($request);
    $action = array_shift($request);
    $request_params = array_values($request);
    $current_url = URL.'/'.$controller.'/'.$action;
    
    // echo'controller : '.$controller.'<br>';
    // echo'action : '.$action.'<br>';
    // echo'params : ';
    // print_r($request_params);
    // echo'<br>';
    // echo'current url : '.$current_url.'<br>';


    if (is_connected()) {
        if ($request[0] === 'home' and $request[1] === 'login') 
            header('Location: ' . URL . '/home/dashboard');
        
    } else {
        
            header('Location: ' . URL . '/home/login');
    }

    $controller_file = 'app/back/' . $controller . '/' . $action . '.php';

	if (file_exists($controller_file)) {
		require $controller_file;
	} else {
		header('Location: ' . URL . '/home/dashboard');
	}
