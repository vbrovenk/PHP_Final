-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 20, 2019 at 11:57 AM
-- Server version: 5.7.24
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rush0`
--

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE `cat` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`id`, `name`) VALUES
(1, 'Phones'),
(2, 'TV'),
(3, 'Laptops');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_product` varchar(60) NOT NULL,
  `login` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_product`, `login`) VALUES
('97', 'Vasya'),
('99', 'Vasya'),
('105', 'Vasya'),
('107', 'tolik'),
('109', 'tolik');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `price` varchar(20) NOT NULL,
  `photo` varchar(400) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `photo`, `cat_id`) VALUES
(97, 'Nokia 5 Dual Sim', '4 599 grn', 'https://i1.rozetka.ua/goods/1946757/nokia_5_ds_blue_images_1946757914.jpg', 1),
(98, 'Xiaomi Redmi Note 5', '4 250 grn', 'https://i1.rozetka.ua/goods/5031831/xiaomi_redmi_note5_332gb_blue_images_5031831136.jpg', 1),
(99, 'Xiaomi Note 5 Black', '4 750 grn', 'https://i2.rozetka.ua/goods/6443849/xiaomi_redmi_note5_4_64gb_black_eu_images_6443849382.jpg', 1),
(100, 'Sony KDL43WF805BR', '18 999 grn', 'https://i2.rozetka.ua/goods/10318467/sony_kdl43wf805br_images_10318467213.jpg', 2),
(101, 'Panasonic Viera TX-32DR400', '5 889 grn', 'https://i1.rozetka.ua/goods/2354394/panasonic_tx_32dr400_images_2354394217.jpg', 2),
(102, 'Akai UA32DM1100T2', '3 799 grn', 'https://i1.rozetka.ua/goods/10320949/akai_ua32dm1100t2_images_10320949665.jpg', 2),
(103, 'Ergo LE40CT5520AK', '6 899 grn', 'https://i1.rozetka.ua/goods/10196046/ergo_le40ct5520ak_images_10196046171.jpg', 2),
(104, 'Samsung UE43J5202AUXUA', '13 899 grn', 'https://i2.rozetka.ua/goods/10317089/samsung_ue43j5202auxua_images_10317089811.jpg', 2),
(105, 'LG 43LK6200PLD', '16 200 grn', 'https://i2.rozetka.ua/goods/10196832/lg_43lk6200pld_images_10196832933.jpg', 2),
(107, 'Asus VivoBook RZ540MA', '6 999 grn', 'https://i1.rozetka.ua/goods/8514473/asus_90rz0ir1_m00080_images_8514473266.jpg', 3),
(108, 'Acer Swift 5 SF514-51', '25 999 grn', 'https://i2.rozetka.ua/goods/2425951/copy_acer_nx_gldeu_013_5a379495c8e26_images_2425951417.jpg', 3),
(109, 'Acer Aspire 3 A315-53G', '16 699 grn', 'https://i1.rozetka.ua/goods/2093039/copy_lenovo_80xl02r5ra_596de73466559_images_2093039683.jpg', 3),
(110, 'Lenovo IdeaPad 320-15IKB', '13 899 grn', 'https://i2.rozetka.ua/goods/3408334/copy_lenovo_80xl041tra_5a9ec0b419771_images_3408334735.jpg', 3),
(111, 'ASUS X570UD-E4037', '26 200 grn', 'https://i1.rozetka.ua/goods/2751819/copy_asus_x570ud_e4026_5a6ef38f49ec7_images_2751819655.jpg', 3),
(113, 'Huawei P Smart 2019', '4 999 grn', 'https://i1.rozetka.ua/goods/9396114/huawei_p_smart_2019_blue_images_9396114098.jpg', 1),
(114, 'Xiaomi Redmi 6A', '2 999 grn', 'https://i1.rozetka.ua/goods/6845977/xiaomi_redmi_6a_2_16gb_black_images_6845977006.jpg', 1),
(115, 'Huawei P Smart', '7 499 grn', 'https://i2.rozetka.ua/goods/7926542/huawei_p_smart_plus_black_images_7926542781.jpg', 1),
(116, 'HP 250 G6', '8 199 grn', 'https://i2.rozetka.ua/goods/7527007/copy_hp_3vj21ea_5ba3bd0cc60e4_images_7527007176.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` binary(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'tolik', 0x3334343930376538396239383163616632323164303566353937656235376136616634303866313566346464373839356262643162393661323933386563323461376463663233616362393465636530623664376230363430333538626335366264623434383139346239333035333131616666303338613833346130373966),
(8, 'admin', 0x3661346530313262643935383338353861356136666131356635386264383661323561663236366433613433343466316563323031386237373866323962613833626538366562343565366463323034653131323736663461393965666634653231343466626531356537353663326338386539393936343961616537643934);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
