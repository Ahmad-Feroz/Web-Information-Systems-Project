<?php

$server = "localhost";
$user = "root";
$pwd = "";
$dbname = "kargah";

$conn = mysqli_connect($server, $user, $pwd, $dbname);

if (!$conn) {
    die("Connection Failed " . mysqli_connect_error());
}