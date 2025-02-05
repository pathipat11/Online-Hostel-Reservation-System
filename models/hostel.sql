-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2025 at 02:35 PM
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
-- Database: `hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookingdetail`
--

CREATE TABLE `bookingdetail` (
  `bkdetail_id` int(11) NOT NULL,
  `room_id` varchar(10) NOT NULL,
  `price` int(11) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `booking_id` int(11) NOT NULL,
  `status_payment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookingfood`
--

CREATE TABLE `bookingfood` (
  `bkfood_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `food_name` varchar(50) NOT NULL,
  `food_price` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status_payment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_status` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int(11) NOT NULL,
  `food_name` varchar(50) NOT NULL,
  `food_price` double NOT NULL,
  `food_picture` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `food_name`, `food_price`, `food_picture`) VALUES
(1, 'กะเพราหมูสับ', 55, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQerkHC1Ar7wY-An5zcTvSkY9lUMiCAris76Q&usqp=CAU'),
(2, 'ปูผัดผงกะหรี่', 189, 'https://i.ytimg.com/vi/11QJBR5ZPyw/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLBYyBvWmceeRyS9m7s55LLSkDs25Q'),
(3, 'ราดหน้าหมู', 45, 'https://img-global.cpcdn.com/recipes/ccea53fbfc1b1a4a/680x482cq70/%E0%B8%A3%E0%B8%9B-%E0%B8%AB%E0%B8%A5%E0%B8%81-%E0%B8%82%E0%B8%AD%E0%B8%87-%E0%B8%AA%E0%B8%95%E0%B8%A3-%E0%B8%A3%E0%B8%B2%E0%B8%94%E0%B8%AB%E0%B8%99%E0%B8%B2%E0%B8%AB%E0%B8%A1%E0%B8%AB%E0%B8%A1%E0%B8%81.webp'),
(4, 'สเต็กเนื้อริบอาย', 289, 'https://scontent-sin6-4.xx.fbcdn.net/v/t1.6435-9/35963759_1836551676411336_3280853134330560512_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=dd63ad&_nc_eui2=AeH7Ok_rZmoExuBhnlYOHn29a7mhNlnRFx9ruaE2WdEXH5qEi_hT6Mn8MwRJMORxdnMJJVhTq0Tuz1uK38IeNrWL&_nc_ohc=krYlhHaH8BQAX9ZoRqa&_nc_ht=scontent-sin6-4.xx&oh=00_AfCMc4Norko_W2RA_NHe9AJimzZDuPqRxBhsLHXlL8LysA&oe=65E7F066'),
(5, 'สปาเก็ตตี้คาโบนาร่า', 89, 'https://img-global.cpcdn.com/recipes/67cb4833a07f7acc/1200x630cq70/photo.jpg'),
(6, 'สปาเก็ตตี้ซอสมะเขือเทศ', 89, 'https://img-global.cpcdn.com/recipes/5a5e1d32a7875825/1200x630cq70/photo.jpg'),
(7, 'ไก่ผัดเม็ดมะม่วง', 120, 'https://s.isanook.com/wo/0/ud/16/80837/80837-thumbnail.jpg'),
(8, 'แกงมัสมั่นแกะ', 350, 'https://www.siambrasserie.com/wp-content/uploads/2020/04/%E0%B8%A1%E0%B8%B1%E0%B8%AA%E0%B8%A1%E0%B8%B1%E0%B9%88%E0%B8%99%E0%B9%81%E0%B8%81%E0%B8%B0.jpg'),
(9, 'ปีกไก่ทอด', 80, 'https://food.mthai.com/app/uploads/2017/07/Chicken-wings-fried-fish-sauce.jpg'),
(10, 'เกี๊ยวซ่า', 100, 'https://shopee.co.th/blog/wp-content/uploads/2021/04/%E0%B9%80%E0%B8%81%E0%B8%B5%E0%B9%8A%E0%B8%A2%E0%B8%A7%E0%B8%8B%E0%B9%88%E0%B8%B2-2.jpg'),
(11, 'ข้าวผัดปูถาดใหญ่', 250, 'data:image/jpeg;base64,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'),
(12, 'ยำทะเล', 280, 'https://www.gourmetandcuisine.com/Images/cooking/recipes/recipe_986detail.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `createDate` date NOT NULL,
  `isActive` bit(1) DEFAULT NULL,
  `picture` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`username`, `password`, `name`, `email`, `mobile`, `createDate`, `isActive`, `picture`) VALUES
('admin', '1234', 'pathipat mattra', 'pathipat.m@kkumail.com', '0990123456', '2024-02-05', b'1', ''),
('DORADOM ', '1234', 'DORADOM', 'DOM@gmail.com', '0909232812', '2024-02-06', b'0', ''),
('DORADUNK', '1111', 'DORADUNK', 'DUNK@gmail.com', '0990123456', '2024-02-06', b'1', ''),
('MORABOSS', '1111', 'MORABOSS', 'BOSS@gmail.com', '0898765432', '2024-02-06', b'1', ''),
('MORAGORN', '4321', 'MORAGORN', 'MORAGORN@gmail.com', '0812123121', '2024-02-06', b'1', ''),
('pathipat', '12341234', 'Pathipat Mattra', 'pathipat.m@kkumail.com', '0991234123123', '2024-02-28', b'1', 'data:image/jpeg;base64,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');

-- --------------------------------------------------------

--
-- Table structure for table `payment_food`
--

CREATE TABLE `payment_food` (
  `bkfood_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `status_payment` varchar(50) NOT NULL,
  `p_method` varchar(50) DEFAULT NULL,
  `food_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_room`
--

CREATE TABLE `payment_room` (
  `number` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `status_payment` varchar(50) NOT NULL,
  `p_method` varchar(50) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `number` int(11) NOT NULL,
  `room_id` varchar(11) NOT NULL,
  `Room_remark` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `picture` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`number`, `room_id`, `Room_remark`, `price`, `picture`) VALUES
(1, 'R1', '1 ห้องน้ำ 1 เตียง เหมาะสำหรับนอนกับคนรักหรือคนรู้จัก', 2500, 'https://pix8.agoda.net/hotelImages/44841/-1/4813dd70ebad4171209eca03308d3926.jpg?ca=17&ce=1&s=1024x768'),
(2, 'R2', 'เตียงนุ่ม วิวธรรมชาติ พร้อมรับแสงแดดยามเช้า', 3000, 'https://pix8.agoda.net/hotelImages/544217/-1/822ee4b23e48b51d5dba386ea8e2a022.jpg?ce=0&s=1024x768'),
(3, 'R3', 'ห้องสไตล์วัยรุ่น มีชั้นวางของและโคมไฟ ห้องดูสบายตา', 2200, 'https://pix8.agoda.net/hotelImages/511/51127/51127_17080217450054849967.jpg?ca=6&ce=1&s=1024x'),
(4, 'R4', 'ห้องพักสไตล์เรียบง่าย เหมาะสำหรับคนทำงานพร้อมวิวภูเขา', 2800, 'https://pix8.agoda.net/hotelImages/845/84508/84508_20061615020090907682.jpg?ca=12&ce=1&s=1024x'),
(5, 'R5', 'ห้องเล็กๆเหมาะกับการอยู่อาศัยคนเดียว ตกแต่งสวยงามน่าอยู่', 2200, 'https://q-xx.bstatic.com/xdata/images/hotel/max1024x768/476816322.jpg?k=010a1e14af0dd3333c88f1c9f61f57f5afa0205f610d63431bbe46db41a003b8&o=&s=1024x'),
(6, 'R6', 'ห้องพักสไตล์มินิมอลที่ดูดีและมีราคา ห้องตกแต่งด้วยโทนสีขาวสวยงาม', 1700, 'https://pix8.agoda.net/hotelImages/34768043/-1/50da14e4918072e7cda0a6b00cc64ed4.jpg?ce=0&s=1024x'),
(7, 'R7', 'ห้องพักสไตล์เรียบง่าย ตกแต่งสวยงามเป็นธรรมชาติดูล้ำลึก', 3000, 'https://ak-d.tripcdn.com/images/0201o1200085gviqoD397_R_960_660_R5_D.webp'),
(8, 'R8', 'ห้องศิลปะ ตกแต่งด้วยภาพแสดงงานศิลปะที่สวยงาม', 3700, 'https://q-xx.bstatic.com/xdata/images/hotel/max1024x768/129848933.jpg?k=b178e521b9bd04b6e7a788868b97c750556e57f40c0f4e1b47043d54310de8a9&o='),
(9, 'R9', 'ห้องตกแต่งเป็นโทนสีเดียวกับไม้ ดูเรียบง่ายแต่สวยงาม', 3600, 'https://pix8.agoda.net/property/28818155/612997022/51136e55fa2746918f9e8478435b0584.jpeg?ce=0&s=1024x'),
(12, 'R10', 'ห้องสไตล์น่ารัก 2 เตียง เหมาะสำหรับครอบครัว', 3000, 'https://pix8.agoda.net/hotelImages/547502/-1/e5dd05d790a3cfb7f86cbf3593b17018.jpg?ce=0&s=1024x'),
(13, 'R11', 'ห้องสไตล์เรียบง่าย พร้อมวิวทะเลสาบ และอ่างน้ำ', 3400, 'https://pix8.agoda.net/hotelImages/266733/-1/bc1612499f0884c636244d77d6a8185c.jpg?ce=0&s=1024x'),
(14, 'R12', 'ห้องสไตล์รูหรา เรียบๆสบายๆ น่าพักพร้อมเพื่อนๆและครอบครัว', 3000, 'https://q-xx.bstatic.com/xdata/images/hotel/max1024x768/437091895.jpg?k=035378ac99829e7c2c2afdd6194bdaa96291a7619e5415f6b190075f5a31c042&o=&s=1024x');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookingdetail`
--
ALTER TABLE `bookingdetail`
  ADD PRIMARY KEY (`bkdetail_id`);

--
-- Indexes for table `bookingfood`
--
ALTER TABLE `bookingfood`
  ADD PRIMARY KEY (`bkfood_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `payment_food`
--
ALTER TABLE `payment_food`
  ADD PRIMARY KEY (`bkfood_id`);

--
-- Indexes for table `payment_room`
--
ALTER TABLE `payment_room`
  ADD PRIMARY KEY (`number`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookingdetail`
--
ALTER TABLE `bookingdetail`
  MODIFY `bkdetail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookingfood`
--
ALTER TABLE `bookingfood`
  MODIFY `bkfood_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payment_food`
--
ALTER TABLE `payment_food`
  MODIFY `bkfood_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_room`
--
ALTER TABLE `payment_room`
  MODIFY `number` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
