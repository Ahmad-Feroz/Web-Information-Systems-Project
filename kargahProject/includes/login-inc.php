<?php

if (isset($_POST["loginSubmit"])) {
    
    $username = htmlspecialchars($_POST["username"]);
    $password = $_POST["pwd"];

    require_once "dbh-inc.php";
    require_once "functions-inc.php"; 
    
    loginUser($conn, $username, $password);
}

else {
    header("lcoation: ../login.php");
    exit();
}