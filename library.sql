-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2020 at 11:02 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_email`, `admin_pass`) VALUES
(1, 'fahadhameed100101@gmail.com', 'fahad11');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(10) NOT NULL,
  `book_title` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `book_img1` text NOT NULL,
  `book_img2` text NOT NULL,
  `book_img3` text NOT NULL,
  `book_file` varchar(300) NOT NULL,
  `book_price` int(10) NOT NULL,
  `book_short_desc` text NOT NULL,
  `book_desc` text NOT NULL,
  `book_keywords` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_title`, `date`, `book_img1`, `book_img2`, `book_img3`, `book_file`, `book_price`, `book_short_desc`, `book_desc`, `book_keywords`, `status`) VALUES
(6, 'Harry Potter', '2020-04-09 12:19:03', 'product1.jpg', 'product2.jpg', 'product3.jpg', 'harry-potter-and-the-philosophers-stone-extract.pdf', 35, 'The Boy Who Lived \r\n', ' M r and Mrs Dursley, of number four, Privet Drive, were\r\nproud to say that they were perfectly normal, thank\r\nyou very much. They were the last people youâ€™d expect to be\r\ninvolved in anything strange or mysterious, because they just\r\ndidnâ€™t hold with such nonsense.\r\n Mr Dursley was the director of a fi rm called Grunnings,\r\nwhich made drills. He was a big, beefy man with hardly\r\nany neck, although he did have a very large moustache.\r\nMrs Dursley was thin and blonde and had nearly twice the\r\nusual amount of neck, which came in very useful as she spent\r\nso much of her time craning over garden fences, spying on the\r\nneighbours. The Dursleys had a small son called Dudley and\r\nin their opinion there was no fi ner boy anywhere. ', 'Harry Potter, Series,philospher stone,the boy who lived', 'on'),
(7, 'Business Adventures', '2020-04-10 09:54:15', 'b3.jpg', 'b3.1.jpg', 'b3.2.jpg', 'Adventures-of-Tom-Sawyer-Urdu.pdf', 25, 'Business Adventures remains the best business book Iâ€™ve ever read.â€ â€”Bill Gates, The Wall Street Journal', 'What do the $350 million Ford Motor Company disaster known as the Edsel, the fast and incredible rise of Xerox, and the unbelievable scandals at General Electric and Texas Gulf Sulphur have in common? Each is an example of how an iconic company was defined by a particular moment of fame or notoriety; these notable and fascinating accounts are as relevant today to understanding the intricacies of corporate life as they were when the events happened.Stories about Wall Street are infused with drama and adventure and reveal the machinations and volatile nature of the world of finance. ', 'Business Adventures,Adventures,bussiness life, successful bussinessman', 'on'),
(8, 'Life Is What You Make It.', '2020-04-10 15:06:08', 'b4.2.jpg', 'b4.jpg', 'b4.1.jpg', 'Life-Is-What-You-Make-It-8freebooks.net_.pdf', 1, 'From composer, musician, and philanthropist Peter Buffett comes a warm, wise, and inspirational book that asks which you will choose: the path of least resistance or the path of potentially greatest satisfaction?', 'You may think that with a last name like his, Buffett has enjoyed a life of endless privilege. But the son of billionaire investor Warren Buffett says that the only real inheritance handed down from his parents was a philosophy: Forge your own path in life. It is a creed that has allowed him to follow his own passions, establish his own identity, and reap his own successes.\r\n', 'life is what you make it,the life of a person, how to make life successful', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `b_id` int(10) NOT NULL,
  `ip_add` int(10) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` int(100) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(2, 'Ayesha', 'ayesha@yahoo.com', 'khan', 'Pakistan', 'Karachi', 0, 'h # 11,st # 2, near Gulshan Ravi ,Karachi ', 'wafa.jfif', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `total_books` int(100) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `total_books`, `order_date`, `order_status`) VALUES
(1, 2, 35, 2111966596, 1, '2020-04-20 09:05:50', 'Complete'),
(2, 2, 25, 606029205, 1, '2020-04-20 09:07:43', 'Complete'),
(3, 2, 35, 1192761336, 1, '2020-04-14 15:37:12', 'Pending'),
(4, 2, 35, 1605086879, 1, '2020-04-14 15:38:25', 'Pending'),
(5, 2, 0, 233828322, 1, '2020-04-16 08:40:53', 'Pending'),
(6, 2, 35, 1073715261, 1, '2020-04-16 09:01:33', 'Pending'),
(7, 2, 35, 375068113, 1, '2020-04-16 19:52:39', 'Pending'),
(8, 2, 35, 459254101, 1, '2020-04-19 11:18:50', 'Pending'),
(9, 2, 35, 1086127788, 1, '2020-04-20 09:05:03', 'Pending'),
(10, 2, 35, 809085368, 1, '2020-04-20 09:07:17', 'Pending'),
(11, 2, 0, 412316924, 0, '2020-04-20 09:09:34', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_no`, `amount`, `payment_mode`, `ref_no`, `code`, `payment_date`) VALUES
(1, 2111966596, 35, 'Easypaisa/UBL Omni', 1232, 4321543, '20-06-2019'),
(2, 606029205, 30, 'Easypaisa/UBL Omni', 1232, 4321543, '25-06-2019');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `book_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `book_id`, `qty`, `order_status`) VALUES
(1, 2, 2111966596, 6, 1, 'Complete'),
(2, 2, 606029205, 7, 1, 'Complete'),
(4, 2, 1605086879, 6, 1, 'Pending'),
(5, 2, 233828322, 0, 1, 'Pending'),
(6, 2, 1073715261, 6, 1, 'Pending'),
(7, 2, 375068113, 6, 1, 'Pending'),
(8, 2, 459254101, 6, 1, 'Pending'),
(9, 2, 1086127788, 6, 1, 'Pending'),
(10, 2, 809085368, 6, 1, 'Pending'),
(11, 2, 412316924, 0, 1, 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `b_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
