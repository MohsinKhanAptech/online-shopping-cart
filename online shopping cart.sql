-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2023 at 05:34 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online shopping cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_image`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 'admin.png');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `cart_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_price` decimal(65,2) NOT NULL,
  `cart_quantity` int(10) NOT NULL,
  `cart_total` decimal(65,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`cart_id`, `customer_id`, `product_id`, `product_price`, `cart_quantity`, `cart_total`) VALUES
(36, 1, 5, 696969.00, 1, 696969.00),
(37, 1, 5, 696969.00, 5, 3484845.00),
(38, 1, 5, 696969.00, 1, 696969.00),
(39, 1, 5, 696969.00, 2, 1393938.00),
(40, 1, 5, 696969.00, 1, 696969.00);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_name`) VALUES
('Accessories'),
('Fragrances'),
('Stationaries'),
('Sweets'),
('Toys');

-- --------------------------------------------------------

--
-- Table structure for table `completed_orders`
--

CREATE TABLE `completed_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `order_quantity` int(10) NOT NULL,
  `order_status_id` int(10) NOT NULL,
  `order_total` decimal(65,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_password`) VALUES
(1, 'asd', 'asd@asd', 'asd'),
(9, 'asdasd', 'asdasd@asd', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `customer_detail_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `street_address` varchar(255) NOT NULL,
  `town` varchar(50) NOT NULL,
  `state` int(50) NOT NULL,
  `postcode` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(10) NOT NULL,
  `employee_name` varchar(100) NOT NULL,
  `employee_email` varchar(255) NOT NULL,
  `employee_password` varchar(255) NOT NULL,
  `employee_contact` varchar(50) NOT NULL,
  `employee_address` varchar(255) NOT NULL,
  `employee_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `employee_name`, `employee_email`, `employee_password`, `employee_contact`, `employee_address`, `employee_image`) VALUES
(1, 'employee', 'employee@gmail.com', 'employee', '03001234567', 'A 563, Main Shahrah-e-Usman, Sector 11-A, Karachi, Sindh', 'employee.png');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `newsletter_id` int(10) NOT NULL,
  `newsletter_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`newsletter_id`, `newsletter_email`) VALUES
(1, 'mmohsinkhan3685@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `order_quantity` int(10) NOT NULL,
  `order_status_id` int(10) NOT NULL DEFAULT 2,
  `order_total` decimal(65,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `order_status_id` int(10) NOT NULL,
  `order_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`order_status_id`, `order_status`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Shipped'),
(4, 'Backorder'),
(5, 'On Hold'),
(6, 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_category` varchar(50) NOT NULL,
  `product_rating` decimal(3,2) NOT NULL DEFAULT 0.00,
  `product_review_count` int(10) NOT NULL DEFAULT 0,
  `product_price` decimal(65,2) NOT NULL,
  `product_stock` int(10) NOT NULL DEFAULT 1,
  `product_sold` int(10) NOT NULL DEFAULT 0,
  `product_image` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_category`, `product_rating`, `product_review_count`, `product_price`, `product_stock`, `product_sold`, `product_image`, `timestamp`) VALUES
(5, 'ak 47', 'ak 47', 'Toys', 3.67, 3, 696969.00, 696969, 0, 'AK_47.jpg', '2023-11-17 08:12:09'),
(10, 'Gulab Jamun', 'Gulab Jamun', 'Sweets', 0.00, 0, 69.00, 69, 0, 'gulab_jamun.png', '2023-11-17 08:12:09'),
(11, 'ak 47', 'ak 47', 'Toys', 0.00, 0, 696969.00, 696969, 0, 'AK_47.jpg', '2023-11-17 08:12:09'),
(12, 'Gulab Jamun', 'Gulab Jamun', 'Sweets', 0.00, 0, 69.00, 69, 0, 'gulab_jamun.png', '2023-11-17 08:12:09'),
(13, 'ak 47', 'ak 47', 'Toys', 0.00, 0, 696969.00, 696969, 0, 'AK_47.jpg', '2023-11-17 08:12:09'),
(14, 'Gulab Jamun', 'Gulab Jamun', 'Sweets', 0.00, 0, 69.00, 69, 0, 'gulab_jamun.png', '2023-11-17 08:12:09'),
(15, 'ak 47', 'ak 47', 'Toys', 0.00, 0, 696969.00, 696969, 0, 'AK_47.jpg', '2023-11-17 08:12:09'),
(16, 'Gulab Jamun', 'Gulab Jamun', 'Sweets', 0.00, 0, 69.00, 69, 0, 'gulab_jamun.png', '2023-11-17 08:12:09'),
(17, 'ak 47', 'ak 47', 'Toys', 0.00, 0, 696969.00, 696969, 0, 'AK_47.jpg', '2023-11-17 08:12:09'),
(18, 'Gulab Jamun', 'Gulab Jamun', 'Sweets', 0.00, 0, 69.00, 69, 0, 'gulab_jamun.png', '2023-11-17 08:12:09'),
(19, 'ak 47', 'ak 47', 'Toys', 0.00, 0, 696969.00, 696969, 0, 'AK_47.jpg', '2023-11-17 08:12:09'),
(20, 'Gulab Jamun', 'Gulab Jamun', 'Sweets', 0.00, 0, 69.00, 69, 0, 'gulab_jamun.png', '2023-11-17 08:12:09'),
(21, 'ak 47', 'ak 47', 'Toys', 0.00, 0, 696969.00, 696969, 0, 'AK_47.jpg', '2023-11-17 08:12:09'),
(22, 'Gulab Jamun', 'Gulab Jamun', 'Sweets', 0.00, 0, 69.00, 69, 0, 'gulab_jamun.png', '2023-11-17 08:12:09'),
(23, 'ak 47', 'ak 47', 'Toys', 0.00, 0, 696969.00, 696969, 0, 'AK_47.jpg', '2023-11-17 08:12:09'),
(24, 'Gulab Jamun', 'Gulab Jamun', 'Sweets', 0.00, 0, 69.00, 69, 0, 'gulab_jamun.png', '2023-11-17 08:12:09'),
(25, 'Terre d\'Hermès', 'Terre d\'Hermès', 'Fragrances', 0.00, 0, 112.99, 99, 0, 'Terre.png', '2023-11-17 08:12:09'),
(26, 'Terre d\'Hermès', 'Terre d\'Hermès', 'Fragrances', 0.00, 0, 112.99, 99, 0, 'Terre.png', '2023-11-17 08:12:09'),
(27, 'Terre d\'Hermès', 'Terre d\'Hermès', 'Fragrances', 0.00, 0, 112.99, 99, 0, 'Terre.png', '2023-11-17 08:12:09'),
(28, 'Terre d\'Hermès', 'Terre d\'Hermès', 'Fragrances', 0.00, 0, 112.99, 99, 0, 'Terre.png', '2023-11-17 08:12:09'),
(29, 'Terre d\'Hermès', 'Terre d\'Hermès', 'Fragrances', 0.00, 0, 112.99, 99, 0, 'Terre.png', '2023-11-17 08:12:09'),
(30, 'Terre d\'Hermès', 'Terre d\'Hermès', 'Fragrances', 0.00, 0, 112.99, 99, 0, 'Terre.png', '2023-11-17 08:12:09'),
(31, 'Terre d\'Hermès', 'Terre d\'Hermès', 'Fragrances', 0.00, 0, 112.99, 99, 0, 'Terre.png', '2023-11-17 08:12:09'),
(32, 'Terre d\'Hermès', 'Terre d\'Hermès', 'Fragrances', 0.00, 0, 112.99, 99, 0, 'Terre.png', '2023-11-17 08:12:09');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `rating` int(1) NOT NULL,
  `review_title` varchar(25) NOT NULL,
  `review` varchar(255) NOT NULL,
  `review_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `customer_id`, `product_id`, `rating`, `review_title`, `review`, `review_date`) VALUES
(20, 1, 5, 1, 'doodoo', 'no doodoo no pewpew', '2023-11-16'),
(21, 1, 5, 5, 'doodoo', 'doodoo pewpew', '2023-11-16'),
(29, 1, 5, 5, 'doodoo', 'doodoo pewpew', '2023-11-16');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `fk cart_items customer_id` (`customer_id`),
  ADD KEY `fk cart_items product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_name`);

--
-- Indexes for table `completed_orders`
--
ALTER TABLE `completed_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk completed_orders customer_id` (`customer_id`),
  ADD KEY `fk completed_orders product_id` (`product_id`),
  ADD KEY `fk completed_orders order_status_id` (`order_status_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`customer_detail_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`newsletter_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk orders customer_id` (`customer_id`),
  ADD KEY `fk orders order_status_id` (`order_status_id`),
  ADD KEY `fk orders product_id` (`product_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`order_status_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk product category` (`product_category`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `fk reviews customer_id` (`customer_id`),
  ADD KEY `fk reviews product_id` (`product_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `completed_orders`
--
ALTER TABLE `completed_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `customer_detail_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `newsletter_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `order_status_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `fk cart_items customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `fk cart_items product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `completed_orders`
--
ALTER TABLE `completed_orders`
  ADD CONSTRAINT `fk completed_orders customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `fk completed_orders order_status_id` FOREIGN KEY (`order_status_id`) REFERENCES `order_status` (`order_status_id`),
  ADD CONSTRAINT `fk completed_orders product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk orders customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `fk orders order_status_id` FOREIGN KEY (`order_status_id`) REFERENCES `order_status` (`order_status_id`),
  ADD CONSTRAINT `fk orders product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk product category` FOREIGN KEY (`product_category`) REFERENCES `categories` (`category_name`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk reviews customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `fk reviews product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
