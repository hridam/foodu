-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 11, 2021 at 03:59 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

DROP TABLE IF EXISTS `admin_login`;
CREATE TABLE IF NOT EXISTS `admin_login` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`ID`, `User_Name`, `Email`, `Password`) VALUES
(1, '', '', ''),
(2, 'Hridam', 'hridamdhimal@gmail.com', '454545'),
(3, 'bhupesh', 'bhupeshsakya@gmail.com', '123123'),
(4, 'Sijan', 'sijan@gmail.com', '456456');

-- --------------------------------------------------------

--
-- Table structure for table `cate`
--

DROP TABLE IF EXISTS `cate`;
CREATE TABLE IF NOT EXISTS `cate` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cate`
--

INSERT INTO `cate` (`cat_id`, `cate_name`) VALUES
(1, 'Coffee'),
(2, 'Momo'),
(3, 'Chowmein'),
(4, 'Sausage\r\n'),
(5, 'Cold Drinks');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Price` double NOT NULL,
  `Description` varchar(255) NOT NULL,
  `cate_id` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`ID`, `Name`, `Image`, `Price`, `Description`, `cate_id`) VALUES
(1, 'Black Coffee', 'black coffee.jpg', 150, 'Black coffee is as simple as it gets with ground coffee beans steeped in hot water, served warm. And if you want to sound fancy, you can call black coffee by its proper name: cafe noir.', 1),
(2, 'Latte', 'latte.jpg', 250, 'As the most popular coffee drink out there, the latte is comprised of a shot of espresso and steamed milk with just a touch of foam. It can be ordered plain or with a flavor shot of anything from vanilla to pumpkin spice.', 1),
(3, 'Cappuccino', 'Cappuccino.jpg', 300, 'Cappuccino is a latte made with more foam than steamed milk, often with a sprinkle of cocoa powder or cinnamon on top. Sometimes you can find variations that use cream instead of milk .', 1),
(4, 'Americano', 'Americano.jpg', 450, 'With a similar flavor to black coffee, the americano consists of an espresso shot diluted in hot water. Pro tip: if youâ€™re making your own, pour the espresso first, then add the hot water.', 1),
(5, 'Mocha', 'mocha.jpg', 500, 'For all you chocolate lovers out there, youâ€™ll fall in love with a mocha (or maybe you already have). The mocha is a chocolate espresso drink with steamed milk and foam.', 1),
(6, 'Buff. MoMo', 'buff momo.png', 130, 'Buff. Momo is a dumpling made of all-purpose flour and Buff. MoMo is filled with buff minced meat. Inspired by Tibetan dumplings, the dish is a very popular Nepali street food.', 2),
(7, 'Chicken MoMo', 'chicken momo.jpg', 160, 'Momo is a dumpling made of all-purpose flour and Chicken MoMo is filled with the minced Chicken meat. Inspired by Tibetan dumplings, the dish is a very popular Nepali street food.', 2),
(8, 'Veg. MoMo', 'veg momo.jpg', 100, 'Momo is a dumpling made of all-purpose flour and filled with vegetables. Inspired by Tibetan dumplings, the dish is a very popular Nepali street food.', 2),
(9, 'Chicken Chowmein', 'Chicken chowmin.jpg', 160, 'Chow mein is a traditional Chinese dish made with egg noodles and stir-fried veggies.This dish is pan-fried so the noodles get a nice crisp to them and then tossed in a yummy sauce.', 3),
(10, 'Buff. Chowmein', 'buff-chowmein.png', 130, 'Chow mein is a traditional Chinese dish made with egg noodles and stir-fried veggies.This dish is pan-fried so the noodles get a nice crisp to them and then tossed in a yummy sauce.', 3),
(11, 'Veg. Chowmein', 'veg chowmein.png', 100, 'Chow mein is a traditional Chinese dish made with egg noodles and stir-fried veggies.This dish is pan-fried so the noodles get a nice crisp to them and then tossed in a yummy sauce.', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_name` text NOT NULL,
  `order_price` int(11) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `order_total` int(11) NOT NULL,
  `table_no` int(11) NOT NULL,
  `Order_stat` varchar(255) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_name`, `order_price`, `order_qty`, `order_total`, `table_no`, `Order_stat`) VALUES
(1, 'Chicken Chowmein', 160, 1, 160, 1, 'received'),
(2, 'Chicken Chowmein', 160, 1, 160, 2, 'received');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
