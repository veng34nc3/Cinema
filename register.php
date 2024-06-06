<?php
$servername = "localhost";
$username = "root";
$password = "";

if(isset($_POST["reg_username"]))
{
    $reg_username = $_POST['reg_username'];
};
if(isset($_POST["reg_email"]))
{
    $reg_email = $_POST['reg_email'];
};
if(isset($_POST["reg_password"]))
{
    $reg_password = $_POST['reg_password'];
};
if(isset($_POST["reg_password"]))
{
    $reg_encpassword = md5($reg_password);
};

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "INSERT INTO user_database.baza_danych (ID, Username, Email, Password, Date) 
VALUES (NULL, '$reg_username', '$reg_email', '$reg_encpassword', CURRENT_TIMESTAMP);";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header("Location: strona.php");
  exit();
  
} 
else 
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>