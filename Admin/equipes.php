<?php
    include 'include/inc.header.php';
?>
<script type="text/javascript">
		function chargement(){
			$('#buttonMaj').hide();
			barreProgression();
			$(".charge").css('visibility','visible');
		}

		function barreProgression(){
			console.log("test");
			var progActuel = $('#progression').val()
			$('#progression').val(progActuel+10);

			setTimeout(barreProgression,3500); 
		}
 
		

</script>

<div id="box" class="col-md-9">
	<progress class="charge" id="progression" value="0" max="100"></progress> 
	<p class="charge">Mise à jour des equipes veuillez patienter</p>
	<form method="POST" action="equipes2.php">
		<input id="buttonMaj" type="submit" value="mettre à jour les equipes" onclick="chargement();"></input>
	</form>
</div>

<?php
    include 'include/inc.footer.php';
?>    