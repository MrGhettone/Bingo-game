-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 29, 2022 alle 18:48
-- Versione del server: 10.4.22-MariaDB
-- Versione PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bingo`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `games`
--

CREATE TABLE `games` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `bet` decimal(6,2) DEFAULT NULL,
  `win` decimal(6,2) DEFAULT NULL,
  `result` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `games`
--

INSERT INTO `games` (`id`, `user_id`, `bet`, `win`, `result`, `created_at`) VALUES
(1, 1, '1.00', '0.00', 0, '2022-04-29 12:58:27'),
(2, 1, '1.00', '3.00', 1, '2022-04-29 13:05:48'),
(3, 1, '1.00', '2.00', 1, '2022-04-29 13:05:22'),
(4, 1, '1.00', '3.00', 1, '2022-04-29 13:10:55'),
(5, 1, '1.00', '3.00', 1, '2022-04-29 13:11:32'),
(6, 1, '1.00', '3.00', 1, '2022-04-29 13:11:46'),
(7, 1, '1.00', '0.00', 0, '2022-04-29 13:20:05'),
(8, 1, '1.00', '0.00', 0, '2022-04-29 13:20:09'),
(9, 1, '1.00', '2.00', 1, '2022-04-29 13:20:23'),
(10, 1, '1.00', '2.00', 1, '2022-04-29 13:20:42'),
(11, 1, '1.00', '0.00', 0, '2022-04-29 13:22:38'),
(12, 1, '1.00', '5.00', 1, '2022-04-29 13:23:00'),
(13, 1, '1.00', '3.00', 1, '2022-04-29 13:23:08'),
(14, 1, '1.00', '2.00', 1, '2022-04-29 13:23:23'),
(15, 1, '1.00', '2.00', 1, '2022-04-29 13:23:47'),
(16, 1, '1.00', '2.00', 1, '2022-04-29 13:23:55'),
(17, 1, '1.00', '0.00', 0, '2022-04-29 13:25:47'),
(18, 1, '1.00', '0.00', 0, '2022-04-29 13:26:19'),
(19, 1, '1.00', '2.00', 1, '2022-04-29 13:27:43'),
(20, 1, '1.00', '0.00', 0, '2022-04-29 13:28:49'),
(21, 1, '1.00', '2.00', 1, '2022-04-29 13:31:11'),
(22, 1, '1.00', '2.00', 1, '2022-04-29 13:31:20'),
(23, 1, '1.00', '0.00', 0, '2022-04-29 13:31:50'),
(24, 1, '1.00', '0.00', 0, '2022-04-29 13:35:26'),
(25, 1, '1.00', '0.00', 0, '2022-04-29 13:36:51'),
(26, 1, '1.00', '0.00', 0, '2022-04-29 13:37:00'),
(27, 1, '1.00', '0.00', 0, '2022-04-29 13:37:05'),
(28, 1, '1.00', '2.00', 0, '2022-04-29 13:37:14'),
(29, 1, '1.00', '2.00', 0, '2022-04-29 13:38:07'),
(30, 1, '1.00', '2.00', 0, '2022-04-29 13:39:27'),
(31, 1, '1.00', '0.00', 0, '2022-04-29 13:43:17'),
(32, 1, '1.00', '0.00', 0, '2022-04-29 13:43:49'),
(33, 1, '1.00', '2.00', 1, '2022-04-29 13:44:06'),
(34, 1, '1.00', '0.00', 0, '2022-04-29 14:13:04'),
(35, 1, '1.00', '0.00', 0, '2022-04-29 14:13:32'),
(36, 1, '1.00', '2.00', 1, '2022-04-29 14:13:39'),
(37, 1, '1.00', '0.00', 0, '2022-04-29 14:13:45'),
(38, 1, '1.00', '0.00', 0, '2022-04-29 14:13:51'),
(39, 1, '1.00', '0.00', 0, '2022-04-29 14:22:49'),
(40, 1, '1.00', '2.00', 1, '2022-04-29 14:22:55'),
(41, 1, '1.00', '0.00', 0, '2022-04-29 14:23:00'),
(42, 1, '1.00', '2.00', 1, '2022-04-29 14:23:07'),
(43, 1, '1.00', '0.00', 0, '2022-04-29 14:23:14'),
(44, 1, '1.00', '2.00', 1, '2022-04-29 14:23:29'),
(45, 7, '5.00', '0.00', 0, '2022-04-29 15:02:01'),
(46, 7, '1.00', '0.00', 0, '2022-04-29 15:02:29'),
(47, 7, '1.00', '2.00', 1, '2022-04-29 15:02:56'),
(48, 7, '1.00', '2.00', 1, '2022-04-29 15:03:18'),
(49, 7, '1.00', '2.00', 1, '2022-04-29 15:03:31'),
(50, 7, '1.00', '2.00', 1, '2022-04-29 15:09:12'),
(51, 1, '1.00', '2.00', 1, '2022-04-29 16:46:54');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `psw` varchar(255) DEFAULT NULL,
  `balance` decimal(6,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `psw`, `balance`, `created_at`) VALUES
(1, 'matteo', 'ghetti', 'mrghettone@gmail.com', '12345', '25.00', '2022-04-29 16:46:54'),
(2, 'giuseppe', 'maggi', 'perlanegra@tatuami.it', '12345', '10.00', '2022-04-27 14:53:34'),
(3, 'matteo', 'ghetti', 'secco@bicipite.it', '12345', '10.00', '2022-04-27 14:54:15'),
(4, 'angelo', 'gallina', 'anggal@gmail.com', '12345', '10.00', '2022-04-27 20:32:24'),
(6, 'MATTEO', 'GHETTI', 'dssdfs@lillo.it', '12345', '10.00', '2022-04-29 14:32:21'),
(7, 'marco', 'longo', 'marc@libero.it', '12345', '8.00', '2022-04-29 15:09:12');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `games`
--
ALTER TABLE `games`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
