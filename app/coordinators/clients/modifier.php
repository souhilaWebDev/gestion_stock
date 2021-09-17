<?php

    $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    if (isset($_POST['update'])) {
        // dump($_POST);die();
        $client = (object) filter_input_array(INPUT_POST, [
            'id' => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => [
                    'default' => 0
                ]
            ],
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
                    // 'regexp' => '/^0[0-9]{9}$/',
                    'default' => ''
                ]
            ],
            'wilaya' => [
                'filter' =>  FILTER_VALIDATE_INT,
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
            $client->id     >   0  &&
            $client->nom     !== '' && 
            $client->prenom  !== '' && 
            $client->adresse !== '' && 
            preg_match("/^0[0-9]{9}$/",$client->tel) &&
            $client->wilaya    > 0  &&
            $client->status  !== null
        ){

            $data = [
                'id'        => $client->id,
                'nom'       => $client->nom,
                'prenom'    => $client->prenom,
                'adresse'   => $client->adresse,
                'tel'       => $client->tel,
                'wilaya'    => $client->wilaya,
                'status'    => $client->status
            ];

            $req = '
                UPDATE clients SET 
                    nom     = :nom,
                    prenom  = :prenom,
                    adresse = :adresse,
                    tel     = :tel,
                    wilaya  = :wilaya,
                    status  = :status
                WHERE id = :id
            ';

            if ($job = $bdd->prepare($req) and $job->execute($data)) {
                
                if ($job->rowCount() === 1) {
                    $_SESSION['msg'] = 'successfully updated !';
                } else {
                    $_SESSION['msg'] = 'no record updated !';
                }
                
                header('Location: '. URL .'/clients/list');
                exit;
            
            } else {

                $msg = 'failed update !';
            }
        } else {

            $msg = 'please fill the fields correctly';
        }

    } elseif ($id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT)) {
        
        $req = '
            SELECT 
                id,
                nom, 
                prenom, 
                adresse, 
                tel, 
                wilaya, 
                status
            FROM clients
            WHERE id = :id_client
            LIMIT 1
        ';
        $sql_data = [
            'id_client' => $id
        ];

        if ($job = $bdd->prepare($req) and $job->execute($sql_data) and $job->rowCount() === 1) {
            $client = $job->fetchObject();
            $client->wilaya = (int) $client->wilaya;
        }

    } else {
        header('Location: ' . URL .'clients/list');
        exit;
    }

   
    include 'app/tools/classes/Data.php';
    include 'app/front/includes/sidebar.php';
    include 'app/front/includes/header.php';
    include 'app/front/clients/modifier.php';
    include 'app/front/includes/footer.php';