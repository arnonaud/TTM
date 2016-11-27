<?php
    include 'include/inc.header.php';
    include 'service.php';
    include 'class_equipe.php'
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
            $rencontres = $api->getPouleRencontres($division,$poule);
            $listeEquipes = array();
            $i = 0;
             foreach ($resultats as $resultat) {
                $equipe = new Equipe;
                $equipe->setNom($resultat['equipe']);
                $equipe->setPoint($resultat['pts']);
                $equipe->setJoue($resultat['joue']);
                array_push($listeEquipes, $equipe);

            }

            foreach ($rencontres as $rencontre) {
                $i=0;
                //recheche de l'equipea à maj
                while(strcmp($listeEquipes[$i]->getNom(), $rencontre['equa'])){
                    $i++;
                }
               
                if($rencontre['scorea']){
                    if($rencontre['scorea']>$rencontre['scoreb']) {
                        $listeEquipes[$i]->addVictoire();    
                    }
                    else if($rencontre['scorea']<$rencontre['scoreb']) {
                         $listeEquipes[$i]->addDefaite(); 
                    }
                    else if($rencontre['scorea']==$rencontre['scoreb']){
                         $listeEquipes[$i]->addNul(); 
                    }    
                    $listeEquipes[$i]->addPG($rencontre['scorea']);
                    $listeEquipes[$i]->addPP($rencontre['scoreb']);
                }
                

                $i=0;
                 //recheche de l'equipeb à maj
                while(strcmp($listeEquipes[$i]->getNom(), $rencontre['equb'])){
                    $i++;
                }
                if($rencontre['scorea']){
                    if($rencontre['scorea']<$rencontre['scoreb']) {
                        $listeEquipes[$i]->addVictoire();    
                    }
                    else if($rencontre['scorea']>$rencontre['scoreb']) {
                         $listeEquipes[$i]->addDefaite(); 
                    }
                    else {
                         $listeEquipes[$i]->addNul(); 
                    }
                    $listeEquipes[$i]->addPG($rencontre['scoreb']);
                    $listeEquipes[$i]->addPP($rencontre['scorea']);
                }
            }

            ?>
           <table id="domainsTable" class="tablesorter"> 
                <thead> 
                <tr> 
                    <th>Equipe</th> 
                    <th>Points</th> 
                    <th>Joué</th> 
                    <th>Victoire</th>
                    <th>Nul</th> 
                    <th>Défaite</th>
                    <th>PG</th>
                    <th>PP</th>    
                   
                </tr> 
                </thead> 
                <tbody>             
            <?php
            foreach ($listeEquipes as $equipe) {
                echo "<tr>
                        <td>".$equipe->getNom()."</td>
                        <td>".$equipe->getPoint()."</td>
                        <td>".$equipe->getJoue()."</td>
                        <td>".$equipe->getVictoire()."</td>
                        <td>".$equipe->getNul()."</td>
                        <td>".$equipe->getDefaite()."</td>
                        <td>".$equipe->getPG()."</td>
                        <td>".$equipe->getPP()."</td>
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
                    <th>
                        <?php 
                            $rencontre = $rencontres[0];
                            echo $rencontre['libelle'];
                        ?>
                    </th> 
                </tr> 
                </thead> 
                <tbody>  
               
            <?php
                
                $precedent_libelle = $rencontres[0]['libelle'];
                $i = 0;

                foreach ($rencontres as $rencontre) {
                    if($precedent_libelle == $rencontre['libelle']){
                        echo "<tr id='".$i."'>
                        <td id='".$rencontre['equa']."'>".$rencontre['equa']."</td>
                            <td>".$rencontre['equb']."</td>";
                            if($rencontre['scorea']){
                                echo "<td id='un'>".$rencontre['scorea']."</td>";
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
