<?php session_start(); ?>
<?php include("includes/signup_validations.php"); ?>
<?php include("includes/conn_open.php"); ?>
<?php $username="";
$_SESSION["message"] = "";
?>
<?php include("includes/pass_encrypt.php")?>
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
    <?php
    if (isset($_POST['submit_user'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user_name = mysqli_real_escape_string($connection, $username);
        $pass_word = pass_encrypt($password);
        $query = "SELECT * FROM users WHERE (Email = '$user_name' AND Password = '$pass_word');";
        $result = mysqli_query($connection, $query);
        if (mysqli_fetch_row($result)) {
            //success
            $id = pass_encrypt($_POST['newemail'].$_POST['newpassword']);
            $_SESSION["id"] = $id;
            $id = urldecode($id);
            header("Location: user.php?id=".$_SESSION['id']);
            exit;
        } else {
            //authentication failed
            $_SESSION["message"] = "Username/Password is invalid!";
        }
    }
    ?>
    <div id="header"><h1>Welcome</h1></div>
    <div id="full">
        <span class="label"><h3>LogIn</h3></span>
        <form action="homepage.php" method="post">
            <span class="label">Username: <input type="text" name="username" value="<?php echo htmlentities($username);?>" /><br/></span>
            <span class="label">Password: <input type="password" name="password" value="" /><br/></span>
            <a href = "forgot.php"><span class="label"><span class="warning">Forgot Password? </br></span></span></a>
            <span class="label"><span class="warning"><?php echo $_SESSION["message"]; ?></span></span>
            <span class="label"><input type="submit" name="submit_user" value="Submit" /></span>
            <span class="label">We Love Google Users!</span>
            <div id="my-signin2"></div>
            <script>
                function onSuccess(googleUser) {
                    console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
                }
                function onFailure(error) {
                    console.log(error);
                }
                function renderButton() {
                    gapi.signin2.render('my-signin2', {
                        'scope': 'profile email',
                        'width': 240,
                        'height': 50,
                        'longtitle': true,
                        'theme': 'dark',
                        'onsuccess': onSuccess,
                        'onfailure': onFailure
                    });
                }
            </script>

        </form>

    </div>
    <br/>


    <?php
    $error_firstname = "";
    $error_email = "";
    $error_password = "";
    $firstname = "";
    $lastname = "";
    $newemail = "";
    $newpassword = "";
    if (isset($_POST['submit_new_user'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $newemail = $_POST['newemail'];
        $newpassword = $_POST['newpassword'];
        if(has_presence($firstname) && has_presence($newemail) && has_presence($newpassword) && correct_email_format($newemail) && $_POST['newconfirmpassword']===$_POST['newpassword']){
            $_SESSION["newemail"] = $newemail;
            $_SESSION["firstname"] = $firstname;
            $_SESSION["lastname"] = $lastname;
            $_SESSION["newpassword"] = $newpassword;
            $_SESSION["id"] = "default";
            
            header("Location: newuser.php");
            exit;
        } else {
            if (!has_presence($firstname)){
                $error_firstname = "First Name can't be left blank";
            }
            if (!correct_email_format($newemail)) {
                $error_email = "Please enter a valid Email address";
            }
            if (!has_presence($newemail)){
                $error_email = "Email can't be left blank";
            }
            if (!has_presence($newpassword)){
                $error_password = "You need to choose a password";
            }
            if ($_POST['newconfirmpassword']!==$_POST['newpassword']) {
                $error_password = "Passwords don't match!";
            }
        }
    }
    ?>





    <div id="full">
        <span class="label"><h3>Come! Join Us</h3></span>
        <br/>
        <form action="index.php" method="post">
            <span class="label">First Name: <span class="warning"><?php echo $error_firstname?></span><input type="text" name="firstname" value="<?php echo htmlentities($firstname);?>" /><br/></span>
            <span class="label">Last Name: <input type="text" name="lastname" value="<?php echo htmlentities($lastname);?>" /><br/></span>
            <span class="label">Email: <span class="warning"><?php echo $error_email?></span><input type="text" name="newemail" value="<?php echo htmlentities($newemail);?>" /><br/></span>
            <span class="label">Password: <span class="warning"><?php echo $error_password?></span><input type="password" name="newpassword" value="" /><br/></span>
            <span class="label">Confirm Password: <input type="password" name="newconfirmpassword" value="" /><br/></span>
            <br/>
            <span class="label"><input type="submit" name="submit_new_user" value="Be Our Mates!" /></span>
        </form>
    </div>

    </body>
    </html>
<?php include("includes/conn_close.php"); ?>