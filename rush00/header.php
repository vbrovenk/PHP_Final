<div class="pannel">
        <div class="logo">
                <img src="https://www.crelectro.com/img/my-shop-logo-1520386218.jpg">
        </div>
        <?php
            if ($_SESSION['login'] == "admin") {
                header("Location: http://localhost:8200/admin.php");

            ?>
             <div class="logout" style="float:right; font-size:20px;margin-right:16px;">
                    <p style="font-size:16px;margin-top:4px;margin-bottom: 5px;color:rgb(85, 83, 83)">Hello, <?php echo $_SESSION['login']?></p>    
                    <a href="logout.php" style="color:rgb(85, 83, 83);margin-left:5px;">LogOut</a>
            </div>

            <?php
            }
            else if ($_SESSION['login']) {
            ?>
                <div class="basket">
                    <a href="#"><img src="https://cdn4.iconfinder.com/data/icons/adiante-apps-app-templates-incos-in-grey/512/app_type_shop_512px_GREY.png"></a>
                </div>
                <div class="logout" style="float:right; font-size:20px;margin-right:16px;">
                    <p style="font-size:16px;margin-top:4px;margin-bottom: 5px;color:rgb(85, 83, 83)">Hello, <?php echo $_SESSION['login']?></p>    
                    <a href="logout.php" style="color:rgb(85, 83, 83);margin-left:5px;">LogOut</a>
                </div>
            <?php
        }
        else {
        ?>
            <div class="basket">
                <a href="#"><img src="https://cdn4.iconfinder.com/data/icons/adiante-apps-app-templates-incos-in-grey/512/app_type_shop_512px_GREY.png"></a>
            </div>
            <div class="login">
                <img src="https://www.freeiconspng.com/uploads/user-login-icon-14.png">
                <a href="login.php">Login</a>
            </div>
            <div class="login">
                <img src="https://www.freeiconspng.com/uploads/user-login-icon-14.png">
                <a href="register.php">Register</a>
            </div>
        <?php
        }
        ?>
    </div>