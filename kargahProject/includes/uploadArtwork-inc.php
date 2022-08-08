<?php
session_start();
if (isset($_POST["uploadArtBtn"])) {

    $title = $_POST["artworkTitle"];
    $category = $_POST["artworkCategory"];

    $file = $_FILES["artworkFile"];
    $filename = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileError = $file['error'];
    $fileSize = $file['size'];

    $allowedExt = array("jpg", "jpeg", "gif", "png", "webp");
    $fileExt = explode(".", $filename);
    $fileActualExt = strtolower(end($fileExt));

    if (in_array($fileActualExt, $allowedExt)) {
        if ($fileError === 0) {
            if ($fileSize < 2000000) {

                if (isset($_SESSION["atistUsername"])) {
                    require_once "dbh-inc.php";
                    $username = $_SESSION["atistUsername"];

                    $fileNewName = "user". $_SESSION['artistId'] . "-" . uniqid("", true) . "." .$fileActualExt;
                    $fileDestination = "../artworkPics/".$fileNewName;

                    $sql = "INSERT INTO artworks (artistArtworks, titleArtworks, categoryArtworks, fileNameArtworks) VALUES (?, ?, ?, ?);";
                    $stmt = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("location: ../profile.php?error=stmtFailed");
                        exit();
                    }

                    mysqli_stmt_bind_param($stmt, "ssss", $username, $title, $category, $fileNewName);
                    mysqli_stmt_execute($stmt);

                    move_uploaded_file($fileTmpName, $fileDestination);

                    mysqli_stmt_close($stmt);

                    header("location: ../profile.php?success=uploadSuccess");
                    exit();
                }
            }
            else {
                header("location: ../profile.php?error=tooBigFileSize");
                exit();
            }
        }
        else {
            header("location: ../profile.php?error=somethingWentWrong");
            exit();
        }

    }
    else {
        header("location: ../profile.php?error=fileExtError");
        exit();
    }
}
    
else {
    header("location: ../profile.php");
    exit();
}
