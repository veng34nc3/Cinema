<?php
$servername = "localhost";
$username = "root";
$password = "";

if(isset($_POST["NumberInput"]))
{
    $NumberInput = $_POST['NumberInput'];
};

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "INSERT INTO user_database.sale (ID, numer) 
VALUES (NULL, '$NumberInput');";

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