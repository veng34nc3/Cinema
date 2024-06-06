<?php 
session_start();
if(isset($_SESSION["log_email"]))
{
   
$servername = "localhost";
$username = "root";
$password = "";

$message = "";

if(isset($_SESSION["log_email"]))
{
    $log_email=$_SESSION["log_email"];
}
if(isset($_SESSION["log_password"]))
{
    $log_password=$_SESSION["log_password"];
}
if(isset($_SESSION["log_password"]))
{
    $log_encpassword=md5($log_password);
}
$conn = new mysqli($servername, $username, $password);




// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully to database";

$sql="SELECT NULL FROM user_database.baza_danych WHERE Email='$log_email' AND Password='$log_encpassword';";


if ($result = mysqli_query($conn, $sql)) {
  // Fetch one and one row
  if($row = $result -> fetch_row()) {
    echo "<script>alert('You have logged in successfully')</script>";
    echo "<script>
    function waitAndHide()
    {
    document.getElementById('login_button_nav').className+=' '+'hide';
    }
    setTimeout(waitAndHide, 2000);
    </script>";
  }
  else
  {
     echo "<script>alert('Wrong password or email')</script>";
      session_unset();
  }

  $result-> free_result();

}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona internetowa</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h2 class="logo">Cinema</h2>
        <nav class="navigation">
            <a href="#">Repertoire</a>
            <a href="#">Price List</a>
            <a href="#">Contact</a>
            <button class="btnLogin-popup" id="login_button_nav">Login</button>
        </nav>
    </header>

    <div class="wrapper">
        <span class="icon-close"><ion-icon name="close-circle-outline"></ion-icon></span>

        <div class="form-box login">
            <h2>Login</h2>
            
            <form action="login.php" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                    <input type="email" required name="log_email">
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" required name="log_password">
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">Remember me</label>
                        <a href ="#">Forgot password?</a>
                </div>
                <input type="submit" class = "btn" value ="Login" />
                <div class="login-register">
                    <p>Don't have an account?<a href="#"
                    class="register-link">Register</a></p>
                </div>
                
            
            </form>
        </div>

        <div class="form-box register">
            <h2>Registration</h2>
            <form action="register.php" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person-outline"></ion-icon></ion-icon></span>
                    <input type="text" required name="reg_username">
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                    <input type="email" required name="reg_email">
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" required name="reg_password">
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">
                        I agree to the terms & conditions</label>
                        
                </div>
                <input type="submit" class = "btn" value ="Login" />
                <div class="login-register">
                    <p>Alredy have an account?<a href="#"
                    class="login-link">Login</a></p>
                </div>
                
            
            </form>
        </div>
            

    </div>

    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>


</html>