<?php 
    if(isset($_GET['page']) && !empty($_GET['page'])){
        $page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
    } else {
        $page = 1;
    }

    $req ='SELECT count(1) as total FROM produits WHERE status != -1';
    $nbrTotal   = (int)($bdd->query($req)->fetchAll(PDO::FETCH_OBJ))[0]->total;
    $nbrParPage = 5;
    $nbrPages   = ceil( $nbrTotal/$nbrParPage );
    $debutPage  = ( $page-1 ) * $nbrParPage;
   
    $req = '
        SELECT 
            id, 
            designation, 
            id_categorie, 
            description, 
            qtt, 
            prix, 
            status, 
            (
                SELECT designation 
                FROM categories 
                WHERE id = produits.id_categorie 
            ) 
            as cat 
        FROM produits
        WHERE status != -1
        Limit '.$debutPage.','.$nbrParPage
    ;

    $produits = $bdd->query($req)->fetchAll(PDO::FETCH_OBJ);
    
    if($page<=0 && $page> $nbrPages){
        header('Location: ' . URL .'produits/list');
        exit;
    }
    
    include 'app/front1/includes/sidebar.php';
    include 'app/front1/includes/header.php';
    include 'app/front1/produits/list.php';
    include 'app/front1/includes/footer.php';
