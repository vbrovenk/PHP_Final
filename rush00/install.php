<?php
require_once ('database.php');

$dbc = mysqli_connect($db_host, $db_user, $db_password, "mysql");
$query = "CREATE DATABASE IF NOT EXISTS $db_name";
if (mysqli_query($dbc, $query)) {
    echo "CREATED DB";
}
$query = "USE $db_name";
if (mysqli_query($dbc,   $query)) {
    echo "USE";
}

$query = "CREATE TABLE IF NOT EXISTS `users`(
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `login` VARCHAR(20) NOT NULL,
            `password` VARCHAR(30) NOT NULL
            )";

// $query = "INSERT INTO `users`(`login`, `password`) VALUES('admin', 'admin')";
mysqli_query($link, $query);
if (mysqli_query($link, $query)) {
    echo "CREATED";
}

$query = "CREATE TABLE IF NOT EXISTS`products`(
        `product_id` INT AUTO_INCREMENT PRIMARY KEY,
        `name` VARCHAR(60) NOT NULL,
        `price` VARCHAR(20) NOT NULL,
        `photo` VARCHAR(400) NOT NULL
        )";
        
mysqli_query($link, $query);
if (mysqli_query($link, $query)) {
    echo "CREATED";
}

// $query = "INSERT INTO `products` (`name`, `price`, `photo`, `cat_id`) VALUES
//         ('Huawei P Smart 2019', '4 999 grn', 'https://i1.rozetka.ua/goods/9396114/huawei_p_smart_2019_blue_images_9396114098.jpg', '1'),
//         ('Xiaomi Redmi 6A', '2 999 grn', 'https://i1.rozetka.ua/goods/6845977/xiaomi_redmi_6a_2_16gb_black_images_6845977006.jpg', '1'),
//         ('Huawei P Smart', '7 499 grn', 'https://i2.rozetka.ua/goods/7926542/huawei_p_smart_plus_black_images_7926542781.jpg', '1'),
//         ('Nokia 5 Dual Sim', '4 599 grn', 'https://i1.rozetka.ua/goods/1946757/nokia_5_ds_blue_images_1946757914.jpg', '1'),
//         ('Xiaomi Redmi Note 5', '4 250 grn', 'https://i1.rozetka.ua/goods/5031831/xiaomi_redmi_note5_332gb_blue_images_5031831136.jpg', '1'),
//         ('Xiaomi Note 5 Black', '4 750 grn', 'https://i2.rozetka.ua/goods/6443849/xiaomi_redmi_note5_4_64gb_black_eu_images_6443849382.jpg', '1'),
//         ('Sony KDL43WF805BR', '18 999 grn', 'https://i2.rozetka.ua/goods/10318467/sony_kdl43wf805br_images_10318467213.jpg', '2'),
//         ('Panasonic Viera TX-32DR400', '5 889 grn', 'https://i1.rozetka.ua/goods/2354394/panasonic_tx_32dr400_images_2354394217.jpg', '2'),
//         ('Akai UA32DM1100T2', '3 799 grn', 'https://i1.rozetka.ua/goods/10320949/akai_ua32dm1100t2_images_10320949665.jpg', '2'),
//         ('Ergo LE40CT5520AK', '6 899 grn', 'https://i1.rozetka.ua/goods/10196046/ergo_le40ct5520ak_images_10196046171.jpg', '2'),
//         ('Samsung UE43J5202AUXUA', '13 899 grn', 'https://i2.rozetka.ua/goods/10317089/samsung_ue43j5202auxua_images_10317089811.jpg', '2'),
//         ('LG 43LK6200PLD', '16 200 grn', 'https://i2.rozetka.ua/goods/10196832/lg_43lk6200pld_images_10196832933.jpg', '2'),
//         ('HP 250 G6', '8 199 grn', 'https://i2.rozetka.ua/goods/7527007/copy_hp_3vj21ea_5ba3bd0cc60e4_images_7527007176.jpg', '3'),
//         ('Asus VivoBook RZ540MA', '6 999 grn', 'https://i1.rozetka.ua/goods/8514473/asus_90rz0ir1_m00080_images_8514473266.jpg', '3'),
//         ('Acer Swift 5 SF514-51', '25 999 grn', 'https://i2.rozetka.ua/goods/2425951/copy_acer_nx_gldeu_013_5a379495c8e26_images_2425951417.jpg', '3'),
//         ('Acer Aspire 3 A315-53G', '16 699 grn', 'https://i1.rozetka.ua/goods/2093039/copy_lenovo_80xl02r5ra_596de73466559_images_2093039683.jpg', '3'),
//         ('Lenovo IdeaPad 320-15IKB', '13 899 grn', 'https://i2.rozetka.ua/goods/3408334/copy_lenovo_80xl041tra_5a9ec0b419771_images_3408334735.jpg', '3'),
//         ('ASUS X570UD-E4037', '26 200 grn', 'https://i1.rozetka.ua/goods/2751819/copy_asus_x570ud_e4026_5a6ef38f49ec7_images_2751819655.jpg', '3')";

// if (mysqli_query($link, $query)) {
//     echo "FILLED";
// }
?>