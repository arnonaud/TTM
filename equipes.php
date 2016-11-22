<?php
    include 'include/inc.header.php';
    include 'service.php';
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
                $api = new Service('SW227', 'QLUdK193Ye');
                $api->setSerial(Service::generateSerial());
                $api->initialization();



                $equipes1 = $api->getEquipesByClub('04530070','M');
                $equipes2 = $api->getEquipesByClub('04530070','F');
                $equipes3 = $api->getEquipesByClub('04530070');
                echo "Equipe masculine";
                echo "<br />";

                foreach ($equipes1 as &$equipe) {
                    echo "<a href='resultats_equipe.php?".$equipe["liendivision"] ."'>".$equipe["libequipe"] ." ". $equipe["libdivision"]."</a>";
                    echo "<br />";
                }

                echo "<br />";
                echo "<br />";
                echo "Equipe feminine";
                echo "<br />";
                foreach ($equipes2 as &$equipe) {
                    
                   echo "<a href='resultats_equipe.php?".$equipe["liendivision"] ."'>".$equipe["libequipe"] ." ". $equipe["libdivision"]."</a>";
                    echo "<br />";
                }

                echo "<br />";
                echo "<br />";
                echo "Autres competitions";
                echo "<br />";
                foreach ($equipes3 as &$equipe) {
                    
                   echo "<a href='resultats_equipe.php?".$equipe["liendivision"] ."'>".$equipe["libequipe"] ." ". $equipe["libdivision"]."</a>";
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
