<?php
     $servername = "localhost";
     $username = "root";
     $password = "";
               
                    
    $FilmInput = $_POST['FilmInput'];
    $LengthInput = $_POST['LengthInput'];
    $CategoryInput = $_POST['CategoryInput'];

    $conn = new mysqli($servername, $username, $password);

     // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO user_database.filmy (id, nazwa, dlugosc, kategoria) 
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