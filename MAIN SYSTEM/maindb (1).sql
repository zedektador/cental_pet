-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2017 at 07:13 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maindb`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `status` int(255) NOT NULL COMMENT '1=active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `date`, `created`, `modified`, `status`) VALUES
(4, 'ili lang', '2017-10-01', '2017-10-07 06:32:07', '2017-10-07 06:32:07', 0),
(11, 'di na siya manyak', '2017-10-03', '2017-10-07 06:35:45', '2017-10-07 06:35:45', 0),
(12, 'iliiiiiiiiiiiiii', '2017-10-08', '2017-10-07 06:37:08', '2017-10-07 06:37:08', 0),
(13, 'charles martir pa din', '2017-10-01', '2017-10-07 06:39:05', '2017-10-07 06:39:05', 0),
(14, 'pogi talaga ni erick', '2017-10-02', '2017-10-09 08:38:30', '2017-10-09 08:38:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` float(6,2) NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `status`, `img`) VALUES
(1, 'Product 1', 2520.00, '1', 'IMG_0655.JPG'),
(2, 'Product 2', 500.00, '1', 'Garcia-w960-225x3001.jpg'),
(3, 'Product 3', 6000.00, '1', 'WIN_20170801_10_16_20_Pro (2).jpg'),
(4, 'Product 4', 300.00, '1', 'AlbumArt_{7A74FF0E-0B37-4325-AF1D-224E57A9483A}_Large.jpg'),
(5, 'product 5', 100.00, '1', ''),
(6, 'Product 6', 8000.00, '1', ''),
(7, 'Product 7', 900.00, '1', ''),
(8, 'Product 8', 5630.00, '1', ''),
(9, 'Product 9', 888.00, '1', ''),
(10, 'Product 10', 1468.00, '1', ''),
(11, 'wertyu', 4444.00, '1', ''),
(12, 'qwer', 9999.99, '1', 'AlbumArt_{CAAEE3D3-1E76-4E3E-B207-CF3E68D31BAE}_Large.jpg'),
(13, 'qwer', 123.00, '1', 'AlbumArt_{CAAEE3D3-1E76-4E3E-B207-CF3E68D31BAE}_Large.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_about`
--

CREATE TABLE `tbl_admin_about` (
  `id` int(255) NOT NULL,
  `admin_about_welcome` varchar(255) NOT NULL,
  `admin_about_quote` varchar(255) NOT NULL,
  `admin_about_about` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_about`
--

INSERT INTO `tbl_admin_about` (`id`, `admin_about_welcome`, `admin_about_quote`, `admin_about_about`) VALUES
(1, 'Welcome to Robin Joy\'s House of Flowers', 'We are creative Event Organizer', 'Robin Joy\'s of Flowers is an event organizing company and owned by Robin Joy Cantos. From a flower arranger, the company is now an event organizing company. The company also offers wide range packages and services where the customer can choose. ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_calendar`
--

CREATE TABLE `tbl_admin_calendar` (
  `id` int(255) NOT NULL,
  `admin_calendar_title` varchar(255) NOT NULL,
  `admin_calendar_date` date NOT NULL,
  `admin_calendar_created` datetime(6) NOT NULL,
  `admin_calendar_modified` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_offered_event`
--

CREATE TABLE `tbl_admin_offered_event` (
  `id` int(255) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_description` varchar(255) NOT NULL,
  `event_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_offered_event`
--

INSERT INTO `tbl_admin_offered_event` (`id`, `event_name`, `event_description`, `event_picture`) VALUES
(3, 'Promenade', 'Gagawan pa', 'prom.jpg'),
(4, 'Party', 'Gagawan pa', 'party.jpg'),
(5, 'Wedding', 'Gagawan pa', 'wedding.jpeg'),
(6, 'Baptismal and Family Events', 'Gagawan pa', 'baptismal.jpg'),
(7, 'Debut', 'Gagawan pa', 'debut.jpg'),
(8, 'Birthday', 'Gagawan pa', 'birthday.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_offered_packages`
--

CREATE TABLE `tbl_admin_offered_packages` (
  `id` int(255) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `package_price` int(255) NOT NULL,
  `package_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_offered_packages`
--

INSERT INTO `tbl_admin_offered_packages` (`id`, `package_name`, `package_price`, `package_picture`) VALUES
(1, 'Wedding Package 1', 80000, 'rsz_wedding_final_1.jpg'),
(3, 'Wedding Package 2', 70000, 'rsz_wedding_final_2.jpg'),
(4, 'Wedding Package 3', 50000, 'rsz_wedding_final_3.jpg'),
(5, 'Promenade Package 1', 120000, 'rsz_promenade_final_1.jpg'),
(6, 'Promenade Package 2', 90000, 'rsz_promenade_final_2.jpg'),
(7, 'Promenade Package 3', 70000, 'rsz_promenade_final_3.jpg'),
(8, 'Party Package 1', 45000, 'rsz_party_final_1.jpg'),
(9, 'Party Package 2', 30000, 'rsz_party_final_2.jpg'),
(10, 'Party Package 3', 23000, 'rsz_party_final_3.jpg'),
(11, 'Debut Package 1', 100000, 'rsz_debut_final_1.jpg'),
(12, 'Debut Package 2', 70000, 'rsz_debut_final_2.jpg'),
(13, 'Debut Package 3', 50000, 'rsz_debut_final_3.jpg'),
(14, 'Baptismal and Family Events Package 1', 55000, 'rsz_baptismal_and_family_events_final_1.jpg'),
(15, 'Baptismal and Family Events Package 2', 44925, 'rsz_baptismal_and_family_events_final_2.jpg'),
(16, 'Baptismal and Family Events Package 3', 39925, 'rsz_baptismal_and_family_events_final_3.jpg'),
(17, 'Birthday Package 1', 57800, 'rsz_birthday_final_1.jpg'),
(18, 'Birthday Package 2', 36000, 'rsz_birthday_final_2.jpg'),
(19, 'Birthday Package 3', 28000, 'rsz_birthday_final_3.jpg'),
(20, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_offered_venues`
--

CREATE TABLE `tbl_admin_offered_venues` (
  `id` int(255) NOT NULL,
  `venue_name` varchar(255) NOT NULL,
  `venue_address` varchar(255) NOT NULL,
  `venue_photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_offered_venues`
--

INSERT INTO `tbl_admin_offered_venues` (`id`, `venue_name`, `venue_address`, `venue_photo`) VALUES
(1, 'Casa Manila Patio', 'Plaza San Luis Complex Intramuros, Manila', 'casamanila2.jpg'),
(2, 'Ramon Magsaysay Hall', 'Quintos St., Roxas Blvd, Manila', '12963701_981776575241900_6944720419284909656_n.jpg'),
(3, 'Teatrillo', 'Plaza San Luis Complex Intamuros, Manila', 'IMG_6143.JPG'),
(4, 'Paco Park', 'General Luna St. cor. Padre Faura St. Paco, Manila', 'View_from_the_pathway_at_Paco_Park.JPG'),
(5, 'Kaisa Angelo King Heritage Center', '#32 Anda cor. Cabildo Streets, Intramuros, 1002 Manila', 'venues_1472428078_8066_8955.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_past_events`
--

CREATE TABLE `tbl_admin_past_events` (
  `id` int(255) NOT NULL,
  `admin_past_address` varchar(255) NOT NULL,
  `admin_past_description` varchar(255) NOT NULL,
  `admin_past_photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_schedules`
--

CREATE TABLE `tbl_admin_schedules` (
  `id` int(255) NOT NULL,
  `schedule_food_tasting` varchar(255) NOT NULL,
  `schedule_meetings` varchar(255) NOT NULL,
  `schedule_events` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_terms_policies`
--

CREATE TABLE `tbl_admin_terms_policies` (
  `id` int(255) NOT NULL,
  `terms_policies_customization` varchar(255) NOT NULL,
  `terms_policies_budgetary_customer` varchar(255) NOT NULL,
  `terms_policies_payment` varchar(255) NOT NULL,
  `terms_policies_payment1` varchar(255) NOT NULL,
  `terms_policies_payment2` varchar(255) NOT NULL,
  `terms_policies_payment3` varchar(255) NOT NULL,
  `terms_policies_reschedule` varchar(255) NOT NULL,
  `terms_policies_cancellation` varchar(255) NOT NULL,
  `terms_policies_update` varchar(255) NOT NULL,
  `terms_policies_contract` varchar(255) NOT NULL,
  `terms_policies_p_a_packages` varchar(255) NOT NULL,
  `terms_policies_q_a` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_terms_policies`
--

INSERT INTO `tbl_admin_terms_policies` (`id`, `terms_policies_customization`, `terms_policies_budgetary_customer`, `terms_policies_payment`, `terms_policies_payment1`, `terms_policies_payment2`, `terms_policies_payment3`, `terms_policies_reschedule`, `terms_policies_cancellation`, `terms_policies_update`, `terms_policies_contract`, `terms_policies_p_a_packages`, `terms_policies_q_a`) VALUES
(11, '  The customers can customize the following packages they want. The customers can choose from the range of packages posted of the website.', '  Budgetary customers can select packages that suits their budget. The website will offer some packages that the budgetary customers can afford. The budgetary can also customize their own packages if they want.', '  The customers must input the reference number and amount deposited to the website.', '  If the payment was accurate, the admin will approve the contract and the customerâ€™s plan.', '   3 days prior the event, the customers must pay in cash.', '  Months or Weeks prior the event, the company accepts credit cards as payment.', ' For the rescheduling of the event, the customers can input the new schedule of event. Rescheduling should be 3 weeks or 1 month prior. If the customers rescheduled 3 days prior the event, the customers will pay the penalty of 30% of their total package.', ' The cancellation of event is 1 month prior before the event. The cancellation has payment percentage on how much the customers will refund.', '  The customers can update the packages they chosen 21 days before the event. The customers can add and remove on their packages chosen.', ' The website will display a contract after the customers are done in selecting the packages. The contract will show the availed packages and the amount of the packages availed. The website will display a contract after the customers are done in selecting.', ' The prices and availability of packages may adjust without notice. Thus, Robin Joyâ€™s House of Flowers will ensure that all information and details posted was accurate and updated.', ' For other inquiries and questions, you may email Robin Joyâ€™s House of Flowers at robinjoy_cantos@yahoo.com  or you may contact the number 09168932361 / 09214420623 '),
(14, ' qwe', '  qwe', '  qwe', '  qwe', '  qwe', '  qwe', '  qwe', '  qwe', '  qwe', '  qwe', '  qwe', '  qwe');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_user`
--

CREATE TABLE `tbl_admin_user` (
  `id` int(255) NOT NULL,
  `admin_full_name` text NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_address` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_contact_number` varchar(255) NOT NULL,
  `admin_company_name` varchar(255) NOT NULL,
  `admin_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_user`
--

INSERT INTO `tbl_admin_user` (`id`, `admin_full_name`, `admin_username`, `admin_password`, `admin_address`, `admin_email`, `admin_contact_number`, `admin_company_name`, `admin_picture`) VALUES
(1, 'Robin Joy Cantos', 'RBJadmin', 'admin', '205 penarubia St. BinondoManila, Philippines', 'robinjoy_cantos@yahoo.com', '09168932361 / 09214420623', 'Robin Joy\'s House of Flowers', '2.gif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_account`
--

CREATE TABLE `tbl_customer_account` (
  `id` int(255) NOT NULL,
  `customer_username` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_password` varchar(255) NOT NULL,
  `customer_contact_number` varchar(255) NOT NULL,
  `customer_fname` text NOT NULL,
  `customer_lname` text NOT NULL,
  `customer_bday` date NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer_account`
--

INSERT INTO `tbl_customer_account` (`id`, `customer_username`, `customer_email`, `customer_password`, `customer_contact_number`, `customer_fname`, `customer_lname`, `customer_bday`, `customer_address`) VALUES
(26, 'RickeRacca', 'erickracca000@gmail.com', '$2y$10$7ZNE1ZuTWKUPQ77LADq.Uufwqt.fnikIZDw8Tc/oHdqVBoqIwZZcy', '2147483647', 'Erick Paul', 'Racca', '0000-00-00', '1597 Honradez St. Sampaloc Manila'),
(27, 'iliness', 'iliness@gmail.com', '$2y$10$BNh30PBFlPVZ6awjW3xtWOZ7XMv81JA3cjYoSPjVqRDZoqHJDSaii', '2147483647', 'Clarissa Joy', 'Ili', '2017-10-31', '1597 Honradez St. Sampaloc Manila'),
(28, 'qwertyui', 'qwe@qwe.com', '$2y$10$MfrTFO3fUFbqEKiSOj2izucLtixgjAX4qgGpce6ClIj/7hjhUV.6G', '2147483647', 'qwe', 'qwe', '2017-10-26', '1597 Honradez St. Sampaloc Manila'),
(29, 'charles', 'charles@gmail.com', '$2y$10$N2qAez5H9P1ehtc5hJqvsO9YCenEZfrUBdx1CsexOLfpwsrKq/ToS', '2147483647', 'charles', 'bisa', '2013-03-06', '1597 Honradez St. Sampaloc Manila'),
(30, 'asdfqwe', 'qwe@qwe.com', '$2y$10$hYXmfLWonaRj0bWirRhJVe52qoKrsYKJXtES7guoVfkb1ksLcmDWa', '2147483647', 'qwe', 'qwe', '2017-10-24', '1597 Honradez St. Sampaloc Manila'),
(31, 'zxc', 'qwe@qwe.com', '$2y$10$OPejElGf31r/36.5Ey.vgO4YmGr.3m9xq3G9QYlqvjUbFYN/E6Au6', '2147483647', 'zxc', 'zxc', '2017-10-25', '1597 Honradez St. Sampaloc Manila'),
(32, 'zxcv', 'qwe@qwe.com', '$2y$10$LPylhg3lDXPxYblmnUQ6d.M3e4xJzpHPyakpL0A.KYvYTyRQnSH2.', '2147483647', 'zxc', 'zcx', '2017-10-24', '1597 Honradez St. Sampaloc Manila'),
(33, 'vcxzz', 'qwe@qwe.com', '$2y$10$SGE.DN1WMYWwPpcH4GzRhuhwpuSNKvPlvHyE4sdxbEoshjgS4nm6S', '2147483647', 'zxc', 'zxc', '2017-10-31', '1597 Honradez St. Sampaloc Manila'),
(34, 'aaaaaa', 'qwe@qwe.com', '$2y$10$uwpghTMJhGI2abR91Fqr.O0tEOKw8dBs3OAQXyg/7TQTHXB5jOv/u', '2147483647', 'qwe', 'qwe', '2017-10-25', '1597 Honradez St. Sampaloc Manila'),
(35, 'qweqweqweqwe', 'qwe@qwe.com', '$2y$10$GcZX9OcugyXFi9W3xMH/WulWwSq3B2.cGUOe3VzG1D1vOiIFs0msK', '2147483647', 'qwe', 'qwe', '2017-10-18', '1597 Honradez St. Sampaloc Manila'),
(36, 'qwqqq', 'qwe@qwe.com', '$2y$10$mquikbcEYCYYgDozCPRDWO7..6NO/XVk98t5ntZToF1bcNguFqIrG', '09354559550', 'qwe', 'qwe', '2017-10-25', '1597 Honradez St. Sampaloc Manila'),
(38, 'RBJadmin', 'robinjoy_cantos@yahoo.com', '$2y$10$WN1VMGUiV64LIKtS2k/IyOEw2M7Mhdy.xCgULtfudkEpzECDdD9Ru', '09168932361', 'Robin Joy', 'Cantos', '2017-10-15', '205 penarubia St. BinondoManila, Philippines');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_event`
--

CREATE TABLE `tbl_customer_event` (
  `id` int(255) NOT NULL,
  `customer_event_id` int(255) NOT NULL,
  `customer_type` varchar(255) NOT NULL,
  `customer_event_type` varchar(255) NOT NULL,
  `customer_package` varchar(255) NOT NULL,
  `customer_package_price` int(255) NOT NULL,
  `customer_event_date` varchar(255) NOT NULL,
  `customer_guest` int(255) NOT NULL,
  `customer_venue` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer_event`
--

INSERT INTO `tbl_customer_event` (`id`, `customer_event_id`, `customer_type`, `customer_event_type`, `customer_package`, `customer_package_price`, `customer_event_date`, `customer_guest`, `customer_venue`) VALUES
(1, 26, '', '', 'Wedding Package 1', 80000, '', 0, ''),
(2, 26, 'Choose from Offered Packages/Customer', '', 'Birthday Package 1', 57800, '', 100, ''),
(3, 26, 'Choose from Offered Packages/Customer', 'Wedding', 'Wedding Package 1', 80000, '', 100, 'Teatrillo'),
(4, 26, 'Choose from Offered Packages/Customer', 'Promenade', 'Debut Package 3', 50000, '', 100, 'Paco Park');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_about`
--
ALTER TABLE `tbl_admin_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_calendar`
--
ALTER TABLE `tbl_admin_calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_offered_event`
--
ALTER TABLE `tbl_admin_offered_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_offered_packages`
--
ALTER TABLE `tbl_admin_offered_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_offered_venues`
--
ALTER TABLE `tbl_admin_offered_venues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_past_events`
--
ALTER TABLE `tbl_admin_past_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_schedules`
--
ALTER TABLE `tbl_admin_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_terms_policies`
--
ALTER TABLE `tbl_admin_terms_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_user`
--
ALTER TABLE `tbl_admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer_account`
--
ALTER TABLE `tbl_customer_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer_event`
--
ALTER TABLE `tbl_customer_event`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_admin_about`
--
ALTER TABLE `tbl_admin_about`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_admin_calendar`
--
ALTER TABLE `tbl_admin_calendar`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_admin_offered_event`
--
ALTER TABLE `tbl_admin_offered_event`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_admin_offered_packages`
--
ALTER TABLE `tbl_admin_offered_packages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_admin_offered_venues`
--
ALTER TABLE `tbl_admin_offered_venues`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_admin_past_events`
--
ALTER TABLE `tbl_admin_past_events`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_admin_schedules`
--
ALTER TABLE `tbl_admin_schedules`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_admin_terms_policies`
--
ALTER TABLE `tbl_admin_terms_policies`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_admin_user`
--
ALTER TABLE `tbl_admin_user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_customer_account`
--
ALTER TABLE `tbl_customer_account`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `tbl_customer_event`
--
ALTER TABLE `tbl_customer_event`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
