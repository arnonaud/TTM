<?php
   include './initialisation.php';
   header("Access-Control-Allow-Origin: *");
   header("Access-Control-Allow-Headers: access");
   header("Access-Control-Allow-Methods: GET");
   header("Access-Control-Allow-Credentials: true");
   header('Content-Type: application/json');

   $division = $_GET['division'];
   $poule = $_GET['poule'];
   $detail = $api->getPouleRencontres($division,$poule);

   echo json_encode($detail);
    
?>