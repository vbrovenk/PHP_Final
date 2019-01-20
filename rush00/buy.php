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
        <div class="firts-row">
        <?php
            require_once ('database.php');

            for ($i = 0; $i < count($_SESSION['items']); $i++) {
                $id = $_SESSION['items'][$i];
                $login = $_SESSION['login'];
                $query = "INSERT INTO `orders` VALUES ('$id', '$login')";
                mysqli_query($link, $query);
            }
            echo "THANKS FOR ORDER";

            unset($_SESSION['items']);
            ?>

        </div>
        </div>
    </div>
</div>
</body>
</html>