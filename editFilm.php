<?php
$servername = "localhost";
$username = "root";
$password = "";

if(isset($_POST["FilmEditInput"]))
{
    $FilmEditInput = $_POST['FilmEditInput'];
};
if(isset($_POST["FilmEditLength"]))
{
    $FilmEditLength = $_POST['FilmEditLength'];
};
if(isset($_POST["FilmEditCategory"]))
{
    $FilmEditCategory = $_POST['FilmEditCategory'];
};

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "UPDATE user_database.filmy 
SET dlugosc = '$FilmEditLength', kategoria = '$FilmEditCategory'
where nazwa = '$FilmEditInput' ";

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