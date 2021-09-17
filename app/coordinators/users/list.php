<?php 
    $users = $bdd->query('SELECT id,nom,email FROM users')->fetchAll(PDO::FETCH_OBJ);

    include 'app/front/includes/sidebar.php';
    include 'app/front/includes/header.php';
    include 'app/front/users/list.php';
    include 'app/front/includes/footer.php';

