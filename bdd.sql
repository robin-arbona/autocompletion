-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 17, 2021 at 08:03 PM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `autocompletion`
--

-- --------------------------------------------------------

--
-- Table structure for table `dictionnaire`
--

CREATE TABLE `dictionnaire` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `definition` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dictionnaire`
--

INSERT INTO `dictionnaire` (`id`, `nom`, `definition`) VALUES
(1, 'chat', 'animal mignon qui ne sert à rien'),
(2, 'chien', 'animal sympathique qui ne sert à rien'),
(3, 'tortue', 'plus rapide qu\'on ne le pense'),
(4, 'poisson rouge', 'il n\'est pas toujours rouge'),
(5, 'mouette', 'elle est plus petite que le gabian, ce n\'est pas elle qui fait les poubelles'),
(6, 'gabian', 'plus gros que la mouette, il fait carton en vidant les poubelles'),
(7, 'rat', 'ils sont plus nombreux que nous'),
(8, 'poisson lune', 'on ne sait toujours pas comment il a pu survivre aussi longtemps, on va finir par l\'avoir'),
(9, 'rorqual', 'genre de baleine'),
(10, 'baleine', 'certaines atteignent les 50km/h'),
(11, 'moufette', 'animal mal odorant'),
(12, 'murene', 'elles mordent forts');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dictionnaire`
--
ALTER TABLE `dictionnaire`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dictionnaire`
--
ALTER TABLE `dictionnaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
