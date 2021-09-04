<?php 
    $providers = $bdd->query('SELECT * FROM fournisseurs')->fetchAll(PDO::FETCH_OBJ);
    
    include 'app/front1/includes/sidebar.php'; 
    include 'app/front1/includes/header.php'; 
    include 'app/front1/fournisseurs/list.php'; 
    include 'app/front1/includes/footer.php'; 