<?php
session_start();
if (isset($_POST['editNameBtn'])) {
    
    $newName = htmlspecialchars($_POST['name']);

    $username = $_SESSION['atistUsername'];

    require_once "dbh-inc.php";

    $sql = "UPDATE artists SET nameArtists = ? WHERE usernameArtists = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../profile.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $newName, $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../profile.php?success=changeName");
    exit();
}