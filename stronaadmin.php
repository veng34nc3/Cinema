<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodawanie do bazy danych</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
</head>

<body>
<header>
    <h2 class = "seans">Film
        <nav class="navigation">
         <button class="btnLogin-popup" id = "Film_add">ADD</button>
         <button class="btnLogin-popup" id = "Film_edit">UPDATE</button>
         </nav></h2>    
    <h2 class = "seans">Play
        <nav class="navigation">
         <button class="btnLogin-popup" id = "Play_add">ADD</button>
         <button class="btnLogin-popup" id = "Play_edit">UPDATE</button>
         </nav></h2>
    <h2 class = "sala">Audience
        <nav class="navigation">
         <button class="btnLogin-popup" id = "Audience_add">ADD</button>
         <button class="btnLogin-popup" id = "Audience_edit">UPDATE</button>
         </nav></h2>
</header>


<div id="myModalAddFilm" class="modal">
    <div class="modal-content">
    <form action="addFilm.php" method="post">
        <span class="closeAF">&times;</span>
        <form method ="POST" id="addForm">
            <label for="FilmInput">Film:</label>
            <input type="text" id="FilmInput" name="FilmInput">
            <br>
            <label for="LengthInput">Length:</label>
            <input type="number" id="LengthInput" name="LengthInput">
            <br>
            <label for="CategoryInput">Category:</label>
            <input type="text" id="CategoryInput" name="CategoryInput">
            <br>
            <button type="submit" id="Submit">Confirm</button>
            
        </form>
    </div>
</div>

<div id="myModalAddPlay" class="modal">
    <div class="modal-content">
    <form action="addPlay.php" method="post">
        <span class="closeAP">&times;</span>
        <form id="addForm">
            <label for="HourInput">Hour:</label>
            <input type="time" id="HourInput" name="HourInput">
            <br>
            <label for="FilmSelect">Nazwa Filmu:</label>
            <select id="FilmSelect" name ="FilmSelect">
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    
                    $sql = "select nazwa from user_database.filmy;";
                    $conn = new mysqli($servername, $username, $password);

                    // Check connection
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }

                    if ($result = mysqli_query($conn, $sql)) {
                        // Fetch one and one row
                        while($row = $result -> fetch_row()) { 
                          echo "<option>".$row[0]."</option>";
                          
                        }}
                ?>
            </select>
            <br>
            <label for="AudienceSelect">Audience number:</label>
            <select id="AudienceSelect" name="AudienceSelect">
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    
                    $sql = "select numer from user_database.sale;";
                    $conn = new mysqli($servername, $username, $password);

                    // Check connection
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }

                    if ($result = mysqli_query($conn, $sql)) {
                        // Fetch one and one row
                        while($row = $result -> fetch_row()) { 
                          echo "<option>".$row[0]."</option>";
                          
                        }}
  
                ?>
            </select>
            <br>
            <button type="submit" id ="Submit">Confirm</button>
        </form>
    </div>
</div>

<div id="myModalAddAudience" class="modal">
    <div class="modal-content">
    <form action="addAudience.php" method="post">
        <span class="closeAA">&times;</span>
        <form id="addForm">
            <label for="NumberInput">Number:</label>
            <input type="number" id="NumberInput" name="NumberInput">
            <br>
            <button type="submit" id ="Submit">Confirm</button>
        </form>
    </div>
</div>


<div id="myModalEditFilm" class="modal">
    <div class="modal-content">
    <form action="editFilm.php" method="post">
        <span class="closeEF">&times;</span>
        <form id="addForm">
            <label for="FilmEditInput">Film:</label>
            <select id="FilmEditInput" name="FilmEditInput">
                <?php
                session_start();
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    
                    $sql = "SELECT id,
                    CONCAT( 'Title: ', filmy.nazwa ,' Length: ', filmy.dlugosc, 'min' , ' Cathegory: ', filmy.kategoria) AS combined_columns
                    from user_database.filmy";
                    $conn = new mysqli($servername, $username, $password);

                    // Check connection
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }

                    if ($result = mysqli_query($conn, $sql)) {
                        echo "";
                        // Fetch one and one row
                        while($row = $result -> fetch_row()) { 
                            $selected = ($row[0] == $selectedValue) ? 'selected' : '';
                            echo "<option>".$row[1]."</option>";
                          
                          
                        }}
                        
                ?>
            </select>
            <br>
            <input type="button" id="submitButton2" value="Prześlij">
            <br>
            <label for="FilmEditName">Title:</label>
            <select id="FilmEditName" name="FilmEditName" disabled>
            <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    
                    $sql = "select nazwa from user_database.filmy";
                    $conn = new mysqli($servername, $username, $password);

                    // Check connection
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }

                    if ($result = mysqli_query($conn, $sql)) {
                        echo "<option></option>";
                        // Fetch one and one row
                        while($row = $result -> fetch_row()) { 
                          echo "<option>".$row[0]."</option>";
                          
                        }}
                ?>
            </select>        
            <br>   
            <label for="FilmEditLength">Length:</label>
            <input type="number" id="FilmEditLength" name="FilmEditLength" disabled>           
            <br>
            <label for="FilmEditCategory">Category:</label>
            <input type="text" id="FilmEditCategory" name="FilmEditCategory" disabled> 
            <br>
            <button type="submit" id ="Submit">Confirm</button>
        </form>
    </div>
</div>


<div id="myModalEditPlay" class="modal">
    <div class="modal-content">
    <form action="editPlay.php" method="post">
        <span class="closeEP">&times;</span>
        <form id="addForm" method="GET" action="AAA">
            <label for="FilmEditSelect">Values:</label>
            <select id="FilmEditSelect" name = "FilmEditSelect">
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    
                    $sql = "SELECT seanse.id,
                CONCAT( 'numer: ', seanse.id ,' godzina: ', seanse.godzina, ' numer sali: ', sale.numer, ' nazwa filmu: ', filmy.nazwa) AS combined_columns
                FROM 
                user_database.seanse 
                INNER JOIN 
                user_database.filmy ON seanse.id_filmu = filmy.id 
                INNER JOIN 
                user_database.sale ON seanse.id_sali = sale.id
                order by seanse.id";
                    $conn = new mysqli($servername, $username, $password);

                    // Check connection
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }

                    if ($result = mysqli_query($conn, $sql)) {
                        // Fetch one and one row
                        $selectedValue = 0;
                        while($row = $result -> fetch_row()) { 
                            $selected = ($row[0] == $selectedValue) ? 'selected' : '';
                            echo "<option>".$row[1]."</option>";
                          
                          
                        }}
                ?>
            </select>
            <input type="button" id="submitButton" value="Prześlij">
        </form>
            
            <form action="editPlay.php" method="post" id="editForm">
            <label for="PlayId">Number:</label>
            <input type="number" id="PlayId" name = "PlayId" disabled>
            <br>
            <label for="HoureditInput">Hour:</label>
            <input type="time" id="HoureditInput" name="HoureditInput" disabled>
            <br>
            <label for="FilmEditSelect2">Film title:</label>
            <select id="FilmEditSelect2" name = "FilmEditSelect2" disabled>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    
                    $sql = "select nazwa from user_database.filmy;";
                    $conn = new mysqli($servername, $username, $password);

                    // Check connection
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }

                    if ($result = mysqli_query($conn, $sql)) {
                        echo "<option></option>";
                        // Fetch one and one row
                        while($row = $result -> fetch_row()) { 
                          echo "<option>".$row[0]."</option>";
                          
                        }}
                ?>
            </select>
            <br>
            <label for="AudienceEditSelect">Audience number:</label>
            <select id="AudienceEditSelect" name="AudienceEditSelect" disabled>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    
                    $sql = "select numer from user_database.sale;";
                    $conn = new mysqli($servername, $username, $password);

                    // Check connection
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }

                    if ($result = mysqli_query($conn, $sql)) {
                        echo "<option></option>";
                        // Fetch one and one row
                        while($row = $result -> fetch_row()) { 
                          echo "<option>".$row[0]."</option>";
                          
                        }}
  
                ?>
            </select>
            <br>
            <button type="submit" id ="Submit">Confirm</button>
        </form>
    </div>
</div>


<div id="myModalEditAudience" class="modal">
    <div class="modal-content">
    <form action="editAudience.php" method="post">
        <span class="closeEA">&times;</span>
        <form id="addForm">
            <label for="AudienceEditSelect">Current Audience number:</label>
            <select id="AudienceEditSelect" name="AudienceEditSelect">
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    
                    $sql = "select numer from user_database.sale;";
                    $conn = new mysqli($servername, $username, $password);

                    // Check connection
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }

                    if ($result = mysqli_query($conn, $sql)) {
                        // Fetch one and one row
                        while($row = $result -> fetch_row()) { 
                          echo "<option>".$row[0]."</option>";
                          
                        }}
  
                ?>
            </select>
            <br>
            <label for="AudienceEditInput">New Audience number:</label>
            <input type="number" id="AudienceEditInput" name="AudienceEditInput">
            <button type="submit" id ="Submit">Confirm</button>
        </form>
    </div>
</div>




<script src="scriptadmin.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>