-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Erstellungszeit: 10. Jun 2018 um 16:22
-- Server-Version: 5.6.35
-- PHP-Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Datenbank: `todo_app`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` enum('open','done','in_progress','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `description` text COLLATE utf8mb4_unicode_ci,
  `userId` int(22) NOT NULL,
  `dueDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `task`
--

INSERT INTO `task` (`id`, `name`, `state`, `description`, `userId`, `dueDate`) VALUES
  (1, 'Katze füttern', 'open', 'Heute musst du die Katze füttern', 9, '2018-06-30 00:00:00'),
  (2, 'Einkaufen', 'open', 'Gemüse und Fleisch einkaufen für sieben Personen', 11, '2018-07-29 00:00:00'),
  (3, 'Auto in den Service bringen', 'open', 'Das Auto muss um 8 Uhr in der Garage sein und am Nachmittag können wir es wieder holen.', 9, '2018-07-15 00:00:00'),
  (4, 'Kinder waschen', 'done', 'Paul und Sabine müssen die Haare waschen. Ist schon ewig her....', 11, '2018-11-21 00:00:00'),
  (5, 'Wand steichen', 'open', 'Die Küchenwand rosa streichen, so wie\'s vorher schon war.', 11, '2018-09-22 00:00:00'),
  (6, 'Rasen mähen', 'done', 'du musst noch den rasen mähen, weil am Samstag', 9, '2012-12-20 18:00:00'),
  (8, 'Tulpen schneiden', 'open', 'alle roten Tulpen müssen noch geschnitten werden ', 9, '2018-12-12 00:00:00'),
  (12, 'Task für Joe', 'open', 'Geht\'s oder geht\'s nciht?', 11, '2018-05-30 00:00:00'),
  (13, 'Wasser und Melonen', 'open', 'vom Brunnen holen', 9, '2020-06-20 06:00:00'),
  (14, 'Boote holen', 'open', 'Die beiden Spade in Memingen abholen.', 11, '2018-06-01 06:07:18');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `created`, `updated`) VALUES
  (1, 'Johny', '$2y$10$T3m4Q7Tr4t6x147PnXtVMul7MsCPCs2Fk7Sl72ycaXlsaF3//17/u', 'john@test.ch', 'John', 'Mustermann', '2018-05-05 10:03:08', '2018-05-05 10:03:08'),
  (3, 'Cash', '$2y$10$JEMSgJJiMpW0VOmpLZWN1edz93HStoi99Y118r8cv/FSUBp/p1C2K', 'john@saubermann.ch', 'John', 'Saubermann', '2018-05-05 10:38:36', '2018-05-05 10:38:36'),
  (5, 'Jeff', '$2y$10$ccjv85hw358epDDyUlw.3OhlvGL.G5c4IWD.yq79PAntTQ84uJrqq', 'jeff@saubermann.ch', 'Jeff', 'Session', '2018-05-05 10:53:32', '2018-05-05 10:53:32'),
  (7, 'Hans', '$2y$10$EW3AsemQL2eSNByZJqdxN.f1ScT/IEzdUe8p.f9Mu7XDuXMgnEeFS', 'hans@yahoo.com', 'Hans', 'Muster', '2018-05-05 11:30:24', '2018-05-05 11:30:24'),
  (8, 'Susi', '$2y$10$.Jai3jOxYPtLmunoZPpbH.8OhSQyWfmTkbStvrRCFueXQa7BwWXR6', 'susi@kayak.com', 'Susan', 'Meier', '2018-05-05 11:36:18', '2018-05-05 11:36:18'),
  (9, 'Karoline', '$2y$10$bRXgOV4VgUdrpXQ2zsVEkOrk/vWfWUNZXlrldEYgd8sKdlaESIiIa', 'karoline@haha.ch', 'Karoline', 'Steinmann Frey', '2018-05-05 11:57:50', '2018-05-05 11:57:50'),
  (11, 'Joe', '$2y$10$/c/DYZggvk1INItfn1k.9erLq2cpV2Jmr1Fbu2VXQgDHgH4Ajdoa6', 'joe@mitlinxlernen.ch', 'Thomas', 'Frey', '2018-05-15 18:36:15', '2018-05-15 18:36:15'),
  (12, 'Maria', '$2y$10$i9tBbCJTP.42WihfZlHCT.KwB9rXuh3ay4PxSGJED31YjAplFtX4.', 'maria@Ghtu.ch', 'Meier', 'Maria', '2018-05-26 10:22:35', '2018-05-26 10:22:35');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;