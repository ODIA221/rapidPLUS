-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 06 jan. 2025 à 14:29
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rapide-plus`
--

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(5, 'Oumar DIAGNE', 'senbusinessfk@gmail.com', 'aaaaaaaaaaaa', '2025-01-05 22:18:24', '2025-01-05 22:18:24'),
(6, 'Oumar DIAGNE', 'senbusinessfk@gmail.com', 'aaaaaa', '2025-01-05 22:18:38', '2025-01-05 22:18:38'),
(7, 'Oumar DIAGNE', 'senbusinessfk@gmail.com', 'aaaaaa', '2025-01-05 22:21:13', '2025-01-05 22:21:13'),
(8, 'sysy', 'sysy@gmail.com', 'tester le contact ', '2025-01-06 13:04:03', '2025-01-06 13:04:03');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `address` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `vehicle_id`, `customer_name`, `date`, `address`, `destination`, `phone`, `created_at`) VALUES
(2, 2, 'test', '2025-01-12 21:26:00', 'test', 'test', 'test', '2025-01-05 20:27:01'),
(3, 2, 'Oumar DIAGNE', '2025-01-04 21:30:00', 'Dakar', 'qqq', '776289674', '2025-01-05 20:30:28'),
(4, 2, 'aaaaaaaaa', '2025-02-01 21:41:00', 'aaaaaaaaaaaaaaaa', 'aaaaaaaaaaaa', '776289674', '2025-01-05 20:41:13'),
(5, 3, 'Oumar DIAGNE', '2025-01-17 15:14:00', 'Dakar', 'ssssss', '776289674', '2025-01-06 12:14:24');

-- --------------------------------------------------------

--
-- Structure de la table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `license_plate` varchar(20) NOT NULL,
  `driver_name` varchar(255) NOT NULL,
  `driver_phone` varchar(20) NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
  `contact_info` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `vehicles`
--

INSERT INTO `vehicles` (`id`, `license_plate`, `driver_name`, `driver_phone`, `is_available`, `contact_info`, `created_at`, `updated_at`) VALUES
(1, 'fk-rd23-df', 'aaaaaaaaaaaaaaaaa', '223344', 1, 'beau mareché', '2025-01-05 19:33:21', '2025-01-06 12:56:01'),
(2, 'lg-rd23-df', 'eeeeeeeeeeeeeeee', '12345678', 1, 'arret moto yeumbal', '2025-01-05 20:17:42', '2025-01-06 12:56:24'),
(3, 'fk-rd232-df', 'ssssssss', '12345678', 1, 'arretsips', '2025-01-05 22:50:10', '2025-01-06 12:56:49'),
(4, 'AB-123-CD', 'adfqVW', '0987654', 1, 'Garage taxi liberté 6', '2025-01-06 12:49:28', '2025-01-06 12:49:28'),
(5, 'sss', 'ss', 'ss', 1, 'ssss', '2025-01-06 13:12:00', '2025-01-06 13:12:00'),
(6, 'test', 'test', '11111111111111111', 1, 'Garage Fatick', '2025-01-06 13:12:50', '2025-01-06 13:12:50'),
(7, 'test 1', 'test 1', '11111111111111111', 1, 'arret test 1 ', '2025-01-06 13:17:42', '2025-01-06 13:17:42');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
