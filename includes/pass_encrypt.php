<?php
function pass_encrypt($variable){
    $hash_format = "$2y$10$";
    $salt = "pIaLF6uuGapR4U3gAgv8qY";
    $format_and_salt = $hash_format . $salt;
    $hash = crypt($variable, $format_and_salt);
    return $hash;
}
?>