<?php
session_start();

if (isset($_POST["deleteBtn"])) {

    $id = $_SESSION["artistId"];
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["pwd"]);
    $repeatPwd = htmlspecialchars($_POST["repeatPwd"]);


    require_once "dbh-inc.php";
    require_once "functions-inc.php";

    if (emailMatchOnDb($conn, $email, $id) !== false) {
        header("location: ../deleteAccount.php?error=wrongemail");
        exit();
    }

    if (pwdMatch($password, $repeatPwd) !== false) {
        header("location: ../deleteAccount.php?error=passworddontmatch");  
        exit();
    }

    if (pwdMatchOnDb($conn, $password, $id) === false) {
        header("location: ../deleteAccount.php?error=wrongPassword");    
        exit();
    }

    deleteAccount($conn, $id);

}

else {
    header("lcoation: ../profile.php");
    exit();
}