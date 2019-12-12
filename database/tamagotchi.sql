-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2019 at 05:28 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tamagotchi`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `IGN` varchar(20) NOT NULL,
  `Gold` int(11) NOT NULL,
  `Gem` int(11) NOT NULL,
  `jPet` int(11) NOT NULL,
  `Email` char(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`IGN`, `Gold`, `Gem`, `jPet`, `Email`) VALUES
('Blank_', 490, 100, 1, 'ilham.rizki76@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `advanture`
--

CREATE TABLE `advanture` (
  `level_id` varchar(10) NOT NULL,
  `monster_id` varchar(10) NOT NULL,
  `story_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `arcade`
--

CREATE TABLE `arcade` (
  `arcade_id` varchar(10) NOT NULL,
  `num_1` int(5) NOT NULL,
  `num_2` int(5) NOT NULL,
  `answer` int(15) NOT NULL,
  `question` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id_Equipment` varchar(10) NOT NULL,
  `nama_Equipment` varchar(20) NOT NULL,
  `Hp` int(2) NOT NULL,
  `Attack` int(2) NOT NULL,
  `price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id_Equipment`, `nama_Equipment`, `Hp`, `Attack`, `price`) VALUES
('001', 'Eq01', 100, 100, 100),
('002', 'Eq02', 150, 50, 100);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id_food` varchar(10) NOT NULL,
  `foodname` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `healthgain` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id_food`, `foodname`, `price`, `healthgain`) VALUES
('1', 'Burger', 5, 10),
('2', 'Pizza', 10, 20),
('3', 'Steak', 15, 30);

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `games_id` varchar(10) NOT NULL,
  `pet_id` varchar(8) NOT NULL,
  `sparring_id` varchar(10) NOT NULL,
  `arcade_id` varchar(10) NOT NULL,
  `level_id` varchar(10) NOT NULL,
  `staminacost` int(11) NOT NULL,
  `expdrop` int(11) NOT NULL,
  `golddrop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `monster`
--

CREATE TABLE `monster` (
  `monster_id` varchar(10) NOT NULL,
  `monstername` varchar(15) NOT NULL,
  `monsterhp` int(11) NOT NULL,
  `monsterattack` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `pet_id` varchar(8) NOT NULL,
  `IGN` varchar(20) NOT NULL,
  `pet_name` varchar(15) NOT NULL,
  `id_Equipment` varchar(10) DEFAULT NULL,
  `max_hp` int(11) NOT NULL,
  `hp` int(11) NOT NULL,
  `attack` int(11) NOT NULL,
  `max_stamina` int(11) NOT NULL,
  `stamina` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `exp_up` int(11) NOT NULL,
  `exp` int(11) NOT NULL,
  `pet_type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`pet_id`, `IGN`, `pet_name`, `id_Equipment`, `max_hp`, `hp`, `attack`, `max_stamina`, `stamina`, `level`, `exp_up`, `exp`, `pet_type`) VALUES
('5df24556', 'Blank_', 'Taco', '', 150, 130, 10, 120, 105, 1, 100, 20, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sparring`
--

CREATE TABLE `sparring` (
  `sparring_id` varchar(10) NOT NULL,
  `winner` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `story`
--

CREATE TABLE `story` (
  `story_id` varchar(10) NOT NULL,
  `naration` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Email` char(45) NOT NULL,
  `Role` int(1) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Nama` varchar(20) NOT NULL,
  `Pertanyaan` varchar(2) NOT NULL,
  `Jawaban` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Email`, `Role`, `Username`, `Password`, `Nama`, `Pertanyaan`, `Jawaban`) VALUES
('ilham.rizki76@yahoo.com', 0, 'ilhamrizki25', '82c47a68a3de1c5e96a67a1526edfe7c', 'ilhamrizki', '3', 'Bandung'),
('ilham.rizki77@yahoo.com', 0, 'ilhamrizki26', '82c47a68a3de1c5e96a67a1526edfe7c', 'ilhamrizki', '1', 'Neko');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `id_Equipment` varchar(10) NOT NULL,
  `IGN` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`id_Equipment`, `IGN`) VALUES
('001', 'Coba1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`IGN`);

--
-- Indexes for table `advanture`
--
ALTER TABLE `advanture`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `arcade`
--
ALTER TABLE `arcade`
  ADD PRIMARY KEY (`arcade_id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id_Equipment`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id_food`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`games_id`);

--
-- Indexes for table `monster`
--
ALTER TABLE `monster`
  ADD PRIMARY KEY (`monster_id`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`pet_id`);

--
-- Indexes for table `sparring`
--
ALTER TABLE `sparring`
  ADD PRIMARY KEY (`sparring_id`);

--
-- Indexes for table `story`
--
ALTER TABLE `story`
  ADD PRIMARY KEY (`story_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
