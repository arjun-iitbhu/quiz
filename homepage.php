<?php include("conn_open.php"); ?>
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
    <div id="header"><h1>Welcome</h1></div>
    <div id="full">
        <span class="label"><h3>LogIn</h3></span>
        <form action="user.php" method="post">
            <span class="label">Username: <input type="text" name="username" value="" /><br/></span>
            <span class="label">Password: <input type="password" name="password" value="" /><br/></span>
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
        <br/>
        <span class="label"><h3>Come! Join Us</h3></span>
        <br/>
        <form action="newuser.php" method="post">
            <span class="label">First Name: <input type="text" name="firstname" value="" /><br/></span>
            <span class="label">Last Name: <input type="text" name="lastname" value="" /><br/></span>
            <span class="label">Email: <input type="text" name="newemail" value="" /><br/></span>
            <span class="label">Password: <input type="password" name="newpassword" value="" /><br/></span>
            <br/>
            <span class="label"><input type="submit" name="submit_new user" value="Be Our Mates!" /></span>
        </form>

    </div>

</body>
</html>
<?php include ("conn_close.php"); ?>