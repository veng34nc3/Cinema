<?php
$servername = "localhost";
$username = "root";
$password = "";

if(isset($_POST["FilmInput"]))
{
    $FilmInput = $_POST['FilmInput'];
};
if(isset($_POST["LengthInput"]))
{
    $LengthInput = $_POST['LengthInput'];
};
if(isset($_POST["CategoryInput"]))
{
    $CategoryInput = $_POST['CategoryInput'];
};

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "INSERT INTO user_database.filmy (ID, nazwa, dlugosc, kategoria) 
VALUES (NULL, '$FilmInput', '$LengthInput', '$CategoryInput');";

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