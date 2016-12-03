<?php
    include 'include/inc.header.php';
?>
 <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Modifier page Informations
                </h1>
            </div>
        </div>
<div id="box" class="col-md-9">
	<script src="./ckeditor/ckeditor.js"></script>
	<form method="POST" action="informations2.php">
    Contenu : <br /><textarea cols="100" class="ckeditor" id="informations" name="informations" rows="20"></textarea>
   <input type="submit" value="envoyer" />
</form>
</div>

<?php
    include 'include/inc.footer.php';
?>    