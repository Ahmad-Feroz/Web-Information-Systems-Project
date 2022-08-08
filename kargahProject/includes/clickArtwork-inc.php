<?php

require_once "dbh-inc.php";

if (isset($_POST["changeTitle"])) {
    
    $newTitle = htmlspecialchars($_POST["title"]);
    $id = $_GET["imgId"];

    $sql = "UPDATE artworks SET titleArtworks='$newTitle' WHERE idArtworks=$id;";
    mysqli_query($conn, $sql);

    header("location: ../clickArtwork.php?imgId=". $_GET["imgId"] ."&success=titleEdit");
    exit();

}

if (isset($_POST["changeCategory"])) {

    $newCategory = htmlspecialchars($_POST["category"]);
    $id = $_GET["imgId"];

    $sql = "UPDATE artworks SET categoryArtworks='$newCategory' WHERE idArtworks=$id;";
    mysqli_query($conn, $sql);


    header("location: ../clickArtwork.php?imgId=". $_GET["imgId"] ."&success=categoryEdit");
    exit();

}

if (isset($_POST["delete"])) {

    $id = $_GET['imgId'];

    $sql = "SELECT * FROM artworks WHERE idArtworks=$id;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $path = "../artworkPics/" . $row["fileNameArtworks"];

    $sql = "DELETE FROM artworks WHERE idArtworks=$id;";
    mysqli_query($conn, $sql);

    if (!unlink($path)) {
        header("location: ../profile.php?error=DeleteFailed");
        exit();
    }
    else {
        header("location: ../profile.php?=success=deleteSuccess");
        exit();
    }

}

else {
    header("location: ../clickArtwork.php?imgId=". $_GET["imgId"] ."");
}
