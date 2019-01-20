<!DOCTYPE html>
<?php 
    require_once 'database.php';
?>
<html>
<head>
    <title>rush00</title>
    <link rel="stylesheet" href="css/style.css">
    <?php
        if ($_GET['cat'] == 2 || $_GET['cat'] == 3) {
    ?>
    <link rel="stylesheet" href="css/tv_style.css">
    <?php 
        }
    ?>
</head>
<body>
<div class="container">
    <?php
        require_once('header.php');
    ?>
    <div class="menu">
        <ul class="topmenu">
        <?php
            $query_cat = mysqli_query($link, "SELECT `id`, `name` FROM `cat`");
            foreach ($query_cat as $cat) {
        ?>
        
            <li class="<?php if ($_GET['cat'] === $cat['id']) {echo "active_cat"; } ?>"><a href="/?cat=<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></a></li>
            <?php } ?>
        </ul>
    </div>
    <div class="pruducts">
        <div class="firts-row">
        <?php
                if (isset($_GET['cat'])) {
                $query_product = mysqli_query($link, "SELECT * FROM `products` WHERE `cat_id` = '".$_GET['cat']."'");
                foreach ($query_product as $product) {
        ?>
            <div class="product">
                <img src="<?php echo $product['photo']; ?>">
                <br />
                <div class="product_name"><p><?php echo $product['name']; ?></p></div>
                <div class="price"><?php echo $product['price']; ?></div>
                <br />
                <!-- <a href="/save.php?product=product_id (id product database)"> -->
                <div><a href="/add-to-basket.php?id=<?php echo $product['product_id']; ?>">ADD</a></div>
            </div>
        <?php } }?>
        </div>
    </div>
    <div class="footer">

    </div>
</div>
</body>
</html>