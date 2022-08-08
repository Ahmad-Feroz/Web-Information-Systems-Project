<?php
    include_once "header.php";
?>

    </div>
        <?php 
            require_once "includes/dbh-inc.php";
            $id = $_GET['imgId'];
            $sql = "SELECT * FROM artworks WHERE idArtworks=$id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $username = $row["artistArtworks"];
            $category = $row["categoryArtworks"];
            $title = $row["titleArtworks"];
            
            $sql2 = "SELECT * FROM artists WHERE usernameArtists='$username';";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $artistName = $row2["nameArtists"];
            $artistProfilePic = $row2["profilePicArtists"];

            echo '<div class="artwork-artist">
                <a href="clickOnArtist.php?username='. $username .'" class="sm-pro-container">
                    <div class="profile-circle" style="background-image:url(profilePics/'. $artistProfilePic .')"></div>
                    <h4>'. $artistName .'</4>
                </a>
                <h1>'. $title .'</h1>
                <h6><i>'. $category .'</i></h6>
            </div>'
        ?>
        
        <div class="artwork-container">
            <div style="background-image: url('artworkPics/<?php echo $row["fileNameArtworks"] ?>')" class="artworkImg"></div>
            
            <br>
            <?php  
                if (isset($_SESSION["atistUsername"])) {
                    if ($_SESSION["atistUsername"] == $row["artistArtworks"]) {

                        echo '<div id="profile-btn">
                        <button class="btn btn-lg btn-outline-light" onclick="editArtworkTitle()">Edit Title</button>
                        <button class="btn btn-lg btn-outline-light" onclick="editArtworkCategory()">Edit Category</button>

                        <form action="includes/clickArtwork-inc.php?imgId='. $row["idArtworks"] .'" method="POST" style="display:block">
                            <button onclick="checker()" type="submit" name="delete" class="btn btn-lg btn-danger">Delete</button>
                        </form>
        
                        <form action="includes/clickArtwork-inc.php?imgId='. $row["idArtworks"] .'" method="POST" id="titleField">
                            <br><br>
                            <input type="text" name="title" placeholder="New Title..." required> <br><br>
                            <button onclick="checker()" type="submit" name="changeTitle" class="btn btn-dark">Change</button>
                        </form>
        
                        <form action="includes/clickArtwork-inc.php?imgId='. $row["idArtworks"] .'" method="POST" id="categoryField">
                            <br><br>
                            <input type="text" name="category" placeholder="Category..." required><br><br>
                            <button onclick="checker()" type="submit" name="changeCategory" class="btn btn-dark">Change</button>
                        </form>
                        </div>';

                    }
                }
            ?>

            <br><br>
        </div>

    </section> 
    
<?php
    include_once "footer.php";
?>