<?php
function has_presence($value) {
    return isset($value) && ($value !== "");
}
function correct_email_format($value) {
    return !(strpos($value, "@")===false);
}
?>