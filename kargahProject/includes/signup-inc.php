<?php

if (isset($_POST["signupSubmit"])) {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $username = htmlspecialchars($_POST["username"]);
    $password = $_POST["pwd"];
    $repeatPwd = $_POST["repeatPwd"];

    require_once "dbh-inc.php";
    require_once "functions-inc.php";

    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    if (invalidUsername($username) !== false) {
        header("location: ../signup.php?error=invalidusername");
        exit();
    }

    if (invalidPassword($password) !== false) {
        header("location: ../signup.php?error=pwdWrongPattern");
        exit();
    } 

    if (pwdMatch($password, $repeatPwd) !== false) {
        header("location: ../signup.php?error=passworddontmatch"); 
        exit();
    }
    if (usernameExists($conn, $username, $email)) {
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $name, $email, $username, $repeatPwd);
}

else {
    header("lcoation: ../signup.php");
    exit();
}