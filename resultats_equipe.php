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

            $poule = $_GET['cx_poule'];
            $division = $_GET['D1'];

            $api = new Service('SW227', 'QLUdK193Ye');
            $api->setSerial(Service::generateSerial());
            $api->initialization();

            $resultats = $api->getPouleClassement($division,$poule);
            ?>
            <table id="domainsTable" class="tablesorter"> 
                <thead> 
                <tr> 
                    <th>Equipe</th> 
                    <th>Joué</th> 
                    <th>Points</th>  
                </tr> 
                </thead> 
                <tbody>             
            <?php
            foreach ($resultats as $resultat) {
                echo "<tr>
                        <td>".$resultat['equipe']."</td>
                        <td>".$resultat['joue']."</td>
                        <td>".$resultat['pts']."</td>
                      </tr>";  
            }

            ?>
            </tbody>
            </table>
            <?php

            $rencontres = $api->getPouleRencontres($division,$poule);
         
            ?>
            <table id="domainsTable" class="tablesorter"> 
                <thead> 
                <tr> 
                    <th><?php $rencontres[0]['libelle']; ?></th> 
                </tr> 
                </thead> 
                <tbody>  

            <?php
                $precedent_libelle = $rencontres[0]['libelle'];
                foreach ($rencontres as $rencontre) {
                    if($precedent_libelle == $rencontre['libelle']){
                        echo "<tr>
                        <td>".$rencontre['equa']."</td>
                        <td>".$rencontre['equb']."</td>";
                        if($rencontre['scorea']){
                            echo "<td>".$rencontre['scorea']."</td>";
                            echo "<td>".$rencontre['scoreb']."</td>";    
                        }
                        else {
                            echo "<td>-</td>";
                            echo "<td>-</td>";
                        }
                      echo "</tr>";    
                    }
                    else {
                        echo " </tbody>
                                </table>";
                        echo "<table id='domainsTable' class='tablesorter'> 
                            <thead> 
                            <tr> 
                                <th>".$rencontre['libelle']."</th>
                            </tr> 
                            </thead> 
                            <tbody>";
                            echo "<tr>
                        <td>".$rencontre['equa']."</td>
                        <td>".$rencontre['equb']."</td>";
                        if($rencontre['scorea']){
                            echo "<td>".$rencontre['scorea']."</td>";
                            echo "<td>".$rencontre['scoreb']."</td>";    
                        }
                        else {
                            echo "<td>-</td>";
                            echo "<td>-</td>";
                        }
                        
                      echo "</tr>"; 

                    }
                    $precedent_libelle = $rencontre['libelle'];
                      
            } 
             ?>
            </tbody>
            </table>
            <?php  
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
