<?php
    include 'include/inc.header.php';
    include 'service.php';
    include 'include/inc.connexion.php';
?>

  <script type="text/javascript" src="./js/jquery.tablesorter.min.js"></script>
   <link rel="stylesheet" href="./css/style.css" type="text/css" media="print, projection, screen" />

   <script type="text/javascript">
     
        
            $(document).ready(function() 
        { 
            $("#domainsTable").tablesorter({sortList: [[3,1],[2,0]]}); 
        } 
    );
        
  

   </script>
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Licenciés
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-4 entete">
                <p>Nom</p>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-4 entete">
                <p>Prenom</p>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2 entete">
                <p>Actuel</p>
            </div>
            <div class="col-md-2 col-sm-2 hidden-xs entete">
                <p>Mensuel</p>
            </div>
            <div class="col-md-2 col-sm-2 hidden-xs entete">
                <p>Progression</p>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2 entete">
                <p>Détails</p>
            </div>
        </div>
        <?php

        $reponse = $bdd->query('SELECT * FROM licencies2');
    
        while ($donnees = $reponse->fetch())
        {
            $progression = ($donnees["pointm"] - $donnees["point"]);
            echo "<div class='row'>";
            echo "<div class='col-md-2 col-sm-2 col-xs-4 licencie_contenu_gauche'>
                        <p>".$donnees["nom"]."</p>
                    </div> ";

            echo "<div class='col-md-2 col-sm-2 col-xs-4 licencie_contenu'>
                        <p>".$donnees["prenom"]."</p>
                    </div> ";

            echo "<div class='col-md-2 col-sm-2 col-xs-2 licencie_contenu'>
                        <p>".$donnees["point"]."</p>
                    </div> ";

            echo "<div class='col-md-2 col-sm-2 hidden-xs licencie_contenu'>
                        <p>".$donnees["pointm"]."</p>
                    </div> ";

            if($progression == 0){
                    echo "<div class='col-md-2 col-sm-2 hidden-xs licencie_contenu'>
                        <p>".$progression."</p>
                    </div> ";
            }
            else if($progression > 0){
                    echo "<div class='col-md-2 col-sm-2 hidden-xs licencie_contenu'>
                        <p>".$progression."</p>
                    </div> ";                   
            }
            else {
                    
                    echo "<div class='col-md-2 col-sm-2 hidden-xs licencie_contenu'>
                        <p>".$progression."</p>
                    </div> ";                    
            }
                echo "<div class='col-md-2 col-sm-2 col-xs-2 licencie_contenu_droite'>
                        <a href='detail_licencie.php?licence=".$donnees["licence"]."'>Detail</a>
                    </div>";
            echo "</div>";

        }
              
        ?>
        <hr>
    </div>
</body>

</html>
