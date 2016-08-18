<?php
if (isset($_COOKIE['remember_me'])){
    $cookie = $_COOKIE['remember_me'];
    $sql = "SELECT * FROM users WHERE (token = '$cookie');";
    $check = mysqli_query($connection, $sql);
    if(mysqli_fetch_row($check)){
        $id = pass_encrypt($_POST['username'].$_POST['password']);
        $_SESSION["id"] = $id;
        $_SESSION["password"] = $pass_word;
        header("Location: user.php");
        exit;
    }
}
?>