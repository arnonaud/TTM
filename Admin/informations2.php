<?php
    include 'include/inc.header.php';
    include '../include/inc.connexion.php';
   

	$contenu=$_POST['informations'];
	$date=date('Y/m/d');
	$req = $bdd->prepare('UPDATE informations2 SET contenu = :contenu WHERE id = :id');
				$req->execute(array(
					'contenu' => $contenu,
					'id' => 1
					));
    include 'include/inc.footer.php';


?>