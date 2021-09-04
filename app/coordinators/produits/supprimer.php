<?php 

    if (empty($_GET['id'])) {
    //    rediriger
    }else{

        $id_prod =  
            str_replace(
                ['-','+'],
                '',
                filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)
            );
    
    
        }
    


    $req = 'DELETE FROM produits WHERE id = :id Limit 1 ';

    $produits = $bdd->prepare($req);
    
    
    include 'app/front1/includes/sidebar.php';
    include 'app/front1/includes/header.php';
    include 'app/front1/produits/list.php';
    include 'app/front1/produits/modifier.php';
    include 'app/front1/includes/footer.php';
