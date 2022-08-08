<?php
    include_once "header.php";
?>
    </div>

        
        <div class="signup-header">
            <h1>Change Password</h1>
        </div>
        <div class="signup-container">
            <?php 
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "wrongemail"){
                        echo "<p style='color:red'>Wrong Email!</p>";
                    }

                    if ($_GET["error"] == "passworddontmatch"){
                        echo "<p style='color:red'>Repeatd password don't match</p>";
                    }
                    
                    if ($_GET["error"] == "wrongPassword"){
                        echo "<p style='color:red'>Wrong Password!</p>";
                    }
                    
                }
            ?>
            
            <form action="includes/changePass-inc.php" method="POST">
                <input type="password" name="oldPwd" placeholder="Old Password..." required><br><br>
                <input type="password" name="newPwd" placeholder="New Password..." required><br><br>
                <button type="submit" name="change" class="signBtn" onclick="checker()">Change</button>
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

    </section> 

<?php
    include_once "footer.php";
?>