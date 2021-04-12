-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 12, 2021 at 09:50 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `virtualshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(220) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `images` varchar(220) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `images`, `created`, `modified`) VALUES
(1, 'Curso de PHP developer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In suscipit est dignissim eros efficitur facilisis. Pellentesque porttitor tincidunt efficitur. Mauris placerat elit sapien, id gravida metus lacinia sed. Quisque egestas est quis enim dapibus feugiat. Nunc eget varius nunc. Mauris maximus libero eu aliquam consequat. Duis placerat iaculis sem. Curabitur ligula nibh, pharetra quis finibus vitae, consequat feugiat est. Nulla facilisi. Vestibulum a pharetra est. Curabitur ut vehicula quam.', 247, '1/curso-de-php-developer.jpg', '2021-04-05 13:58:00', NULL),
(2, 'Curso de PHP orientado a objeto', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In suscipit est dignissim eros efficitur facilisis. Pellentesque porttitor tincidunt efficitur. Mauris placerat elit sapien, id gravida metus lacinia sed. Quisque egestas est quis enim dapibus feugiat. Nunc eget varius nunc. Mauris maximus libero eu aliquam consequat. Duis placerat iaculis sem. Curabitur ligula nibh, pharetra quis finibus vitae, consequat feugiat est. Nulla facilisi. Vestibulum a pharetra est. Curabitur ut vehicula quam.', 197.47, '2/curso-de-php-orientado-a-objetos.jpg', '2021-04-05 17:53:00', NULL),
(3, 'Curso de Php Mysqli e Bootstrap', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In suscipit est dignissim eros efficitur facilisis. Pellentesque porttitor tincidunt efficitur. Mauris placerat elit sapien, id gravida metus lacinia sed. Quisque egestas est quis enim dapibus feugiat. Nunc eget varius nunc. Mauris maximus libero eu aliquam consequat. Duis placerat iaculis sem. Curabitur ligula nibh, pharetra quis finibus vitae, consequat feugiat est. Nulla facilisi. Vestibulum a pharetra est. Curabitur ut vehicula quam.', 149, '3/curso-de-php-mysqli-e-bootstrap.jpg', '2021-04-06 18:31:33', NULL),
(4, 'Curso de Html Css Bootstrap', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In suscipit est dignissim eros efficitur facilisis. Pellentesque porttitor tincidunt efficitur. Mauris placerat elit sapien, id gravida metus lacinia sed. Quisque egestas est quis enim dapibus feugiat. Nunc eget varius nunc. Mauris maximus libero eu aliquam consequat. Duis placerat iaculis sem. Curabitur ligula nibh, pharetra quis finibus vitae, consequat feugiat est. Nulla facilisi. Vestibulum a pharetra est. Curabitur ut vehicula quam.', 97, '4/curso-de-html-css-bootstrap.jpg', '2021-04-06 18:33:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `password` varchar(220) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created`, `modified`) VALUES
(1, 'nome', 'email', '$2y$10$ATP.t8CJ8qDgaVh3Y2lR8ORhCU2w1v2ONciLDPJHerNVH/PTfQ1bW', '2021-04-12 11:15:06', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
