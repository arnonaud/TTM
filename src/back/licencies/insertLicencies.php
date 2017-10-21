<?php
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
ini_set('max_execution_time', 300);
mysqli_query($conn, "DELETE FROM licencies");
$licencies = json_decode(file_get_contents("http://localhost/TTM/src/back/rest/licencies.php"));
for ($i=0; $i<sizeof($licencies); $i++) {
    $licencie = json_decode(file_get_contents("http://localhost/TTM/src/back/rest/licencie.php?licence=".$licencies[$i]->{'licence'}));
    $sql = "INSERT INTO licencies (nom, prenom, debut, point, licence, progression_mois, progression_annuel)
    VALUES ('".$licencie->{'nom'}."', '".$licencie->{'prenom'}."', '".$licencie->{'apoint'}."', '".$licencie->{'point'}."', '".$licencie->{'licence'}."', '".$licencie->{'progmois'}."', '".$licencie->{'progann'}."')";
    $conn->query($sql);
}



$conn->close();

?>