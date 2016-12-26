<?php
    include 'include/inc.header.php';  
    include 'include/inc.connexion.php';
?>
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Equipes
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12">
                

            <?php
                $reponse = $bdd->query('SELECT * FROM equipe2 WHERE type="M"');
                echo "Equipe masculine";
                echo "<br />";
                while ($donnees = $reponse->fetch()) {
                
                    echo "<a href='resultats_equipe.php?".$donnees["liendivision"] ."'>".$donnees["libequipe"] ." ". $donnees["libdivision"]."</a>";
                    echo "<br />";
                }


                $reponse = $bdd->query('SELECT * FROM equipe2 WHERE type="F"');
                echo "<br />";
                echo "<br />";
                echo "Equipe feminine";
                echo "<br />";
                while ($donnees = $reponse->fetch()) {                    
                   echo "<a href='resultats_equipe.php?".$donnees["liendivision"] ."'>".$donnees["libequipe"] ." ". $donnees["libdivision"]."</a>";
                    echo "<br />";
                }


                $reponse = $bdd->query('SELECT * FROM equipe2 WHERE type="A"');
                echo "<br />";
                echo "<br />";
                echo "Autres competitions";
                echo "<br />";
                while ($donnees = $reponse->fetch()) {                    
                   echo "<a href='resultats_equipe.php?".$donnees["liendivision"] ."'>".$donnees["libequipe"] ." ". $donnees["libdivision"]."</a>";
                    echo "<br />";
                }
            
            ?>



            </div>
        </div>
        <!-- /.row -->

        <hr>

 
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
