<?php session_start(); ?>
<?php include("includes/signup_validations.php"); ?>
<?php include("includes/conn_open.php"); ?>
<?php $username="";
?>
    <!DOCTYPE html>
    <html lang="en" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width initial-scale=1">
        <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
        <meta name="google-signin-client_id" content="27249545514-t5tmgik3f7qml6rhl533k5ikgqqvl2n9.apps.googleusercontent.com">
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <title>Login</title>
    </head>
    <body>
    <?php /*
    if (isset($_POST['submit_user'])) {
        $username = $_POST['username'];
        $user_name = mysqli_real_escape_string($connection, $username);
        $query = "SELECT * FROM users WHERE (Email = '$user_name');";
        $result = mysqli_query($connection, $query);
        if (mysqli_fetch_row($result)) {
            //success
            $id = pass_encrypt($_POST['newemail'].$_POST['newpassword']);
            $_SESSION["id"] = $id;
            header("Location: user.php");
            exit;
        } else {
            //authentication failed
            $_SESSION["message"] = "Username/Password is invalid!";
        }
    } */
    ?>
    <div id="header"><h1>Welcome</h1></div>
    <div id="full">
        <span class="label"><h3>Enter your username</h3></span>
        <form action="forgot.php" method="post">
            <span class="label"><input type="text" name="username" value="<?php echo htmlentities($username);?>" /><br/></span>
            <span class="label"><input type="submit" name="submit_user" value="Go" /></span>
        </form>
    </div>


    </body>
    </html>
<?php include("includes/conn_close.php"); ?>