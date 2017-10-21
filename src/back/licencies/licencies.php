<?php
   header("Access-Control-Allow-Origin: *");
   header("Access-Control-Allow-Headers: access");
   header("Access-Control-Allow-Methods: GET");
   header("Access-Control-Allow-Credentials: true");
   header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TTM";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM licencies";
$result = $conn->query($sql);
$licencies = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        array_push($licencies, $row);
    }
}

echo json_encode($licencies, JSON_NUMERIC_CHECK);
?>



