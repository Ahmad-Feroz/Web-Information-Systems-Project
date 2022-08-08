<?php 
    include_once "header.php";
?>
        <?php 
            if (isset($_GET["username"])):
        ?>
            <!-- Artist name, bio and profile pic-->
            <div class="row">

                <!-- Artist name -->
                <div class="col-lg-6 col-md-6 artist-bio">
                <h1>
                    <?php
                        require_once "includes/dbh-inc.php";
                        $username = $_GET["username"];
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
                        $profilePicPath = "profilePics/".$user["profilePicArtists"];
                        echo '<div class="artistPic" style="background-image:url('. $profilePicPath .')"></div>';
                    ?>
                    
                </div>

            </div>
            
        </div>

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
                    $artist = $_GET["username"];

                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo "Something wrong with prepare statment!";
                    }
                    
                    mysqli_stmt_bind_param($stmt, "s", $artist);
                    mysqli_stmt_execute($stmt);

                    $result = mysqli_stmt_get_result($stmt);
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<a href="clickArtwork.php?imgId='. $row["idArtworks"] .'" class="col-lg-4 col-md-6">
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
?>