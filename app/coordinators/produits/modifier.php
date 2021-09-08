<?php

    $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    if (isset($_POST['update'])) {
        $produit = (object) filter_input_array(INPUT_POST, [
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
                    'min_range' => 0,
                    'max_range' => 1,
                    'default' => null
                ]
            ]
        ]);

        if (
            $produit->id           >   0  &&
            $produit->designation  !== '' && 
            $produit->id_categorie >   0  &&
            $produit->description  !== '' &&
            $produit->qtt          >=  0  &&
            $produit->prix         >=  0  &&
            $produit->status       !== null
        ){

            $data = [
                'id'           => $produit->id,
                'designation'  => $produit->designation,
                'id_categorie' => $produit->id_categorie,
                'description'  => $produit->description,
                'qtt'          => $produit->qtt,
                'prix'         => $produit->prix,
                'status'       => $produit->status
            ];

            $req = '
                UPDATE produits SET 
                    designation  = :designation,
                    id_categorie = :id_categorie,
                    description  = :description,
                    qtt          = :qtt,
                    prix         = :prix,
                    status       = :status
                WHERE id = :id
            ';

            if ($job = $bdd->prepare($req) and $job->execute($data)) {
                
                if ($job->rowCount() === 1) {
                    $_SESSION['msg'] = 'successfully updated !';
                } else {
                    $_SESSION['msg'] = 'no record updated !';
                }
                
                header('Location: '. URL .'/produits/list');
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
                designation, 
                id_categorie, 
                description, 
                qtt, 
                prix, 
                status
            FROM produits
            WHERE id = :id_produit
            LIMIT 1
        ';
        $sql_data = [
            'id_produit' => $id
        ];

        if ($job = $bdd->prepare($req) and $job->execute($sql_data) and $job->rowCount() === 1) {
            $produit = $job->fetchObject();
            $produit->prix = (float) $produit->prix;
        }

    } else {
        header('Location: ' . URL .'produit/list');
        exit;
    }

    $req = 'SELECT * FROM categories';    
    $categories = $bdd->query($req)->fetchAll(PDO::FETCH_OBJ);

    include 'app/front1/includes/sidebar.php';
    include 'app/front1/includes/header.php';
    include 'app/front1/produits/modifier.php';
    include 'app/front1/includes/footer.php';