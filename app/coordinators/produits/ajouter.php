<?php

    if (isset($_POST['update'])) { 
        dump($_POST);
        $inputs = (object) filter_input_array(INPUT_POST, [
            'id' => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => [
                    'default' => 0
                ]
            ],
            'designation' => [
                'filter' => FILTER_SANITIZE_STRING,
                'options' => [
                    'default' => ''
                ]
            ],
            'id_categorie' => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => [
                    'default' => 0
                ]
            ],
            'description' => [
                'filter' => FILTER_SANITIZE_STRING,
                'options' => [
                    'default' => ''
                ]
            ],
            'qtt' => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => [
                    'default' => 0
                ]
            ],
            'prix' => [
                'filter' => FILTER_VALIDATE_FLOAT,
                'options' => [
                    'default' => 0
                ]
            ],
            'status' => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => [
                    'default' => 0
                ]
            ]
        ]);

        if (
            $inputs->id           !== '' &&
            $inputs->designation  !== '' && 
            $inputs->id_categorie !== '' && 
            $inputs->description  !== '' &&
            $inputs->qtt          !== '' &&
            $inputs->prix         !== '' &&
            $inputs->status       !== '' 
        ){  
            $data = [
                'id'           => $inputs->id,
                'designation'  => $inputs->designation,
                'id_categorie' => $inputs->id_categorie,
                'description'  => $inputs->description,
                'qtt'          => $inputs->qtt,
                'prix'         => $inputs->prix,
                'status'       => $inputs->status
            ];
           
            $req = "UPDATE produits SET 
                        designation  = :designation,
                        id_categorie = :id_categorie,
                        description  = :description,
                        qtt          = :qtt,
                        prix         = :prix,
                        status       = :status
                    WHERE id = :id ";

            $job = $bdd->prepare($req);
            $job->execute($data);
            
            if ($job->rowCount() === 1) {
                
                $_SESSION['msg'] = 'successfully updated !';
                header('Location: '. URL .'/produits/list');
            
            } else {

                $msg = 'failed update !';
            }        
        } else {
        
            $msg = 'please fill the fields correctly';
        }

    } elseif ($id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT)) {
        
        $req1 = '
            SELECT 
                id,
                designation, 
                id_categorie, 
                description, 
                qtt, 
                prix, 
                status
            FROM produits
            WHERE id = :id_user
            LIMIT 1';
        $sql_data = [
            'id_user' => $id
        ];

        $job = $bdd->prepare($req1);
        $job->execute($sql_data);
        $produit = $job->fetchObject();


        $req2 = 'SELECT * FROM categories';
        
        $categories = $bdd->query($req2)->fetchAll(PDO::FETCH_OBJ);

        include 'app/front1/includes/sidebar.php';
        include 'app/front1/includes/header.php';
        include 'app/front1/produits/modifier.php';
        include 'app/front1/includes/footer.php';

    } else {
        header('Location: ' . URL .'produit/list');
    }