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
                'filter' => FILTER_VALIDATE_INT,
                'options' => [
                    'default' => 0
                ]
            ],
            'wilaya' => [
                'filter' => FILTER_SANITIZE_STRING,
                'options' => [
                    'default' => ''
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
        // SELECT `id`, `nom`, `prenom`, `adresse`, `tel`, `wilaya`, `status` FROM `clients`
        if (
            $client->nom     !== '' && 
            $client->prenom  !== '' && 
            $client->adresse !== '' && 
            $client->tel     !== '' && 
            $client->wilaya  !== '' &&
            $client->status  !== null
        ){  
            $data = [
                'nom'          => $client->nom,
                'prenom' => $client->id_categorie,
                'adresse'       => $client->wilaya,
                'qtt'          => $client->qtt,
                'prix'         => $client->prix,
                'status'       => $client->status
            ];

            $req = "
                INSERT INTO clients
                (                  
                    nom,
                    id_categorie,
                    wilaya,
                    qtt,
                    prix,
                    status
                )
                VALUES
                (                 
                    :nom,
                    :id_categorie,
                    :wilaya,
                    :qtt,
                    :prix,
                    :status
                )";

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
    
    $req = 'SELECT * FROM categories';
    $categories = $bdd->query($req)->fetchAll(PDO::FETCH_OBJ);

    include 'app/front1/includes/sidebar.php';
    include 'app/front1/includes/header.php';
    include 'app/front1/clients/ajouter.php';
    include 'app/front1/includes/footer.php';