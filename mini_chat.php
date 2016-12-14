<?php
session_start();
include 'include/inc.connexion.php';
if(!isset($_SESSION['pseudo'])){
	if(isset($_POST['pseudo'])){
		$_SESSION['pseudo'] = $_POST['pseudo'];
	}	
}
else if (isset($_POST['message']))
	{
		
	    if(!empty($_POST['message'])) 
	    {
			
			$message = $_POST['message'];
	        $pseudo = $_SESSION['pseudo'];
			$datemsg = date("Y-m-d H:i:s", time());
	        $req = $bdd->prepare("INSERT INTO minichat(pseudo,message,date_msg) VALUES(:pseudo, :message, :datemsg)");
					$req->execute(array(
						'pseudo' => $pseudo,
						'message' => $message,
						'datemsg' => $datemsg
						));
	    }
	}

$reponse = $bdd->query('SELECT * FROM minichat ORDER BY id LIMIT 0,50');
?>
<div id="contenu_chat">
	<?php
	while ($val = $reponse->fetch())
	{
		$date = new DateTime($val['date_msg']);
		$msg = substr($val['message'],0,70);
		$msg = $msg."<br />".substr($val['message'],70,strlen($val['message']));
		echo "<p><span id='date_chat'>le ".$date->format('d-m H:i:s')."</span><span id='pseudo_chat'>".$val['pseudo']." : </span><span id='message_chat'>".$msg."</span></p>";
		
	}

?>
</div>