<?php
    include 'include/inc.header.php';
    include 'service.php';
?>
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Detail
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12">
                
                <?php
                    $licence = $_GET['licence'];
                   
                    $api = new Service('SW227', 'QLUdK193Ye');
                    $api->setSerial(Service::generateSerial());
                    $api->initialization();

                  
                    $detail = $api->getJoueur($licence);


                    echo "Nom : " .$detail['nom']."<br />";
                    echo "Prenom : " .$detail['prenom']."<br />";
                    echo "Point Mensuel : " .$detail['point']."<br />";
                    echo "Point Debut de saison : " .$detail['apoint']."<br />";
                    echo "Progression Mensuel : " .$detail['progmois']."<br />";
                    echo "Pogression Annuel : " .$detail['progann']."<br />";
                    echo "Rang National : " .$detail['clnat']."<br />";
                    echo "Rang Regional : " .$detail['rangreg']."<br />";
                    echo "Rang Departemental : " .$detail['rangdep']."<br />";

                   
                ?>

            </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
