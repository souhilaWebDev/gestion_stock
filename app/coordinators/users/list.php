<?php 
    $users = $bdd->query('SELECT id,nom,email FROM users')->fetchAll(PDO::FETCH_OBJ);

    include 'app/front1/includes/sidebar.php';
    include 'app/front1/includes/header.php';
    include 'app/front1/users/list.php';
    include 'app/front/includes/footer.php';

