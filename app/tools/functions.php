<?php 
    function is_connected(){
        return true;
        return(($_SESSION['connexion'] ?? '' ) === 'oui');
    }

    function disconnected(){
        // if(($_SESSION['connexion'] ?? '' ) === 'oui'){

        // remove all session variables
        session_unset();
        // destroy the session
        session_destroy();
        // header('Location: index.php');   
    }

    function dump($var, $pre = true)
	{
		if ($pre) {
            echo '<pre>';
            var_dump($var);
            echo '</pre>';
        } else {
            var_dump($var);
        }
	}