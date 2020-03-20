-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2019 at 10:35 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemnotifikasi_v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `act_id` int(3) NOT NULL,
  `staff_id` int(3) NOT NULL,
  `act_date` varchar(16) NOT NULL,
  `act_time` varchar(30) NOT NULL,
  `act_name` text NOT NULL,
  `status` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`act_id`, `staff_id`, `act_date`, `act_time`, `act_name`, `status`) VALUES
(1, 1, '20/4/2019', '08:00 a.m.', 'membaja pokok di lot 10 kampung rahiban', 0),
(2, 2, '20/4/2019', '08:00 a.m.', 'memetik buah dan mengemas di lorong KT kampung hj dahlan', 0),
(3, 3, '20/4/2019', '08:00 a.m.', 'membaja pokok sulam di kebun Bukit Betaling', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_kad_pengenalan` varchar(30) NOT NULL,
  `no_tel` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `bangsa` varchar(10) NOT NULL,
  `tarikh_lahir` varchar(100) NOT NULL,
  `tempat_lahir` tinytext NOT NULL,
  `kewarganegaraan` tinytext NOT NULL,
  `status_perkahwinan` varchar(100) NOT NULL,
  `nama_waris` varchar(100) NOT NULL,
  `no_tel_waris` varchar(100) NOT NULL,
  `peranan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `nama`, `no_kad_pengenalan`, `no_tel`, `email`, `alamat`, `agama`, `bangsa`, `tarikh_lahir`, `tempat_lahir`, `kewarganegaraan`, `status_perkahwinan`, `nama_waris`, `no_tel_waris`, `peranan`) VALUES
(1, 'Taman Bin Saringat', '971022015847', '01115301732', '', 'no 33 kg patit warijo, 83400 seri medan batu pahat, johor', 'islam', 'melayu', '5/4/1951', 'indonesia', 'kewarganegaraan', 'sudah berkahwin', 'nur miyati binti hj sahlan', '', 'pentadbir'),
(2, 'Agus Santoso', '670922-71-5645', '011-15397642', '', 'no 33 kg rahiban, seri medan', 'islam', 'indonesia', '22/09/1967', 'jawa barat, indonesia', 'bermastautin', 'sudah berkahwin', 'santoso bin wusti', '62821-43799941', ''),
(8, 'mohd ashraf', '21', '3123', '', '312', '312', '3123', '312', '312', '312', '312', '312', '', ''),
(9, 'Mohd Abu Ali', '1233331312', '3123233', 'abuali@gmail.com', 'No 19', 'Islam', 'Melayu', 'Test', 'Test', 'Test', 'Test', 'Test', '', ''),
(10, 'Mohamad Hamdani', '971022015847', '01115301732', 'mddanic190@gmail.com', 'no 33 kg parit warijo', 'islam', 'melayu', '22/10/1997', 'batu pahat', 'malaysia', 'bujang', 'taman bin saringat', '', ''),
(11, 'hamzsani suharto', '910305015647', '01328764058', 'hamz.sani@yahoo.com', 'kg parit rahiban', 'islam', 'melayu', '05/03/1991', 'batu pahat', 'malaysia', 'sudah kahwin', 'suharto bin  joyo', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(255) NOT NULL COMMENT 'email',
  `admin_password` varchar(255) NOT NULL,
  `admin_name` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_username`, `admin_password`, `admin_name`) VALUES
(1, 'hamz97', 'ham1234', 'hamdani'),
(2, 'ihsan', 'ihsan246', 'ihsan taman');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadual`
--

CREATE TABLE `tbl_jadual` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tarikh` text NOT NULL,
  `nama` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `masa` varchar(10) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `aktiviti` text NOT NULL,
  `barang_keperluan` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jadual`
--

INSERT INTO `tbl_jadual` (`id`, `user_id`, `tarikh`, `nama`, `email`, `masa`, `tempat`, `aktiviti`, `barang_keperluan`, `status`) VALUES
(1, 1, '2019-05-06', 'Taman Bin Saringat', '', '14:22', '2', '2', '2', 0),
(2, 1, '2019-05-12', 'Taman Bin Saringat', '', '14:22', 'Kuala Lumpur', 'MENANAM ANAK POKOK\r\n', 'Cangkul								  ', 9),
(3, 2, '2019-05-12', 'Agus Santoso', '', '14:02', 'q2', 'q2', 'q2					  ', 9),
(4, 2, '2019-05-12', 'Agus Santoso', '', '03:33', 'KL', 'MENANAM ANAK POKOK\r\n', 'MENANAM ANAK POKOK\r\n', 1),
(5, 9, '2019-05-12', 'Mohd Abu Ali', 'abuali@gmail.com', '14:22', 'Kuala Lumpur', 'MENANAM ANAK POKOK\r\n', 'Cangkul								  								  ', 1),
(6, 9, '2019-05-17', 'Mohd Abu Ali', 'abuali@gmail.com', '09:21', 'JOHOR', 'MEMBAJA', 'PONGKES', 9),
(7, 10, '2019-05-17', 'Mohamad Hamdani', 'mddanic190@gmail.com', '11:25', 'KEDAH', 'PENGHANTARAN BARANG', 'BARANG DAN BARANG PERIBADI								  ', 1),
(8, 10, '2019-07-14', 'Mohamad Hamdani', 'mddanic190@gmail.com', '12:20', 'JB', 'MENANAM POKOK', 'CANGKUL\r\nSABIT', 1),
(9, 10, '2019-05-15', 'Mohamad Hamdani', 'mddanic190@gmail.com', '06:18', 'PAHANG', 'MENANAM POKOK', 'CANGKUL', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`role_id`, `role_name`) VALUES
(1, 'Pentadbir'),
(2, 'Staff'),
(3, 'ayah'),
(4, 'pengurus'),
(5, ''),
(6, 'mak'),
(7, 'adik');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `staff_id` int(3) NOT NULL,
  `staff_nckname` text NOT NULL,
  `staff_name` text NOT NULL,
  `staff_address` varchar(200) NOT NULL,
  `staff_contact` varchar(30) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pwd` varchar(255) NOT NULL,
  `user_fullname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `role_id`, `user_email`, `user_pwd`, `user_fullname`) VALUES
(1, 1, 'hamz@gmail.com', '1234', 'Hamdani'),
(2, 2, 'adrian@gmail.com', '1234', 'adrian'),
(9, 1, 'assy@gmail.com', '12345', 'assy'),
(10, 1, 'dsadasds@gmail.com', '1234', 'dsadasds'),
(14, 8, 'ashraf@gmail.com', 'ashraf@gmail.com', 'mohd ashraf'),
(15, 8, 'abuali@gmail.com', 'abuali@gmail.com', 'Mohd Abu Ali'),
(16, 8, 'mddanic190@gmail.com', 'dani12345', 'Mohamad Hamdani'),
(17, 8, 'hamz.sani@yahoo.com', 'dani12345', 'hamzsani suharto'),
(18, 2, 'hamdani@cuba.com', 'dani12345', 'hamdanicuba');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`act_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_jadual`
--
ALTER TABLE `tbl_jadual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `act_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_jadual`
--
ALTER TABLE `tbl_jadual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `staff_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
