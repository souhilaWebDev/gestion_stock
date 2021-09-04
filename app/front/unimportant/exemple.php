<?php    
    $canal = new PDO('mysql:host=localhost;dbname=test', $user, $pass);

	// en query direct
	$package = $canal->query('SELECT id, nom, population FROM countries WHERE langue = "arabe"');
	// requette d'action
	$job = $canal->query('DELETE FROM countries WHERE id = 5');
	// vérification
	if ($job->rowCount() === 1) {
		echo 'suppression effectuée';
	}

	// en préparation pour la sécurité
	// $job = $canal->prepare('SELECT id, nom, population FROM countries WHERE langue = :lng AND id > :id');
	// $job->execute([
	// 	':lng' => 'arabe', 
	// 	':id' => $id
	// ]);
    // $retour = $job->fetch();

	while ($country = (object) $package->fetch())
	// while (list($id, $nom, $pop) = $package->fetch())
	{
		echo 'ID : ' . $country->id . ' NOM : ' . $country->nom . ' POP : ' . $country->population . '<br>';
		echo 'ID : ' . $id . ' NOM : ' . $nom . ' POP : ' . $population . '<br>';
	}