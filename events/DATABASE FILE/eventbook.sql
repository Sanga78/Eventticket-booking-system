-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2021 at 06:33 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventbook'
--

-- --------------------------------------------------------

--
-- Table structure for table `booked`
--



--
-- Table structure for table `availability`
--

CREATE TABLE `availability` (
  `id` int(10) UNSIGNED NOT NULL,
  `event` int(10) UNSIGNED DEFAULT NULL,
  `organizer` int(10) UNSIGNED DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `amount` varchar(40) DEFAULT NULL,
  `status` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `availability`
--

INSERT INTO `availability` (`id`, `event`, `organizer`, `date`, `time`, `amount`, `status`) VALUES
(1, 1, 1, '2023-10-20', '13:00:00', '1', 'available'),
(2, 1, 2, '2023-10-22', '20:00:00', '2', 'not available'),
(3, 2, 1, '2023-11-05', '13:00:00', '1', 'available');

-- -------------------------------------------------------
--
-- Table structure for table `bookings`
--

--
-- Table structure for table `events`
--

-- --------------------------------------------------------
--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `event_id` varchar(155) NOT NULL,
  `seat_booked` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`event_id`, `seat_booked`) VALUES
('ABC0010', NULL),
('BCC9999', NULL),
('CAS3300', '16'),
('LLL7699', NULL),
('MMM9969', '2,15,6,18,12'),
('MVL1000', '3'),
('NBS4455', NULL),
('RDH4255', '15'),
('SSX6633', NULL),
('TTH8888', NULL),
('XYZ7890', NULL);

-- --------------------------------------------------------


CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `organizer_id` int(11) NOT NULL,
  `meeting_id` int(11) NOT NULL,
  `first_seat` int(11) NOT NULL,
  `second_seat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`,`organizer_id`,`meeting_id`, `first_seat`, `second_seat`) VALUES
(1, 'EGERTON DERA FEST',1, 3, 30, 45),
(2, 'EUSDA', 8, 5, 30, 45),
(3, 'EUNCCU', 4, 4, 30, 45),
(7, 'WORSHIP FEST', 3, 6, 30, 45),
(8, 'X-RAY PARTY', 1, 7, 30, 40),
(9, 'HUAWEI BOOTCAMP', 2, 8, 20, 50),
(10, 'TECH FEST', 1, 9, 30, 45),
(11, 'CHURCHIL SHOW', 4, 10, 30, 40),
(12, 'LEGACY DRAMA', 7, 11, 25, 60),
(13, 'COMRADES PARTY', 1, 12, 30, 50);

-- --------------------------------------------------------

CREATE TABLE `booked` (
  `id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `class` varchar(10) NOT NULL DEFAULT 'second',
  `no` int(11) NOT NULL DEFAULT '1',
  `seat` varchar(30) NOT NULL,
  `date` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booked`
--

INSERT INTO `booked` (`id`, `schedule_id`, `payment_id`, `user_id`, `code`, `class`, `no`, `seat`, `date`) VALUES
(15, 5, 12, 4, '2022/005/1324', 'first', 1, 'F1', 'Tue, 11-Aug-2022 11:52:19 AM'),
(17, 5, 15, 3, '2020/005/2645', 'first', 5, 'F02', 'Tue, 11-Aug-2020 12:48:38 PM'),
(18, 6, 16, 3, '2022/006/1655', 'first', 8, 'F1 -F8', 'Tue, 11-Aug-2022 01:08:20 PM'),
(19, 6, 1, 4, '2022/006/9146', 'second', 1, 'S1', 'Tue, 11-Aug-2022 01:09:22 PM'),
(20, 8, 18, 4, '2022/008/1144', 'second', 8, 'S1 -S8', 'Tue, 11-Aug-2022 01:12:58 PM'),
(21, 18, 19, 1, '2022/018/1671', 'first', 8, 'F1 -F8', 'Tue, 11-Aug-2022 04:10:29 PM'),
(22, 20, 20, 5, '2022/020/126', 'first', 30, 'F1 - F30', 'Mon, 31-Aug-2022 11:36:57 PM'),
(23, 20, 21, 6, '2022/020/31816', 'first', 2, 'F31 - F32', 'Fri, 06-Nov-2022 10:10:44 PM'),
(24, 22, 22, 6, '2022/022/1176', 'second', 1, 'S1', 'Sun, 08-Nov-2022 02:08:07 PM'),
(25, 24, 23, 2, '2022/024/197', 'second', 2, 'S1 - S2', 'Sun, 15-Nov-2022 02:25:27 PM'),
(26, 26, 24, 8, '2023/026/1183', 'first', 4, 'F01 - F04', 'Fri, 17-Sep-2023 04:25:09 PM'),
(27, 98, 25, 7, '2023/098/198', 'first', 2, 'F1 - F2', 'Wed, 13-Oct-2023 05:17:54 AM'),
(28, 99, 26, 7, '2023/099/157', 'second', 1, 'S1', 'Wed, 13-Oct-2023 05:28:54 AM'),
(29, 100, 27, 7, '2023/0100/1134', 'second', 1, 'S1', 'Wed, 13-Oct-2023 05:39:18 AM'),
(30, 101, 39, 7, '2023/0101/1116', 'second', 1, 'S1', 'Wed, 13-Oct-2023 06:15:30 AM'),
(31, 102, 40, 7, '2023/0102/1502', 'first', 1, 'F1', 'Wed, 13-Oct-2023 06:18:10 AM'),
(32, 103, 43, 7, '2023/0103/1792', 'second', 2, 'S1 - S002', 'Wed, 13-Oct-2023 11:02:56 AM'),
(33, 103, 44, 8, '2023/0103/3809', 'second', 1, 'S3', 'Wed, 13-Oct-2023 02:21:40 PM'),
(34, 104, 45, 8, '2023/0104/1526', 'first', 2, 'F1 - F2', 'Wed, 13-Oct-2023 05:22:15 PM');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(400) NOT NULL,
  `response` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `message`, `response`) VALUES
(1, 3, 'This is a demo test.', NULL),
(3, 6, 'Demo Test - 2', 'Are you sure that this is another test? '),
(8, 4, 'This is a feedback text', NULL),
(9, 6, 'Test Test Test Test Test', NULL),
(11, 8, 'This is a demo test for feedback sections!!!', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(40) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `loc` varchar(40) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `password`, `phone`, `address`, `loc`, `status`) VALUES
(1, 'Customer One', 'pas1o@mail.com', '1f87051e29a6927b2e6651dfb9b66387', '0780100000', 'No. 20 Aiyeteju Street', 'f3fc8566140434f0a3f47303c62d5146.jpg', 1),
(2, 'Adelabu Simbiat', 'jobowonubi@otrs.com', '1526755d438e395e551f229a484f8a1d', '3000002000', 'No. 30 Tanke Ilorin', 'f3fc8566140434f0a3f47303c62d5146.jpg', 1),
(3, 'Customer Two', 'pass2@mail.com', 'c3a19571f1271af5f27a9582377b7d4a', '1400000020', 'abrahamjasmine', 'f3fc8566140434f0a3f47303c62d5146.jpg', 0),
(4, 'Customer Three', 'pass3@mail.com', '1dd76b458af8df200a097c5b061df9b1', '9000001000', 'No. 589 Ilorin', 'f3fc8566140434f0a3f47303c62d5146.jpg', 1),
(5, 'Customer Four', 'pass4@mail.com', 'd780455a563c7c5dbfb74a51785ad949', '0000010020', 'Shagamu', 'f3fc8566140434f0a3f47303c62d5146.jpg', 1),
(6, 'Test Customer', 'testpass@mail.com', 'abe1bcf64eb68c39847b962e8caadadf', '0000002000', 'Ilorin', 'f3fc8566140434f0a3f47303c62d5146.jpg', 1),
(7, 'Liam Moore', 'liamoore@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '7000000000', '7014 Allace Road', 'f3fc8566140434f0a3f47303c62d5146.jpg', 1),
(8, 'Demo Account', 'demoaccount@mail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '7800000000', '100 Demo Address', '404a6378027a553d980b99162a5b4ce8.png', 1);
(9, 'Kipkosgei Kelvin', 'kelvinkipkosgeisanga@gmail.com', '1234', '0111823379', '00232 ruiru', '404a6378027a553d980b99162a5b4ce8.png', 1);

-- --------------------------------------------------------


--
-- Table structure for table `organizer`
--
CREATE TABLE `organizer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(40) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `loc` varchar(40) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organizer`
--

INSERT INTO `organizer` (`id`, `name`, `email`, `password`, `phone`, `address`, `loc`, `status`) VALUES
(1, 'organizer One', 'pas1o@mail.com', '1f87051e29a6927b2e6651dfb9b66387', '0780100000', 'No. 20 Aiyeteju Street', 'f3fc8566140434f0a3f47303c62d5146.jpg', 1),
(2, 'Adelabu Simbiat', 'jobowonubi@otrs.com', '1526755d438e395e551f229a484f8a1d', '3000002000', 'No. 30 Tanke Ilorin', 'f3fc8566140434f0a3f47303c62d5146.jpg', 1),
(3, 'Organizer Two', 'pass2@mail.com', 'c3a19571f1271af5f27a9582377b7d4a', '1400000020', 'abrahamjasmine', 'f3fc8566140434f0a3f47303c62d5146.jpg', 0),
(4, 'organizer Three', 'pass3@mail.com', '1dd76b458af8df200a097c5b061df9b1', '9000001000', 'No. 589 Ilorin', 'f3fc8566140434f0a3f47303c62d5146.jpg', 1),
(5, 'organizer Four', 'pass4@mail.com', 'd780455a563c7c5dbfb74a51785ad949', '0000010020', 'Shagamu', 'f3fc8566140434f0a3f47303c62d5146.jpg', 1),
(6, 'Test organizer', 'testpass@mail.com', 'abe1bcf64eb68c39847b962e8caadadf', '0000002000', 'Ilorin', 'f3fc8566140434f0a3f47303c62d5146.jpg', 1),
(7, 'Liam Moore', 'liamoore@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '7000000000', '7014 Allace Road', 'f3fc8566140434f0a3f47303c62d5146.jpg', 1),
(8, 'Demo Account', 'demoaccount@mail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '7800000000', '100 Demo Address', '404a6378027a553d980b99162a5b4ce8.png', 1);
(9, 'Kipkosgei Kelvin', 'kelvinkipkosgeisanga@gmail.com', '1234', '0111823379', '00232 ruiru', '404a6378027a553d980b99162a5b4ce8.png', 1);
(10, 'organizer Five', 'org5@mail.com', 'd780455a563c7c5dbfb74a51785ad949', '0000010020', 'Johannesburg', 'f3fc8566140434f0a3f47303c62d5146.jpg', 1),
(11, 'Organizer six', 'orgs6@mail.com', 'abe1bcf64eb68c39847b962e8caadadf', '0000002000', 'Eldoret', 'f3fc8566140434f0a3f47303c62d5146.jpg', 1),
(12, 'Kelly kipkoech', 'kelly@gmail.com', 'd780455a563c7c5dbfb74a51785ad949', '0000010020', 'Njoro', 'f3fc8566140434f0a3f47303c62d5146.jpg', 1),
(13, 'Millicent', 'milly@mail.com', 'abe1bcf64eb68c39847b962e8caadadf', '0000002000', 'Egerton', 'f3fc8566140434f0a3f47303c62d5146.jpg', 1),
-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `ref` varchar(100) NOT NULL,
  `date` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `customer_id`, `schedule_id`, `amount`, `ref`, `date`) VALUES
(12, 4, 5, '500', 'oyki20masb', 'Tue, 11-Aug-2020 11:52:19 AM'),
(14, 4, 6, '1000', 'oyki20masb', 'Tue, 11-Aug-2020 11:52:19 AM'),
(15, 3, 5, '300', '5gtnjnzclw', 'Tue, 11-Aug-2020 12:48:38 PM'),
(16, 3, 6, '1500', 'dzwl1488r0', 'Tue, 11-Aug-2020 01:08:20 PM'),
(18, 4, 8, '100', 'hja9zvtmgk', 'Tue, 11-Aug-2020 01:12:58 PM'),
(19, 1, 18, '150', '3TVSHVBQII', 'Tue, 11-Aug-2020 04:10:29 PM'),
(20, 5, 20, '150', '84JP4U5LKZ', 'Mon, 31-Aug-2020 11:36:57 PM'),
(21, 6, 20, '100', 'VXIZSCHMOG', 'Fri, 06-Nov-2020 10:10:44 PM'),
(22, 6, 22, '50', 'TDHRBZTZOH', 'Sun, 08-Nov-2020 02:08:07 PM'),
(23, 2, 24, '50', '4TRM9FIFEV', 'Sun, 15-Nov-2020 02:25:27 PM'),
(24, 8, 26, '70', '1QXPYSUTOI', 'Fri, 17-Sep-2021 04:25:09 PM'),
(25, 7, 98, '300', 'FIPJBLU5LC', 'Wed, 13-Oct-2021 05:17:54 AM'),
(26, 7, 99, '800', 'NKMGVH44QG', 'Wed, 13-Oct-2021 05:28:54 AM'),
(27, 7, 100, '50', 'NS5IEEK1HS', 'Wed, 13-Oct-2021 05:39:18 AM'),
(39, 7, 101, '450', 'OEPPIM6X9H', 'Wed, 13-Oct-2021 06:15:30 AM'),
(40, 7, 102, '150', 'M07FP4QTOV', 'Wed, 13-Oct-2021 06:18:10 AM'),
(43, 7, 103, '800', 'RITK5E5GDM', 'Wed, 13-Oct-2021 11:02:56 AM'),
(44, 8, 103, '600', 'H6CMTHBJUU', 'Wed, 13-Oct-2021 02:21:40 PM'),
(45, 8, 104, '800', 'KH70GOC8KO', 'Wed, 13-Oct-2021 05:22:15 PM');

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `id` int(11) NOT NULL,
  `venue` varchar(100) NOT NULL,
  `link` varchar(100) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`id`, `venue`, `link`) VALUES
(3, 'NJORO','MEETINGLINK'),
(4, 'NAKURU','MEETINGLINK'),
(5, 'NAIROBI','MEETINGLINK'),
(6, 'MOMBASA','MEETINGLINK'),
(7,  'MOLO','MEETINGLINK'),
(8,  'ELDORET','MEETINGLINK'),
(9,  'NAIROBI','MEETINGLINK'),
(10, 'ELDORET','MEETINGLINK'),
(11, 'NAKURU','MEETINGLINK'),
(12, 'EGERTON','MEETINGLINK'),
(13, 'NJORO','MEETINGLINK'),
(14, 'NAIVASHA','MEETINGLINK'),
(15, 'NAKURU','MEETINGLINK'),
(16, 'THIKA','MEETINGLINK'),
(17, 'GILGIL','MEETINGLINK'),
(18, 'MOLO','MEETINGLINK');


-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `organizer_id` int(11) NOT NULL,
  `date` varchar(30) NOT NULL,
  `time` varchar(10) NOT NULL,
  `first_fee` float NOT NULL,
  `second_fee` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `event_id`, `organizer_id`, `date`, `time`, `first_fee`, `second_fee`) VALUES
(5, 9, 7, '11-10-2023', '18:30', 500, 300),
(6, 11, 6, '11-10-2023', '18:30', 1500, 1000),
(7, 11, 5, '12-10-2023', '18:30', 1000, 800),
(8, 11, 4, '13-10-2023', '18:30', 150, 100),
(9, 11, 3, '14-10-2023', '18:30', 70, 50),
(10, 7, 5, '15-10-2023', '18:30', 1000, 800),
(11, 9, 7, '16-11-2023', '18:30', 500, 300),
(12, 10, 5, '17-11-2023', '18:30', 1000, 800),
(16, 2, 7, '16-11-2023', '11:00', 500,300),
(17, 9, 3, '23-11-2023', '11:00', 70, 50),
(18, 10, 4, '30-11-2023', '11:00', 150, 100),
(20, 8, 4, '07-12-2023', '22:24', 150, 100),
(22, 8, 3, '08-12-2023', '15:13', 70, 50),
(23, 3, 3, '07-12-2023', '15:10', 70, 50),
(24, 2, 3, '15-12-2023', '15:22', 70, 50),
(25, 1, 3, '11-06-2024', '05:37', 70, 50),
(26, 2, 3, '18-09-2024', '09:00', 70, 50),
(97, 11, 8, '11-10-2024', '11:05', 550, 350),
(98, 10, 12, '12-10-2024', '09:00', 400, 300),
(99, 8, 11, '12-10-2024', '11:10', 800, 600),
(100, 9, 12, '12-10-2024', '12:20', 70, 50),
(101, 2, 10, '12-10-2024', '22:59', 450, 350),
(102, 7, 4, '12-10-2024', '11:02', 150, 100),
(103, 9, 11, '12-10-2024', '04:45', 800, 600),
(104, 12, 10, '14-10-2024', '10:00', 800, 600);

-- --------------------------------------------------------


--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'admin@admin.com', 'D00F5D5217896FB7FD601412CB890830');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event` (`event`),
  ADD KEY `organizer` (`organizer`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);


--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`);


--
-- Indexes for table `booked`
--
ALTER TABLE `booked`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `schedule_id` (`schedule_id`,`user_id`,`payment_id`) USING BTREE,
  ADD KEY `schedule_id_2` (`schedule_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_id` (`customer_id`,`schedule_id`),
  ADD KEY `customer_id_2` (`customer_id`) USING BTREE,
  ADD KEY `schedule_id` (`schedule_id`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `organizer_id` (`organizer_id`);


--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booked`
--
ALTER TABLE `booked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `organizer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `booked`
--
ALTER TABLE `booked`
  ADD CONSTRAINT `booked_ibfk_1` FOREIGN KEY (`schedule_id`) REFERENCES `schedule` (`id`),
  ADD CONSTRAINT `booked_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`schedule_id`) REFERENCES `schedule` (`id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`event_no`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`organizer_id`) REFERENCES `organizer` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
