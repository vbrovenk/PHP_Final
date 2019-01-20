<!DOCTYPE html>
<?php 
    require_once 'database.php';
?>
<html>
<head>
    <title>rush00</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/tv_style.css">
</head>
<body>
<div class="container">
    <?php
        require_once('header.php');
    ?>
    <div class="menu">
        <ul class="topmenu">
            <li><a href="index.php">Phones</a></li>
            <li><a href="#">TV</a></li>
            <li><a href="laptops.php">Laptops</a></li>
        </ul>
    </div>
    <div class="pruducts">
        <div class="firts-row">
            <div class="product">
                <img src="https://i2.rozetka.ua/goods/10318467/sony_kdl43wf805br_images_10318467213.jpg">
                <br />
                <div class="product_name"><p>Sony KDL43WF805BR</p></div>
                <div class="price">18 999 grn</div>
                <br />
                <div><input type="button" name="Add" value="Add"></div>
            </div>
            <div class="product">
                <img src="https://i1.rozetka.ua/goods/2354394/panasonic_tx_32dr400_images_2354394217.jpg">
                <br />
                <div class="product_name"><p>Panasonic Viera TX-32DR400</p></div>
                <div class="price">5 889 grn</div>
                <br />
                <input type="button" name="Add" value="Add">
            </div>
            <div class="product">
                <img src="https://i1.rozetka.ua/goods/10320949/akai_ua32dm1100t2_images_10320949665.jpg">
                <br />
                <div class="product_name"><p>Akai UA32DM1100T2</p></div>
                <div class="price">3 799 grn</div>
                <br />
                <input type="button" name="Add" value="Add">
            </div>
            <div class="product">
                <img src="https://i1.rozetka.ua/goods/10196046/ergo_le40ct5520ak_images_10196046171.jpg">
                <br />
                <div class="product_name"><p>Ergo LE40CT5520AK</p></div>
                <div class="price">6 899 grn</div>
                <br />
                <div><input type="button" name="Add" value="Add"></div>
            </div>
            <div class="product">
                <img src="https://i2.rozetka.ua/goods/10317089/samsung_ue43j5202auxua_images_10317089811.jpg">
                <br />
                <div class="product_name"><p>Samsung UE43J5202AUXUA</p></div>
                <div class="price">13 899 grn</div>
                <br />
                <input type="button" name="Add" value="Add">
            </div>
            <div class="product">
                <img src="https://i2.rozetka.ua/goods/10196832/lg_43lk6200pld_images_10196832933.jpg">
                <br />
                <div class="product_name"><p>LG 43LK6200PLD</p></div>
                <div class="price">16 200 grn</div>
                <br />
                <input type="button" name="Add" value="Add">
            </div>
        </div>
    </div>
    <div class="footer">

    </div>
</div>
</body>
</html>