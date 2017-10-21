<?php
   include './initialisation.php';
   header("Access-Control-Allow-Origin: *");
   header("Access-Control-Allow-Headers: access");
   header("Access-Control-Allow-Methods: GET");
   header("Access-Control-Allow-Credentials: true");
   header('Content-Type: application/json');


   $numLicence = $_GET['licence'];
   $detail = $api->getJoueurPartiesSpid($numLicence);


   echo json_encode($detail);
    
?>