-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2023 at 03:46 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(15) NOT NULL,
  `a_email` varchar(40) NOT NULL,
  `a_password` varchar(20) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_email`, `a_password`, `img`) VALUES
(3, 'Mudassir', 'mudassir123@gmail.com', '12345', '3user1.jpg'),
(4, 'Muneeb', 'muneeb123@gmail.com', '12345', '0user6.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `banner_img` varchar(100) COLLATE latin7_estonian_cs NOT NULL,
  `text1` varchar(100) COLLATE latin7_estonian_cs NOT NULL,
  `text2` varchar(100) COLLATE latin7_estonian_cs NOT NULL,
  `text3` varchar(100) COLLATE latin7_estonian_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin7 COLLATE=latin7_estonian_cs;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `banner_img`, `text1`, `text2`, `text3`) VALUES
(1, '09pride.jpg.jpg', 'New Collections', 'Pride and Prejudi', 'Shop now'),
(2, '51711TxX8cdlL.jpg', 'New Collection', 'Romeo and Juliet', 'Shop now'),
(3, '751eCxw7WgOL.jpg', 'New Collections', 'A Voyage to the Moon', 'Shop now');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(255) NOT NULL,
  `b_price` int(11) NOT NULL,
  `b_mrp` decimal(10,0) NOT NULL,
  `b_image` varchar(20) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`b_id`, `b_name`, `b_price`, `b_mrp`, `b_image`, `cate_id`, `status`) VALUES
(14353, 'THE PHANTOM OF THE OPERA GASTON', 2700, '2900', '2121277-1.jpg', 15245, '1'),
(22355, 'The Black Cat', 1500, '1600', '39781697742770.jpg', 15245, '1'),
(22431, 'romeoandjuliet', 1500, '2000', '1711TxX8cdlL.jpg', 51242, '1'),
(23531, 'The Night Land', 3000, '3200', '10970602.jpg', 31341, '1'),
(24512, 'THE TORAH', 550, '690', '79791029906275.jpg', 42545, '1'),
(25345, 'From The Earth To The Moon', 3900, '4200', '191SRCEADG1L.jpg', 31341, '1'),
(31323, 'prideandprejudi', 1200, '1800', '9pride.jpg.jpg', 51242, '1'),
(33111, 'The Invisible Man', 1900, '2100', '017184.jpg', 31341, '1'),
(41234, 'The Last Man', 1000, '1150', '1download.jfif', 42512, '1'),
(41424, 'AT THE MOUNTAINS OF MADNESS', 650, '700', '281opYKUZKJL.jpg', 15245, '1'),
(42355, 'The Voyage to the Moon', 2000, '2500', '1051eCxw7WgOL.jpg', 14424, '1'),
(43323, 'CARMILLA', 2500, '2900', '10carmilla-40.jpg', 15245, '1'),
(43555, 'THE STRANGE CASE OF DOCTOR JEKYLL AND MR HYDE', 2300, '1900', '10download.jfif', 15245, '1'),
(45524, 'The Mysterious ', 2500, '3900', '7download.jfif', 31341, '1'),
(54142, 'The Gods of Mar', 3000, '4500', '10841973.jpg', 14424, '1');

-- --------------------------------------------------------

--
-- Table structure for table `book_stock`
--

CREATE TABLE `book_stock` (
  `id` varchar(255) COLLATE latin7_estonian_cs NOT NULL,
  `book` varchar(255) COLLATE latin7_estonian_cs NOT NULL,
  `book_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin7 COLLATE=latin7_estonian_cs;

--
-- Dumping data for table `book_stock`
--

INSERT INTO `book_stock` (`id`, `book`, `book_status`) VALUES
('25111', '10git(DVC).pdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `books_id` int(11) NOT NULL,
  `cart_price` decimal(12,0) NOT NULL,
  `cart_image` varchar(20) NOT NULL,
  `books_name` varchar(20) NOT NULL,
  `total` decimal(20,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `cus_email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `books_id`, `cart_price`, `cart_image`, `books_name`, `total`, `qty`, `cus_email`) VALUES
(1005, 41234, '1000', '1download.jfif', 'The Last Man', '1000.00', 1, 'rohail786@gmail.com'),
(1008, 42355, '2000', '1051eCxw7WgOL.jpg', 'The Voyage to the Mo', '2000.00', 1, 'rohail786@gmail.com'),
(1013, 24512, '550', '79791029906275.jpg', 'THE TORAH', '2200.00', 4, 'rohail786@gmail.com'),
(1014, 31323, '1200', '9pride.jpg.jpg', 'prideandprejudi', '1200.00', 1, 'aliyan123@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_status` varchar(20) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_status`, `cat_id`, `cat_name`) VALUES
('1', 14424, 'Science'),
('0', 15245, 'Horror'),
('1', 31341, 'Fantasy'),
('0', 42512, 'Thriller'),
('1', 42545, 'Religion'),
('1', 51242, 'Romance');

-- --------------------------------------------------------

--
-- Table structure for table `com_enrollment`
--

CREATE TABLE `com_enrollment` (
  `cat_id` int(11) NOT NULL,
  `enr_id` int(11) NOT NULL,
  `enr_name` varchar(40) NOT NULL,
  `enr_contact` int(11) NOT NULL,
  `enr_email` varchar(20) NOT NULL,
  `date_of` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(20) NOT NULL,
  `c_email` varchar(40) NOT NULL,
  `c_password` varchar(10) NOT NULL,
  `c_address` varchar(255) NOT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_name`, `c_email`, `c_password`, `c_address`, `contact`) VALUES
(1, 'Aliyan', 'aliyan123@gmail.com', '12345', 'L-234, Sector 5C-2, NK', '0321-12545332'),
(2, 'Rehan', 'rehan456@gmail.com', '12345', 'R-34, Sector S-2, North Nazimabad', '0335-7467524'),
(3, 'Rohail', 'rohail786@gmail.com', '456789', 'R-341, Sector S-2, North Nazimabad', '0345-2234740'),
(4, 'Owais Rehan', 'owais123@gmail.com', 'creating45', 'L-123, Sector 5-A', '0321-1256752');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `ord_id` int(11) NOT NULL,
  `ord_payment` int(11) NOT NULL,
  `ord_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `cart_id` int(11) NOT NULL,
  `cus_loc` varchar(30) NOT NULL,
  `cus_email` varchar(50) NOT NULL,
  `cus_cont` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) COLLATE latin7_estonian_cs NOT NULL,
  `city` varchar(50) COLLATE latin7_estonian_cs NOT NULL,
  `pincode` varchar(50) COLLATE latin7_estonian_cs NOT NULL,
  `payment_type` varchar(60) COLLATE latin7_estonian_cs NOT NULL,
  `payment_status` varchar(60) COLLATE latin7_estonian_cs NOT NULL,
  `order_status` int(60) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `total` decimal(20,2) NOT NULL,
  `trans_id` varchar(255) COLLATE latin7_estonian_cs NOT NULL,
  `mihpayid` varchar(100) COLLATE latin7_estonian_cs NOT NULL,
  `payu_status` varchar(100) COLLATE latin7_estonian_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin7 COLLATE=latin7_estonian_cs;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `address`, `city`, `pincode`, `payment_type`, `payment_status`, `order_status`, `added_on`, `total`, `trans_id`, `mihpayid`, `payu_status`) VALUES
(9, 1, 'L-123, Sector 4-A, North', 'Karachi', '54000', 'COD', 'success', 2, '2023-04-01 18:37:51', '9000.00', '', '', ''),
(11, 1, 'R-123, Sector 5-A2', 'Karachi', '72000', 'COD', 'success', 2, '2023-04-01 18:42:59', '4100.00', '', '', ''),
(12, 1, 'Sector 5-A, North Nazimabad', 'Karachi', '73000', 'COD', 'success', 2, '2023-04-01 18:35:06', '1500.00', '', '', ''),
(15, 1, 'S-12, North Karachi', 'Karachi', '82000', 'COD', 'success', 2, '2023-04-01 18:27:14', '3600.00', '', '', ''),
(16, 4, 'Sector 5-M, N-K', 'Karachi', '54000', 'COD', 'success', 1, '2023-04-01 18:50:23', '1500.00', '', '', ''),
(17, 4, 'S-123, Karachi', 'Karachi', '72000', 'COD', 'success', 2, '2023-04-01 18:56:29', '7900.00', '', '', ''),
(23, 1, 'R-14, Sector 5A', 'Lahore', '52000', 'COD', 'success', 2, '2023-04-02 13:11:34', '3400.00', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin7 COLLATE=latin7_estonian_cs;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `book_id`, `qty`, `price`) VALUES
(3, 9, 23531, 3, '3000.00'),
(4, 11, 22431, 2, '1500.00'),
(5, 11, 24512, 2, '550.00'),
(6, 12, 22431, 1, '1500.00'),
(7, 15, 24512, 2, '550.00'),
(8, 15, 45524, 1, '2500.00'),
(9, 16, 22431, 1, '1500.00'),
(10, 17, 54142, 2, '3000.00'),
(11, 17, 33111, 1, '1900.00'),
(12, 18, 31323, 2, '1200.00'),
(13, 19, 42355, 1, '2000.00'),
(14, 20, 42355, 1, '2000.00'),
(15, 21, 45524, 1, '2500.00'),
(16, 22, 14353, 2, '2700.00'),
(17, 23, 33111, 1, '1900.00'),
(18, 23, 22431, 1, '1500.00');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `status` varchar(100) COLLATE latin7_estonian_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin7 COLLATE=latin7_estonian_cs;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `status`) VALUES
(1, 'Processing'),
(2, 'Pending'),
(3, 'Complete'),
(4, 'Shipped'),
(5, 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `prize distribution`
--

CREATE TABLE `prize distribution` (
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `cate_id` (`cate_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `com_enrollment`
--
ALTER TABLE `com_enrollment`
  ADD PRIMARY KEY (`enr_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`ord_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`cat_id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`ord_id`) REFERENCES `cart` (`cart_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
