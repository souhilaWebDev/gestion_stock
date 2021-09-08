<?php

    if (isset($_POST['add'])) {

        $produit = (object) filter_input_array(INPUT_POST, [
            
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
            $produit->designation  !== '' && 
            $produit->id_categorie >   0  &&
            $produit->description  !== '' &&
            $produit->qtt          >=  0  &&
            $produit->prix         >=  0  &&
            $produit->status       !== null
        ){
            $data = [
                'designation'  => $produit->designation,
                'id_categorie' => $produit->id_categorie,
                'description'  => $produit->description,
                'qtt'          => $produit->qtt,
                'prix'         => $produit->prix,
                'status'       => $produit->status
            ];

            $req = "
                INSERT INTO produits
                (
                    designation,
                    id_categorie,
                    description,
                    qtt,
                    prix,
                    status
                )
                VALUES
                (
                    :designation,
                    :id_categorie,
                    :description,
                    :qtt,
                    :prix,
                    :status
                )";

            $job = $bdd->prepare($req);
            $job->execute($data);
            
            if ($job->rowCount() === 1) {
                
                $_SESSION['msg'] = 'successfully added !';
                header('Location: '. URL .'/produits/list');
                exit;
            
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
    include 'app/front1/produits/ajouter.php';
    include 'app/front1/includes/footer.php';