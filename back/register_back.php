<?php
    if(isset($_POST['register'])){
        if(
            isset($_POST['nom']) and !empty($_POST['nom']) &&
            isset($_POST['login']) and !empty($_POST['login']) &&
            isset($_POST['pwd']) and !empty($_POST['pwd'])&&
            isset($_POST['cpwd']) and !empty($_POST['cpwd'])&&
            $_POST['pwd'] === $_POST['cpwd']
        ){
            $nom = $_POST['nom'];
            $login = $_POST['login'];
            $pwd = $_POST['pwd'];
            $cpwd = $_POST['cpwd']; 
            $data = [
                'id' => NULL,
                'nom' => $nom,
                'login' => $login,
                'pwd' => password_hash($pwd, PASSWORD_DEFAULT),
                'role' => 'user',
                'status' => 1,
            ];
            $sql = "INSERT INTO users 
            (id, nom, login, pwd, role, status) 
            VALUES 
            (:id,:nom,:login,:pwd,:role,:status)";
            $job= $bdd->prepare($sql);
            $job->execute($data);
            if ($job->rowCount() === 1) {
                $_SESSION['msg'] = 'you are registred now ,log in please !';
                header('Location: index.php');
            }else{
                $msg = 'retry again !';    
            }        
        }else{
            $msg = 'please fill the fields correctly';
        }
    }


// trying : 
    // print_r($_SESSION);
    // print_r($_REQUEST);
    // $cookie_name = "user";
    // $cookie_value = "souh";
    // setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day