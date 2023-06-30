-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2023 at 10:42 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `prezime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `korisnicko_ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `lozinka` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `razina` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(1, 'admin', 'admin', 'admin', '$2y$10$Mx6sy5T8DdlfxNWWjOhfOuGg9S2hTMSZjq0mCtwHPzZreZSiXyp4C', 1),
(2, 'guest', 'guest', 'guest', '$2y$10$gfNSVZKVd1QoD6IP1KHFmO4XMdmqUZ/rym2lzqRpJoPqn9Cxbzfcq', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) NOT NULL,
  `naslov` varchar(80) NOT NULL,
  `sazetak` text NOT NULL,
  `tekst` text NOT NULL,
  `slika` varchar(64) NOT NULL,
  `kategorija` varchar(64) NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(1, '2022-06-18', 'Lorem ipsum dolor sit dolor', 'Lorem ipsum dolor sit amet consectetur adipisici', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus atque error ab aut aspernatur pariatur omnis dolorum assumenda vero, animi autem modi labore consectetur temporibus tenetur placeat dolorem fugit nisi blanditiis repudiandae? Quaerat ab repellendus magni suscipit quidem nisi vel assumenda eum ut et reprehenderit facere culpa, ducimus doloremque pariatur hic. Ex voluptas quasi, excepturi illo pariatur neque! Quis fuga, adipisci voluptatum fugit ab iure ratione dicta sunt corruptiaa.', '1.jpg', 'U.S.', 1),
(2, '2022-06-18', 'Lorem ipsum dolor sit dolor', 'Lorem ipsum dolor sit amet consectetur adipisici', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus atque error ab aut aspernatur pariatur omnis dolorum assumenda vero, animi autem modi labore consectetur temporibus tenetur placeat dolorem fugit nisi blanditiis repudiandae? Quaerat ab repellendus magni suscipit quidem nisi vel assumenda eum ut et reprehenderit facere culpa, ducimus doloremque pariatur hic. Ex voluptas quasi, excepturi illo pariatur neque! Quis fuga, adipisci voluptatum fugit ab iure ratione dicta sunt corruptiaa.', '2.jpg', 'U.S.', 1),
(3, '2022-06-18', 'Lorem ipsum dolor sit dolor', 'Lorem ipsum dolor sit amet consectetur adipisici', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus atque error ab aut aspernatur pariatur omnis dolorum assumenda vero, animi autem modi labore consectetur temporibus tenetur placeat dolorem fugit nisi blanditiis repudiandae? Quaerat ab repellendus magni suscipit quidem nisi vel assumenda eum ut et reprehenderit facere culpa, ducimus doloremque pariatur hic. Ex voluptas quasi, excepturi illo pariatur neque! Quis fuga, adipisci voluptatum fugit ab iure ratione dicta sunt corruptiaa.', '3.jpg', 'U.S.', 1),
(4, '2022-06-18', 'Lorem ipsum dolor sit dolor', 'Lorem ipsum dolor sit amet consectetur adipisici', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus atque error ab aut aspernatur pariatur omnis dolorum assumenda vero, animi autem modi labore consectetur temporibus tenetur placeat dolorem fugit nisi blanditiis repudiandae? Quaerat ab repellendus magni suscipit quidem nisi vel assumenda eum ut et reprehenderit facere culpa, ducimus doloremque pariatur hic. Ex voluptas quasi, excepturi illo pariatur neque! Quis fuga, adipisci voluptatum fugit ab iure ratione dicta sunt corruptiaa.', '4.jpg', 'World', 1),
(5, '2022-06-18', 'Lorem ipsum dolor sit dolor', 'Lorem ipsum dolor sit amet consectetur adipisici', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus atque error ab aut aspernatur pariatur omnis dolorum assumenda vero, animi autem modi labore consectetur temporibus tenetur placeat dolorem fugit nisi blanditiis repudiandae? Quaerat ab repellendus magni suscipit quidem nisi vel assumenda eum ut et reprehenderit facere culpa, ducimus doloremque pariatur hic. Ex voluptas quasi, excepturi illo pariatur neque! Quis fuga, adipisci voluptatum fugit ab iure ratione dicta sunt corruptiaa.', '5.jpg', 'World', 1),
(6, '2022-06-18', 'Lorem ipsum dolor sit dolor', 'Lorem ipsum dolor sit amet consectetur adipisici', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus atque error ab aut aspernatur pariatur omnis dolorum assumenda vero, animi autem modi labore consectetur temporibus tenetur placeat dolorem fugit nisi blanditiis repudiandae? Quaerat ab repellendus magni suscipit quidem nisi vel assumenda eum ut et reprehenderit facere culpa, ducimus doloremque pariatur hic. Ex voluptas quasi, excepturi illo pariatur neque! Quis fuga, adipisci voluptatum fugit ab iure ratione dicta sunt corruptiaa.', '6.jpg', 'World', 1),
(7, '2022-06-18', 'Lorem ipsum dolor sit dolor', 'Lorem ipsum dolor sit amet consectetur adipisici', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus atque error ab aut aspernatur pariatur omnis dolorum assumenda vero, animi autem modi labore consectetur temporibus tenetur placeat dolorem fugit nisi blanditiis repudiandae? Quaerat ab repellendus magni suscipit quidem nisi vel assumenda eum ut et reprehenderit facere culpa, ducimus doloremque pariatur hic. Ex voluptas quasi, excepturi illo pariatur neque! Quis fuga, adipisci voluptatum fugit ab iure ratione dicta sunt corruptiaa.', '7.jpg', 'U.S.', 0),
(8, '2022-06-18', 'Lorem ipsum dolor sit dolor', 'Lorem ipsum dolor sit amet consectetur adipisici', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus atque error ab aut aspernatur pariatur omnis dolorum assumenda vero, animi autem modi labore consectetur temporibus tenetur placeat dolorem fugit nisi blanditiis repudiandae? Quaerat ab repellendus magni suscipit quidem nisi vel assumenda eum ut et reprehenderit facere culpa, ducimus doloremque pariatur hic. Ex voluptas quasi, excepturi illo pariatur neque! Quis fuga, adipisci voluptatum fugit ab iure ratione dicta sunt corruptiaa.', '8.jpg', 'U.S.', 0),
(9, '2022-06-18', 'Lorem ipsum dolor sit dolor', 'Lorem ipsum dolor sit amet consectetur adipisici', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus atque error ab aut aspernatur pariatur omnis dolorum assumenda vero, animi autem modi labore consectetur temporibus tenetur placeat dolorem fugit nisi blanditiis repudiandae? Quaerat ab repellendus magni suscipit quidem nisi vel assumenda eum ut et reprehenderit facere culpa, ducimus doloremque pariatur hic. Ex voluptas quasi, excepturi illo pariatur neque! Quis fuga, adipisci voluptatum fugit ab iure ratione dicta sunt corruptiaa.', '9.jpg', 'U.S.', 0),
(10, '2022-06-18', 'Lorem ipsum dolor sit dolor', 'Lorem ipsum dolor sit amet consectetur adipisici', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus atque error ab aut aspernatur pariatur omnis dolorum assumenda vero, animi autem modi labore consectetur temporibus tenetur placeat dolorem fugit nisi blanditiis repudiandae? Quaerat ab repellendus magni suscipit quidem nisi vel assumenda eum ut et reprehenderit facere culpa, ducimus doloremque pariatur hic. Ex voluptas quasi, excepturi illo pariatur neque! Quis fuga, adipisci voluptatum fugit ab iure ratione dicta sunt corruptiaa.', '10.jpg', 'World', 0),
(11, '2022-06-18', 'Lorem ipsum dolor sit dolor', 'Lorem ipsum dolor sit amet consectetur adipisici', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus atque error ab aut aspernatur pariatur omnis dolorum assumenda vero, animi autem modi labore consectetur temporibus tenetur placeat dolorem fugit nisi blanditiis repudiandae? Quaerat ab repellendus magni suscipit quidem nisi vel assumenda eum ut et reprehenderit facere culpa, ducimus doloremque pariatur hic. Ex voluptas quasi, excepturi illo pariatur neque! Quis fuga, adipisci voluptatum fugit ab iure ratione dicta sunt corruptiaa.', '11.jpg', 'World', 0),
(12, '2022-06-18', 'Lorem ipsum dolor sit dolor', 'Lorem ipsum dolor sit amet consectetur adipisici', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus atque error ab aut aspernatur pariatur omnis dolorum assumenda vero, animi autem modi labore consectetur temporibus tenetur placeat dolorem fugit nisi blanditiis repudiandae? Quaerat ab repellendus magni suscipit quidem nisi vel assumenda eum ut et reprehenderit facere culpa, ducimus doloremque pariatur hic. Ex voluptas quasi, excepturi illo pariatur neque! Quis fuga, adipisci voluptatum fugit ab iure ratione dicta sunt corruptiaa.', '12.jpg', 'World', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
