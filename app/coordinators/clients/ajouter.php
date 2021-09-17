<?php

    if (isset($_POST['add'])) {

        $client = (object) filter_input_array(INPUT_POST, [

            'nom' => [
                'filter' => FILTER_SANITIZE_STRING,
                'options' => [
                    'default' => ''
                ]
            ],
            'prenom' => [
                'filter' => FILTER_SANITIZE_STRING,
                'options' => [
                    'default' => ''
                ]
            ],
            'adresse' => [
                'filter' => FILTER_SANITIZE_STRING,
                'options' => [
                    'default' => ''
                ]
            ],
            'tel' => [
                'filter' => FILTER_SANITIZE_STRING,
                'options' => [
                    // 'regexp' => '/^0[1-9]{9}$/',
                    'default' => ''
                ]
            ],
            'wilaya' => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => [
                    'default' => 0
                ]
            ],
            'status' => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => [
                    'min_range' => 0,
                    'max_range' => 1,
                    'default' => null
                ]
            ]
        ]);

        if (
            $client->nom     !== '' && 
            $client->prenom  !== '' && 
            $client->adresse !== '' && 
            preg_match("/^0[0-9]{9}$/", $client->tel) && 
            $client->wilaya    > 0  &&
            $client->status  !== null
        ){
            $data = [
                'nom'       => $client->nom,
                'prenom'    => $client->prenom,
                'adresse'   => $client->adresse,
                'tel'       => $client->tel,
                'wilaya'    => $client->wilaya,
                'status'    => $client->status
            ];

            $req = '
                INSERT INTO clients
                (
                    nom,
                    prenom,
                    adresse,
                    tel,
                    wilaya,
                    status
                )
                VALUES
                (
                    :nom,
                    :prenom,
                    :adresse,
                    :tel,
                    :wilaya,
                    :status
                )
            ';

            $job = $bdd->prepare($req);
            $job->execute($data);
            
            if ($job->rowCount() === 1) {
                
                $_SESSION['msg'] = 'successfully added !';
                header('Location: '. URL .'/clients/list');
            
            } else {

                $msg = 'failed add !';
            }        
        } else {
        
            $msg = 'please fill the fields correctly';
        }

    } 
    
    include 'app/tools/classes/Data.php';
    include 'app/front/includes/sidebar.php';
    include 'app/front/includes/header.php';
    include 'app/front/clients/ajouter.php';
    include 'app/front/includes/footer.php';
