-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2024 at 06:33 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+02:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ATSol`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`full_name`, `email`, `password`) VALUES 
('John Doe', 'johndoe@example.com', '$2y$10$Z0i/lfoa2X9PUc.PS/No.eCQuNL5D0FyA58ueOjP00DFZC4p1Wfui'), -- Hashed: password123
('Jane Smith', 'janesmith@example.com', '$2y$10$Fk6WjBeGqlwFb2CuLjSxIef4jZU47TBwrM.W3jMMp7m5DoI3sN0DC'), -- Hashed: securepass456
('Mike Johnson', 'mikejohnson@example.com', '$2y$10$kYJb0oZd0UbFEkqC1zUBM.8WjUFLXiFuSnqIazDTjzjB8P9IswA3W'), -- Hashed: strongpassword789
('Wayne Bruce', 'gotham@example.com', '$2y$10$Qc7c3Ouk0I5ezW4/qQ/x9.YZjTw7yGdOnDVUk/gdE7Uj.wDKITnt6');

--
-- Table structure for table `testimonials`
--

CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullName` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`fullName`, `product_name`, `message`) VALUES
('Jane Smith', 'MarketRider  ', 'Adaptable EA navigating diverse market conditions effectively, offering versatility in trading strategies and risk management protocols.'),
('John Doe', 'ProfitWave  ', 'Profit-driven EA capitalizing on market waves, strategically capturing profitable trades with precision and efficiency.'),
('Mike Johnson', 'RoboPips ', 'Autonomous EA executing trades independently, leveraging advanced algorithms for consistent performance in various market scenarios.'),
('Wayne Bruce', 'GoldenPip ', 'EA renowned for transforming trades into lucrative opportunities, showcasing exceptional profitability potential and robust trading capabilities.');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `product_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `price`, `product_description`) VALUES
(1001, 'TrendMaster', 1500, 'A robust EA designed to identify and trade with market trends'),
(1002, 'PipsGuru', 1800, 'An expert advisor focused on maximizing pips gained per trade'),
(1003, 'MarketRider', 1600, 'A versatile EA capable of adapting to various market conditions'),
(1004, 'QuantumFX', 2000, 'A cutting edge EA leveraging quantum computing principles'),
(1005, 'TradeWise', 1700, 'An intelligent EA designed to make informed trading decisions'),
(1006, 'SmartTrend', 1900, 'An EA utilizing sophisticated trend detection techniques'),
(1007, 'ProfitWave', 1750, 'A profit-focused EA that rides market waves to capture profitable trades'),
(1008, 'ForexGenius', 1850, 'A proven EA with a track record of generating consistent profits'),
(1009, 'StrategyPro', 1950, 'An EA incorporating advanced trading strategies and risk management protocols'),
(1010, 'PowerFX', 1650, 'A high powered EA designed for rapid market analysis and execution'),
(1011, 'AlphaTrade', 1550, 'An alpha generating EA that seeks out alpha opportunities in the markets'),
(1012, 'PrecisionFX', 2100, 'A precision focused EA known for its accuracy in trade entries and exits'),
(1013, 'RoboPips', 1450, 'A robotic EA capable of executing trades autonomously'),
(1014, 'TrendCatcher', 2250, 'An EA specialized in catching and capitalizing on trend movements'),
(1015, 'ScalpMaster', 1400, 'A masterful EA designed for scalping strategies'),
(1016, 'GoldenPip', 2200, 'An EA known for its ability to turn trades into golden profit opportunities');
--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
