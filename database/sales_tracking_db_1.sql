-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2022 at 03:54 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sales_tracking_db_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_type`
--

CREATE TABLE `tbl_payment_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `deleted_flag` int(11) DEFAULT 0,
  `date_created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_payment_type`
--

INSERT INTO `tbl_payment_type` (`id`, `name`, `deleted_flag`, `date_created`) VALUES
(1, 'Bank Transfer (BT)', 0, '2022-02-08 05:00:58'),
(2, 'Cash on Delivery (COD)', 0, '2022-02-08 05:00:58'),
(3, 'GCASH', 0, '2022-02-08 05:00:58'),
(4, 'Paymaya', 0, '2022-02-08 05:00:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `deleted_flag` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`id`, `name`, `date_created`, `deleted_flag`) VALUES
(1, 'Admin', '2022-02-07 15:24:55', 0),
(2, 'Sales Clerk', '2022-02-07 15:24:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales`
--

CREATE TABLE `tbl_sales` (
  `id` int(11) NOT NULL,
  `user_id` varchar(45) DEFAULT NULL,
  `mode_id` int(11) DEFAULT NULL,
  `source_id` int(11) DEFAULT NULL,
  `assigned_date` datetime DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `contact_no` varchar(45) DEFAULT NULL,
  `province` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `barangay` varchar(45) DEFAULT NULL,
  `Remarks` text DEFAULT NULL,
  `deleted_flag` int(11) DEFAULT 0,
  `date_created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sales`
--

INSERT INTO `tbl_sales` (`id`, `user_id`, `mode_id`, `source_id`, `assigned_date`, `first_name`, `middle_name`, `last_name`, `address`, `contact_no`, `province`, `city`, `barangay`, `Remarks`, `deleted_flag`, `date_created`) VALUES
(1, '19', 1, 1, '0000-00-00 00:00:00', 'Carlo', 'llabor', 'jimenez', 'poblaction sur bayambang pangasinan', '09217635295', 'N/A', 'Singapore', 'Poblacion sur', '', 0, '2022-02-08 21:31:28'),
(2, '19', 1, 1, '0000-00-00 00:00:00', 'Carlo', 'llabor', 'jimenez', 'poblaction sur bayambang pangasinan', '09217635295', 'N/A', 'Singapore', 'Poblacion sur', '', 0, '2022-02-08 21:31:45'),
(3, '19', 1, 1, '0000-00-00 00:00:00', 'Carlo', 'llabor', 'jimenez', 'poblaction sur bayambang pangasinan', '09217635295', 'N/A', 'Singapore', 'Poblacion sur', '', 0, '2022-02-08 21:32:59'),
(4, '19', 1, 1, '0000-00-00 00:00:00', 'Carlo', 'llabor', 'jimenez', 'poblaction sur bayambang pangasinan', '09217635295', 'N/A', 'Singapore', 'Poblacion sur', '', 0, '2022-02-08 21:33:14'),
(5, '19', 1, 1, '0000-00-00 00:00:00', 'Carlo', 'llabor', 'jimenez', 'poblaction sur bayambang pangasinan', '09217635295', 'N/A', 'Singapore', 'Poblacion sur', '', 0, '2022-02-08 21:33:49'),
(6, '19', 1, 1, '0000-00-00 00:00:00', 'Carlo', 'llabor', 'jimenez', 'poblaction sur bayambang pangasinan', '09217635295', 'N/A', 'Singapore', 'Poblacion sur', '', 0, '2022-02-08 21:33:50'),
(7, '19', 1, 1, '0000-00-00 00:00:00', 'Carlo', 'llabor', 'jimenez', 'poblaction sur bayambang pangasinan', '09217635295', 'N/A', 'Singapore', 'Poblacion sur', '', 0, '2022-02-08 21:34:17'),
(8, '19', 1, 1, '0000-00-00 00:00:00', 'Carlo', 'llabor', 'jimenez', 'poblaction sur bayambang pangasinan', '09217635295', 'N/A', 'Singapore', 'Poblacion sur', '', 0, '2022-02-08 21:34:31'),
(9, '19', 1, 1, '0000-00-00 00:00:00', 'Typhoon', 'llabor', 'jimenez', 'poblaction sur bayambang pangasinan', '09217635295', 'N/A', 'Singapore', 'Poblacion sur', 'test', 0, '2022-02-08 21:36:44'),
(10, '19', 1, 1, '0000-00-00 00:00:00', 'Carlo', 'llabor', 'jimenez', 'poblaction sur bayambang pangasinan', '09217635295', 'N/A', 'Singapore', 'Poblacion sur', '', 0, '2022-02-08 21:37:41'),
(11, '19', 1, 1, '0000-00-00 00:00:00', 'Carlo', 'llabor', 'jimenez', '83 Rizal Avenue', '09217635295', 'Pangasinan', 'Bayambang', 'Poblacion sur', '', 0, '2022-02-08 21:41:51'),
(12, '19', 1, 1, '2022-02-08 00:00:00', 'Carlo', 'llabor', 'jimenez', 'poblaction sur bayambang pangasinan', '09217635295', 'N/A', 'Singapore', 'Poblacion sur', 'test', 1, '2022-02-08 21:45:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale_items`
--

CREATE TABLE `tbl_sale_items` (
  `id` int(11) NOT NULL,
  `sale_id` varchar(45) DEFAULT NULL,
  `particular` varchar(45) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `discount` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sale_items`
--

INSERT INTO `tbl_sale_items` (`id`, `sale_id`, `particular`, `qty`, `price`, `discount`) VALUES
(1, '1', '123123', 123, '0.00', '0.00'),
(2, '1', '123', 123, '0.00', '0.00'),
(3, '7', 'parts 1', 1230, '999.99', '23.00'),
(4, '8', 'parts 1', 1230, '999.99', '23.00'),
(5, '10', 'parts 1', 123123, '123.00', '232.00'),
(6, '10', 'parts 123213', 23, '999.99', '23.00'),
(7, '10', 'parts 123', 123, '123.00', '0.00'),
(8, '11', 'parts 1', 50, '150.00', '200.00'),
(9, '11', 'engine 2', 50, '100.00', '150.00'),
(10, '11', 'items 3', 50, '53.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_source_type`
--

CREATE TABLE `tbl_source_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `deleted_flag` int(11) DEFAULT 0,
  `date_created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_source_type`
--

INSERT INTO `tbl_source_type` (`id`, `name`, `deleted_flag`, `date_created`) VALUES
(1, 'FB Page', 0, '2022-02-08 05:05:34'),
(2, 'FB Market Place', 0, '2022-02-08 05:05:34'),
(3, 'Others', 0, '2022-02-08 05:05:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password_salt` varchar(100) DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `first_name` varchar(45) DEFAULT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `contact_no` varchar(45) DEFAULT NULL,
  `role_id` int(11) DEFAULT 2,
  `deleted_flag` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password_salt`, `date_created`, `first_name`, `middle_name`, `last_name`, `contact_no`, `role_id`, `deleted_flag`) VALUES
(10, 'jimenez.carlo.llabor@gmail.com', '$2y$10$uSBzbDTpO8Adx3w.aXhjEuaJZ.5.O5tR7ZulqBX.LqRrRbCnx6ngy', '2022-02-06 16:26:13', 'Carlo', 'L', 'jimenez', '', 2, 0),
(11, 'jimenez.carlo.llabor123@gmail.com', '$2y$10$OFsVGWBDgcOO.uCqSW39uesPFRnVtsrq8vwzK5chsleU91ytllFMu', '2022-02-07 21:30:07', 'admin', '', '', '', 2, 0),
(18, 'jimenez.carlo.llabor@gmail.coma', '$2y$10$fGoEAwprI994dGlI52ZdZe6xFU/.JgGUYGwGDijmLkz/iSPKxgDD6', '2022-02-08 11:59:44', 'Carlo', 'llabor', 'jimenez', '', 1, 0),
(19, 'admin@gmail.com', '$2y$10$gsPRbcaabLZU3wQBb4uFneigj.AWQpqlqVh.qaKpT0LjXijfn3imy', '2022-02-08 17:53:56', 'Carlo', 'llabor', 'jimenez', '09217635295', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_payment_type`
--
ALTER TABLE `tbl_payment_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sale_items`
--
ALTER TABLE `tbl_sale_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_source_type`
--
ALTER TABLE `tbl_source_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_payment_type`
--
ALTER TABLE `tbl_payment_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_sale_items`
--
ALTER TABLE `tbl_sale_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_source_type`
--
ALTER TABLE `tbl_source_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
