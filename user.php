<?php include("conn_open.php"); ?>
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
<title><?php echo $_POST['username'] ?></title>
</head>
<body>
<pre>
    <?php print_r($_POST); ?>
    <br/>
    <?php
    $username = $_POST["username"];
    $password = $_POST["password"];
    $query = "SELECT * FROM users WHERE (Email = '$username');";
    $query1 = "SELECT * FROM users WHERE (Email = '$username' AND Password = '$password');";
    $result = mysqli_query($connection, $query);
    $result_pass = mysqli_query($connection, $query1);
    if(mysqli_fetch_row($result)){
        echo "Welcome Back! ".$username."<br/>";
        if(!mysqli_fetch_row($result_pass)){
            echo "Seems like you entered a wrong password! You need to enter the correct password to go further...";
        }
    } else {
        echo "You are not a registered user.<br/>";
    }
    ?>
    <br/>
    <a href="logout.php">LOGOUT</a>

</pre>
</body>
</html>
<?php include ("conn_close.php"); ?>

