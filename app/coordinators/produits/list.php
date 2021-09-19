<?php 
    if (isset($_GET['page']) && !empty($_GET['page'])) {
        $page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
    } else {
        $page = 1;
    }

    // if($page <= 0 || $page > $nbrPages){
    //     header('Location: ' . URL .'/produits/list');
    //     exit;
    // }

    $req = '
        SELECT count(1) as total 
        FROM produits 
        WHERE status != -1
    ';
    $nbrTotal = (int)($bdd->query($req)->fetch(PDO::FETCH_OBJ)->total);

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
        Limit ' . (($page - 1) * Pagination::$nbrParPage) . ',' . Pagination::$nbrParPage
    ;

    $produits = $bdd->query($req)->fetchAll(PDO::FETCH_OBJ);
 
    
    include 'app/front/includes/sidebar.php';
    include 'app/front/includes/header.php';
    include 'app/front/produits/list.php';
    include 'app/front/includes/footer.php';
