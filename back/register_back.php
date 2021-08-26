<?php
    if(isset($_POST['register'])){
        $inputs = (object) filter_input_array(INPUT_POST, [
            'nom' => [
                'filter' => FILTER_SANITIZE_STRING,
                'options' => [
                    'min' => 3,
                    'max' => 20
                ]
            ],
            'email' => [
                'filter' => FILTER_SANITIZE_EMAIL,
                'options' => [
                    'min' => 3
                ]
            ],
            'pwd' => [
                'filter' => FILTER_SANITIZE_STRING
            ],
            'cpwd' => [
                'filter' => FILTER_SANITIZE_STRING
            ]
        ]);

        if ($inputs->nom   !== '' &&
        $inputs->email !== '' && 
        $inputs->pwd   !== '' && 
        $inputs->cpwd  !== '' &&
        $inputs->pwd === $inputs->cpwd){  
            
            $data = [
                'id'     => NULL,
                'nom'    => $inputs->nom,
                'email'  => $inputs->email,
                'pwd'    => password_hash($inputs->pwd , PASSWORD_DEFAULT),
                'role'   => 'user',
                'status' => 1
            ];

            $req = "INSERT INTO users 
            (id, nom, email, pwd, role, status) 
            VALUES 
            (:id,:nom,:email,:pwd,:role,:status)";
            $job= $bdd->prepare($req);
            $job->execute($data);
            
            if ($job->rowCount() === 1) {
                
                $_SESSION['msg'] = 'you are registred now,log in please !';
                header('Location: index.php');
            
            }else{

                $msg = 'failed registration !';    
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