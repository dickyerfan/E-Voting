-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2022 at 02:46 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `kandidat`
--

CREATE TABLE `kandidat` (
  `id` int(11) NOT NULL,
  `nama_kandidat` varchar(100) NOT NULL,
  `nama_calon` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kandidat`
--

INSERT INTO `kandidat` (`id`, `nama_kandidat`, `nama_calon`, `foto`) VALUES
(1, 'calon ke 1', 'Ferry Salim & Diana Pungki', 'c11.png'),
(2, 'calon ke 2', 'Perjaka Ting2 & Janda Keren', 'c2.png'),
(3, 'calon ke 3', 'Jomblo Kota & Siti Wana', 'c3.png');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama`) VALUES
(3, 'X - RPL'),
(4, 'X  - TKJ'),
(7, 'X - MM'),
(8, 'X - AP'),
(9, 'X - AK'),
(13, 'XI - RPL'),
(14, 'XI - TKJ'),
(15, 'XI - MM'),
(16, 'XI -AP'),
(17, 'XI - AK'),
(18, 'XII - RPL'),
(19, 'XII - TKJ'),
(20, 'XII - MM'),
(21, 'XII - AP'),
(22, 'XII - AK');

-- --------------------------------------------------------

--
-- Table structure for table `suara`
--

CREATE TABLE `suara` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_kandidat` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suara`
--

INSERT INTO `suara` (`id`, `id_user`, `nama_kandidat`, `created`) VALUES
(5, 11, 'calon ke 3', '2022-05-18 14:41:18'),
(6, 3, 'calon ke 1', '2022-05-20 08:00:30'),
(7, 4, 'calon ke 3', '2022-05-20 08:01:38'),
(8, 10, 'calon ke 3', '2022-05-20 08:02:36'),
(9, 12, 'calon ke 3', '2022-05-20 08:03:20'),
(10, 13, 'calon ke 2', '2022-05-20 08:05:41'),
(11, 14, 'calon ke 2', '2022-05-20 08:06:51'),
(12, 15, 'calon ke 1', '2022-05-20 08:07:35'),
(13, 16, 'calon ke 2', '2022-05-20 08:22:37'),
(14, 17, 'calon ke 3', '2022-05-20 09:04:09');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `level` enum('admin','siswa') NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_kelas`, `nama`, `email`, `password`, `level`, `status`) VALUES
(1, 0, 'Bilal Zaidan', 'bilalzaidan@gmail.com', '$2y$10$ZVzGKT9q/Em0xZnwgqDnoOa9fTZWkSn79fpo0jzAaXZZQNgPf5MXi', 'admin', 0),
(3, 4, 'Serdadu Hijau', 'serdadu@gmail.com', '$2y$10$.uQXlz20ja9Uz5U7rLpkWeWfhiOSyzI79DzufDY3ImzRN0Of9BgMS', 'siswa', 1),
(4, 9, 'Prajurit Tangguh', 'prajurit_tangguh@gmail.com', '$2y$10$1czs1pyd9t0mhPDlBZx3A.JXHXvppCzgbyCpl8d.ba0fkeR0frjtG', 'siswa', 1),
(10, 8, 'Surati Ning Tyas', 'surati@gmail.com', '$2y$10$Dakn9Xa3OIaDil9jRWFf2eT0e5BDzo/.OKovV6LM1rEmOm5LfHe8e', 'siswa', 1),
(11, 7, 'Testi Manaf', 'testing@gmail.com', '$2y$10$/noTE/rLfkpySrK9KerMe.jM2Ju8VHVOKkfsH1TIMMZM1OicApjD6', 'siswa', 1),
(12, 3, 'Prabu Siliwangi', 'prabu@gmail.com', '$2y$10$jgGc0keWvaD467xzGTOnRuaFrJHDCG02ILKl/Bm2mdD7sF4oO0oke', 'siswa', 1),
(13, 15, 'Imam Subagja', 'imamsu@gmail.com', '$2y$10$z.JG3ZcrMUm/GXqtqNlcrezF6ih3nZxwugh/hK9pjaGAtEnpme4l.', 'siswa', 1),
(14, 16, 'Siti Munawaroh', 'sitimu@gmail.com', '$2y$10$aNekGP.6c8VwKB2uysyzX.EqKo8LOb5hGFBDWpacR.xyz2i5Rhg1i', 'siswa', 1),
(15, 17, 'Weni Subroto', 'wenisu@gmail.com', '$2y$10$n.5FC0gMOpvhDJtD0IoU.OD3Hkeb9.58Ff6mDHrZ0bLCgMCBoFNYC', 'siswa', 1),
(16, 13, 'Beni Rahardian', 'benira@gmail.com', '$2y$10$HeMe8d9JmhhrId6C2IZZ7OQGZn/GnIN8mpeDHu1tTO.ewPyqCsgJ2', 'siswa', 1),
(17, 14, 'Patrick Siregar', 'patricksi@gmail.com', '$2y$10$CncZ2x9e7pAniTjW9qvDwurMsozXoToQ2IIzg264PASKo6lXPffW.', 'siswa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `visi_misi`
--

CREATE TABLE `visi_misi` (
  `id` int(11) NOT NULL,
  `id_kandidat` int(11) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visi_misi`
--

INSERT INTO `visi_misi` (`id`, `id_kandidat`, `visi`, `misi`) VALUES
(2, 1, '<p>Jangan Menyerah</p>\r\n', '<p>Lanjut Terus</p>\r\n'),
(3, 2, '<p>Maju Terus</p>\r\n', '<p>Pantang Mundur</p>\r\n'),
(4, 3, '<p>Semangat</p>\r\n', '<p>Jangan Kendor</p>\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kandidat`
--
ALTER TABLE `kandidat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suara`
--
ALTER TABLE `suara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visi_misi`
--
ALTER TABLE `visi_misi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kandidat`
--
ALTER TABLE `kandidat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `suara`
--
ALTER TABLE `suara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `visi_misi`
--
ALTER TABLE `visi_misi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
