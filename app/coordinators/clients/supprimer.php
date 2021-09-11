<?php 
    if ($id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT)) {

        $data = [
            'id_client' => $id
        ];

        $req = '
            UPDATE clients SET status = -1 WHERE id = :id_client LIMIT 1
        ';

        if ($job = $bdd->prepare($req) and $job->execute($data) and $job->rowCount() === 1) {
            
            $_SESSION['msg'] = 'successfully deleted !';
            header('Location: '. URL .'/clients/list');
            exit;

        }

    } else {

        header('Location: ' . URL .'/clients/list');
        exit;
    }
