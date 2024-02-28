<?php
$con = mysqli_connect('localhost','root','','reg');

if (!$con) {
    die(mysqli_connect_error());
    echo "not connreted";
}

?>