<!DOCTYPE html>
<?php 
    require_once 'database.php';
?>
<html>
<head>
    <title>rush00</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <?php
        require_once('header.php');
    ?>
    <div class="menu">
        <ul class="topmenu">
            <li><a href="#">Phones</a></li>
            <li><a href="tv.php">TV</a></li>
            <li><a href="laptops.php">Laptops</a></li>
        </ul>
    </div>
    <div class="pruducts">
        <div class="firts-row">
            <div class="product">
                <img src="https://i1.rozetka.ua/goods/9396114/huawei_p_smart_2019_blue_images_9396114098.jpg">
                <br />
                <div class="product_name"><p>Huawei P Smart 2019</p></div>
                <div class="price">4 999 grn</div>
                <br />
                <div><input type="button" name="Add" value="Add"></div>
            </div>
            <div class="product">
                <img src="https://i1.rozetka.ua/goods/6845977/xiaomi_redmi_6a_2_16gb_black_images_6845977006.jpg">
                <br />
                <div class="product_name"><p>Xiaomi Redmi 6A</p></div>
                <div class="price">2 999 grn</div>
                <br />
                <input type="button" name="Add" value="Add">
            </div>
            <div class="product">
                <img src="https://i2.rozetka.ua/goods/7926542/huawei_p_smart_plus_black_images_7926542781.jpg">
                <br />
                <div class="product_name"><p>Huawei P Smart</p></div>
                <div class="price">7 499 grn</div>
                <br />
                <input type="button" name="Add" value="Add">
            </div>
            <div class="product">
                <img src="https://i1.rozetka.ua/goods/1946757/nokia_5_ds_blue_images_1946757914.jpg">
                <br />
                <div class="product_name"><p>Nokia 5 Dual Sim</p></div>
                <div class="price">4 599 grn</div>
                <br />
                <div><input type="button" name="Add" value="Add"></div>
            </div>
            <div class="product">
                <img src="https://i1.rozetka.ua/goods/5031831/xiaomi_redmi_note5_332gb_blue_images_5031831136.jpg">
                <br />
                <div class="product_name"><p>Xiaomi Redmi Note 5</p></div>
                <div class="price">4 250 grn</div>
                <br />
                <input type="button" name="Add" value="Add">
            </div>
            <div class="product">
                <img src="https://i2.rozetka.ua/goods/6443849/xiaomi_redmi_note5_4_64gb_black_eu_images_6443849382.jpg">
                <br />
                <div class="product_name"><p>Xiaomi Note 5 Black</p></div>
                <div class="price">4 750 grn</div>
                <br />
                <input type="button" name="Add" value="Add">
            </div>
        </div>
        <div class="second-row">

        </div>
    </div>
    <div class="footer">

    </div>
</div>
</body>
</html>