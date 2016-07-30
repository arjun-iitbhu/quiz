<?php session_start(); ?>
<?php include("includes/conn_open.php"); ?>
<?php include("includes/pass_encrypt.php"); ?>
<?php if(!isset($_SESSION['id'])){
    header("Location: index.php");
    exit;
} ?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style1.css" type="text/css">
</head>
<title>Hello!</title>
</head>
<body>
<pre>
    <?php echo $_SESSION["id"]; ?>
    <br/>
    <a href="user.php?id=<?php echo $_SESSION["id"]?>">YOUR PAGE!</a>
    <br/>
    <a href="logout.php">LOGOUT</a>

</pre>
</body>
</html>
<?php include("includes/conn_close.php"); ?>

