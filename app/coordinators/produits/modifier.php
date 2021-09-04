<?php

    if (isset($_POST['register'])) {

    } elseif ($id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT)) {
        
        $sql = '
            SELECT 
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

        $job = $bdd->prepare($sql);
        $job->execute($sql_data);
        $produit = $job->fetchObject();

        include 'app/front1/includes/sidebar.php';
        include 'app/front1/includes/header.php';
        include 'app/front1/produits/modifier.php';
        include 'app/front1/includes/footer.php';

    } else {
        header('Location: ' . URL);
    }

    
