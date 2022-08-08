<?php 
    include_once "header.php";
?>
        <?php 
            if (isset($_SESSION["atistUsername"])):
        ?>
            <!-- Artist name, bio and profile pic-->
            <div class="row">

                <div class="col-lg-6 col-md-6 artist-bio">
                <h1>
                    <?php

                        require_once "includes/dbh-inc.php";
                        $username = $_SESSION["atistUsername"];
                        $sql = "SELECT * FROM artists WHERE usernameArtists = ?";
                        $stmt = mysqli_stmt_init($conn);

                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            header("location: ../profile.php?error=stmtFailed");
                            exit();
                        }
                    
                        mysqli_stmt_bind_param($stmt, "s", $username);
                        mysqli_stmt_execute($stmt);
                        $resultData = mysqli_stmt_get_result($stmt);
                        $user = mysqli_fetch_assoc($resultData);
                        echo $user['nameArtists'];
                        
                                
                    ?>
                </h1>
                <p>
                    <?php
                        echo $user["infoArtists"];
                        mysqli_stmt_close($stmt);        
                    ?>
                </p>
                </div>

                <!-- artist profile pic -->
                <div class="col-lg-6 col-md-6 artist-profilePic">
                    <?php 
                        
                        require_once "includes/dbh-inc.php";

                        if (isset($_SESSION["atistUsername"])) {
                            $artistUsername = $_SESSION["atistUsername"];

                            $sql = "SELECT * FROM artists WHERE usernameArtists = ?";
                            $stmt = mysqli_stmt_init($conn);

                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                echo "Something wrong with prepare statment!";
                            }
                            
                            mysqli_stmt_bind_param($stmt, "s", $artistUsername);
                            mysqli_stmt_execute($stmt);

                            $resultData = mysqli_stmt_get_result($stmt);
                            $thisUser = mysqli_fetch_assoc($resultData);

                            $profilePicPath = "profilePics/".$thisUser["profilePicArtists"];
                            
                            echo '<div class="artistPic" style="background-image:url('. $profilePicPath .')"></div>';
                        }
                    ?>
                </div>

            </div>
            
        </div>

    </section> 

    <!-- atist profile buttons -->
    <section id="profile-btn">
        <button class="btn btn-lg btn-outline-light" onclick="nameButton()">Edit Name</button>
        <button class="btn btn-lg btn-outline-light" onclick="bioButton()">Add Biography</button>
        <button class="btn btn-lg btn-outline-light" onclick="proPicButton()">Add Profile Picture</button>
        <button class="btn btn-lg btn-outline-light" onclick="uploadArtButton()">Add Artwork</button>  

        <form action="includes/changeName-inc.php" method="POST" id="nameField" >
            <br><br>
            <input type="text" name="name" placeholder="name..." required> <br><br>
            <button onclick="checker()" type="submit" name="editNameBtn" class="btn btn-dark">Change</button>
        </form>


        <form action="includes/addBio-inc.php" method="POST" id="bioField">
            <br><br>
            <?php 
                // we take the artist information and put it into textarea
                $artistInfo = $user['infoArtists'];
            ?>
            <textarea name="bio" cols="30" rows="10" placeholder="biography/Your information..." required><?php echo $artistInfo; ?></textarea><br><br>
            <button onclick="checker()" type="submit" name="editBioBtn" class="btn btn-dark">Change</button>
        </form>


        <form action="includes/profilePic-inc.php" method="POST" enctype="multipart/form-data" id="proPicField">
            <br><br>
            <input type="file" name="proPic" required><br><br>
            <button onclick="checker()" type="submit" name="editPicBtn" class="btn btn-dark">Change</button>
        </form>


        <form action="includes/uploadArtwork-inc.php" method="POST" enctype="multipart/form-data" id="artworkField">
            <br><br>
            <input type="text" name="artworkTitle" placeholder="Title..." required> <br><br>
            <input type="text" name="artworkCategory" placeholder="Category..." list="artCategories" required>
            <datalist id="artCategories">
                <option value="Painting">
                <option value="Drawing">
                <option value="Sculpture">
                <option value="Street Art">
                <option value="Photography">
            </datalist>
            <br><br>
            <input type="file" name="artworkFile" required> <br><br>
            <button onclick="checker()" type="submit" name="uploadArtBtn" class="btn btn-dark">Upload</button>
        </form>

    </section>


    <!-- artist all Artworks -->
    <section class="artists-section bg-dark">
        <div class="artwork-title">
            <h1>Gallery</h1>
        </div>
        <div class="artists-container">
            <div class="row">
                
                <?php 
                    $sql = "SELECT * FROM artworks WHERE artistArtworks = ?";
                    $stmt = mysqli_stmt_init($conn);
                    $artist = $_SESSION["atistUsername"];

                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo "Something wrong with prepare statment!";
                    }
                    
                    mysqli_stmt_bind_param($stmt, "s", $artist);
                    mysqli_stmt_execute($stmt);

                    $result = mysqli_stmt_get_result($stmt);
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                        <a href="clickArtwork.php?imgId='. $row["idArtworks"] .'" class="col-lg-4 col-md-6">
                            <div style="background-image: url(artworkPics/'. $row['fileNameArtworks'] .');"></div>
                            <h3>' . $row['titleArtworks'] . '</h3>
                        </a>';
                    
                    }

                ?>

            </div>
        </div>
            
    </section>
    
    <?php endif; ?>
     

<?php 
    include_once "footer.php";

    if (isset($_GET["error"])) {
        if ($_GET["error"] == "stmtFailed") {
            echo '<script>alert("Someting went wrong Try again!")</script>';
        }

        if ($_GET["error"] == "DeleteFailed") {
            echo '<script>alert("Deletion faild Try Again!")</script>';
        }

        if ($_GET["error"] == "tooBigFileSize") {
            echo '<script>alert("The file size is too Big! File size must be less then 1 MB")</script>';
        }

        if ($_GET["error"] == "somethingWentWrong") {
            echo '<script>alert("Uploading Faild, Try again!")</script>';
        }

        if ($_GET["error"] == "fileExtError") {
            echo '<script>alert("You can not upload this type of file!")</script>';
        }
    }
    

?>
