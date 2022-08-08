<?php
session_start();

if (isset($_POST['editPicBtn'])) {

    $file = $_FILES['proPic'];
    $filename = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileError = $file['error'];
    $fileSize = $file['size'];

    $allowedExt = array("jpg", "jpeg", "gif", "png", "webp");
    $fileExt = explode(".", $filename);
    $fileActualExt = strtolower(end($fileExt));

    if (in_array($fileActualExt, $allowedExt)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {

                if (isset($_SESSION["atistUsername"])) {
                    require_once "dbh-inc.php";
                    $username = $_SESSION["atistUsername"];
                    $userId = $_SESSION["artistId"];

                    $fileNewName = "user". $userId . "." .$fileActualExt;
                    $fileDestination = "../profilePics/".$fileNewName;
                    
                    // if you upload a new profile pic previous one should be deleted from profile pic folder if its not the default profile pic.
                    $sql = "SELECT * FROM artists WHERE idArtists=$userId;";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $preProfile = $row["profilePicArtists"];
                    $preProfilePath = "../profilePics/". $preProfile;
                    
                    if ($preProfile != "defaultPic.png") {
                        unlink($preProfilePath);
                    }

                    $sql = "UPDATE artists SET profilePicArtists = ? WHERE usernameArtists = ?;";
                    $stmt = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("location: ../profile.php?error=stmtFailed");
                        exit();
                    }

                    mysqli_stmt_bind_param($stmt, "ss", $fileNewName, $username);
                    mysqli_stmt_execute($stmt);

                    move_uploaded_file($fileTmpName, $fileDestination);

                    mysqli_stmt_close($stmt);

                    header("location: ../profile.php");
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