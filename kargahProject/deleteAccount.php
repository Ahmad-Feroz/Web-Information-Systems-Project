<?php
    include_once "header.php";
?>
    </div>

        
        <div class="signup-header">
            <h1>Delete Account</h1>
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
            
            <form action="includes/deleteAccount-inc.php" method="POST">
                <input type="text" name="email" placeholder="Email..." required><br><br>
                <input type="password" name="pwd" placeholder="Password..." required><br><br>
                <input type="password" name="repeatPwd" placeholder="Password Repeat..." required><br><br>
                <button type="submit" name="deleteBtn" class="btn btn-lg btn-outline-danger" onclick="deleteAccountConfirm()">Delete</button>
            </form>

        </div>

    </section> 

<?php
    include_once "footer.php";
?>