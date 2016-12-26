<?php
    include 'include/inc.header.php';
    include '../include/inc.connexion.php';
    include '../service.php';



    $api = new Service('SW227', 'QLUdK193Ye');
    $api->setSerial(Service::generateSerial());
    $api->initialization();



    $equipes1 = $api->getEquipesByClub('04530070','M');
    $equipes2 = $api->getEquipesByClub('04530070','F');
    $equipes3 = $api->getEquipesByClub('04530070');

    $req = $bdd->prepare('DELETE FROM equipe2');
	$req->execute();


     foreach ($equipes1 as &$equipe) {
    	
    	$req = $bdd->prepare('INSERT INTO equipe2(liendivision, libequipe, libdivision, type) VALUES(:liendivision, :libequipe, :libdivision, :type)');
    	$req->execute(array(
    		'liendivision' => $equipe["liendivision"],
    		'libequipe' => $equipe["libequipe"],
    		'libdivision' => $equipe["libdivision"],
    		'type' => 'M'
    		));

    }
    foreach ($equipes2 as &$equipe) {
    	
    	$req = $bdd->prepare('INSERT INTO equipe2(liendivision, libequipe, libdivision, type) VALUES(:liendivision, :libequipe, :libdivision, :type)');
    	$req->execute(array(
    		'liendivision' => $equipe["liendivision"],
    		'libequipe' => $equipe["libequipe"],
    		'libdivision' => $equipe["libdivision"],
    		'type' => 'F'
    		));

    }
    foreach ($equipes3 as &$equipe) {
    	
    	$req = $bdd->prepare('INSERT INTO equipe2(liendivision, libequipe, libdivision, type) VALUES(:liendivision, :libequipe, :libdivision, :type)');
    	$req->execute(array(
    		'liendivision' => $equipe["liendivision"],
    		'libequipe' => $equipe["libequipe"],
    		'libdivision' => $equipe["libdivision"],
    		'type' => 'A'
    		));

    }

   
	echo "<p>Mise à jour des equipess effectuées</p>";

    include 'include/inc.footer.php';


?>