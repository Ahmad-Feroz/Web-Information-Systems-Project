<?php
    include_once "header.php";
?>

    </div>

        
        <div class="signup-header">
            <h1>Signup</h1>
        </div>
        <div class="signup-container">
            <?php 

                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "invalidemail"){
                        echo "<p>Please choose a proper email!</p>";
                    }

                    if ($_GET["error"] == "invalidusername"){
                        echo "<p>The usename can be alphabits, numbers and underscores!</p>";
                    }

                    if ($_GET["error"] == "passworddontmatch"){
                        echo "<p>Repeatd password don't match</p>";
                    }
                    
                    if ($_GET["error"] == "usernametaken"){
                        echo "<p>The username or email already exists!</p>";
                    }  

                    if ($_GET["error"] == "pwdWrongPattern") {
                        echo "<p>Error!</p>";
                    }
                }
            ?>
            
            <form action="includes/signup-inc.php" method="POST">
                <input type="text" name="name" placeholder="Full Name..." required> <br><br>
                <input type="text" name="username" placeholder="Username..." required> <br><br>
                <input type="text" name="email" placeholder="Email..." required> <br><br>
                <input type="password" name="pwd" placeholder="Password..." required> <br><br> 
                <input type="password" name="repeatPwd" placeholder="Password Repeat..." required> <br><br>

                <button type="submit" name="signupSubmit" class="signBtn">Signup</button>
            </form>

            <?php 
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "pwdWrongPattern") {
                        echo "<p>Password must have:</p>";
                        echo "<p>At least 8 characters</p>";
                        echo "<p>At least one lowercase character</p>";
                        echo "<p>At least one uppercase character</p>";
                        echo "<p>At least one digit</p>";
                        echo "<p>At least one special sign of @#-_$%^&+=§!?</p>";
                    }
                }
            ?>

        </div>

        <br><br><br>

    </section> 

<?php
    include_once "footer.php";
?>