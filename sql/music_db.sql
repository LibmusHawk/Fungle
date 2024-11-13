-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2024 at 05:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `music_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE `music` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `music_title` varchar(255) NOT NULL,
  `music_description` text DEFAULT NULL,
  `music_file` varchar(255) NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`id`, `user_id`, `music_title`, `music_description`, `music_file`, `cover_image`, `upload_date`) VALUES
(1, 1, 'bahas', '123', 'press.wav', 'Fungle_logo.png', '2024-09-11 07:56:11'),
(2, 1, 'Bengt_ost', 'soundtrack for the game bengt', 'Bengt_Ost2(1).mp3', 'New Piskel-1.png(2).png', '2024-09-11 07:58:16'),
(3, 1, 'jasfbdfhk', 'kdfssdfdf', 'Create Movement Boost in 2D Unity game.mp3', 'walrus.png', '2024-09-11 08:02:00'),
(4, 2, 'fffs', 'fsfsfs', 'press.wav', 'Fungle_banner.png', '2024-09-12 08:44:42'),
(5, 5, 'Bury the Light', 'Show me your motivation', 'BuryTHELight.mp3', 'burytheliught.png', '2024-09-16 10:33:48'),
(6, 5, 'Bury the Light (Full Version)', 'BURY  THE LIGHTTTTT', 'SnapSave.io - Bury the Light (128 kbps).mp3', 'burytheliught.png', '2024-09-16 10:38:50'),
(7, 4, 'dsdsd', 'sdsds', 'SnapSave.io - Bury the Light (128 kbps).mp3', 'Fungle_banner.png', '2024-09-23 09:35:09'),
(8, 4, 'kko', 'ijjh', 'SnapSave.io - Bury the Light (128 kbps).mp3', 'prevbtn.png', '2024-09-25 09:38:00'),
(9, 8, 'Robert', 'Robert', 'Doom Eternal Pizza Meme Synched to Italian Pizza Music.mp3', 'IMG-20190219-WA0007.jpg', '2024-10-03 17:52:21'),
(11, 4, 'WAKAKA', 'Wack', 'Doom Eternal Pizza Meme Synched to Italian Pizza Music.mp3', 'IMG-20200205-WA0001.jpg', '2024-10-19 15:12:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`) VALUES
(1, 'bwa', 'baw@bawa.fi', '$2y$10$a5k55lcsMsEts3veme2gYuvIbl40Ld7sqivRgrW8wWw.0kIY3upWS', 'baw', 'bawa'),
(2, 'Vincent', 'vincent@vincent.com', '$2y$10$jYzq.eG0Z4NgO3FX/403GekXwtnUPbe.EHFh1dPjTDE3mnAskWeHu', 'vincent', 'vincent'),
(3, 'tommen', 'tommen@tommen.com', '$2y$10$OPGTilZxLcCCmLxwSQA2yuNMgIQheY9p2lf/HZXfAuoKS3vOBCLM.', 'tommen', 'tommen'),
(4, 'Possum', 'flflf@gmg.com', '$2y$10$jU8gnK5Ms0BEmSbyVXc9Yel8ESN6idoIWf/TmOIx0lFu1//ZCf8QS', 'flflf', 'flflfl'),
(5, 'EMES', 'EMES@EMES', '$2y$10$OHimUV.444xcCbwJFGFRhO.Oh3XWBY1XBdLoSgn7pLabvYu2VuYFm', 'EMES', 'EMES'),
(6, 'petja', 'petja@gmail.com', '$2y$10$.YeiH4PfKIjemCxHFfvFnO1YtrWWq9Hnxg1cdzHoBaqpRz11C/ieq', 'petja', 'petja'),
(7, 'petjar', 'petjar@gmail.com', '$2y$10$IU5XkEJdDclYWB2pb.j0letyRLp4blFuQmQBUkb4zli.B9AG/nuX.', 'petjar', 'petjar'),
(8, 'Robert', 'Robert@Robert.com', '$2y$10$MZmW2cu5qOW00xCGdM7SJeI.0ZDOcAEYCtOdgWLc.emYrBsA4..u.', 'Robert', 'Robert');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `video_title` varchar(255) NOT NULL,
  `video_description` text DEFAULT NULL,
  `video_file` varchar(255) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `video_title`, `video_description`, `video_file`, `thumbnail`) VALUES
(1, 'Blueberry', 'BlueBerry', 'uploads/CAR CRASH GREEN SCREEN TEMPLATE (Full Video) (720p, h264, youtube).mp4', 'uploads/Snapchat-286045330.jpg'),
(2, 'INSANE SOLDIER CLIP!!!!!', 'CRAZYZYYYZYZYZZ', 'uploads/Overwatch 2 2024.10.02 - 21.15.49.06.mp4', 'uploads/Overwatch 2 Screenshot 2024.09.25 - 18.17.06.82.png'),
(3, 'Jamie Oliver', 'WAKJAKKAA', 'uploads/Jamie Oliver Woo Yeah Ya (Original) (720p, h264, youtube).mp4', 'uploads/Screenshot 2024-09-30 181530.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `music`
--
ALTER TABLE `music`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `music`
--
ALTER TABLE `music`
  ADD CONSTRAINT `music_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
