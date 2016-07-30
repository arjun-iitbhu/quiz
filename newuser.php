<?php session_start(); ?>
<?php //Go Back if reaching this page yourself!
if(!isset($_SESSION['id'])){
    header("Location: index.php");
    exit;
} ?>
<?php include("includes/conn_open.php"); ?>
<?php include("includes/pass_encrypt.php"); ?>
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
    <title><?php echo $_SESSION["firstname"] ?></title>
    </head>
    <body>
<pre>
    <?php
    $link = "";
    $Email = $_SESSION['newemail'];
    $Email = mysqli_real_escape_string($connection,$Email);
    $FirstName = $_SESSION['firstname'];
    $FirstName = mysqli_real_escape_string($connection,$FirstName);
    $LastName = $_SESSION['lastname'];
    $LastName = mysqli_real_escape_string($connection,$LastName);
    $Password = pass_encrypt($_SESSION['newpassword']);
    $id = pass_encrypt($_SESSION['newemail'].$_SESSION['newpassword']);
    $_SESSION["id"] = $id;
    $message = "Go Back!";
    ?>

    <?php print_r($_SESSION); ?>
    <br/>
    <?php
    echo "Hello ".$_SESSION['firstname']."!<br/>";
    ?>
    <br/>
    <?php
    $query_imp = "SELECT * FROM users WHERE (Email = '$Email');";
    $result = mysqli_query($connection, $query_imp);
    if(mysqli_fetch_row($result)){
        echo "Sorry! You already have an account using this email with us... <br/>";
    } else {
        //make the entry into the database
        $query = "INSERT INTO users (Email, FirstName, LastName, Password, id)
                    VALUES ('{$Email}', '{$FirstName}', '{$LastName}', '{$Password}', '{$id}')";
        mysqli_query($connection, $query);
        echo "Your account has been successfully created!</br>";
        $link = "</br>Click here to go to your account";
        echo $_SESSION["id"];
        $message = "LOGOUT";
    }
    ?>
    <a href="user.php"><?php echo $link; ?></a>
    <a href="logout.php"><?php echo "$message"?></a>
    


</pre>
    </body>
    </html>
<?php include("includes/conn_close.php"); ?>
