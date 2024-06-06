<?php
session_start();
if(isset($_POST["log_email"]))
{
   $_SESSION["log_email"]=$_POST['log_email'];
}
if(isset($_POST["log_password"]))
{
    $_SESSION["log_password"]=$_POST['log_password'];
}

sleep(1);

/*if($_POST['log_email'] == "admin@admin.com" && $_POST['log_password'] == "admin")
{
  header("Location: stronaadmin.php");
  exit;
}
else
{
    header("Location: stronaadmin.php");
    exit();
}*/

header("Location: stronaadmin.php");
  exit;


    

?>