<?php
session_start();

if (isset($_POST["change"])) {

    $id = $_SESSION["artistId"];

    $oldPassword = $_POST["oldPwd"];
    $newPassword = $_POST["newPwd"];


    require_once "dbh-inc.php";
    require_once "functions-inc.php";


    if (pwdMatchOnDb($conn, $oldPassword, $id) === false) {
        header("location: ../changePass.php?error=wrongPassword");    
        exit();
    }
    if (invalidPassword($newPassword) !== false) {
        header("location: ../changePass.php?error=pwdWrongPattern");
        exit();
    } 

    changePassword($conn, $newPassword, $id);

}

else {
    header("lcoation: ../profile.php");
    exit();
}