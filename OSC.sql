-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 02:15 PM
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
  `admin_image` varchar(255) NOT NULL,
  `admin_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_image`, `admin_timestamp`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 'admin.png', '2023-11-26 10:52:49');

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
(63, 1, 42, 259.99, 1, 259.99),
(64, 1, 45, 359.99, 1, 359.99),
(65, 1, 40, 129.99, 1, 129.99),
(66, 1, 69, 2.99, 1, 2.99),
(67, 1, 34, 249.99, 1, 249.99);

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
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_password` varchar(255) NOT NULL,
  `customer_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_timestamp`) VALUES
(1, 'asad', 'asad@gmail.com', 'asad', '2023-11-24 11:13:57'),
(10, 'ahmed', 'ahmed@gmail.com', 'ahmed', '2023-11-24 11:13:57'),
(11, 'ali', 'ali@gmail.com', 'ali', '2023-11-24 11:13:57'),
(12, 'Aisha', 'Aisha@gmail.com', 'Aisha', '2023-11-24 11:13:57'),
(13, 'Abeer', 'Abeer@gmail.com', 'Abeer', '2023-11-24 11:13:57'),
(14, 'Babar', 'Babar@gmail.com', 'Babar', '2023-11-24 11:13:57'),
(15, 'Bisma', 'Bisma@gmail.com', 'Bisma', '2023-11-24 11:13:57'),
(16, 'Asim', 'Asim@gmail.com', 'Asim', '2023-11-24 11:13:57'),
(17, 'Akmal', 'Akmal@gmail.com', 'Akmal', '2023-11-24 11:13:57'),
(18, 'Anthony', 'Anthony@gmail.com', 'Anthony', '2023-11-24 11:13:57'),
(19, 'Ashraf', 'Ashraf@gmail.com', 'Ashraf', '2023-11-24 11:13:57'),
(20, 'Anya', 'Anya@gmail.com', 'Anya', '2023-11-24 11:13:57'),
(21, 'Anam', 'Anam@gmail.com', 'Anam', '2023-11-24 11:13:57'),
(22, 'Amna', 'Amna@gmail.com', 'Amna', '2023-11-24 11:13:57'),
(23, 'Bashir', 'Bashir@gmail.com', 'Bashir', '2023-11-24 11:13:57'),
(24, 'Bashar', 'Bashar@gmail.com', 'Bashar', '2023-11-24 11:13:57'),
(25, 'Babul', 'Babul@gmail.com', 'Babul', '2023-11-24 11:13:57'),
(26, 'Amir', 'Amir@gmail.com', 'Amir', '2023-11-24 11:13:57'),
(27, 'Asim', 'Asim@gmail.com', 'Asim', '2023-11-24 11:13:57'),
(28, 'Asif', 'Asif@gmail.com', 'Asif', '2023-11-24 11:13:57'),
(29, 'Asun', 'Asun@gmail.com', 'Asun', '2023-11-24 11:13:57');

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
  `state` varchar(50) NOT NULL,
  `postcode` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`customer_detail_id`, `customer_id`, `first_name`, `last_name`, `country`, `street_address`, `town`, `state`, `postcode`, `email`, `phone`) VALUES
(2, 1, 'asad', 'khan', 'Pakistan', 'Lunda Street, Sector 2-Z', 'new karachi', 'Sindh', '75850', 'asad@gmail.com', '03001234567');

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
  `employee_address` varchar(500) NOT NULL,
  `employee_image` varchar(255) NOT NULL,
  `employee_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `employee_name`, `employee_email`, `employee_password`, `employee_contact`, `employee_address`, `employee_image`, `employee_timestamp`) VALUES
(1, 'employee', 'employee@gmail.com', 'employee', '03001234567', 'A 563, Main Shahrah-e-Usman, Sector 11-A, Karachi, Sindh', 'employee.png', '2023-11-24 10:31:09');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `newsletter_id` int(10) NOT NULL,
  `newsletter_email` varchar(255) NOT NULL,
  `newsletter_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`newsletter_id`, `newsletter_email`, `newsletter_timestamp`) VALUES
(2, 'aqsa@gmail.com', '2023-11-26 14:35:56'),
(3, 'kashif@gmail.com', '2023-11-26 14:36:03'),
(4, 'kashaf@gmail.com', '2023-11-26 14:36:08'),
(5, 'munawar@gmail.com', '2023-11-26 14:36:18'),
(6, 'mamta@gmail.com', '2023-11-26 14:36:22'),
(7, 'motu@gmail.com', '2023-11-26 14:36:26'),
(8, 'halwai@gmail.com', '2023-11-26 14:36:33'),
(9, 'doremon@gmail.com', '2023-11-26 14:36:38'),
(10, 'muntaha@gmail.com', '2023-11-26 14:36:50'),
(11, 'taha@gmail.com', '2023-11-26 14:36:55'),
(12, 'tahaKiBehn@gmail.com', '2023-11-26 14:37:04'),
(13, 'taklu@gmail.com', '2023-11-26 14:37:07'),
(14, 'tandoorWala@gmail.com', '2023-11-26 14:37:18'),
(15, 'mamu@gmail.com', '2023-11-26 14:37:26');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `order_price` decimal(65,2) NOT NULL,
  `order_quantity` int(10) NOT NULL,
  `order_status` varchar(50) NOT NULL DEFAULT 'Processing',
  `order_total` decimal(65,2) NOT NULL,
  `order_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `product_id`, `order_price`, `order_quantity`, `order_status`, `order_total`, `order_timestamp`) VALUES
(50, 1, 48, 459.99, 1, 'Completed', 459.99, '2023-11-28 01:48:33'),
(51, 1, 78, 299.99, 1, 'Backorder', 299.99, '2023-11-28 01:48:33'),
(52, 1, 74, 2.99, 1, 'On Hold', 2.99, '2023-11-28 01:48:33'),
(53, 1, 89, 69.99, 1, 'Pending', 69.99, '2023-11-28 01:48:33'),
(54, 1, 43, 159.99, 1, 'Shipped', 159.99, '2023-11-28 01:48:33'),
(55, 1, 73, 12.99, 1, 'Processing', 12.99, '2023-11-28 01:48:33');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `order_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`order_status`) VALUES
('Backorder'),
('Completed'),
('On Hold'),
('Pending'),
('Processing'),
('Shipped');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_description` varchar(1000) NOT NULL,
  `product_category` varchar(50) NOT NULL,
  `product_rating` decimal(3,2) NOT NULL DEFAULT 0.00,
  `product_review_count` int(10) NOT NULL DEFAULT 0,
  `product_price` decimal(65,2) NOT NULL,
  `product_stock` int(10) NOT NULL DEFAULT 1,
  `product_sold` int(10) NOT NULL DEFAULT 0,
  `product_image` varchar(255) NOT NULL,
  `product_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_category`, `product_rating`, `product_review_count`, `product_price`, `product_stock`, `product_sold`, `product_image`, `product_timestamp`) VALUES
(34, 'louis vuitton Belt', 'Louis Vuitton is a French luxury fashion house and company founded in 1854 by Louis Vuitton. The house is known for its high-quality leather goods, its iconic LV monogram, and its collaborations with famous artists and designers.Louis Vuitton is a French luxury fashion house and company founded in 1854 by Louis Vuitton. The house is known for its high-quality leather goods, its iconic LV monogram, and its collaborations with famous artists and designers.\n', 'Accessories', 0.00, 0, 249.99, 40, 22, 'louis-vuitton-grey-leather-belt.jpg', '2023-11-21 05:38:01'),
(35, 'crystal braclet', 'A crystal bracelet is a piece of jewelry made with crystal beads or stones that are strung together on an elastic or wire cord. Crystal bracelets are often worn because they are beautiful and because they are believed to have healing properties.\n', 'Accessories', 4.00, 6, 269.99, 45, 30, 'crystal braclet.jpg', '2023-11-21 05:38:53'),
(36, 'gucci sunglasses', 'Gucci sunglasses are a symbol of luxury and style, and they have been worn by some of the most famous people in the world. They are known for their high quality, their bold designs, and their intricate details.Gucci sunglasses are a symbol of luxury and style, and they have been worn by some of the most famous people in the world. They are known for their high quality, their bold designs, and their intricate details.\n', 'Accessories', 0.00, 0, 358.00, 50, 25, 'gucci sunglasses.jpg', '2023-11-21 05:39:54'),
(37, 'jordon socks pack', 'A Jordan socks pack is a collection of socks that are designed and manufactured by the Jordan brand. Jordan socks are known for their high quality, their comfortable fit, and their stylish designs. They are often worn by athletes and sneaker enthusiasts, A Jordan socks pack is a collection of socks that are designed and manufactured by the Jordan brand. Jordan socks are known for their high quality, their comfortable fit, and their stylish designs. They are often worn by athletes and sneaker enthusiasts, and they are a popular choice for everyday wear.\n', 'Accessories', 0.00, 0, 369.99, 50, 22, 'jordon socks pack.jpg', '2023-11-21 05:42:47'),
(38, 'louis vuitton wallet', 'Louis Vuitton is a French luxury fashion house and company founded in 1854 by Louis Vuitton. The house is known for its high-quality leather goods, its iconic LV monogram, and its collaborations with famous artists and designers.\n', 'Accessories', 0.00, 0, 659.99, 36, 21, 'louis vuitton.jpg', '2023-11-21 05:42:47'),
(39, 'pearl necklase', 'Appearance: A pearl necklace is an elegant and timeless piece of jewelry that is made with a strand of pearls that are strung together on a chain or cord. The pearls can be natural or cultured, and they can be white, cream, black, or any other color. PearAppearance: A pearl necklace is an elegant and timeless piece of jewelry that is made with a strand of pearls that are strung together on a chain or cord. The pearls can be natural or cultured, and they can be white, cream, black, or any other color. Pearl necklaces can be simple and understated, or they can be elaborate and eye-catching.\n', 'Accessories', 0.00, 0, 199.99, 45, 26, 'pearl necklase.jpg', '2023-11-21 05:45:44'),
(40, 'women scarf', 'A women\'s scarf is a versatile accessory that can be worn in a variety of ways to add a touch of style and sophistication to any outfit. Scarves come in a wide range of colors, patterns, and fabrics, making them a great way to express your personal style. They can be worn around the neck, head, or shoulders, and they can be used to add a pop of color or a touch of elegance to any outfit.\n\n', 'Accessories', 4.17, 6, 129.99, 66, 30, 'women scarf.jpg', '2023-11-21 05:45:44'),
(41, 'Women\'s Bardot', 'A women\'s Bardot top is a type of blouse or top that features an off-the-shoulder neckline. This style of neckline is often created by elasticized edging or a shirred design that allows the fabric to fall gently off the shoulders. Bardot tops can be made from a variety of fabrics, such as cotton, silk, or rayon, and they can be adorned with a variety of embellishments, such as embroidery, lace, or ruffles.\n', 'Accessories', 5.00, 6, 369.99, 50, 45, 'Women Bardot.jpg', '2023-11-21 05:47:54'),
(42, 'womens watch', 'A women\'s watch is a timeless and elegant accessory that can add a touch of sophistication to any outfit. Women\'s watches come in a wide variety of styles, from classic and understated to bold and fashion-forward. They can be made from a variety of materials, such as stainless steel, gold, leather, and ceramic. Women\'s watches can also be equipped with a variety of features, such as a chronograph, a water-resistant case, and a diamond bezel.\n', 'Accessories', 4.33, 6, 259.99, 65, 45, 'womens watch.jpg', '2023-11-21 05:47:54'),
(43, 'zara cap', 'Zara caps come in a wide variety of styles, colors, designs, and materials, allowing individuals to express their personal style while adding a touch of fashion to their look. Zara caps are available in baseball caps, bucket hats, beanies, and other styles, catering to different preferences. They come in a wide array of colors, from neutral shades like black, white, and beige to bolder hues like red, blue, and green, offering a variety of options to match different outfits and occasions. Zara caps often feature unique designs, patterns, and embellishments, such as embroidery, patches, or contrasting stitching, adding a touch of personality and style. The materials used in Zara caps vary depending on the style and season, with options ranging from cotton and denim for casual wear to wool and faux fur for colder weather.\n', 'Accessories', 3.86, 7, 159.99, 60, 50, 'zara cap.jpg', '2023-11-21 05:49:08'),
(44, 'Bleu De Chanel Eau de Toilette', 'Bleu de Chanel Eau de Toilette is a popular men\'s fragrance by Chanel. It was launched in 2010 and has been a bestseller ever since. The fragrance is described as a \"fresh, aromatic, woody\" fragrance that is perfect for everyday wear. It is made with a blend of citrus, aromatic, and woody notes. \n', 'Fragrances', 0.00, 0, 559.99, 30, 21, 'Bleu De Chanel Eau de Toilette.jpg', '2023-11-21 05:51:45'),
(45, 'burberry', 'Byredo is a Swedish fragrance house known for its unique and sophisticated scents. Founded in 2006 by Ben Gorham and Olivia Ekin, Byredo has quickly gained a cult following for its innovative and unconventional approach to perfumery. The brand\'s fragrances are often described as being gender-neutral, minimalist, and emotionally evocative, capturing the essence of moods, memories, and experiences.\nBurberry is a British luxury fashion house renowned for its timeless designs, impeccable craftsmanship, and iconic trench coats. Founded in 1856 by Thomas Burberry, the brand has established itself as a symbol of British heritage and elegance, captivating generations with its enduring style and unwavering commitment to quality.\n', 'Fragrances', 3.25, 8, 359.99, 65, 29, 'burberry.jpg', '2023-11-21 05:51:45'),
(46, 'byerdo', 'Byredo is a Swedish fragrance house known for its unique and sophisticated scents. Founded in 2006 by Ben Gorham and Olivia Ekin, Byredo has quickly gained a cult following for its innovative and unconventional approach to perfumery. The brand\'s fragranceByredo is a Swedish fragrance house known for its unique and sophisticated scents. Founded in 2006 by Ben Gorham and Olivia Ekin, Byredo has quickly gained a cult following for its innovative and unconventional approach to perfumery. The brand\'s fragrances are often described as being gender-neutral, minimalist, and emotionally evocative, capturing the essence of moods, memories, and experiences.\n', 'Fragrances', 0.00, 0, 369.99, 59, 29, 'byerdo.jpg', '2023-11-21 05:54:25'),
(47, 'channel coco', 'Chanel Coco is an oriental fragrance for women, launched in 2016. It is described as a \"mysterious, provocative, ambery\" scent that captures the essence of Gabrielle Chanel, the founder of the iconic fashion house.\n', 'Fragrances', 0.00, 0, 159.99, 50, 25, 'channel coco.jpg', '2023-11-21 05:54:25'),
(48, 'channel no 5', 'Chanel is a French luxury fashion house founded in 1909 by Gabrielle Chanel. The house is known for its timeless designs, impeccable craftsmanship, and iconic fragrances. Chanel perfumes are known for their complex and sophisticated scents, which are often described as being feminine, elegant, and timeless.\n', 'Fragrances', 4.73, 11, 459.99, 55, 30, 'channel no 5.jpg', '2023-11-21 05:56:36'),
(49, 'Christian Dior Sauvage Men Eau Spray', 'Christian Dior Sauvage Men Eau Spray is an aromatic fougere fragrance for men, launched in 2015. It was created by perfumer François Demachy and is described as a \"fresh, raw, and noble\" fragrance that captures the essence of untamed nature. \n', 'Fragrances', 0.00, 0, 399.99, 30, 15, 'Christian Dior Sauvage Men Eau Spray.jpg', '2023-11-21 05:56:36'),
(50, 'creed aventus', 'Creed Aventus is a chypre fruity fragrance for men. It was launched in 2010 and was created by Jean-Christophe Hérault and Erwin Creed. The fragrance is inspired by the life of Emperor Napoleon Bonaparte, and it is said to represent strength, power, and sCreed Aventus is a chypre fruity fragrance for men. It was launched in 2010 and was created by Jean-Christophe Hérault and Erwin Creed. The fragrance is inspired by the life of Emperor Napoleon Bonaparte, and it is said to represent strength, power, and success.\n', 'Fragrances', 0.00, 0, 289.99, 20, 9, 'creed aventus.jpg', '2023-11-21 05:58:36'),
(51, 'Guerlain Shalimar Eau De Toilette Spray', 'Guerlain Shalimar Eau De Toilette Spray is a timeless and iconic fragrance that has been captivating women since its launch in 1925. It is a symbol of elegance, luxury, and femininity. \n', 'Fragrances', 0.00, 0, 559.99, 26, 16, 'Guerlain Shalimar Eau De Toilette Spray.jpg', '2023-11-21 05:58:36'),
(52, 'Lancôme La vie est belle', 'Lancôme La vie est belle is a floral fruity gourmand fragrance for women. It was launched in 2012 and was created by Olivier Polge, Dominique Ropion, and Anne Flipo. The fragrance is inspired by the French expression \"la vie est belle,\" which means \"life is beautiful.\"\n', 'Fragrances', 0.00, 0, 369.99, 17, 12, 'Lancôme La vie est belle.jpg', '2023-11-21 06:00:36'),
(53, 'VERSACE EROS', 'Versace Eros is a woody, oriental, and fresh fragrance for men that was launched in 2012. It is inspired by the Greek god of love, Eros, and is designed to evoke passion, desire, and power. \n', 'Fragrances', 0.00, 0, 399.99, 25, 20, 'VERSACE-EROS.jpg', '2023-11-21 06:00:36'),
(54, 'Viktor Rolf Flowerbomb Eau de Parfum Spray', 'Viktor & Rolf Flowerbomb Eau de Parfum Spray is an explosive and captivating fragrance that embodies the essence of femininity and power. Launched in 2005, this floral fragrance has quickly become a favorite among women worldwide, captivating them with its intoxicating aroma and lasting impression.\n', 'Fragrances', 0.00, 0, 358.00, 35, 19, 'Viktor Rolf Flowerbomb Eau de Parfum Spray.jpg', '2023-11-21 06:01:29'),
(65, 'Color Pencil', 'Colored pencils are a type of drawing and writing tool that consists of a thin wooden rod with a colored core. The core is made of a mixture of pigment, binder, and filler. The pigment is what gives the pencil its color, and the binder is what holds the pigment together. The filler is used to make the pencil easier to draw with.\n', 'Stationaries', 0.00, 0, 19.99, 50, 29, 'color pencil.jpg', '2023-11-21 16:41:04'),
(66, 'Colored Chalk', 'Coloured chalk is a type of drawing and writing tool that consists of a thin wooden rod with a coloured core, similar to white chalk, but it offers a wide range of vivid colors. The core is made of a mixture of pigment, binder, and filler. The pigment is what gives the chalk its color, the binder is what holds the pigment together, and the filler is used to make the chalk easier to draw with.\n', 'Stationaries', 0.00, 0, 29.99, 52, 18, 'colored chalk.jpg', '2023-11-21 16:41:04'),
(67, 'Crayons ', 'Crayons are a type of drawing and writing tool that consists of a thin stick of pigmented wax. The wax is melted and mixed with various color pigments, creating a wide range of colors. Crayons are available in a variety of sizes, shapes, and colors, making them a popular choice for artists, students, and children alike. They are easy to use and do not require any special equipment or skills, making them a great tool for beginners and casual drawing enthusiasts.\n', 'Stationaries', 0.00, 0, 34.99, 42, 20, 'crayons.jpg', '2023-11-21 16:41:04'),
(68, 'Diary', 'A diary, also known as a journal, is a personal record of one\'s thoughts, experiences, and emotions. It is a private space where individuals can reflect on their lives, document their memories, and explore their inner world. Diaries have been used for centuries as a tool for self-expression, self-awareness, and personal growth.\n', 'Stationaries', 0.00, 0, 39.99, 41, 19, 'diary.jpg', '2023-11-21 16:41:04'),
(69, 'Eraser ', 'An eraser is a stationary item that is used to remove marks from paper or other surfaces. Erasers are made of a variety of materials, including rubber, vinyl, and plastic. The most common type of eraser is made of rubber, which is soft and pliable and canAn eraser is a stationary item that is used to remove marks from paper or other surfaces. Erasers are made of a variety of materials, including rubber, vinyl, and plastic. The most common type of eraser is made of rubber, which is soft and pliable and can easily remove marks from most surfaces. Vinyl and plastic erasers are more abrasive and can be used to remove stubborn marks. \n', 'Stationaries', 5.00, 3, 2.99, 100, 50, 'eraser.jpg', '2023-11-21 16:41:04'),
(70, 'school bag', 'A school bag, also known as a backpack, rucksack, or book sack, is a container used to carry school supplies, such as books, notebooks, pens, pencils, and other items. School bags are typically worn on the back and come in a variety of shapes, sizes, colors, and styles to suit different needs and preferences.\n', 'Stationaries', 0.00, 0, 129.99, 29, 10, 'school bag.jpg', '2023-11-21 16:41:04'),
(71, 'small paint brush', 'Small paintbrushes are versatile tools that are used for a variety of painting techniques and projects. They are ideal for adding details, creating delicate lines, and working on small areas.Small paintbrushes are versatile tools that are used for a variety of painting techniques and projects. They are ideal for adding details, creating delicate lines, and working on small areas.\n', 'Stationaries', 0.00, 0, 24.99, 28, 8, 'small paint brush.jpg', '2023-11-21 16:41:04'),
(72, 'vintage ball pen', 'A vintage ballpoint pen is a timeless writing instrument that exudes elegance and sophistication. These pens are made with high-quality materials and craftsmanship, and they often feature unique designs and intricate details. Vintage ballpoint pens are not only stylish but also functional, and they can provide years of smooth and reliable writing.', 'Stationaries', 0.00, 0, 49.99, 10, 8, 'vintage ball pen.jpg', '2023-11-21 16:41:04'),
(73, 'Chalk', 'Chalk is a soft, white, sedimentary rock composed of calcium carbonate. It is found naturally in deposits around the world and is used for a variety of purposes, including writing, drawing, and art. Chalk is also used in manufacturing, agriculture, and medicine.', 'Stationaries', 4.00, 7, 12.99, 120, 42, 'white chalk.jpg', '2023-11-21 16:41:04'),
(74, 'wooden pencil', 'A wooden pencil, also known as a graphite pencil, is a writing instrument that has been a staple in classrooms, offices, and homes for centuries. Its simple design and versatility have made it an essential tool for artists, writers, and students alike.\n', 'Stationaries', 3.91, 11, 2.99, 200, 59, 'wooden pencil.jpg', '2023-11-21 16:41:04'),
(75, 'ajwa dates', 'Ajwa dates are a type of date palm fruit that is grown in the Medina region of Saudi Arabia. They are known for their dark brown to almost black color, their soft and chewy texture, and their sweet and slightly prune-like flavor. Ajwa dates are considered to be one of the most prized and sought-after date varieties in the world.\r\n', 'Sweets', 0.00, 0, 34.99, 25, 14, 'ajwa dates.jpg', '2023-11-21 17:01:14'),
(76, 'cotton candy', 'Cotton candy, also known as candy floss or fairy floss, is a spun sugar confection with a light, fluffy texture and a sweet taste. It is made by heating and liquefying sugar, and spinning it centrifugally through minute holes, causing it to rapidly cool and re-solidify into fine strands. Cotton candy is often sold at fairs, circuses, carnivals, and festivals, served in a plastic bag, on a stick, or on a paper cone.', 'Sweets', 0.00, 0, 14.99, 20, 12, 'cotton candy.jpg', '2023-11-21 17:01:14'),
(77, 'dark chocolate bar', 'dark chocolate bar is a type of chocolate bar that contains a high percentage of cocoa solids, typically between 60% and 100%. Dark chocolate bars are known for their rich, intense flavor and their smooth, velvety texture. They are also a good source of antioxidants and minerals.', 'Sweets', 0.00, 0, 24.99, 32, 22, 'dark chocolate bar.jpg', '2023-11-21 17:01:14'),
(78, 'Gourmet Chocolate Cake with Chocolate Chips', 'Gourmet Chocolate Cake with Chocolate Chips is a rich, decadent, and intensely chocolatey cake that is sure to satisfy any chocolate lover\'s craving. It is made with high-quality cocoa powder, dark chocolate chips, and a touch of espresso powder for extra depth of flavor. The cake is moist and fudgy, and it is topped with a rich chocolate ganache that takes it to over the top.', 'Sweets', 4.45, 11, 299.99, 50, 42, 'Gourmet Chocolate Cake with Chocolate Chips.jpg', '2023-11-21 17:01:14'),
(79, 'icecream bucket stawberry', 'A bucket of strawberry ice cream is a refreshing and delightful treat that is perfect for any occasion. It is made with fresh strawberries that are blended into a creamy, dreamy ice cream base. The ice cream is then packed into a convenient bucket that makes it easy to scoop, serve, and enjoy.', 'Sweets', 0.00, 0, 34.99, 23, 14, 'icecream bucket stawberry.jpg', '2023-11-21 17:01:14'),
(80, 'jalebi', 'Jalebi is a popular Indian sweet that is made by deep-frying batter made from flour, curd, soda, and ghee, which is then soaked in sugar syrup. It is a crispy, crunchy, and sweet treat that is often enjoyed during festivals and celebrations.', 'Sweets', 0.00, 0, 12.99, 19, 8, 'jalebi.jpg', '2023-11-21 17:01:14'),
(81, 'Strawberry Lollypop ', 'A strawberry lollipop is a sweet and colorful treat that is enjoyed by people of all ages. It is made from a hard candy base that is flavored with strawberry extract and coloring. The lollipop is typically attached to a stick for easy handling.', 'Sweets', 4.90, 10, 9.99, 80, 31, 'Lollypop stawberry.jpg', '2023-11-21 17:01:14'),
(82, 'strawberry cupcake', 'A strawberry cupcake is a delightful treat that combines the sweetness of moist vanilla cake with the tangy flavor of fresh strawberries. Its vibrant appearance and delectable combination of flavors make it a popular choice for celebrations and everyday indulgences.', 'Sweets', 0.00, 0, 19.99, 40, 26, 'stawberry cupcake.jpg', '2023-11-21 17:01:14'),
(83, 'vanilla cake with sprinkle', 'A vanilla cake with sprinkles is a classic treat that is both simple and delicious. It is made with a light and fluffy vanilla cake base that is moist and flavorful. The cake is then topped with a generous layer of creamy vanilla frosting and a sprinkle of colorful sprinkles, adding a touch of whimsy and a burst of sweetness.', 'Sweets', 0.00, 0, 149.99, 19, 6, 'vanilla cake with sprinkle.jpg', '2023-11-21 17:01:14'),
(84, 'white chocolate', 'White chocolate has a distinctive pale ivory or off-white color, unlike the darker brown hues of milk chocolate and dark chocolate. Its surface is typically smooth and glossy, reflecting a subtle shine under light.', 'Sweets', 0.00, 0, 34.99, 34, 17, 'white chocolate.jpg', '2023-11-21 17:01:14'),
(85, 'basketball', 'Basketball toys are a fun and engaging way for children of all ages to develop their skills and enjoy the game of basketball. They come in a variety of shapes, sizes, and materials to suit different needs and preferences.', 'Toys', 0.00, 0, 54.99, 50, 10, 'basketball.jpg', '2023-11-21 17:12:26'),
(86, 'bat', 'A bat toy is a playful tool that mimics the shape and function of a baseball bat, providing a fun and engaging way for children and adults alike to enjoy active play and develop their coordination and motor skills.', 'Toys', 0.00, 0, 54.99, 25, 7, 'bat.jpg', '2023-11-21 17:12:26'),
(87, 'cycle', 'A bicycle is a two-wheeled vehicle. It is powered by the rider\'s legs moving pedals that are connected to a chain that turns a sprocket on the rear wheel. Bicycles are used for transportation, recreation, and sport.', 'Toys', 0.00, 0, 119.99, 20, 2, 'cycle.jpg', '2023-11-21 17:13:41'),
(88, 'doll house', 'A dollhouse is a miniature house that is designed for children to play with. It is typically furnished with miniature furniture and other household items, and it can be used to create a variety of imaginative play scenarios.', 'Toys', 0.00, 0, 49.99, 30, 6, 'doll house.jpg', '2023-11-21 17:13:41'),
(89, 'football', 'Football, also known as association football or soccer, is a team sport played with a spherical ball between two teams of eleven players. It is the world\'s most popular sport, with an estimated 250 million players worldwide.', 'Toys', 3.82, 11, 69.99, 60, 33, 'football.jpg', '2023-11-21 17:14:51'),
(90, 'toy plane ', 'A plane toy is a miniature replica of an airplane, typically designed for children to play with. These toys come in a variety of shapes, sizes, and materials, ranging from simple gliders to more elaborate models with working propellers and landing gear.', 'Toys', 0.00, 0, 49.99, 10, 3, 'plane.jpg', '2023-11-21 17:14:51'),
(91, 'puzzle', 'puzzle toy is any toy that challenges a person\'s mental abilities. Jigsaw puzzles, logic puzzles, and Rubik\'s Cubes are all examples of puzzle toys. \r\n', 'Toys', 0.00, 0, 19.99, 50, 10, 'puzzle.jpg', '2023-11-21 17:16:22'),
(92, 'rc car', 'A radio-controlled (RC) car is a toy car that is controlled remotely, typically using a handheld transmitter. RC cars have been around since the early 20th century, and they have become increasingly popular in recent years.', 'Toys', 0.00, 0, 79.99, 10, 5, 'rc car.jpg', '2023-11-21 17:16:22'),
(93, 'toy train', 'train toy is a miniature representation of a real train. It is typically made of wood, plastic, or metal, and it comes with a variety of tracks, cars, and accessories. Train toys have been around for centuries, and they are a popular choice for children of all ages.', 'Toys', 0.00, 0, 29.99, 22, 11, 'train toy.jpg', '2023-11-21 17:18:28'),
(94, 'teddy bear', 'bear toy is a stuffed toy in the form of a bear. It is made of soft, cuddly material and is often given to children as a gift. Bear toys have been around for centuries and are a popular choice for children of all ages.', 'Toys', 0.00, 0, 39.99, 50, 14, 'white bear.jpg', '2023-11-21 17:18:28');

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
  `review_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `customer_id`, `product_id`, `rating`, `review_title`, `review`, `review_date`) VALUES
(30, 13, 74, 5, 'Very Nice', 'Really good, Works well.\r\nI bought 50.', '2023-11-21'),
(31, 10, 74, 1, 'BAD', 'BROKE', '2023-11-21'),
(32, 12, 74, 5, 'Very good', 'Amazing', '2023-11-21'),
(33, 11, 74, 5, 'WOW', 'WOWWOWWOW', '2023-11-21'),
(34, 18, 74, 5, 'FUN', 'very nice product', '2023-11-21'),
(35, 16, 74, 5, 'AMAZING', 'high quality pencil', '2023-11-21'),
(36, 24, 74, 3, 'EXPENSIVE', 'EXPENSIVE', '2023-11-21'),
(37, 29, 74, 4, 'OK', 'OKay', '2023-11-21'),
(38, 21, 74, 5, 'NICE', 'NOICE ', '2023-11-21'),
(39, 22, 74, 5, 'good', 'good', '2023-11-21'),
(40, 13, 43, 5, 'HIGH QUALITY', 'HIGH QUALITY PRODUCT', '2023-11-21'),
(41, 10, 43, 4, 'nice', 'nice', '2023-11-21'),
(42, 14, 43, 5, 'GOOD', 'GOOD', '2023-11-21'),
(43, 11, 43, 4, 'very nice', 'very very nice', '2023-11-21'),
(44, 28, 43, 5, 'GOOD', 'GOOD GOOD', '2023-11-21'),
(45, 12, 43, 4, 'very nice', 'very very nice', '2023-11-21'),
(46, 13, 69, 5, 'VERY NICE', 'VERY NICE PRODUCT.\r\ni bought 50.', '2023-11-21'),
(47, 10, 69, 5, 'HIGH QUALITY ERASER', 'high quality eraser for erasing', '2023-11-21'),
(50, 29, 41, 5, 'VERY NICE', 'gooooooooood', '2023-11-21'),
(51, 28, 41, 5, 'HIGH QUALITY', 'wife loves it', '2023-11-21'),
(52, 24, 41, 5, 'VERY NICE', 'gooooooooood', '2023-11-21'),
(53, 22, 41, 5, 'HIGH QUALITY', 'wife loves it', '2023-11-21'),
(55, 20, 41, 5, 'great!!', 'great!!!!!!!!!!', '2023-11-21'),
(56, 18, 41, 5, 'wife loves it', 'wife loves it, very good', '2023-11-21'),
(57, 25, 42, 5, 'VERY NICE', 'gooooooooood', '2023-11-21'),
(58, 23, 42, 5, 'HIGH QUALITY', 'wife loves it', '2023-11-21'),
(59, 24, 42, 5, 'VERY NICE', 'gooooooooood', '2023-11-21'),
(60, 22, 42, 5, 'HIGH QUALITY', 'wife loves it', '2023-11-21'),
(61, 20, 42, 5, 'great!!', 'great!!!!!!!!!!', '2023-11-21'),
(62, 18, 42, 1, 'wife hated it', 'very bad', '2023-11-21'),
(71, 13, 73, 5, 'Very Nice', 'Really good, Works well.\r\nI bought 50.', '2023-11-21'),
(72, 12, 73, 5, 'Very good', 'Amazing', '2023-11-21'),
(73, 11, 73, 5, 'WOW', 'WOWWOWWOW', '2023-11-21'),
(74, 18, 73, 5, 'FUN', 'very nice product', '2023-11-21'),
(75, 24, 73, 3, 'EXPENSIVE', 'EXPENSIVE', '2023-11-21'),
(77, 10, 73, 1, 'BAD', 'BROKE', '2023-11-21'),
(78, 29, 73, 4, 'OK', 'OKay', '2023-11-21'),
(80, 18, 78, 5, 'wife loves it', 'wife loves it, very good', '2023-11-21'),
(81, 25, 78, 5, 'VERY NICE', 'gooooooooood', '2023-11-21'),
(82, 23, 78, 5, 'HIGH QUALITY', 'wife loves it', '2023-11-21'),
(83, 24, 78, 5, 'VERY NICE', 'gooooooooood', '2023-11-21'),
(84, 22, 78, 5, 'HIGH QUALITY', 'wife loves it', '2023-11-21'),
(85, 20, 78, 5, 'great!!', 'great!!!!!!!!!!', '2023-11-21'),
(86, 18, 78, 1, 'wife hated it', 'very bad', '2023-11-21'),
(87, 12, 78, 5, 'Very good', 'Amazing', '2023-11-21'),
(88, 11, 78, 5, 'WOW', 'WOWWOWWOW', '2023-11-21'),
(89, 18, 78, 5, 'FUN', 'very nice product', '2023-11-21'),
(90, 24, 78, 3, 'EXPENSIVE', 'EXPENSIVE', '2023-11-21'),
(92, 24, 89, 3, 'EXPENSIVE', 'EXPENSIVE', '2023-11-21'),
(93, 10, 89, 1, 'BAD', 'BROKE', '2023-11-21'),
(94, 29, 89, 4, 'OK', 'OKay', '2023-11-21'),
(95, 24, 89, 5, 'VERY NICE', 'gooooooooood', '2023-11-21'),
(96, 20, 89, 5, 'great!!', 'great!!!!!!!!!!', '2023-11-21'),
(97, 12, 89, 5, 'Very good', 'Amazing', '2023-11-21'),
(98, 11, 89, 5, 'WOW', 'WOWWOWWOW', '2023-11-21'),
(99, 18, 89, 5, 'FUN', 'very nice product', '2023-11-21'),
(100, 24, 89, 3, 'EXPENSIVE', 'EXPENSIVE', '2023-11-21'),
(101, 19, 89, 5, 'FUN BALL', 'very BIG BALL', '2023-11-21'),
(102, 23, 89, 1, 'HURT', 'mu ball hurts', '2023-11-21'),
(104, 18, 81, 5, 'wife loves it', 'wife loves it, very good', '2023-11-21'),
(105, 23, 81, 5, 'HIGH QUALITY', 'wife loves it', '2023-11-21'),
(106, 22, 81, 5, 'HIGH QUALITY', 'wife loves it', '2023-11-21'),
(107, 18, 81, 5, 'FUN', 'very nice product', '2023-11-21'),
(108, 29, 81, 4, 'OK', 'OKay', '2023-11-21'),
(109, 24, 81, 5, 'VERY NICE', 'gooooooooood', '2023-11-21'),
(110, 20, 81, 5, 'great!!', 'great!!!!!!!!!!', '2023-11-21'),
(111, 12, 81, 5, 'Very good', 'Amazing', '2023-11-21'),
(112, 11, 81, 5, 'WOW', 'WOWWOWWOW', '2023-11-21'),
(113, 18, 81, 5, 'FUN', 'very nice product', '2023-11-21'),
(115, 24, 35, 3, 'EXPENSIVE', 'EXPENSIVE', '2023-11-21'),
(116, 23, 35, 1, 'HURT', 'mu ball hurts', '2023-11-21'),
(117, 18, 35, 5, 'wife loves it', 'wife loves it, very good', '2023-11-21'),
(118, 23, 35, 5, 'HIGH QUALITY', 'wife loves it', '2023-11-21'),
(119, 22, 35, 5, 'HIGH QUALITY', 'wife loves it', '2023-11-21'),
(120, 12, 35, 5, 'Very good', 'Amazing', '2023-11-21'),
(122, 24, 40, 3, 'EXPENSIVE', 'EXPENSIVE', '2023-11-21'),
(123, 29, 40, 4, 'OK', 'OKay', '2023-11-21'),
(124, 24, 40, 3, 'EXPENSIVE', 'EXPENSIVE', '2023-11-21'),
(125, 18, 40, 5, 'wife loves it', 'wife loves it, very good', '2023-11-21'),
(126, 22, 40, 5, 'HIGH QUALITY', 'wife loves it', '2023-11-21'),
(127, 12, 40, 5, 'Very good', 'Amazing', '2023-11-21'),
(129, 20, 48, 5, 'great!!', 'great!!!!!!!!!!', '2023-11-21'),
(130, 12, 48, 5, 'Very good', 'Amazing', '2023-11-21'),
(131, 11, 48, 5, 'WOW', 'WOWWOWWOW', '2023-11-21'),
(132, 18, 48, 5, 'FUN', 'very nice product', '2023-11-21'),
(133, 29, 48, 4, 'OK', 'OKay', '2023-11-21'),
(134, 24, 48, 3, 'EXPENSIVE', 'EXPENSIVE', '2023-11-21'),
(135, 18, 48, 5, 'wife loves it', 'wife loves it, very good', '2023-11-21'),
(136, 22, 48, 5, 'HIGH QUALITY', 'wife loves it', '2023-11-21'),
(137, 12, 48, 5, 'Very good', 'Amazing', '2023-11-21'),
(138, 20, 48, 5, 'nice smell', 'nice smell, good.', '2023-11-21'),
(139, 16, 48, 5, 'AMAZING FRAGRANCE', 'AMAZING FRAGRANCE 10/10', '2023-11-21'),
(140, 10, 45, 1, 'BAD', 'BROKE', '2023-11-21'),
(141, 29, 45, 4, 'OK', 'OKay', '2023-11-21'),
(142, 24, 45, 3, 'EXPENSIVE', 'EXPENSIVE', '2023-11-21'),
(143, 12, 45, 5, 'Very good', 'Amazing', '2023-11-21'),
(144, 20, 45, 5, 'nice smell', 'nice smell, good.', '2023-11-21'),
(145, 16, 45, 5, 'AMAZING FRAGRANCE', 'AMAZING FRAGRANCE 10/10', '2023-11-21'),
(146, 16, 45, 1, 'BAD SMELL', 'BAD SMELL, NOT GOOOD', '2023-11-21'),
(147, 13, 45, 2, 'DOOKIE', 'IDK?', '2023-11-21');

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
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `customer_id`, `product_id`) VALUES
(28, 1, 87),
(29, 1, 86),
(30, 1, 85);

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
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`customer_detail_id`),
  ADD KEY `fk customer detail customer_id` (`customer_id`);

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
  ADD KEY `fk orders order_status_id` (`order_status`),
  ADD KEY `fk orders product_id` (`product_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`order_status`);

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
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `fk wishlist customer_id` (`customer_id`),
  ADD KEY `fk wishlist product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `customer_detail_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `newsletter_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `fk cart_items customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk cart_items product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD CONSTRAINT `fk customer detail customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk order_status` FOREIGN KEY (`order_status`) REFERENCES `order_status` (`order_status`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk orders customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk orders product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk product category` FOREIGN KEY (`product_category`) REFERENCES `categories` (`category_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk reviews customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk reviews product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `fk wishlist customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk wishlist product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
