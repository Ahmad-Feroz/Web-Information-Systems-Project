<?php 
    include_once "header.php";
?>
        </div>

            <!-- ArtField -->
            <div class="search-data">
                <form action="searchArtist.php" method="GET">
                    <input type="text" name="search" placeholder="Title...">
                    <button type="submit" name="search-artwork-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>

            <div class="artists-title">
                <h6>Gallery</h6>
                <h1><?php echo $_GET["name"] ?></h1>
            </div>
            <div class="artists-container">
                <div class="row">
                    <?php
                        require_once "includes/dbh-inc.php";
                        if (isset($_GET['name'])) {

                            $category = mysqli_real_escape_string($conn, $_GET['name']);

                            $sql = "SELECT * FROM artworks WHERE categoryArtworks LIKE '%$category%' ORDER BY idArtworks DESC;";
                            $result = mysqli_query($conn, $sql);
                            $queryResult = mysqli_num_rows($result);

                            if ($queryResult > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $picPath = "artworkPics/".$row['fileNameArtworks'];
                                    $title = $row['titleArtworks'];
                                    $artist = $row['artistArtworks'];

                                    echo '<a href="clickArtwork.php?imgId='. $row["idArtworks"] .'" class="col-lg-4 col-md-6">
                                    <div style="background-image: url('. $picPath .');"></div>
                                    <h3>'. $title .'</h3>
                                    <p>by: ' . $artist . '</p>
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

            <br>

    </section> 
    
<?php 
    include_once "footer.php";
?>