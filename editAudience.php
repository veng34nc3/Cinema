<?php
$servername = "localhost";
$username = "root";
$password = "";

if(isset($_POST["AudienceEditSelect"]))
{
    $AudienceEditSelect = $_POST['AudienceEditSelect'];
};
if(isset($_POST["AudienceEditInput"]))
{
    $AudienceEditInput = $_POST['AudienceEditInput'];
};


// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "UPDATE user_database.sale 
SET numer = '$AudienceEditInput'
where numer = '$AudienceEditSelect' ";

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