-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2024 at 12:59 PM
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
  `user_id` int(11) DEFAULT NULL,
  `order_date` varchar(200) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `items_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` varchar(200) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `payment_type` varchar(200) DEFAULT NULL,
  `transaction_id` int(11) DEFAULT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories_men`
--

CREATE TABLE `sub_categories_men` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_categories_men`
--

INSERT INTO `sub_categories_men` (`ID`, `Name`, `category_id`) VALUES
(1, 'Pant', 1),
(2, 'Shirt/T-shirt', 1),
(3, 'Jacket', 1),
(4, 'Sweater', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories_unisex`
--

CREATE TABLE `sub_categories_unisex` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_categories_unisex`
--

INSERT INTO `sub_categories_unisex` (`ID`, `Name`, `category_id`) VALUES
(1, 'Sweatshirt', 3),
(2, 'Hoodie', 3),
(3, 'Sweatpants', 3),
(4, 'WindCheater', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories_women`
--

CREATE TABLE `sub_categories_women` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_categories_women`
--

INSERT INTO `sub_categories_women` (`ID`, `Name`, `category_id`) VALUES
(1, 'Jeans', 2),
(2, 'Tops', 2),
(3, 'Jacket', 2),
(4, 'Skirt', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone_number` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`items_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `order_id` (`order_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

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
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `items_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_items` (`order_id`);

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
