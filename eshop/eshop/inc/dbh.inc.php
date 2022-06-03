<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "logindb";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if(!$conn) {
    die("Připojení selhalo: " . mysqli_connect_error());
}