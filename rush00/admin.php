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
    <div class="pannel">
        <div class="logout" style="float:right; font-size:20px;margin-right:16px;">
            <p style="font-size:16px;margin-top:4px;margin-bottom: 5px;color:rgb(85, 83, 83)">Hello, <?php echo $_SESSION['login']?></p>    
            <a href="logout.php" style="color:rgb(85, 83, 83);margin-left:5px;">LogOut</a>
        </div>

        <div>

        </div>
    </div>
</div>
</body>
</html>