<?php 

    $clients = $bdd
        ->query('SELECT * FROM clients WHERE status != -1')
        ->fetchAll(PDO::FETCH_OBJ);
    
    include 'app/front1/includes/sidebar.php';
    include 'app/front1/includes/header.php';
    include 'app/front1/clients/list.php';
    include 'app/front1/includes/footer.php';
