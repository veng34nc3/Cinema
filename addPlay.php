<?php
$servername = "localhost";
$username = "root";
$password = "";

if(isset($_POST["HourInput"]))
{
    $HourInput = $_POST['HourInput'];
};
if(isset($_POST["FilmSelect"]))
{
    $FilmSelect = $_POST['FilmSelect'];
};
if(isset($_POST["AudienceSelect"]))
{
    $AudienceSelect = $_POST['AudienceSelect'];
};

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "INSERT INTO user_database.seanse (ID, godzina, id_filmu, id_sali) 
VALUES (NULL, '$HourInput',
(SELECT id FROM user_database.filmy WHERE nazwa = '$FilmSelect'),
(SELECT id FROM user_database.sale WHERE numer = '$AudienceSelect'))";

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