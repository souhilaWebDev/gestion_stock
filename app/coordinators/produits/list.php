<?php 

    $req = '
        SELECT *,
            (
                SELECT designation 
                FROM categories 
                WHERE id = produits.id_categorie 
            ) as cat 
        FROM produits
        WHERE status != -1
    ';

    $produits = $bdd->query($req)->fetchAll(PDO::FETCH_OBJ);
    
    include 'app/front1/includes/sidebar.php';
    include 'app/front1/includes/header.php';
    include 'app/front1/produits/list.php';
    include 'app/front1/includes/footer.php';
