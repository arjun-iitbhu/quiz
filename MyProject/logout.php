<?php session_start(); ?>
<?php include("includes/conn_open.php") ;?>
<?php
/*if (count($_POST)>0){
    foreach ($_POST as $k=>$v){
        unset($_POST[$k]);
    }
}
header("Location: homepage.php");
exit;*/
$id = $_SESSION["id"];
$query = "UPDATE users SET token = NULL WHERE (id = '$id');";
mysqli_query($connection, $query);
setcookie('remember_me','',time()-3600,'/');
$_SESSION["username"] = null;
$_SESSION["id"] = null;
$_SESSION["newpassword"] = null;
$_SESSION["password"] = null;
include ("includes/conn_close.php");
header("Location: index.php");
exit;
?>
  <!--  <!DOCTYPE html>
    <html lang="en" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width initial-scale=1">
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <meta name="google-signin-client_id" content="27249545514-t5tmgik3f7qml6rhl533k5ikgqqvl2n9.apps.googleusercontent.com">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="style1.css" type="text/css">
    </head>
    <title>Logout</title>
    </head>
    <body>



    </body>
    </html> 
<?php include("includes/conn_close.php"); ?>