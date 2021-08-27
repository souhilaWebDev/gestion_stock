<?php 
    function is_connected(){
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
// }