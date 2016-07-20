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
    <?php 
    $Email = $_POST['newemail'];
    $FirstName = $_POST['firstname'];
    $LastName = $_POST['lastname'];
    $Password = $_POST['newpassword'];
    $message = "Go Back!";
    ?>
    <?php print_r($_POST); ?>
    <br/>
    <?php
    echo "Hello ".$_POST['firstname']."!<br/>";
    ?>
    <br/>
    <?php
    $query_imp = "SELECT * FROM users WHERE (Email = '$Email');";
    $result = mysqli_query($connection, $query_imp);
    if(mysqli_fetch_row($result)){
        echo "Sorry! We already have an account using this email with us... <br/>";
    } else {
        //make the entry into the database
        $query = "INSERT INTO users (Email, FirstName, LastName, Password)
                    VALUES ('{$Email}', '{$FirstName}', '{$LastName}', '{$Password}')";
        mysqli_query($connection, $query);
        echo "Your account has been successfully creted!";
        $message = "LOGOUT";
    }
    ?>
    <a href="logout.php"><?php echo "$message"?></a>


</pre>
</body>
</html>
<?php include ("conn_close.php"); ?>
