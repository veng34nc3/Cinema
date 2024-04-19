<?php
$servername = "localhost";
$username = "root";
$password = "";

if(isset($_POST["log_email"]))
{
    $log_email=$_POST['log_email'];
}
if(isset($_POST["log_password"]))
{
    $log_password=$_POST['log_password'];
}
$conn = new mysqli($servername, $username, $password);


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully to database";

$sql="SELECT NULL FROM user_database.baza_danych WHERE Email='$log_email' AND Password='$log_password';";


if ($result = mysqli_query($conn, $sql)) {
  // Fetch one and one row
  while ($row = $result -> fetch_row()) {
    printf ("$row[0]");
      echo "<h1>You have logged in successfully</h1>";

  }
  $result-> free_result();
  
  //header("Location: strona.php");
  //exit();
  //na pokazanie zostawic, po pokazaniu usunac komentarz i ta wiadomosc
  
}


?>