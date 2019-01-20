<!DOCTYPE html>
<?php 
    require_once 'database.php';
    if ($_SESSION['login'] !== "admin")
        header("Location: http://localhost:8200");
?>
<html>
<head>
    <title>rush00</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/editing_products.css">
</head>
<body>
<div class="container">
    <div class="pannel">
        <div class="logout" style="float:right; font-size:20px;margin-right:16px;">
            <p style="font-size:16px;margin-top:4px;margin-bottom: 5px;color:rgb(85, 83, 83)">Hello, <?php echo $_SESSION['login']?></p>    
            <a href="logout.php" style="color:rgb(85, 83, 83);margin-left:5px;">LogOut</a>
        </div>
    </div>
    <div>
        <?php
            if (isset($_POST['new'])) {
                $photo = getClean($_POST['photo']);
                $name = getClean($_POST['name']);
                $price = getClean($_POST['price']);
                $category = getClean($_POST['price']);
                if (!empty($_POST['photo']) && !empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['category'])) {
                    // $query = "INSERT INTO `products` (`name`, `price`, `photo`, `cat_id`) VALUES('$photo', '$name', '$price', '$category')";
                    echo "OK";
                    mysqli_query($link, $query);
                }
            }
            if (isset($_GET['del_product']))
            {
                $query = "DELETE FROM `products` WHERE `product_id` = '".$_GET['del_product']."'";
                mysqli_query($link, $query);
                header("Location: /admin.php");
            }
                $query = "SELECT * FROM `products`";
                $query = mysqli_query($link, $query);
                echo "<table>";
                echo "<tr>";
                echo "<th>id</th>";
                echo "<th>Photo</th>";
                echo "<th>Name</th>";
                echo "<th>Price</th>";
                echo "<th>Category</th>";
                echo "<th>Action</th>";
                echo "</tr>";
                while ($row = mysqli_fetch_row($query)) {
                    echo "<tr>";
                    echo "<td>" . $row[0] . "</td>";
                    echo "<td><img src=\"" . $row[3] . "\"></td>";
                    echo "<td>" . $row[1] . "</td>"; 
                    echo "<td>".  $row[2] . "</td>";
                    echo "<td>".  $row[4] . "</td>";
                    ?>
                        <td><a href="?del_product=<?php echo $row[0]; ?>">Delete product</a></td>
                    <?php           
                    echo "</tr>";

                    // if (isset($_POST['choose']) && $row[0] === ($_POST['choose_id'])) {
                    //     echo "OKKOOK";
                    //     $temp = (int)$_POST['choose_id'];
                    //     $query = "DELETE  FROM `products` WHERE `id` = '$temp'";
                    //     mysqli_query($link, $query);
                    //     // header()
                    // }
                }
                echo "</table>";
                ?>

            <div class="choose">
                <form action="http://localhost:8200/admin.php" method="POST">
                    Photo: <input type="text" name="photo">
                    <br />
                    Name: <input type="text" name="name">
                    <br />
                    Price: <input type="text" name="price">
                    <br />
                    Category: <input type="text" name="category">
                    <br />
                    <input type="submit" name="new" value="NEW">
            </div>
    </div>
</div>
</body>
</html>