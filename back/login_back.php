<?php
    if(isset($_POST['submit'])){
        if(
            isset($_POST['login']) and !empty($_POST['login']) &&
            isset($_POST['pwd']) and !empty($_POST['pwd'])
        ){
            $login = $_POST['login'];
            $pwd = $_POST['pwd'];
            
            $job = $bdd->prepare('SELECT * FROM users WHERE login = :login AND pwd = :pwd  LIMIT 1');
            $job->execute([
                ':login' => $login, 
                ':pwd' => $pwd
            ]);
            //recuperation des donnees
            if ($job->rowCount() === 1) 
            {
                list($id ,$nom ,$loginr, , $role) = $job->fetch();
                $_SESSION['user_id'] = $id;
                $_SESSION['nom'] = $nom;
                $_SESSION['login'] = $loginr ;
                $_SESSION['role'] = $role ;
                $_SESSION['connexion'] = 'oui';
                header('Location: dashboard.php'); 
            }else{
                $msg = 'failed authentification'; 
            }
        }else{
            $msg = 'please fill the fields';
        }
    }
    
// trying : 
    // print_r($_SESSION);
    // print_r($_REQUEST);
    // $cookie_name = "user";
    // $cookie_value = "souh";
    // setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day