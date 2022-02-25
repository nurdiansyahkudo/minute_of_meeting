-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2021 at 03:32 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ilmuweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` varchar(3000) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `isi`, `kategori`, `tanggal`, `status`, `user`, `gambar`) VALUES
(3, 'Judul berita hari ke empat', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum suscipit labore magni voluptas id unde similique iusto repellat odio. Quaerat velit laboriosam saepe incidunt, facere ducimus magnam dolore error temporibus.</p>', 'Kesehatan', '2021-02-28 09:25:10', 'draff', 'ilmuweb@gmail.com', '0e1e25c4833728fa82161d8eb77fba31.jpg'),
(4, 'Judul Berita hari kelima', '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus neque accusamus veritatis veniam eaque, vel voluptatibus fugiat. Ea veniam explicabo maxime laboriosam animi rerum ducimus aut quod nam molestias? Officiis!</p>', 'Kesehatan', '2021-02-28 09:27:27', 'publish', 'ilmuweb@gmail.com', 'ab343476da9b3d8ab71107b2c8439bab.jpg'),
(5, 'Judul berita hari keenam', '<p>Lorem&nbsp;ipsum,&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Totam&nbsp;nobis&nbsp;earum&nbsp;aliquid&nbsp;adipisci,&nbsp;harum&nbsp;repellendus&nbsp;accusamus&nbsp;sit&nbsp;incidunt!&nbsp;Molestias&nbsp;nostrum&nbsp;magni&nbsp;quasi&nbsp;delectus&nbsp;incidunt&nbsp;quis&nbsp;commodi&nbsp;aliquam&nbsp;sint&nbsp;autem&nbsp;non.</p>', 'Kesehatan', '2021-02-28 16:32:21', 'draff', 'ilmuweb@gmail.com', 'cc9ef53d65eaf0e0f1250c969a522574.jpg'),
(6, 'Judul berita hari ketujuh', '<p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Eveniet&nbsp;repudiandae&nbsp;in&nbsp;voluptatem&nbsp;magnam&nbsp;impedit&nbsp;similique,&nbsp;blanditiis&nbsp;libero,&nbsp;eaque&nbsp;deleniti&nbsp;sequi&nbsp;nobis.&nbsp;Laborum&nbsp;aut,&nbsp;at&nbsp;placeat&nbsp;tenetur&nbsp;rem&nbsp;porro&nbsp;facere&nbsp;modi.</p>', 'Kesehatan', '2021-02-28 16:38:52', 'publish', 'ilmuweb@gmail.com', 'baea5e9f5e01538ff410367c3b188e1d.jpg'),
(9, 'Berita terkini tanggal 28', '<p>tesLorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Eveniet&nbsp;repudiandae&nbsp;in&nbsp;voluptatem&nbsp;magnam&nbsp;impedit&nbsp;similique,&nbsp;blanditiis&nbsp;libero,&nbsp;eaque&nbsp;deleniti&nbsp;sequi&nbsp;nobis.&nbsp;Laborum&nbsp;aut,&nbsp;at&nbsp;placeat&nbsp;tenetur&nbsp;rem&nbsp;porro&nbsp;facere&nbsp;modi.</p><p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Eveniet&nbsp;repudiandae&nbsp;in&nbsp;voluptatem&nbsp;magnam&nbsp;impedit&nbsp;similique,&nbsp;blanditiis&nbsp;libero,&nbsp;eaque&nbsp;deleniti&nbsp;sequi&nbsp;nobis.&nbsp;Laborum&nbsp;aut,&nbsp;at&nbsp;placeat&nbsp;tenetur&nbsp;rem&nbsp;porro&nbsp;facere&nbsp;modi.</p><p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Eveniet&nbsp;repudiandae&nbsp;in&nbsp;voluptatem&nbsp;magnam&nbsp;impedit&nbsp;similique,&nbsp;blanditiis&nbsp;libero,&nbsp;eaque&nbsp;deleniti&nbsp;sequi&nbsp;nobis.&nbsp;Laborum&nbsp;aut,&nbsp;at&nbsp;placeat&nbsp;tenetur&nbsp;rem&nbsp;porro&nbsp;facere&nbsp;modi.</p><p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Eveniet&nbsp;repudiandae&nbsp;in&nbsp;voluptatem&nbsp;magnam&nbsp;impedit&nbsp;similique,&nbsp;blanditiis&nbsp;libero,&nbsp;eaque&nbsp;deleniti&nbsp;sequi&nbsp;nobis.&nbsp;Laborum&nbsp;aut,&nbsp;at&nbsp;placeat&nbsp;tenetur&nbsp;rem&nbsp;porro&nbsp;facere&nbsp;modi.</p><p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Eveniet&nbsp;repudiandae&nbsp;in&nbsp;voluptatem&nbsp;magnam&nbsp;impedit&nbsp;similique,&nbsp;blanditiis&nbsp;libero,&nbsp;eaque&nbsp;deleniti&nbsp;sequi&nbsp;nobis.&nbsp;Laborum&nbsp;aut,&nbsp;at&nbsp;placeat&nbsp;tenetur&nbsp;rem&nbsp;porro&nbsp;facere&nbsp;modi.</p>', 'Kesehatan', '2021-02-28 23:50:02', 'publish', 'ilmuweb@gmail.com', 'c45382a7c1759e29e8f7e00e9d4fe1b4.jpg'),
(10, 'Berita terkini tanggal 1 Maret 2021', '<p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Eveniet&nbsp;repudiandae&nbsp;in&nbsp;voluptatem&nbsp;magnam&nbsp;impedit&nbsp;similique,&nbsp;blanditiis&nbsp;libero,&nbsp;eaque&nbsp;deleniti&nbsp;sequi&nbsp;nobis.&nbsp;Laborum&nbsp;aut,&nbsp;at&nbsp;placeat&nbsp;tenetur&nbsp;rem&nbsp;porro&nbsp;facere&nbsp;modi.Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Eveniet&nbsp;repudiandae&nbsp;in&nbsp;voluptatem&nbsp;magnam&nbsp;impedit&nbsp;similique,&nbsp;blanditiis&nbsp;libero,&nbsp;eaque&nbsp;deleniti&nbsp;sequi&nbsp;nobis.&nbsp;Laborum&nbsp;aut,&nbsp;at&nbsp;placeat&nbsp;tenetur&nbsp;rem&nbsp;porro&nbsp;facere&nbsp;modi.</p><p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Eveniet&nbsp;repudiandae&nbsp;in&nbsp;voluptatem&nbsp;magnam&nbsp;impedit&nbsp;similique,&nbsp;blanditiis&nbsp;libero,&nbsp;eaque&nbsp;deleniti&nbsp;sequi&nbsp;nobis.&nbsp;Laborum&nbsp;aut,&nbsp;at&nbsp;placeat&nbsp;tenetur&nbsp;rem&nbsp;porro&nbsp;facere&nbsp;modi.Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Eveniet&nbsp;repudiandae&nbsp;in&nbsp;voluptatem&nbsp;magnam&nbsp;impedit&nbsp;similique,&nbsp;blanditiis&nbsp;libero,&nbsp;eaque&nbsp;deleniti&nbsp;sequi&nbsp;nobis.&nbsp;Laborum&nbsp;aut,&nbsp;at&nbsp;placeat&nbsp;tenetur&nbsp;rem&nbsp;porro&nbsp;facere&nbsp;modi.</p><p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Eveniet&nbsp;repudiandae&nbsp;in&nbsp;voluptatem&nbsp;magnam&nbsp;impedit&nbsp;similique,&nbsp;blanditiis&nbsp;libero,&nbsp;eaque&nbsp;deleniti&nbsp;sequi&nbsp;nobis.&nbsp;Laborum&nbsp;aut,&nbsp;at&nbsp;placeat&nbsp;tenetur&nbsp;rem&nbsp;porro&nbsp;facere&nbsp;modi.</p>', 'Kesehatan', '2021-03-01 09:07:24', 'publish', 'ilmuweb@gmail.com', 'ae2610b0ce20e15a61dd28227cab0120.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
