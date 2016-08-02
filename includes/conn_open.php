<?php
//Create MySQL Connection
$dbhost = "localhost";
$dbuser = "arjun";
$dbpass = "arjun";
$dbname = "iit_login";
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
//Test if connection occured
if(mysqli_connect_errno()){
    die("Database connection failed: ".
         mysqli_connect_error() .
         "(" .mysqli_connect_errno().")"
    );
}
?>