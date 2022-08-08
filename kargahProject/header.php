<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Kargah</title>
  
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,400;0,900;1,100&family=Ubuntu:ital,wght@0,300;0,400;1,300;1,400&display=swap" rel="stylesheet">
  
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/fc4f343523.js" crossorigin="anonymous"></script>
    <!-- bootstrap scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <script src="project.js"></script>
</head>
<body>
    <section id="title" class="">
        <div class="title-container home-container">
            <!-- Nav Bar -->
        
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="index.php">Kargah</a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="artists.php">Artists</a></li>
                        <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                        <?php
                            session_start();
                            if (isset($_SESSION['atistUsername'])) {
                                
    
                                echo '<li class="nav-item dropdown">
                                <button class="btn dropdown-toggle drop-btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa-solid fa-circle-user fa-2x"></i>
                                </button>
                                <div class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="profile.php">Profile</a>
                                  <a class="dropdown-item" href="includes/logout-inc.php" onclick="checker()">Logout</a>
                                  <a class="dropdown-item" href="changePass.php">Change Password</a>
                                  <a class="dropdown-item" href="deleteAccount.php">Delete Account</a>
                                </div>
                              </li>';
                            }
                            else {
                                echo '<li class="nav-item"><a class="nav-link" href="signup.php">Signup</a></li>';
                                echo '<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>';
                            } 
                        ?>
                      
                    </ul>
                </div>
            </nav>
