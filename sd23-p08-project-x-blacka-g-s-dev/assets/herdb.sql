-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 22 mei 2025 om 12:01
-- Gegenereerd op: 14 mei 2025 om 12:46
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `herdb`
--
CREATE DATABASE IF NOT EXISTS `herdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
       USE `herdb`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `category`
--

INSERT INTO `category` (`id`, `name`, `image`) VALUES
(1, 'wigs', 'wigs.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20250514093900', '2025-05-14 11:39:13', 23),
('DoctrineMigrations\\Version20250514094104', '2025-05-14 11:41:11', 15),
('DoctrineMigrations\\Version20250514094724', '2025-05-14 11:47:30', 7),
('DoctrineMigrations\\Version20250514095345', '2025-05-14 11:53:51', 7),
('DoctrineMigrations\\Version20250514100435', '2025-05-14 12:04:52', 19),
('DoctrineMigrations\\Version20250514102424', '2025-05-14 12:24:34', 6),
('DoctrineMigrations\\Version20250522094116', '2025-05-22 11:41:25', 8),
('DoctrineMigrations\\Version20250522095127', '2025-05-22 11:51:55', 55);
('DoctrineMigrations\\Version20250514102424', '2025-05-14 12:24:34', 6);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(5700) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `description`, `category_id`, `price`) VALUES
(1, 'Deep wave bluk', 'bluk-black.png', 'Onze diep golvend bulk haar is perfect voor het creëren van een natuurlijke en volumieuze look. Dit haartype staat bekend om zijn zachte, weelderige golven die een prachtige, volle uitstraling geven. Gemaakt van hoogwaardige, 100% natuurlijke menselijke haar, biedt deze bulk haar de flexibiliteit om te worden geknipt, gekleurd en gestyled volgens jouw wensen. Het is ideaal voor het maken van weaves, lace frontals, of voor het toevoegen van volume aan bestaande haarstijlen. De diepe golven zorgen voor een luxueuze, natuurlijke beweging die lang meegaat met de juiste verzorging. Kies voor onze diep golvend bulk haar en geniet van een prachtige, volle look die je zelfvertrouwen een boost geeft.', 1, 100.00);
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `description`, `category_id`, `price`) VALUES
(1, 'Deep wave bluk', 'bluk-black.png', 'Onze diep golvend bulk haar is perfect voor het creëren van een natuurlijke en volumieuze look. Dit haartype staat bekend om zijn zachte, weelderige golven die een prachtige, volle uitstraling geven. Gemaakt van hoogwaardige, 100% natuurlijke menselijke haar, biedt deze bulk haar de flexibiliteit om te worden geknipt, gekleurd en gestyled volgens jouw wensen. Het is ideaal voor het maken van weaves, lace frontals, of voor het toevoegen van volume aan bestaande haarstijlen. De diepe golven zorgen voor een luxueuze, natuurlijke beweging die lang meegaat met de juiste verzorging. Kies voor onze diep golvend bulk haar en geniet van een prachtige, volle look die je zelfvertrouwen een boost geeft.', 1, 100.00);


  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '(DC2Type:json)' CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `first_name`, `last_name`) VALUES
(1, 'Simon@gmail.com', '[]', '$2y$13$pVIvCdlT9XhEmeDWDDbB/eYMBfRlT0uCBGjKdbvkqVot.3fHORZWO', '', ''),
(2, 'Esey@gmail.com', '[]', '$2y$13$LKW.Gyi04.6X83vABWggluGlq9YWbeoTj7khCkecm9Q1eG0l2XiKe', 'Esey', 'Mhretab'),
(3, '123@123.com', '[]', '$2y$13$AfTk4zSNJoSRQBOh/oybA.hJns9jkQk1On.lxTv3XwcTuybf.y.xW', '123@123.com', '123@123.com');

(2, 'Esey@gmail.com', '[]', '$2y$13$LKW.Gyi04.6X83vABWggluGlq9YWbeoTj7khCkecm9Q1eG0l2XiKe', 'Esey', 'Mhretab'),
(3, '123@123.com', '[]', '$2y$13$AfTk4zSNJoSRQBOh/oybA.hJns9jkQk1On.lxTv3XwcTuybf.y.xW', '123@123.com', '123@123.com');
(2, 'Esey@gmail.com', '[]', '$2y$13$LKW.Gyi04.6X83vABWggluGlq9YWbeoTj7khCkecm9Q1eG0l2XiKe', 'Esey', 'Mhretab');


--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexen voor tabel `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indexen voor tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B3BA5A5A12469DE2` (`category_id`);

  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B3BA5A5A12469DE2` (`category_id`);

  ADD PRIMARY KEY (`id`);


--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `category`
--
ALTER TABLE `category`

  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


--
-- AUTO_INCREMENT voor een tabel `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `products`
--
ALTER TABLE `products`

  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;



--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`



  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_B3BA5A5A12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);


  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
