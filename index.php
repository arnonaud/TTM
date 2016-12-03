<?php
    include 'include/inc.header.php';
    include 'service.php';
    include 'include/inc.connexion.php';
?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Accueil
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12">
                    <!-- Intro Content -->
                <div class="row">
                    <div class="col-md-6">
                        <img class="img-responsive" src="http://placehold.it/750x450" alt="">
                    </div>
                    <div class="col-md-6">
                        <h2>Bienvenue</h2>
                        <?php
                            $reponse = $bdd->query('SELECT * FROM accueil2');
                            $donnees = $reponse->fetch();
                            echo "<p>".$donnees['contenu_accueil']."</p>";

                        ?>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">News Recentes</h2>
                    </div>
                    <?php
                        $reponse = $bdd->query('SELECT * FROM news2');
                        
                        while ($donnees = $reponse->fetch())
                        {
                            ?>
                             <div class="col-md-12 text-center">
                                <div class="thumbnail">
                                    <div class="caption">
                                       <?php echo "<h3>".$donnees['titre']."</h3>";
                                             echo "<p>".$donnees['contenu']."</p>";
                                        ?>
                                    </div>
                                </div>
                            </div>
                       <?php 
                        } ?>               

                </div>
             </div>
        </div>
        <!-- /.row -->

        <hr>

 
    </div>
    <!-- /.container -->


</body>

</html>
