<?php
    if(isset($_POST['register'])) {

        $inputs = (object) filter_input_array(INPUT_POST, [
            // 'nom' => [
            //     'filter' => FILTER_VALIDATE_REGEXP,
            //     'options' => [
            //         'regexp' => '/^[a-z ]{5,20}$/i'
            //     ]
            // ],
            'nom' => [
                'filter' => FILTER_CALLBACK,
                'options' => function ($value) {
                    $len = strlen($value);
                    if ($len >= 5 and $len <= 20) {
                        return filter_var($value, FILTER_SANITIZE_STRING);
                    } else {
                        return false;
                    }
                }
            ],
            'email' => [
                'filter' => FILTER_VALIDATE_EMAIL,
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
                header('Location: '.URL);
            
            }else{

                $msg = 'failed registration !';    
            }        
        }else{
            $msg = 'please fill the fields correctly';
        }
    }

    require 'app/front/home/register.php';
