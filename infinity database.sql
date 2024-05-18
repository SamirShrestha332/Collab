-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2024 at 05:43 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infinity`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Email`, `Password`) VALUES
(1, 'np03cs4a220139@heraldcollege.edu.np', 'Nizzu123'),
(2, 'np03cs4a220138@heraldcollege.edu.np', 'Samir123'),
(3, 'np03cs4a220129@heraldcollege.edu.np', 'Manogya343'),
(4, 'np03cs4a220037@heraldcollege.edu.np', 'Slisha367'),
(5, 'np03cs4a220158@heraldcollege.edu.np', 'Renuka909');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(50) NOT NULL,
  `name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(1, 'Men'),
(2, 'Women'),
(3, 'Unisex'),
(4, 'Sale');

-- --------------------------------------------------------

--
-- Table structure for table `nav`
--

CREATE TABLE `nav` (
  `id` int(20) NOT NULL,
  `box_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nav`
--

INSERT INTO `nav` (`id`, `box_name`) VALUES
(1, 'Home '),
(2, 'Men'),
(3, 'Women'),
(4, 'Unisex'),
(5, 'Sales');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `product_id`, `name`, `contact`, `address`, `email`, `total_price`, `payment_type`, `payment_status`) VALUES
(5, NULL, 'samir shrestha', '0963480400', 'khghfghfhgfhgfhjgfhgfhgf', 'magarsamir243@gmai.com', 11400, 'khalti', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_men_id` int(11) DEFAULT NULL,
  `sub_category_women_id` int(11) DEFAULT NULL,
  `sub_category_unisex_id` int(11) DEFAULT NULL,
  `size_S` int(11) DEFAULT NULL,
  `size_M` int(11) DEFAULT NULL,
  `size_XL` int(11) DEFAULT NULL,
  `size_XXL` int(11) DEFAULT NULL,
  `stock` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `price`, `description`, `category_id`, `sub_category_men_id`, `sub_category_women_id`, `sub_category_unisex_id`, `size_S`, `size_M`, `size_XL`, `size_XXL`, `stock`, `image`) VALUES
(1, 'Luxury Hoddies', '2000.00', 'Introducing our premium line of hoodies: the ultimate blend of comfort and style. Crafted from the finest materials, our hoodies are designed for everyday wear, whether you\'re relaxing at home or on the go. With a cozy fleece interior, convenient pouch pocket, and adjustable hood, our hoodies provide unmatched warmth and versatility', 3, NULL, NULL, 2, 0, 8, 11, 5, '24', '6639d0b506b07_Men Two Tone Graphic Print Drawstring Hoodie.png'),
(7, 'Sweatshirt', '2400.00', 'The sweatshirt is a cozy and casual garment that provides warmth and comfort in cooler weather. Made from soft and breathable fabrics like cotton or a blend of materials, it features long sleeves and a crew neckline, often with ribbed cuffs and waistband for a snug fit.', 3, NULL, NULL, 1, 0, 24, 25, 11, '60', '663cedf202259_Letter And Cartoon Face Print Sweatshirt.png'),
(8, 'Women Korean Jacket', '2100.00', 'A women\'s Korean jacket, known as a \"jeogori,\" is a traditional garment that features a wrap-around style with long, wide sleeves, a high collar, and intricate embellishments.', 2, NULL, 3, NULL, 4, 89, 21, 20, '134', '663daa5520e75_Womens Korean Padded Loose Hoodie Cotton Blend Jacket Faux Fur Parka Winter Warm.png'),
(9, 'Hoddie', '2700.00', 'Hoodies are cozy, casual garments featuring a hood and often a kangaroo pocket at the front. They provide comfort and warmth, perfect for lounging or outdoor activities.', 3, NULL, NULL, 2, 0, 12, 16, 19, '47', '663e30919b98d_Guys Butterfly & Letter Graphic Drawstring Hoodie.png'),
(13, 'Wool Varsity Jacket', '2900.00', 'The Wool Varsity Jacket is a classic piece that combines warmth, style, and a touch of vintage charm. Crafted from premium wool material, this jacket offers exceptional insulation to keep you cozy during colder seasons. ', 1, 3, NULL, NULL, 26, 29, 27, 53, '135', '664110268cffb_Marvel _ Kith for X-Men Wool Varsity Jacket.png'),
(14, 'Trendy Jacket  Style', '5000.00', 'Introducing our latest creation: the Trendy Jacket – where style meets innovation! Elevate your wardrobe with this cutting-edge piece that redefines modern fashion. Crafted with precision and designed for versatility, our Trendy Jacket boasts bold patterns, sleek lines, and attention-grabbing details that guarantee to turn heads wherever you go', 1, 3, NULL, NULL, 54, 51, 4, 90, '199', '6641114af0225_Trendy jacket style.png'),
(15, 'Discharge Sweatpants', '1800.00', 'Introducing our Discharge Sweatpants: the epitome of comfort and style. Crafted with premium materials and designed with your ultimate comfort in mind, these sweatpants are the perfect blend of functionality and fashion.\r\n\r\nExperience unparalleled softness with every wear, thanks to the high-quality fabric that feels gentle against your skin', 3, NULL, NULL, 3, 54, 55, 13, 0, '122', '6641145ab2671_Discharge Sweatpants _MADE TO ORDER_.png'),
(17, 'Winter Jacket', '4000.00', 'Introducing our Winter Fleece Jacket – your ultimate companion for cold weather adventures! Crafted with premium fleece material, this jacket offers exceptional warmth and comfort, ensuring you stay cozy even in the chilliest of conditions.', 2, NULL, 3, NULL, 24, 46, 0, 12, '82', '664115e814801_Genhoo Women Long Sleeve Blazer Open Front Cardigan Jacket Work Office Blazer with Zipper Pockets.png'),
(18, 'Wind Cheater Jacket', '5000.00', 'Introducing our Wind Cheater – the ultimate outerwear essential for blustery days! Engineered to shield you from the elements, this sleek and versatile jacket is your go-to solution for windy weather.', 3, NULL, NULL, 4, 34, 9, 13, 25, '81', '6641174cb3ff9_windcheater.png'),
(19, 'Rayon long Skirt', '2100.00', 'Introducing our Wind Cheater – the ultimate outerwear essential for blustery days! Engineered to shield you from the elements, this sleek and versatile jacket is your go-to solution for windy weather.', 2, NULL, 4, NULL, 34, 9, 13, 25, '81', '664118e6c3574_Jet Black and Gold Painted Rayon Long Skirt.png'),
(20, 'Rayon long Skirt', '2100.00', 'Experience the epitome of femininity and style with our exquisite collection of skirts. Each piece is meticulously crafted to accentuate your curves and elevate your look to new heights of sophistication.', 2, NULL, 4, NULL, 34, 9, 13, 25, '81', '66411905cc652_Jet Black and Gold Painted Rayon Long Skirt.png'),
(21, 'Plaid Mini Skirt ', '2100.00', 'Introducing our Plaid Mini Skirt – a timeless wardrobe staple with a modern twist. Crafted from premium quality fabric, this skirt combines classic charm with contemporary flair, making it a must-have for every fashion-forward individual.', 2, NULL, 4, NULL, 34, 5, 13, 25, '77', '664119583005a_Plaid mini skirt.png'),
(22, 'Combo Work Trousers', '2400.00', 'Introducing our Combo Work Trousers – the ultimate blend of style, comfort, and functionality for your professional wardrobe. Designed with the modern professional in mind, these trousers offer the perfect combination of versatility and durability to keep you looking sharp and feeling confident all day long.', 1, 1, NULL, NULL, 56, 28, 24, 33, '141', '66411a5f9ea2e_WWK _ WorkWear King Mens Army Combat Cargo Work Trousers.png'),
(24, 'Denin Pant  ', '2400.00', 'Step into style with our Xituodai Jeans for Men – the epitome of sleek sophistication and Korean-inspired fashion. Crafted for the modern man, these slim-fit denim pants in a refreshing light blue hue are designed to elevate your spring wardrobe with effortless charm and flair', 1, 1, NULL, NULL, 56, 28, 24, 33, '141', '66411b51a9992_Xituodai Jeans Men Spring Slim Feet Man Denim pant Korean Style - Denim light blue.png'),
(25, 'Tops', '1900.00', 'Explore the pinnacle of versatility and style with our collection of tops. From classic basics to statement pieces, our tops are designed to elevate your wardrobe and express your unique personality.', 2, NULL, 2, NULL, 56, 28, 24, 33, '141', '66411be23514f_ti1639243275tl4e6cd95227cb0c280e99a195be5f6615.png'),
(26, 'Fleece Jacket', '5500.00', '\"Introducing our Women\'s Autumn and Winter Plus Fleece Jacket – your go-to outerwear for chilly adventures and cozy moments. Crafted with warmth and comfort in mind, this jacket is designed to keep you snug and stylish during the colder seasons.', 2, NULL, 3, NULL, 56, 28, 24, 33, '141', '66411ccf32a8b_Women Autumn and Winter Plus Fleece Jacket Outdoor Mountaineering Clothes Dark Blue.png'),
(27, 'Vintage Wind Cheater ', '5000.00', 'Step into nostalgia with our Vintage Wind Cheater – a timeless piece that channels the spirit of classic athleticism and retro charm. Crafted with a nod to yesteryear, this wind cheater embodies the essence of vintage style while providing modern-day functionality.', 3, NULL, NULL, 4, 56, 28, 24, 33, '141', '66411d5de031e_Vintage Windcheater.jpeg'),
(28, 'Skull Print Cami Top', '1200.00', 'ntroducing our Skull Print Cami Top – a daring and edgy addition to your wardrobe. Featuring an eye-catching skull print, this cami top adds a bold and rebellious touch to any outfit.\r\n\r\nCrafted from soft and breathable fabric, our cami top offers comfort and style in equal measure', 2, NULL, 2, NULL, 56, 28, 24, 33, '141', '66411e0fd756d_ROMWE STPL Skull Print Chain Cami Top.png'),
(29, 'Hoddie', '2000.00', 'A hoodie is a type of sweatshirt or jacket that features a hood, typically with a drawstring to adjust the hood opening. Originally designed for athletes and outdoor workers to keep warm, hoodies have become a popular casual clothing item worn by people of all ages and genders. They are often made from soft, comfortable materials such as cotton or fleece and are known for their versatility and practicality.', 3, NULL, NULL, 2, 20, 14, 28, 9, '71', '6641cd8bee9d7_Men Letter & Figure Graphic Drawstring Thermal Hoodie.png');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories_men`
--

CREATE TABLE `sub_categories_men` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `is_hidden` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_categories_men`
--

INSERT INTO `sub_categories_men` (`ID`, `Name`, `category_id`, `is_hidden`) VALUES
(1, 'Pant', 1, 0),
(2, 'Shirt/T-shirt', 1, 0),
(3, 'Jacket', 1, 0),
(4, 'Sweater', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories_unisex`
--

CREATE TABLE `sub_categories_unisex` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `is_hidden` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_categories_unisex`
--

INSERT INTO `sub_categories_unisex` (`ID`, `Name`, `category_id`, `is_hidden`) VALUES
(1, 'Sweatshirt', 3, 0),
(2, 'Hoodie', 3, 0),
(3, 'Sweatpants', 3, 0),
(4, 'WindCheater', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories_women`
--

CREATE TABLE `sub_categories_women` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `is_hidden` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_categories_women`
--

INSERT INTO `sub_categories_women` (`ID`, `Name`, `category_id`, `is_hidden`) VALUES
(1, 'Jeans', 2, 0),
(2, 'Tops', 2, 0),
(3, 'Jacket', 2, 0),
(4, 'Skirt', 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `nav`
--
ALTER TABLE `nav`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `sub_category_female_id` (`sub_category_women_id`),
  ADD KEY `sub_category_male_id` (`sub_category_men_id`),
  ADD KEY `sub_category_unisex_id` (`sub_category_unisex_id`);

--
-- Indexes for table `sub_categories_men`
--
ALTER TABLE `sub_categories_men`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `sub_categories_unisex`
--
ALTER TABLE `sub_categories_unisex`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `sub_categories_women`
--
ALTER TABLE `sub_categories_women`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nav`
--
ALTER TABLE `nav`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `sub_categories_men`
--
ALTER TABLE `sub_categories_men`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_categories_unisex`
--
ALTER TABLE `sub_categories_unisex`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_categories_women`
--
ALTER TABLE `sub_categories_women`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`sub_category_women_id`) REFERENCES `sub_categories_women` (`ID`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`sub_category_men_id`) REFERENCES `sub_categories_men` (`ID`),
  ADD CONSTRAINT `product_ibfk_4` FOREIGN KEY (`sub_category_unisex_id`) REFERENCES `sub_categories_unisex` (`ID`);

--
-- Constraints for table `sub_categories_men`
--
ALTER TABLE `sub_categories_men`
  ADD CONSTRAINT `sub_categories_men_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `sub_categories_unisex`
--
ALTER TABLE `sub_categories_unisex`
  ADD CONSTRAINT `sub_categories_unisex_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `sub_categories_women`
--
ALTER TABLE `sub_categories_women`
  ADD CONSTRAINT `sub_categories_women_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
