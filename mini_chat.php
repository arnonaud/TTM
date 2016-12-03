<?php
session_start();
include 'include/inc.connexion.php';
if(!isset($_SESSION['pseudo'])){
		$_SESSION['pseudo'] = $_POST['pseudo'];
}
else if (isset($_POST['message']))
	{
	    if(!empty($_POST['message'])) 
	    {
			$message = $_POST['message'];
	        $pseudo = $_SESSION['pseudo'];
	        $req = $bdd->prepare("INSERT INTO minichat(pseudo,message,timestamp) VALUES(:pseudo, :message, :time)");
					$req->execute(array(
						'pseudo' => $pseudo,
						'message' => $message,
						'time' => time()
						));
	    }
	}
 
$reponse = $bdd->query('SELECT * FROM minichat ORDER BY id DESC LIMIT 0,50');
?>
<table id="table_chat">
<?php
while ($val = $reponse->fetch())
{
	$date = new DateTime();
	$date->setTimestamp($val['timestamp']);
	echo "<tr><td id='date_chat'>le ".$date->format('d-m')." à ".$date->format('H:i:s')."</td><td id='pseudo_chat'>".$val['pseudo']." : </td><td id='message_chat'>".$val['message']."</td></tr><br />";
}

?>
</table>