<?php session_start(); ?>
<?php //Go Back if reaching this page yourself!
if(!isset($_SESSION['id'])){
    header("Location: index.php");
    exit;
} ?>
<?php include("includes/conn_open.php"); ?>
<?php include("includes/password_functions.php"); ?>
    <!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width initial-scale=1">
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="stylesheets/newuser.css" type="text/css">
    </head>
    <title>Hey <?php echo $_SESSION["firstname"] ?>!</title>
    </head>
    <body>
    <!-- DO NOT TOUCH HERE -------------------------NOT FOR FRONTEND DEVELOPERS!--------------------------------------->
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


    $tag = "Hi ".$_SESSION['firstname'].". You are in!";
    $title = "Dashboard";
    $div = "<div class=\"dashboard\"><div class=\"button\"><a href=\"user.php\"><span class=\"link\">Proceed Further</span></a> </div></div>"


    ?>
<!--------------------------------------------------------------------------------------------------------------------->
     <!--- DO NOT TOUCH HERE -------------------------NOT FOR FRONTEND DEVELOPERS!------------------------------------->
    <?php
    $query_imp = "SELECT * FROM users WHERE (Email = '$Email');";
    $result = mysqli_query($connection, $query_imp);
    if(mysqli_fetch_row($result)){
        $tag = "Sorry! Email already in use";
        $message = "Go back";
        $title = null;
        $div = null;
        $_SESSION['id'] = null;
    } else {
        //make the entry into the database
        $query = "INSERT INTO users (Email, FirstName, LastName, Password, id)
                    VALUES ('{$Email}', '{$FirstName}', '{$LastName}', '{$Password}', '{$id}')";
        mysqli_query($connection, $query);
        $message = "Logout";
    }
    ?>
 <!-------------------------------------------------------------------------------------------------------------------->
 <!--------DO NOT TOUCH HERE--------------------------NOT FOR FRONTEND DEVELOPERS!------------------------------------->
 <!-------------------------------------------------------------------------------------------------------------------->
 <!----------------------FRONTEND----DEVELOPMENT----HERE--------------------------------------------------------------->
    <div class="container">
    <div class="box dark_blue">
        <div class="top">
            <div class="circle"></div>
        </div>
        <div class="tag"><?php echo $tag; ?></div>
        <?php echo $div; ?>
        <div class="escape"><div class="button"><a href="logout.php"><span class="link"><?php echo $message ?></span></a></div></div>
    </div>
    </body>
    </html>
<?php include("includes/conn_close.php"); ?>
<!-- <div class="button">
            <a href="user.php">Go to your dashboard</a>
        </div> -->
