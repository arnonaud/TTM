<?php
    include 'include/inc.header.php';
    include '../include/inc.connexion.php';
    include '../service.php';


    //récupération des licenciés déjà présent dans la base de données
    $numLicences = Array();
    $i=1;
    $reponse = $bdd->query('SELECT licence FROM licencies2');
    while ($donnees = $reponse->fetch())
    {
       $numLicences[$i] = $donnees['licence']; 
       $i++;
    }    

   
    //récupération de tous les licenciés du club via l'API FFTT
    //ajout dans la base de données si nouveau joueur
    //mise à jour du classement sinon

    $licenciesActuel = Array();
	$api = new Service('SW227', 'QLUdK193Ye');
    $api->setSerial(Service::generateSerial());
    $api->initialization();

    $licencies = $api->getLicencesByClub('04530070');
    $i=1;
	foreach ($licencies as &$licencie) {
		$current = $api->getJoueur($licencie['licence']);
		$nom = $current["nom"];
		$prenom = $current["prenom"];
		$point = $current["valinit"];
		$pointm = $current["point"];
		$licence = $current["licence"];
		if($nom) {
			//recherche si licencié déjà present en base de données
			$key = array_search($licence, $numLicences);
			if($key != NULL) {
				//licencié déjà présent en base de données donc mise à jour du classement
				$req = $bdd->prepare('UPDATE licencies SET nom = :nom, prenom = :prenom, point=:point, pointm = :pointm WHERE licence = :licence');
				$req->execute(array(
					'nom' => $nom,
					'prenom' => $prenom,
					'point' => $point,
					'pointm' => $pointm,
					'licence' => $licence
					));
			}
			else
			{

				//nouveau licencié donc ajout en base
				$req = $bdd->prepare('INSERT INTO licencies(nom, prenom, point, pointm, licence) VALUES(:nom, :prenom, :point, :pointm, :licence)');
				$req->execute(array(
					'nom' => $nom,
					'prenom' => $prenom,
					'point' => $point,
					'pointm' => $pointm,
					'licence' => $licence
					));
			}

			$licenciesActuel[$i] = $licence;
			$i++;
		}

	}

	//suppression de licenciés en trop
	foreach ($numLicences as $numLicence) {
		$key2 = array_search($numLicence, $licenciesActuel);
		if($key2 == NULL){
			//nouveau licencié donc ajout en base
				$req = $bdd->prepare('DELETE FROM licencies WHERE licence=:licence');
				$req->execute(array(
					'licence' => $numLicence
					));
		}
	}

	echo "<p>Mise à jour des licenciés effectuée</p>";

    include 'include/inc.footer.php';


?>