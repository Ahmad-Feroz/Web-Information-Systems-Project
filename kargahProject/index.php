<?php 
    include_once "header.php";
?>
            <!-- Title -->
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <img class="title-image" src="images/titleImage.jpg" alt="iphone-mockup">
                </div>

                <div class="col-lg-6 col-md-6 titleText-container">
                    <h1>Discover Your Interest In The World Of <span>Art</span>.</h1>
                    <!-- more button (gallery) -->
                    <a href="gallery.php">See The Gallery</a>
                </div>
            </div>
            
        </div>

    </section> 
    
    
    
  <!-- Features -->

  <section id="features">

    <div class="row">

        <div class="features-box col-lg-4">
            <i class="fa-solid fa-house-chimney fa-4x"></i>
            <h3>Create Your Own Account</h3>
            <p>You can simply create your account and upload your artworks.</p>
        </div>


        <div class="features-box col-lg-4">
            <i class="fa-solid fa-images fa-4x"></i>
            <h3>Orgainzed Gallery and Category.</h3>
            <p>You can easily find your favorite arts and artists.</p>
        </div>


        <div class="features-box col-lg-4">
            <i class="fa-solid fa-hourglass fa-4x"></i>
            <h3>No Time Limition</h3>
            <p>See and put on show The artworks with no time limition.</p>
        </div>

        
        <div class="features-box col-lg-12">
            <i class="fa-solid fa-eye fa-4x"></i>
            <h3>Wold Wide</h3>
            <p>You are no longer limited to a specific city<br>
                and country you can introduce your artworks<br> 
                to the world without restrictions.</p>
        </div>

    </div>

  </section>


  <section id="artworks">
    <div id="art-carousel" class="carousel slide" data-ride="false">
        <div class="carousel-inner">

            <div class="carousel-item active">
                <h3>Paintings</h3>
                    <img src="images/paintings/painting13.jpg" alt="oil painting" class="col-lg-4 col-md-6 carousel-img">
                    <img src="images/paintings/painting9.jpg" alt="oil painting" class="col-lg-4 col-md-6 carousel-img">
                    <img src="images/paintings/painting15.webp" alt="oil painting" class="col-lg-4 col-md-6 carousel-img last-img">
            </div>

            <div class="carousel-item">
                <h3>Darwings</h3>
                    <img src="images/drawings/drawing2.webp" alt="pencil drawing" class="col-lg-4 col-md-6 carousel-img">
                    <img src="images/drawings/drawing4.jpg" alt="pencil drawing" class="col-lg-4 col-md-6 carousel-img">
                    <img src="images/drawings/drawing8.jpg" alt="pencil drawing" class="col-lg-4 col-md-6 carousel-img last-img">
            </div>

            <a class="carousel-control-prev" href="#art-carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#art-carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>

        </div>
        <div class="more-btn-container">
            <a href="gallery.php">All Artworks</a>
        </div>
    </div>
  </section>


  <section id="artists">
    <div id="artists-carousel" class="carousel slide" data-ride="false">
        <div class="carousel-inner">

            <div class="carousel-item active">
                <h3>Artists</h3>
                <img src="images/artists/artist1.jpg" alt="artist" class="col-lg-4 col-md-6 carousel-img">
                <img src="images/artists/artist2.jpg" alt="artist" class="col-lg-4 col-md-6 carousel-img">
                <img src="images/artists/artist3.jpg" alt="artist" class="col-lg-4 col-md-6 carousel-img last-img">
            </div>

            <div class="carousel-item">
                <h3>Artists</h3>
                <img src="images/artists/artist4.jpg" alt="artist" class="col-lg-4 col-md-6 carousel-img">
                <img src="images/artists/artist5.jpg" alt="artist" class="col-lg-4 col-md-6 carousel-img">
                <img src="images/artists/artist6.jpg" alt="artist" class="col-lg-4 col-md-6 carousel-img last-img">
            </div>

            <a class="carousel-control-prev" href="#artists-carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#artists-carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>

        </div>
        <div class="more-btn-container">
            <a href="artists.php">All Artists</a>
        </div>
    </div>
  </section>

<?php 
    include_once "footer.php";
?>