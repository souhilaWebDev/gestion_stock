<?php 

    $clients = $bdd
        ->query('SELECT * FROM clients WHERE status != -1')
        ->fetchAll(PDO::FETCH_OBJ);
    
    include 'app/tools/classes/Data.php';
    include 'app/front/includes/sidebar.php';
    include 'app/front/includes/header.php';
    include 'app/front/clients/list.php';
    include 'app/front/includes/footer.php';
