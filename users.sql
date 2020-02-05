-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2019 at 02:10 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;


--
-- Database: `000793674`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email_add` varchar(1000) NOT NULL,
  `user_password` varchar(1000) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `street_address` varchar(1000) NOT NULL,
  `postal_code` char(6) NOT NULL,
  `credit_card` bigint(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email_add`, `user_password`, `firstname`, `lastname`, `street_address`, `postal_code`, `credit_card`) VALUES
(1, 'katelynthompson@live.ca', '$2y$10$mvQEq6WZLDU0XkPHRLldJ.OxEwjCajAlnRBbnpjq5LiFqY8ePaYOW', 'Sonic', 'The ', 'a', 'A1A1A1', 7563834656575775),
(2, 'oink@mohawkcollege.ca', '$2y$10$2uYOofXHTpAARonCMBAiIOtwnZfuQ8ds2XKzphTbCNuZZr2BcVNMa', 'v', 'v', 'v', 'A1A1A1', 1111111111111111),
(3, 'peter@mohawkcollege.ca', '$2y$10$C.do1/etlFN9gNi2oub/iOsXMP6zXkul/DgcTl61wv6yQw3Ud0Y2q', 'a', 'a', 'a', 'A1A1A1', 1111111111111111),
(4, 'peterbabb@mohawkcollege.ca', '$2y$10$C.do1/etlFN9gNi2oub/iOsXMP6zXkul/DgcTl61wv6yQw3Ud0Y2q', 'b', 'b', 'b', 'A1A1A1', 1234123412341234),
(5, 's@mohawkcollege.ca', '$2y$10$jCcUiBK92N4uJWu.Frm3BOKsh42IKKpf.QlPLEB47we4fxqIgFwOy', 'r', 'r', 'r', 'A1A1A1', 3333333333333333),
(6, 'sonic@mohawkcollege.ca', '$2y$10$WY3FIOWdkwDs8RUcYVUm8O48DES.7wWxi5yI5hxJL5tJke7kq/A22', 'g', 'g', 'g', 'A1A1A1', 5555555555555555),
(7, 'sonicspeed@mohawkcollege.ca', '$2y$10$WJeoHHdGNqSN.6xFn1uk4.etMllrevSbc4xesOHmbu5Sq1KzqqDGe', 'Sonic', 'The ', 'Hedgehog', 'A1A1A1', 6666666666666666),
(8, 'speed@mohawkcollege.ca', '$2y$10$bvqk/ErgyfjuksXxogUMgOaVFbnnkBR.HU1HBCYDnebBObeflodCe', 'g', 'f', 'f', 'A1A1A1', 4444444444444444),
(9, 'undefined', '$2y$10$YMgAzBKFsXt2n7xwYHtKauSe/O9.JvLt1CIisq0vw7NL9vKeNeBR2', 'v', 'v', 'v', 'A1A1A1', 1111111111111111);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
