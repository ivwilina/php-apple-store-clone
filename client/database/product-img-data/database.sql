-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2023 at 08:14 PM
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
-- Database: `baitaplon-final-test02`
--

-- --------------------------------------------------------

--
-- Table structure for table `bag`
--

CREATE TABLE `bag` (
  `BagId` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `BagItem` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`BagItem`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `BillId` varchar(100) NOT NULL,
  `TotalPrice` varchar(100) NOT NULL,
  `CustomerInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`CustomerInfo`)),
  `BillItem` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`BillItem`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`BillId`, `TotalPrice`, `CustomerInfo`, `BillItem`) VALUES
('2023/10/11-10:50:42', '85360000', '[\"Seira Parradox\",\"0123456789\",\"119 Baker London England\"]', '[[\"iPhone 14 Plus\",\"256GB\",\"Xanh\",\"23,990,000\",\"2\"],[\"iPad Air\",\"WiFi 256GB\",\"Trắng\",\"18,690,000\",\"1\"],[\"iPad Air\",\"WiFi 256GB\",\"Xanh\",\"18,690,000\",\"1\"]]'),
('2023/10/11-10:56:38', '23990000', '[\"Seira Parradox\",\"0123456789\",\"119 Baker London England\"]', '[[\"iPhone 14 Plus\",\"256GB\",\"Đỏ\",\"23,990,000\",\"1\"]]'),
('2023/10/11-19:40:59', '24990000', '[\"Seira Vasta\",\"0123456780\",\"109 Baker London England\"]', '[[\"iPhone 14 Pro\",\"128GB\",\"Trắng\",\"24,990,000\",\"1\"]]'),
('2023/10/17-10:57:19', '23990000', '[\"Seira Parradox\",\"0123456789\",\"119 Baker London England\"]', '[[\"iPhone 14 Plus\",\"256GB\",\"Xanh\",\"23,990,000\",\"1\"]]'),
('2023/10/17-10:59:33', '80670000', '[\"Seira Parradox\",\"0123456789\",\"119 Baker London England\"]', '[[\"Macbook Air M2\",\"8GB-256GB\",\"Xám\",\"26,890,000\",\"1\"],[\"iPad Air\",\"WiFi 64GB\",\"Hồng\",\"13,790,000\",\"1\"],[\"iPhone 14 Plus\",\"128GB\",\"Đỏ\",\"21,490,000\",\"1\"]]'),
('2023/10/17-19:48:36', '21490000', '[\"Seira Vasta\",\"0123456780\",\"109 Baker London England\"]', '[[\"iPhone 14 Plus\",\"128GB\",\"Đỏ\",\"21,490,000\",\"1\"]]'),
('2023/10/17-2:14:54', '47980000', '[\"Seira Parradox\",\"0123456789\",\"119 Baker London England\"]', '[[\"iPhone 14 Plus\",\"256GB\",\"Tím\",\"23,990,000\",\"1\"],[\"iPhone 14 Plus\",\"128GB\",\"Trắng\",\"21,490,000\",\"1\"]]'),
('2023/10/17-2:21:20', '47980000', '[\"Seira Parradox\",\"0123456789\",\"119 Baker London England\"]', '[[\"iPhone 14 Plus\",\"256GB\",\"Tím\",\"23,990,000\",\"1\"],[\"iPhone 14 Plus\",\"128GB\",\"Trắng\",\"21,490,000\",\"1\"]]');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ItemName` varchar(100) NOT NULL,
  `ItemType` varchar(100) NOT NULL,
  `Specs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`Specs`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--

INSERT INTO `product` (`ItemName`, `ItemType`, `Specs`) VALUES
('iPad Air', 'iPad', '{ \"id\": \"ipad-air\", \"information\": [ { \"infoname\":\"Màn hình\", \"detail\":\"10.9 inches Liquid Retina\" }, { \"infoname\":\"Camera sau\", \"detail\":\"12MP\" }, { \"infoname\":\"Camera trước\", \"detail\":\"12MP\" }, { \"infoname\":\"Chipset\", \"detail\":\"Chip M1\" }, { \"infoname\":\"Ram\", \"detail\":\"8GB\" }, { \"infoname\":\"Rom\", \"detail\":\"64GB-256GB\" }, { \"infoname\":\"Pin\", \"detail\":\"28.6 Wh (~ 7587 mAh)\" }, { \"infoname\":\"Hệ điều hành\", \"detail\":\"iPadOS\" } ], \"choice\": [ { \"size\": \"WiFi 64GB\", \"price\": \"13790000\" }, { \"size\": \"WiFi 256GB\", \"price\": \"18690000\" }, { \"size\": \"5G 64GB\", \"price\": \"17190000\" }, { \"size\": \"5G 256GB\", \"price\": \"20990000\" } ], \"color\": [ { \"color\": \"Hồng\", \"hex\": \"#d34185\" }, { \"color\": \"Xanh\", \"hex\": \"#a6b9ca\" }, { \"color\": \"Trắng\", \"hex\": \"white\" }, { \"color\": \"Vàng\", \"hex\": \"#fff498\" }, { \"color\": \"Tím\", \"hex\": \"#cc42ac\" } ], \"imagesource\": [ { \"color\": \"Hồng\", \"source\": \"/baitaplon-final/databases/product-img-data/ipad/ipad-air-pink.jpg\" }, { \"color\": \"Xanh\", \"source\": \"/baitaplon-final/databases/product-img-data/ipad/ipad-air-blue.webp\" }, { \"color\": \"Trắng\", \"source\": \"/baitaplon-final/databases/product-img-data/ipad/ipad-air-grey.jpg\" }, { \"color\": \"Vàng\", \"source\": \"/baitaplon-final/databases/product-img-data/ipad/ipad-air-whitegold.webp\" }, { \"color\": \"Tím\", \"source\": \"/baitaplon-final/databases/product-img-data/ipad/ipad-air-purple.jpg\" } ] }'),
('iPhone 14', 'iPhone', '{ \"id\": \"ip14\", \"information\": [ { \"infoname\":\"Màn hình\", \"detail\":\"6,1 inch Super Retina XDR OLED\" }, { \"infoname\":\"Camera sau\", \"detail\":\"12MP|f1.5 (Wide), 12MP|f2.4 (Ultra Wide)\" }, { \"infoname\":\"Camera trước\", \"detail\":\"12MP|f1.9 (Wide)\" }, { \"infoname\":\"Chipset\", \"detail\":\"Apple A15 Bionic (5nm)\" }, { \"infoname\":\"Ram\", \"detail\":\"6GB\" }, { \"infoname\":\"Rom\", \"detail\":\"128GB-512GB\" }, { \"infoname\":\"Pin\", \"detail\":\"3,279mAH\" }, { \"infoname\":\"Hệ điều hành\", \"detail\":\"IOS 16\" } ], \"choice\": [ { \"size\": \"128GB\", \"price\": \"18790000\" }, { \"size\": \"256GB\", \"price\": \"21790000\" }, { \"size\": \"512GB\", \"price\": \"24790000\" } ], \"color\": [ { \"color\": \"Đỏ\", \"hex\": \"red\" }, { \"color\": \"Xanh\", \"hex\": \"#a6b9ca\" }, { \"color\": \"Trắng\", \"hex\": \"white\" }, { \"color\": \"Vàng\", \"hex\": \"#fff498\" }, { \"color\": \"Đen\", \"hex\": \"#323940\" } ], \"imagesource\": [ { \"color\": \"Đen\", \"source\": \"/baitaplon-final/databases/product-img-data/iphone/ip14-black.jpg\" }, { \"color\": \"Xanh\", \"source\": \"/baitaplon-final/databases/product-img-data/iphone/ip14-blue.jpg\" }, { \"color\": \"Đỏ\", \"source\": \"/baitaplon-final/databases/product-img-data/iphone/ip14-red.jpg\" }, { \"color\": \"Trắng\", \"source\": \"/baitaplon-final/databases/product-img-data/iphone/ip14-white.jpg\" }, { \"color\": \"Vàng\", \"source\": \"/baitaplon-final/databases/product-img-data/iphone/ip14-yellow.webp\" } ] }'),
('iPhone 14 Plus', 'iPhone', '{ \"id\": \"ip14p\", \"information\": [ { \"infoname\":\"Màn hình\", \"detail\":\"6.7 inches Super Retina XDR OLED\" }, { \"infoname\":\"Camera sau\", \"detail\":\"12MP, 26 mm, ƒ/1.5, 12MP, 13 mm, ƒ/2.4, 120°\" }, { \"infoname\":\"Camera trước\", \"detail\":\"12MP khẩu độ f/1.9, Autofocus\" }, { \"infoname\":\"Chipset\", \"detail\":\"Apple A15 Bionic (5nm)\" }, { \"infoname\":\"Ram\", \"detail\":\"6GB\" }, { \"infoname\":\"Rom\", \"detail\":\"128GB-512GB\" }, { \"infoname\":\"Pin\", \"detail\":\"4,325mAh\" }, { \"infoname\":\"Hệ điều hành\", \"detail\":\"IOS 16\" } ], \"choice\": [ { \"size\": \"128GB\", \"price\": \"21490000\" }, { \"size\": \"256GB\", \"price\": \"23990000\" }, { \"size\": \"512GB\", \"price\": \"25490000\" } ], \"color\": [ { \"color\": \"Đỏ\", \"hex\": \"red\" }, { \"color\": \"Xanh\", \"hex\": \"#a6b9ca\" }, { \"color\": \"Trắng\", \"hex\": \"white\" }, { \"color\": \"Tím\", \"hex\": \"#cc42ac\" }, { \"color\": \"Đen\", \"hex\": \"#323940\" } ], \"imagesource\": [ { \"color\": \"Đen\", \"source\": \"/baitaplon-final/databases/product-img-data/iphone/ip14-p-black.jpg\" }, { \"color\": \"Xanh\", \"source\": \"/baitaplon-final/databases/product-img-data/iphone/ip14-p-blue.jpg\" }, { \"color\": \"Đỏ\", \"source\": \"/baitaplon-final/databases/product-img-data/iphone/ip14-p-red.jpg\" }, { \"color\": \"Trắng\", \"source\": \"/baitaplon-final/databases/product-img-data/iphone/ip14-p-white.webp\" }, { \"color\": \"Tím\", \"source\": \"/baitaplon-final/databases/product-img-data/iphone/ip14-p-purple.jpg\" } ] }'),
('iPhone 14 Pro', 'iPhone', '{ \"id\": \"ip14pr\", \"information\": [ { \"infoname\":\"Màn hình\", \"detail\":\"6.1 inches Super Retina XDR OLED\" }, { \"infoname\":\"Camera sau\", \"detail\":\"48 MP, f/1.8, 24mm, OIS|12 MP, f/2.2, 120˚, 1.4µm|12 MP, f/2.8, PDAF, OIS, 3x optical zoom|Cảm biến độ sâu TOF 3D LiDAR\" }, { \"infoname\":\"Camera trước\", \"detail\":\"12 MP, f/1.9, 23mm, PDAF\" }, { \"infoname\":\"Chipset\", \"detail\":\"Apple A16 Bionic 6 nhân\" }, { \"infoname\":\"Ram\", \"detail\":\"6GB\" }, { \"infoname\":\"Rom\", \"detail\":\"128GB-1TB\" }, { \"infoname\":\"Pin\", \"detail\":\"3,200mAh\" }, { \"infoname\":\"Hệ điều hành\", \"detail\":\"IOS 16\" } ], \"choice\": [ { \"size\": \"128GB\", \"price\": \"24990000\" }, { \"size\": \"256GB\", \"price\": \"27390000\" }, { \"size\": \"512GB\", \"price\": \"32990000\" }, { \"size\": \"1TB\", \"price\": \"33990000\" } ], \"color\": [ { \"color\": \"Vàng\", \"hex\": \"#fff498\" }, { \"color\": \"Trắng\", \"hex\": \"white\" }, { \"color\": \"Tím\", \"hex\": \"#cc42ac\" }, { \"color\": \"Đen\", \"hex\": \"#323940\" } ], \"imagesource\": [ { \"color\": \"Đen\", \"source\": \"/baitaplon-final/databases/product-img-data/iphone/ip14-pr-black.png\" }, { \"color\": \"Trắng\", \"source\": \"/baitaplon-final/databases/product-img-data/iphone/ip14-pr-silver.png\" }, { \"color\": \"Vàng\", \"source\": \"/baitaplon-final/databases/product-img-data/iphone/ip14-pr-gold.webp\" }, { \"color\": \"Tím\", \"source\": \"/baitaplon-final/databases/product-img-data/iphone/ip14-pr-purple.webp\" } ] }'),
('iPhone 14 Pro Max', 'iPhone', '{ \"id\": \"ip14prm\", \"information\": [ { \"infoname\":\"Màn hình\", \"detail\":\"6.7 inches Super Retina XDR OLED\" }, { \"infoname\":\"Camera sau\", \"detail\":\"48 MP, f/1.8, 24mm, 1.22µm, PDAF, OIS|12 MP, f/2.2, 13mm, 120˚, 1.4µm, PDAF|12 MP, f/2.8, 77mm (telephoto), PDAF, OIS, 3x optical zoom|Cảm biến độ sâu TOF 3D LiDAR\" }, { \"infoname\":\"Camera trước\", \"detail\":\"12 MP, f/1.9, 23mm, 1/3.6, PDAF\" }, { \"infoname\":\"Chipset\", \"detail\":\"Apple A16 Bionic 6-core\" }, { \"infoname\":\"Ram\", \"detail\":\"6GB\" }, { \"infoname\":\"Rom\", \"detail\":\"128GB-1TB\" }, { \"infoname\":\"Pin\", \"detail\":\"4.323mAh\" }, { \"infoname\":\"Hệ điều hành\", \"detail\":\"IOS 16\" } ], \"choice\": [ { \"size\": \"128GB\", \"price\": \"26390000\" }, { \"size\": \"256GB\", \"price\": \"29290000\" }, { \"size\": \"512GB\", \"price\": \"35190000\" }, { \"size\": \"1TB\", \"price\": \"41790000\" } ], \"color\": [ { \"color\": \"Vàng\", \"hex\": \"#fff498\" }, { \"color\": \"Trắng\", \"hex\": \"white\" }, { \"color\": \"Tím\", \"hex\": \"#cc42ac\" }, { \"color\": \"Đen\", \"hex\": \"#323940\" } ], \"imagesource\": [ { \"color\": \"Đen\", \"source\": \"/baitaplon-final/databases/product-img-data/iphone/ip14-prm-black.png\" }, { \"color\": \"Trắng\", \"source\": \"/baitaplon-final/databases/product-img-data/iphone/ip14-prm-silver.png\" }, { \"color\": \"Vàng\", \"source\": \"/baitaplon-final/databases/product-img-data/iphone/ip14-prm-gold.webp\" }, { \"color\": \"Tím\", \"source\": \"/baitaplon-final/databases/product-img-data/iphone/ip14-prm-purple.webp\" } ] }'),
('Macbook Air M2', 'Macbook', '{\"id\":\"macbook-air-m2\",\"information\":[{\"infoname\":\"Màn hình\",\"detail\":\"13.6 inches IPS Liquid Retina Display\"},{\"infoname\":\"CPU\",\"detail\":\"Apple M2\"},{\"infoname\":\"Check\",\"detail\":\"Đã sửa\"}],\"choice\":[{\"size\":\"8GB-256GB\",\"price\":\"26890000\"},{\"size\":\"zzz\",\"price\":\"aa\"},{\"size\":\"zzz\",\"price\":\"aaaa\"}],\"color\":[{\"color\":\"Xám\",\"hex\":\"grey\"},{\"color\":\"Đen\",\"hex\":\"black\"},{\"color\":\"hhihi\",\"hex\":\"haha\"}],\"imagesource\":[{\"color\":\"Ảnh Nền\",\"source\":\"/baitaplon-final/databases/product-img-data/macbook/macbook-air-m2-thumbnail.jpg\"},{\"color\":\"Xám\",\"source\":\"/baitaplon-final/databases/product-img-data/macbook/macbook-air-m2-grey.png\"},{\"color\":\"111\",\"source\":\"222\"}]}');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `TypeID` varchar(100) NOT NULL,
  `ItemType` varchar(100) NOT NULL,
  `Structure` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`Structure`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`TypeID`, `ItemType`, `Structure`) VALUES
('apple-ipad-tablet', 'iPad', '{ \"productName\":[ {\"database\":\"id\"}, {\"vie\":\"Tên sản phẩm\"} ], \"productID\":[ {\"database\":\"id\"}, {\"vie\":\"ID Sản phẩm\"} ], \"productSpecs\":[ {\"database\":\"infomation\"}, {\"vie\":\"Thông số kỹ thuật\"} ], \"productChoice\":[ {\"database\":\"choice\"}, {\"vie\":\"Cấu hình khả dụng\"} ], \"productColor\":[ {\"database\":\"color\"}, {\"vie\":\"Màu sắc sản phẩm\"} ], \"productImageSource\":[ {\"database\":\"imagesource\"}, {\"vie\":\"Hình ảnh sản phẩm\"} ] }'),
('apple-iphone-smartphone', 'iPhone', '{ \"productName\":[ {\"database\":\"id\"}, {\"vie\":\"Tên sản phẩm\"} ], \"productID\":[ {\"database\":\"id\"}, {\"vie\":\"ID Sản phẩm\"} ], \"productSpecs\":[ {\"database\":\"infomation\"}, {\"vie\":\"Thông số kỹ thuật\"} ], \"productChoice\":[ {\"database\":\"choice\"}, {\"vie\":\"Cấu hình khả dụng\"} ], \"productColor\":[ {\"database\":\"color\"}, {\"vie\":\"Màu sắc sản phẩm\"} ], \"productImageSource\":[ {\"database\":\"imagesource\"}, {\"vie\":\"Hình ảnh sản phẩm\"} ] }'),
('apple-mac-laptop', 'Macbook', '{ \"productName\":[ {\"database\":\"id\"}, {\"vie\":\"Tên sản phẩm\"} ], \"productID\":[ {\"database\":\"id\"}, {\"vie\":\"ID Sản phẩm\"} ], \"productSpecs\":[ {\"database\":\"infomation\"}, {\"vie\":\"Thông số kỹ thuật\"} ], \"productChoice\":[ {\"database\":\"choice\"}, {\"vie\":\"Cấu hình khả dụng\"} ], \"productColor\":[ {\"database\":\"color\"}, {\"vie\":\"Màu sắc sản phẩm\"} ], \"productImageSource\":[ {\"database\":\"imagesource\"}, {\"vie\":\"Hình ảnh sản phẩm\"} ] }'),
('apple-watch-smartwatch', 'Watch', '{ \"productName\":[ {\"database\":\"id\"}, {\"vie\":\"Tên sản phẩm\"} ], \"productID\":[ {\"database\":\"id\"}, {\"vie\":\"ID Sản phẩm\"} ], \"productSpecs\":[ {\"database\":\"infomation\"}, {\"vie\":\"Thông số kỹ thuật\"} ], \"productChoice\":[ {\"database\":\"choice\"}, {\"vie\":\"Cấu hình khả dụng\"} ], \"productColor\":[ {\"database\":\"color\"}, {\"vie\":\"Màu sắc sản phẩm\"} ], \"productImageSource\":[ {\"database\":\"imagesource\"}, {\"vie\":\"Hình ảnh sản phẩm\"} ] }');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `PhoneNumber` varchar(10) NOT NULL,
  `EmailAddress` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Username`, `Password`, `Type`, `Name`, `PhoneNumber`, `EmailAddress`, `Address`) VALUES
('admin1', '12345678', 'admin', 'Seira admin', '2314567456', 'admin@example.com', '123 Street'),
('guest01', '12345678', 'user', 'Seira Parradox', '0123456789', 'fake@email', '119 Baker London England'),
('guest02', '12345678', 'user', 'Seira Vasta', '0123456780', 'testted@done', '109 Baker London England'),
('guest03', '12345678', 'user', 'testdone', '0123456777', 'fake@mail.com', 'nothing street'),
('zzzz', 'zzzz', 'user', 'zzzz', '9756733336', 'fake@mail.comzz', 'zzzz');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `Type` varchar(100) NOT NULL,
  `NameType` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`Type`, `NameType`) VALUES
('admin', 'Quản trị viên'),
('user', 'Người dùng');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bag`
--
ALTER TABLE `bag`
  ADD PRIMARY KEY (`BagId`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`BillId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ItemName`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`TypeID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Username`),
  ADD UNIQUE KEY `PhoneNumber` (`PhoneNumber`),
  ADD UNIQUE KEY `EmailAddress` (`EmailAddress`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`Type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
