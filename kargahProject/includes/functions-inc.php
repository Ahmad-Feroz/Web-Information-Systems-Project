<?php

function invalidEmail($email) {
    $result = 0;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidUsername($username) {
    $result = 0;
    if (!preg_match("/^[a-zA-Z0-9_]*$/", $username)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidPassword($pass) {
    $result = 0;
    if (!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/', $pass)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $repeatPwd) {
    $result = 0;
    if ($pwd !== $repeatPwd) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function usernameExists($conn, $username, $email) {
    $sql = "SELECT * FROM artists WHERE usernameArtists = ? OR emailArtists = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        return false;
    }

    mysqli_stmt_close($stmt);
}


function createUser($conn, $name, $email, $username, $pwd) {
    
    $sql = "INSERT INTO artists (nameArtists, emailArtists, usernameArtists, pwdArtists, profilePicArtists) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    $artistDefaultPic = "defaultPic.png";

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtFailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT); 
    mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $username, $hashedPwd, $artistDefaultPic);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("location: ../login.php?error=none");
    exit();

}

function loginUser($conn, $username, $pwd) {
    $isUserExists = usernameExists($conn, $username, $username);
    if ($isUserExists === false) {
        header("location: ../login.php?error=userNotExist");
        exit();
    }

    $hashedPwd = $isUserExists["pwdArtists"];
    $isPassMatch = password_verify($pwd, $hashedPwd);

    if ($isPassMatch === false) {
        header("location: ../login.php?error=incorrectPassword");
        exit();
    }

    else if ($isPassMatch === true) {
        session_start();
        $_SESSION['artistId'] = $isUserExists["idArtists"];
        $_SESSION['atistUsername'] = $isUserExists["usernameArtists"];
        
        header("location: ../profile.php");
        exit();
    }
}

function emailMatchOnDb($conn, $email, $artistId) {
    $result = 0;

    $sql = "SELECT * FROM artists WHERE idArtists=?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../deleteAccount.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $artistId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    $dbEmail = $row["emailArtists"];

    if ($email !== $dbEmail) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function pwdMatchOnDb($conn, $password, $artistId) {

    $sql = "SELECT * FROM artists WHERE idArtists=$artistId;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $dbPassword = $row["pwdArtists"];

    $isPassMatch = password_verify($password, $dbPassword);

    if ($isPassMatch === false) {
        return false;
    }
    else if ($isPassMatch === true) {
        return true;
    }

}

function deleteAccount($conn, $userId) {

    $sql = "SELECT * FROM artists WHERE idArtists=$userId";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    // delete profile Pic from folder
    $profilePic = $row["profilePicArtists"];
    $profilePicPath = "../profilePics/". $profilePic;
    if ($profilePic != "defaultPic.png") {
        unlink($profilePicPath);
    }

    $username = $row["usernameArtists"];
    $sql = "SELECT * FROM artworks WHERE artistArtworks='$username';";
    $result = mysqli_query($conn, $sql);
    
    // delete artworks form folder
    while ($row = mysqli_fetch_assoc($result)) {
        $pics = "../artworkPics/" . $row["fileNameArtworks"];
        unlink($pics);
    }

    // delete artist from db
    $sql = "DELETE FROM artists WHERE idArtists=$userId;";
    mysqli_query($conn, $sql);

    // delete artworks from db
    $sql = "DELETE FROM artworks WHERE artistArtworks='$username';";
    mysqli_query($conn, $sql);

    header("location: logout-inc.php?accountDeletion=success");
    exit();

}

function changePassword($conn, $newPass, $userId) {

    $hashNewPass = password_hash($newPass, PASSWORD_DEFAULT);

    $sql = "UPDATE artists SET pwdArtists=? WHERE idArtists=?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtFailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "si", $hashNewPass, $userId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: logout-inc.php?passChange=success");
    exit();
}