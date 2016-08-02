<?php
function pass_encrypt($variable){
    $hash_format = "$2y$10$";
    $salt = "pIaLF6uuGapR4U3gAgv8qY";
    $format_and_salt = $hash_format . $salt;
    $hash = crypt($variable, $format_and_salt);
    return $hash;
}
function password_match($id, $password){
include ("includes/conn_open.php");
    global $connection;
    $query = "SELECT * FROM users WHERE (id = '$id' AND Password = '$password');";
    $result = mysqli_query($connection, $query);
    if (mysqli_fetch_row($result)) {
        //success
        return true;
    } else {
        //authentication failed
        return false;
    }
}
?>