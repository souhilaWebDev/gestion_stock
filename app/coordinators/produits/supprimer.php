<?php 
    if ($id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT)) {

        $data = [
            'id_produit' => $id
        ];

        $req = 'DELETE FROM produits WHERE id = :id_produit Limit 1';
     
        $job = $bdd->prepare($req);

        if ($job->execute($data) and $job->rowCount() === 1) {
            
            $_SESSION['msg'] = 'successfully deleted !';
            header('Location: '. URL .'/produits/list');
            exit;

        }
    } else {

        header('Location: ' . URL .'produit/list');
        exit;
    }
    