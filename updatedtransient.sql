-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 11, 2018 at 02:21 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `updatedtransient`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

DROP TABLE IF EXISTS `activity_log`;
CREATE TABLE IF NOT EXISTS `activity_log` (
  `activity_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `activity_date` datetime NOT NULL,
  `activity_description` varchar(200) NOT NULL,
  PRIMARY KEY (`activity_id`),
  KEY `user_idx` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=391 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`activity_id`, `user_id`, `activity_date`, `activity_description`) VALUES
(380, 3, '2018-05-10 11:00:00', 'Seminar at Teacher\'s Camp.'),
(381, 10, '2018-05-20 15:00:00', 'Family Reunion at Baguio City'),
(382, 4, '2018-05-11 09:30:00', 'Unwind from stressful semester'),
(383, 9, '2018-05-30 16:30:00', 'Reunion with friends'),
(384, 7, '2018-06-01 09:30:00', 'Workshop and seminar at Camp John Hay, Baguio City'),
(385, 16, '2018-06-11 11:30:00', 'Family gathering'),
(386, 11, '2018-05-12 09:30:00', 'Hanging out with friends'),
(387, 12, '2018-04-12 12:30:00', 'Vacation'),
(389, 5, '2018-05-14 14:08:00', 'Vacation'),
(390, 10, '2018-05-22 09:45:00', 'Summer vacation');

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

DROP TABLE IF EXISTS `house`;
CREATE TABLE IF NOT EXISTS `house` (
  `house_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `house_name` varchar(45) NOT NULL,
  `house_style` varchar(45) DEFAULT NULL,
  `house_capacity` int(3) NOT NULL,
  `house_description` varchar(200) DEFAULT NULL,
  `house_address` varchar(200) NOT NULL,
  `rental_type` enum('per house','per head') NOT NULL,
  `current_rental_fee` decimal(15,0) NOT NULL,
  `current_reservation_fee` decimal(15,0) NOT NULL,
  `house_status` enum('available','unavailable','reserved') NOT NULL,
  PRIMARY KEY (`house_id`),
  UNIQUE KEY `house_id_UNIQUE` (`house_id`),
  KEY `provider_idx` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`house_id`, `user_id`, `house_name`, `house_style`, `house_capacity`, `house_description`, `house_address`, `rental_type`, `current_rental_fee`, `current_reservation_fee`, `house_status`) VALUES
(111, 4, 'Lyn\'s Baguio Transient Homes', 'Guest House', 2, 'Lyn\'s Baguio Transient Homes is a nice place with good ambiance that is good for big family.', '79-B, City Camp Alley, Baguio, 2600 Benguet', 'per head', '2500', '500', 'available'),
(112, 2, 'Baguio Transient House', 'Townhouse', 15, 'Baguio Transient House serves a wide space with parking lot.', '300 Elizabeth Court, Suello Village, Baguio, 2600 Benguet', 'per house', '8000', '2500', 'reserved'),
(113, 4, 'Baguio Transient', 'Lodge', 10, 'Baguio Transient is known for the best home in town.', '214 Mission Rd, Crystal Cave, Baguio', 'per house', '7000', '2500', 'unavailable'),
(114, 3, 'Babsplace Baguio Transient Room', 'Bed space', 1, 'Band looking for comfortable day and night stay.\r\n', '508 Hillside Rd, Baguio', 'per head', '1500', '500', 'reserved'),
(115, 3, 'Kaleen\'s Baguio Transient House', '3-Star Hotel', 5, 'This place is less expensive compared to hotel accommodations.', '1354 Asin Rd, Baguio', 'per house', '8960', '3500', 'available'),
(116, 2, 'Baguio Affordable Transient House', 'Guest House', 6, 'Good for 5-6 person, free Wi-Fi and semi-furnished house, clean and affordable.', 'Valenzuela St, Baguio, Benguet', 'per head', '600', '250', 'reserved'),
(117, 1, 'Nice n\' Cozy Transient House', 'Bungalow', 10, 'Semi furnished house and elegant décor.', '104 Upper East, Purok-1 Kalinga Pelota, Camp 7, Baguio', 'per house', '6000', '2000', 'unavailable'),
(118, 4, 'Pam\'s Transient House', 'Guest House', 4, '2-Storey House with free wi-fi.', '23 R. Villalon St, Baguio, 2600 Benguet', 'per house', '3000', '1500', 'reserved'),
(119, 4, 'Monzon\'s Transient Homes', 'Duplex House', 6, '15 mins walking to town. Free Wi-Fi and CCTV access.', '65 Everlasting St, Baguio, 2600 Benguet', 'per house', '3500', '1500', 'unavailable'),
(120, 4, 'God\'s Love Baguio Transient House', '3 Star Hotel', 2, NULL, 'Sandico St, Salud Mitra, Baguio, 2600 Benguet', 'per head', '500', '250', 'unavailable'),
(121, 2, 'Zeb\'s Transient House', 'Triplex House', 8, 'Fully furnished house with hot and cold water. Wi-Fi free and parking lot.', 'Green Ln, Baguio, Benguet', 'per house', '4500', '1300', 'unavailable'),
(122, 2, 'Joann Transient House', 'Bachelors Pad', 2, NULL, '18 Laubach Rd, Baguio, 2600 Benguet', 'per head', '2500', '850', 'reserved'),
(123, 3, 'VMSunga Transient House', 'Country and Rustic', 10, 'Semi furnished house and free Wi-Fi with parking lot.', '282 Elizabeth Court Suello Village, Baguio City, Elisabeth Ct, Baguio, Benguet', 'per house', '5500', '2500', 'available'),
(124, 1, 'Transient House Baguio', 'Lodge', 10, 'Fully furnished house, CCTV and Wi-Fi free.', 'Loakan Liwanag Barangay Hall, 233 2 Upper, Loakan Rd, Baguio, Benguet', 'per house', '6500', '3000', 'available'),
(125, 1, 'Woodsgate Transient House', 'Chic and Stylish', 15, 'Wide space and can accommodate 15 person. 4 rooms with 3 beds.', '139 Purok 1 Upper East Camp 7 Binay-an Compound, Baguio, 2600 Binay-an Compound, Baguio, 2600 Benguet', 'per head', '650', '200', 'reserved'),
(126, 3, 'Colorful Transient House', 'Bungalow', 5, '27/1 vehicle access. 24/7 cctv secured and parking lot.', '224 Purok 1, Upper East Woodsgate Square, Camp 7, Baguio, 2600', 'per house', '3500', '1800', 'reserved'),
(127, 4, 'Maine Line Transient House', 'Townhouse', 8, NULL, 'Baguio, Benguet', 'per house', '4500', '2800', 'reserved'),
(128, 4, 'Mj Transient House', 'Bungalow', 4, 'Free Wi-Fi access', 'San Carlos Heights, Baguio, Benguet', 'per house', '3500', '1000', 'reserved'),
(129, 3, 'Peter\'s Baguio Transient House', 'Bachelors Pad', 7, 'Fully furnished transient house with free Wi-Fi access.', '2602, 163 Military Cutoff Rd, Baguio, Benguet', 'per head', '500', '150', 'unavailable'),
(130, 3, 'Jabbitos Transient House', 'Bachelors Pad', 2, NULL, 'C. Arellano St, Baguio, Benguet', 'per head', '500', '250', 'unavailable'),
(131, 4, 'Breezy Hill Transient House', 'Duplex', 8, 'Semi furnished transient house, hot and cold water, free Wi-Fi and free parking lot.', '18 V. Martinez St, Brgy. Engineers Hill, Baguio, 2600 Benguet', 'per house', '4500', '2500', 'reserved'),
(132, 2, 'Tonyen\'s Transient House', 'Bungalow', 6, 'Quiet place, good for relaxation and unwind.', 'Bakakeng Road, 13c Western Link Circumferential Rd, Baguio, 2600\r\n', 'per house', '3500', '1000', 'available'),
(133, 4, 'Sagun\'s Transient House', 'Apartment/Boarding', 2, 'Good for 2 person. Hot and cold water with Free Wi-Fi.', '65 M. Roxas Street, Imelda Village, Baguio, 2600 Benguet', 'per house', '3800', '1500', 'reserved'),
(134, 1, 'Outlook Transient House', 'Guest House', 5, '24/7 CCTV access with free Wi-Fi and hot and cold water.', '#11, Maryhurst Rd. Brgy. Outlook Drive Subd., Baguio, 2600 Benguet', 'per house', '4500', '2000', 'unavailable'),
(135, 1, 'Faes Transient House', 'Chic and Stylish', 10, '3 Storey house with parking lot.', '2 himalaya St. Shangrila village, Baguio, 2600 Benguet', 'per house', '5500', '2800', 'reserved'),
(136, 2, 'Gutierrez Transient House', 'American Architecture', 12, 'Free Wi-Fi and CCTV secured. Near Grotto Lourdes.', '#61, Dominican Road, Brgy. Dominican Mirador, Baguio, 2600 Benguet', 'per house', '6500', '3000', 'available'),
(137, 6, 'Gutierrez Transient House', 'Triplex', 5, 'Semi furnished house with parking lot. Free Wi-Fi access.', '#61, Dominican Road, Brgy. Dominican Mirador, Baguio, 2600 Benguet', 'per house', '3800', '1200', 'unavailable'),
(138, 6, 'Royale Seven Transient House', 'Guest House', 12, 'Good for 12 person, wide space, free wi-fi, cctv access and no water problem.', 'Ace Villa Royale 7, Green Valley Village,, Santo Tomas Road,, Dontogan, Baguio, 2600 Benguet', 'per house', '5200', '2300', 'reserved'),
(139, 5, 'Zya Transient House', 'Country and Rustic', 8, NULL, 'Alphaville St, Baguio, Benguet', 'per head', '500', '250', 'unavailable'),
(140, 5, 'LuPris Baguio Transient House', 'Bungalow', 4, 'CCTV secured. No water problem and Free Wi-Fi.', 'Lower Brookside, Baguio, Benguet', 'per house', '3500', '1200', 'available'),
(141, 5, 'Kiyomi\'s Transient House', 'Triplex', 8, NULL, '12, Badihoy, Baguio, Benguet', 'per house', '5500', '2000', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_path` varchar(255) NOT NULL,
  `house_id` int(11) NOT NULL,
  PRIMARY KEY (`image_id`),
  KEY `house_idx` (`house_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `rental_id` int(11) NOT NULL,
  `payment_date` datetime NOT NULL,
  `payment_amount` decimal(15,0) NOT NULL,
  `payment_remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `user_id` (`user_id`),
  KEY `rental_idx` (`rental_id`)
) ENGINE=InnoDB AUTO_INCREMENT=211 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `user_id`, `rental_id`, `payment_date`, `payment_amount`, `payment_remarks`) VALUES
(200, 6, 911, '2018-05-15 00:00:00', '5500', NULL),
(201, 11, 915, '2018-05-15 11:00:00', '1500', 'Pending transaction'),
(202, 5, 919, '2018-05-12 06:00:00', '1050', 'Ongoing transaction'),
(203, 12, 910, '2018-05-15 16:30:00', '3500', 'Booked May/15/18'),
(204, 6, 916, '2018-05-27 09:30:00', '3800', 'Pending transaction'),
(205, 14, 912, '2018-06-05 11:00:00', '4800', 'To be followed'),
(206, 8, 919, '2018-07-12 06:00:00', '2800', 'Cancelled transaction'),
(207, 3, 911, '2018-05-11 12:00:00', '5500', 'Reserved transaction'),
(208, 5, 915, '2018-05-11 06:30:00', '5850', 'Ongoing transaction'),
(209, 1, 914, '2018-05-11 08:30:00', '3000', 'Ongoing transaction'),
(210, 2, 913, '2018-05-13 08:30:00', '3500', 'To be followed');

-- --------------------------------------------------------

--
-- Table structure for table `rental`
--

DROP TABLE IF EXISTS `rental`;
CREATE TABLE IF NOT EXISTS `rental` (
  `rental_id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_id` int(11) NOT NULL,
  `rental_startdate` date NOT NULL,
  `rental_enddate` date DEFAULT NULL,
  `rental_fee` decimal(15,0) NOT NULL,
  `fee_to_provider` decimal(15,0) NOT NULL,
  `rental_status` enum('pending','ongoing','completed') NOT NULL,
  PRIMARY KEY (`rental_id`),
  KEY `reservaation_id_idx` (`reservation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=920 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rental`
--

INSERT INTO `rental` (`rental_id`, `reservation_id`, `rental_startdate`, `rental_enddate`, `rental_fee`, `fee_to_provider`, `rental_status`) VALUES
(910, 811, '2018-05-13 08:30:00', '2018-05-15 18:30:00', '3500', '120', 'pending'),
(911, 812, '2018-05-11 12:00:00', '2018-05-15 16:30:00', '5500', '150', 'ongoing'),
(912, 815, '2018-06-05 11:00:00', '2018-06-06 18:30:00', '4800', '1200', 'pending'),
(913, 818, '2018-05-29 06:00:00', '2018-05-30 16:30:00', '6500', '2000', 'pending'),
(914, 818, '2018-05-11 08:30:00', '2018-05-12 16:30:00', '3000', '1250', 'ongoing'),
(915, 814, '2018-05-11 06:30:00', '2018-05-12 16:30:00', '5850', '1500', 'ongoing'),
(916, 810, '2018-05-27 09:30:00', '2018-05-29 15:30:00', '3800', '1200', 'pending'),
(917, 814, '2018-05-11 06:30:00', '2018-05-12 17:30:00', '5500', '2800', 'ongoing'),
(918, 810, '2018-06-10 12:00:00', '2018-05-11 20:00:00', '3500', '1200', 'ongoing'),
(919, 811, '2018-06-12 06:00:00', '2018-06-12 15:30:00', '2800', '1050', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `house_id` int(11) NOT NULL,
  `reservation_startdate` datetime NOT NULL,
  `reservation_enddate` datetime DEFAULT NULL,
  `reservation_fee` decimal(15,0) NOT NULL,
  `reservation_status` enum('pending','cancelled','accepted','rejected') NOT NULL,
  PRIMARY KEY (`reservation_id`),
  KEY `user_id_idx` (`user_id`),
  KEY `house_id_idx` (`house_id`)
) ENGINE=InnoDB AUTO_INCREMENT=820 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `user_id`, `house_id`, `reservation_startdate`, `reservation_enddate`, `reservation_fee`, `reservation_status`) VALUES
(810, 3, 119, '2018-05-10 10:00:00', '2018-05-11 00:00:00', '1500', 'pending'),
(811, 6, 111, '2018-05-11 00:00:00', '2018-05-12 00:00:00', '500', 'accepted'),
(812, 13, 113, '2018-05-14 06:00:00', '2018-05-15 17:30:00', '2500', 'accepted'),
(813, 6, 139, '2018-05-21 08:30:00', '2018-05-22 15:30:00', '250', 'cancelled'),
(814, 11, 117, '2018-06-12 08:30:00', '2018-06-13 19:30:00', '2000', 'pending'),
(815, 1, 118, '2018-06-05 11:00:00', '2018-06-06 18:30:00', '1500', 'rejected'),
(816, 4, 124, '2018-05-16 10:00:00', '2018-05-17 16:30:00', '3000', 'accepted'),
(817, 10, 135, '2018-06-01 08:00:00', '2018-06-02 09:30:00', '2800', 'cancelled'),
(818, 8, 125, '2018-06-08 15:30:00', '2018-06-09 12:30:00', '200', 'accepted'),
(819, 15, 139, '2018-05-30 10:00:00', '2018-05-31 15:30:00', '250', 'rejected');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `given_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `gender` enum('female','male') DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `contact_no` varchar(15) DEFAULT NULL,
  `email_address` varchar(45) DEFAULT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `display_picture` varchar(200) DEFAULT NULL,
  `user_type` enum('user','provider','admin') NOT NULL,
  `account_status` enum('pending','accepted','declined','deactivated') NOT NULL,
  `account_balance` decimal(15,0) DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `password_UNIQUE` (`password`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `given_name`, `last_name`, `gender`, `birthdate`, `contact_no`, `email_address`, `username`, `password`, `display_picture`, `user_type`, `account_status`, `account_balance`) VALUES
(1, 'Samantha', 'Garcia', 'female', '1998-05-06', '09095634789', '2165522@slu.edu.ph', 'user1', 'user1', NULL, 'user', 'accepted', '0'),
(2, 'Dean Christian', 'Baguisi', 'male', '1998-12-17', '09752584867', '2163907@slu.edu.ph', 'user2', 'user2', NULL, 'user', 'accepted', '0'),
(3, 'Angel', 'Elegado', 'female', '1998-12-02', '09097070556', '2165184@slu.edu.ph', 'user3', 'user3', NULL, 'user', 'pending', '0'),
(4, 'Vea', 'Hufana', 'female', '1998-03-23', '09096734321', '2167834@slu.edu.ph', 'user4', 'user4', NULL, 'admin', 'deactivated', '0'),
(5, 'Mitch', 'Galatcha', 'male', '1999-05-16', '09165634229', '2162543@slu.edu.ph', 'user5', 'user5', NULL, 'provider', 'deactivated', '0'),
(6, 'Jonalou', 'Aromin', 'female', '1998-09-27', '09557845297', '2165693@slu.edu.ph', 'user6', 'user6', NULL, 'provider', 'pending', '0'),
(7, 'Ian', 'Culanag', 'male', '1999-05-18', '09752685001', '2165395@slu.edu.ph', 'user7', 'user7', NULL, 'admin', 'accepted', '0'),
(8, 'Nikki', 'Ganotan', 'male', '1998-09-09', '09156835110', '2167492@slu.edu.ph', 'user8', 'user8', NULL, 'admin', 'deactivated', '0'),
(9, 'Dawn', 'Cundangan', 'female', '1998-10-21', '09091278440', '2169034@slu.edu.ph', 'user9', 'user9', NULL, 'provider', 'declined', '0'),
(10, 'Troye', 'Galatcha', 'male', '1996-01-11', '09123564786', 'troye@gmail.com', 'user10', 'user10', NULL, 'user', 'pending', '0'),
(11, 'Zac', 'Dela Cruz', 'male', '1998-07-11', '09169473522', 'zac@slu.edu.ph', 'user11', 'user11', NULL, 'user', 'accepted', '0'),
(12, 'Juniper', 'Aromin', 'female', '1998-01-17', '09169475684', 'juniper@gmail.com', 'user12', 'user12', NULL, 'admin', 'pending', '0'),
(13, 'Margo Roth', 'Spiegelman', 'female', '1997-08-14', '09474126426', 'margo@gmail.com', 'user13', 'user13', NULL, 'user', 'deactivated', '0'),
(14, 'Bella', 'Unique', 'female', '1996-09-12', '09474256598', 'bella@slu.edu.ph', 'user14', 'user14', NULL, 'user', 'accepted', '0'),
(15, 'Christian', 'Grimmie', 'male', '1998-03-14', '09265990872', 'christian@gmail.com', 'user15', 'user15', NULL, 'provider', 'declined', '0'),
(16, 'Jerome Francis', 'Salazar', 'male', '1998-02-05', '0998562356', '2162253@slu.edu.ph', 'user16', 'user16', NULL, 'admin', 'declined', '0');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `house`
--
ALTER TABLE `house`
  ADD CONSTRAINT `provider` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `house` FOREIGN KEY (`house_id`) REFERENCES `house` (`house_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `rental` FOREIGN KEY (`rental_id`) REFERENCES `rental` (`rental_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rental`
--
ALTER TABLE `rental`
  ADD CONSTRAINT `reservation_id` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`reservation_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `house_id` FOREIGN KEY (`house_id`) REFERENCES `house` (`house_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
