<?php
$servername = "localhost";
$username = "root";
$password = "";

if(isset($_POST["PlayId"]))
{
    $PlayId = $_POST['PlayId'];
};
if(isset($_POST["HoureditInput"]))
{
    $HoureditInput = $_POST['HoureditInput'];
};
if(isset($_POST["FilmEditSelect2"]))
{
    $FilmEditSelect2 = $_POST['FilmEditSelect2'];
};
if(isset($_POST["AudienceEditSelect"]))
{
    $AudienceEditSelect = $_POST['AudienceEditSelect'];
};

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "UPDATE user_database.seanse 
SET 
seanse.godzina = '$HoureditInput', 
seanse.id_filmu = (SELECT id FROM user_database.filmy WHERE nazwa = '$FilmEditSelect2'),
seanse.id_sali = (SELECT id FROM user_database.sale WHERE numer = '$AudienceEditSelect')
where seanse.id = '$PlayId' ";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header("Location: stronaadmin.php");
  exit();
  
} 
else 
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>