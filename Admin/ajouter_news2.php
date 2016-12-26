<?php
    include 'include/inc.header.php';
    include '../include/inc.connexion.php';
   

   	$titre = $_POST['titre'];
	$contenu=$_POST['contenu'];
	$date=date('Y/m/d');
	$req = $bdd->prepare('INSERT INTO news2(titre,contenu,DateNews) VALUES (:titre, :contenu, :dateNews)');
				$req->execute(array(
					'titre' => $titre,
					'contenu' => $contenu,
					'dateNews' => $date
					));
    include 'include/inc.footer.php';


?>