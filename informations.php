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
                <h1 class="page-header">Informations
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
                        <?php
                            $reponse = $bdd->query('SELECT * FROM informations2');
                            $donnees = $reponse->fetch();
                            echo "<p>".$donnees['contenu']."</p>";

                        ?>
                    </div>
                </div>
             </div>
        </div>
        <!-- /.row -->
        <hr>
    </div>
    <!-- /.container -->


</body>

</html>
