<?php
    include 'include/inc.header.php';
?>
 <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Ajout News
                </h1>
            </div>
        </div>
<div id="box" class="col-md-9">
	<script src="./ckeditor/ckeditor.js"></script>
	<form method="POST" action="ajouter_news2.php">
	Titre : <input type="text" id="titre" name="titre"/><br />
    Contenu : <br /><textarea cols="80" class="ckeditor" id="news" name="news" rows="10"></textarea>
   <input type="submit" value="envoyer" />
</form>
</div>

<?php
    include 'include/inc.footer.php';
?>    