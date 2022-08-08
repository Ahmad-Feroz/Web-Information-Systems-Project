<?php 
    include_once "header.php";
?>

            <!-- Artists -->
        <?php if (isset($_GET['search-artist-btn'])): ?>
            <!-- search box -->
            <div class="search-data">
                <form action="searchArtist.php" method="GET">
                    <input type="text" name="search" placeholder="Artist name...">
                    <button type="submit" name="search-artist-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        <?php endif; ?>

        <!-- artwork search box -->
        <?php if (isset($_GET["search-artwork-btn"])): ?>
            <div class="search-data">
                <form action="searchArtist.php" method="GET">
                    <input type="text" name="search" placeholder="Title...">
                    <button type="submit" name="search-artwork-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        <?php endif; ?>

            <div class="artists-title">
                <h6>Search</h6>
                <h1>Search Result</h1>
            </div>
            <div class="artists-container">
                <div class="row">
                    <?php 
                        // search artist by name or username

                        require_once "includes/dbh-inc.php";
                        if (isset($_GET["search-artist-btn"])) {

                            $searchKey = mysqli_real_escape_string($conn, $_GET["search"]);
                        
                            $sql = "SELECT * FROM artists WHERE nameArtists LIKE '%$searchKey%' OR usernameArtists LIKE '%$searchKey%';";
                            $result = mysqli_query($conn, $sql);
                            $queryResult = mysqli_num_rows($result);
    
                            if ($queryResult > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $profilePic = "profilePics/". $row['profilePicArtists'];
                                    $name = $row['nameArtists'];
                    
                                    echo '<a href="clickOnArtist.php?username='. $row['usernameArtists'] .'" class="col-lg-4 col-md-6">
                                    <div style="background-image: url('. $profilePic .');"></div>
                                    <h3>'. $name .'</h3>
                                    </a>';
                                }
                            }
                            
                        }

                        // search artwork by title
                        if (isset($_GET['search-artwork-btn'])) {

                            $searchKey = mysqli_real_escape_string($conn, $_GET["search"]);

                            $sql = "SELECT * FROM artworks WHERE titleArtworks LIKE '%$searchKey%';";

                            $result = mysqli_query($conn, $sql);
                            $queryResult =  mysqli_num_rows($result);

                            if ($queryResult > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $artworkPic = "artworkPics/".$row["fileNameArtworks"];
                                    $artworkTitle = $row["titleArtworks"];
                                    $artist = $row["artistArtworks"];

                                    echo '<a href="clickArtwork.php?imgId='. $row["idArtworks"] .'" class="col-lg-4 col-md-6">
                                    <div style="background-image: url('. $artworkPic .');"></div>
                                    <h3>' . $artworkTitle . '</h3>
                                    </a>';
                                }
                            }
                            else {
                                echo '<p>Nothing found!</p>';
                            }
                        }


                    ?>

                </div>
            </div>

            <div class="artists-pageNum">
                <a href="">&lt</a>
                <a href="">1</a>
                <a href="">2</a>
                <a href="">3</a>
                <a href="">4</a>
                <a href="">&gt</a>
            </div>

        </div>

    </section> 
    
<?php 
    include_once "footer.php";
?>