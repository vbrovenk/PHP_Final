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

        <div class="logout" style="float:right; font-size:20px;margin-right:16px;padding-top:15px;"> 
            <a href="admin.php" style="color:rgb(85, 83, 83);margin-left:5px;">EDIT PRODUCTS</a>
        </div>
    </div>
    <div>
        <?php
            if (isset($_POST['new'])) {
                $login = getClean($_POST['login']);
                $passwd = getClean($_POST['passwd']);
                $passwd = hash('whirlpool', $pass);
                if (!empty($_POST['login']) && !empty($_POST['passwd'])) {
                    $query = "INSERT INTO `users` (`login`, `password`) VALUES ('$login', '$passwd')";
                    mysqli_query($link, $query);
                                   
                }
            }
            
            if (!empty($_GET['del_user']))
            {
                $query = "DELETE FROM `users` WHERE `id` = '".$_GET['del_user']."'";
                mysqli_query($link, $query);
                header("Location: /edit-users.php");
            }
                $query = "SELECT * FROM `users`";
                $query = mysqli_query($link, $query);
                echo "<table>";
                echo "<tr>";
                echo "<th>id</th>";
                echo "<th>login</th>";
                echo "</tr>";
                while ($row = mysqli_fetch_row($query)) {
                    echo "<tr>";
                    echo "<td>" . $row[0] . "</td>";
                    echo "<td>" . $row[1] . "</td>"; 
                    ?>
                        <td><a href="?del_user=<?php echo $row[0]; ?>">Delete user</a></td>
                    <?php           
                    echo "</tr>";
                }
                echo "</table>";
                ?>

            <div class="choose">
                <form action="http://localhost:8200/edit-users.php" method="POST">
                    ADD NEW USER<br/>
                    Name: <input type="text" name="login">
                    <br />
                    Passwd: <input type="text" name="passwd">
                    <br />
                    <input type="submit" name="new" value="NEW">
            </div>
    </div>
</div>
</body>
</html>