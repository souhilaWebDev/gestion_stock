<?php
echo'login';
die();
    if(isset($_POST['submit'])){

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $input_pwd = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING);

        if($email !== '' && $input_pwd !== '') {
            
            {
                // $tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING, [
                //     'regexp' => '/^0([0-9]{9})$/'
                // ]);
                // $age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT, [
                //     'default' => 0,
                //     'min' => 18,
                //     'max' => 62
                // ]);
    
                // $inputs = (object) filter_input_array(INPUT_POST, [
                //     'login' => [
                //         'filter' => FILTER_SANITIZE_STRING
                //     ],
                //     'pwd' => [
                //         'filter' => FILTER_SANITIZE_STRING
                //     ],
                //     'tel' => [
                //         'filter' => FILTER_SANITIZE_STRING,
                //         'options' => [
                //             'regexp' => '/^0([0-9]{9})$/'
                //         ]
                //     ],
                //     'age' => [
                //         'filter' => FILTER_VALIDATE_INT,
                //         'options' => [
                //             'default' => 0,
                //             'min' => 18,
                //             'max' => 62
                //         ]
                //     ]
                // ]);
    
                // if ($inputs->login !== '' and $inputs->pwd !== '' and $inputs->age !== false) {
    
                // } else {
                //     echo 'Erreur de données !';
                // }
            }
            
            $job = $bdd->prepare('
                SELECT id, nom, pwd, role
                FROM users 
                WHERE email = :email
                LIMIT 1
                ');
                // WHERE BINARY login = :login
                
            $job->execute([
                ':email' => $email
            ]);

            //recuperation des donnees
            if ($job->rowCount() === 1)
            {
                list($id ,$nom ,$pwd, $role) = $job->fetch();

                if (password_verify($input_pwd, $pwd)) {
                    $_SESSION['user_id']   = $id;
                    $_SESSION['nom']       = $nom;
                    $_SESSION['role']      = $role;
                    $_SESSION['connexion'] = 'oui';
                    header('Location: dashboard.php'); 
                } else {
                    $msg = 'failed authentification'; 
                }
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