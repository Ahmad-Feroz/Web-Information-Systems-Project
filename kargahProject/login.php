<?php
    include_once "header.php";
?>
        </div>
        <!-- Login -->
        <div class="signup-header">
            <h1>Login</h1>
        </div>
        <div class="signup-container">
            <?php
                if (isset($_GET['error'])) {

                    if ($_GET['error'] == "userNotExist") {
                        echo "<p>User not found!</p>";
                    }

                    if ($_GET['error'] == "incorrectPassword") {
                        echo "<p>Incorrect Password!</p>";
                    }

                    if ($_GET['error'] == "none") {
                        echo "<p style='color:lightgreen;'>Your account created successfully!</p>";
                    }
                    
                }

                if (isset($_GET["passChange"])) {
                    echo "<p style='color:green'>Your account Password changed successfully!</p>";
                }
            ?>
            
            <form action="includes/login-inc.php" method="POST">
                <input type="text" name="username" placeholder="Username/Email..." required><br><br>
                <input type="password" name="pwd" placeholder="Password..." required><br><br>

                <button type="submit" name="loginSubmit" class="signBtn">Login</button>
            </form>

        </div>

        <br><br><br>
    </section> 

<?php
    include_once "footer.php";
?>