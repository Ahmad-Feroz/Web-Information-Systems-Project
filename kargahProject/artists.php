<?php 
    include_once "header.php";
?>

            <!-- Artists -->
            </div>

            <!-- search box -->
            <div class="search-data">
                <form action="searchArtist.php" method="GET">
                    <input type="text" name="search" placeholder="Artist name">
                    <button type="submit" name="search-artist-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>

            <div class="artists-title">
                <h6>Artists</h6>
                <h1>Kargah Art Gallery Artists</h1>
            </div>
            <div class="artists-container">
                <div class="row">
                    <?php 
                        require_once "includes/dbh-inc.php";

                        $sql = "SELECT * FROM artists";
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