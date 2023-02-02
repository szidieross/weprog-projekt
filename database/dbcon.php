<?php

$con = mysqli_connect("localhost", "root", "", "rendelo");

if (!$con) {
    die('Connection Failed' . mysqli_connect_error());
}

?>