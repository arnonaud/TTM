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
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12">

            <?php
              
                $reponse = $bdd->query('SELECT * FROM licencies');
             ?>   
                <table id="domainsTable" class="tablesorter"> 
                <thead> 
                <tr> 
                    <th>Nom</th> 
                    <th>Prenom</th> 
                    <th>Actuel</th> 
                    <th>Mensuel</th> 
                    <th>Progression</th>
                    <th>Détails</th> 
                </tr> 
                </thead> 
                <tbody> 
              <?php
                while ($donnees = $reponse->fetch())
                {
                  $progression = ($donnees["pointm"] - $donnees["point"]);
               		echo "<tr id=".$donnees["licence"].">
               				<td>".$donnees["nom"]."</td>
               				<td>".$donnees["prenom"]."</td>
               				<td>".$donnees["point"]."</td>
                      <td>".$donnees["pointm"]."</td>";
                      if($progression == 0){
                        echo "<td style='color:blue'>".$progression."</td>";
                      }
                      else if($progression > 0){
                        echo "<td style='color:green'>".$progression."</td>";
                      }
                      else {
                        echo "<td style='color:red'>".$progression."</td>";
                      }
                      echo "<td><a href='detail_licencie.php?licence=".$donnees["licence"]."'>Détails</a></td>";
               		echo "</tr>";
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


</body>

</html>
