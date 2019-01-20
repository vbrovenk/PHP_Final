<!DOCTYPE html>
<?php 
    require_once 'database.php';
?>
<html>
<head>
    <title>rush00</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/tv_style.css"> -->
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
        <div style="clear:both">
                    <?php
                        if (isset($_SESSION['login'])) {
                    ?>
                    <form action="buy.php" method="POST">
                        <input type="submit" name="BUY" value="BUY" style="width:40px;">
                    </form>
                    <?php
                        }
                        else {
                            echo "YOU NEED TO LOGIN OR REGISTR";
                        }
                        
                    ?>
                </div>
        <div class="firts-row">
            <?php
                for ($i = 0; $i < count($_SESSION['items']); $i++) {
                    $id = (int)$_SESSION['items'][$i];
                    $query_product = mysqli_query($link, "SELECT * FROM `products` WHERE `product_id` = '$id'");
                    $row = mysqli_fetch_row($query_product);
            ?>
            <div class="product">
                <img src="<?php echo $row[3]; ?>">
                <br />
                <div class="product_name"><p><?php echo $row[1]; ?></p></div>
                <div class="price"><?php echo $row[2]; ?></div>
                <br />
            </div>
        <?php 
            }
        ?>
        </div>
        </div>
    </div>
</div>
</body>
</html>