<?php 
    if ($id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT)) {

        $data = [
            'id_produit' => $id
        ];

        $req = '
            UPDATE produits SET status = -1 WHERE id = :id_produit LIMIT 1
        ';

        if ($job = $bdd->prepare($req) and $job->execute($data) and $job->rowCount() === 1) {
            
            $_SESSION['msg'] = 'successfully deleted !';
            header('Location: '. URL .'/produits/list');
            exit;

        }

    } else {

        header('Location: ' . URL .'/produit/list');
        exit;
    }
