-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 24 avr. 2024 à 23:59
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `masroufi`
--

-- --------------------------------------------------------

--
-- Structure de la table `adds`
--

CREATE TABLE `adds` (
  `id_adds` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `add_name` varchar(255) NOT NULL,
  `add_date` datetime DEFAULT current_timestamp(),
  `amount` decimal(10,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `adds`
--

INSERT INTO `adds` (`id_adds`, `id_user`, `add_name`, `add_date`, `amount`) VALUES
(13, 1, 'project', '2024-04-24 22:55:07', 150.000);

-- --------------------------------------------------------

--
-- Structure de la table `dependents`
--

CREATE TABLE `dependents` (
  `id_dependent` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `dependents`
--

INSERT INTO `dependents` (`id_dependent`, `id_user`, `name`, `price`) VALUES
(2, 1, 'coffe', 1.200),
(3, 1, 'cake', 0.900),
(4, 1, 'fanta', 1.700);

-- --------------------------------------------------------

--
-- Structure de la table `monthly_expenses`
--

CREATE TABLE `monthly_expenses` (
  `id_monthly_expense` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `amount` decimal(10,3) DEFAULT NULL,
  `expense_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `monthly_expenses`
--

INSERT INTO `monthly_expenses` (`id_monthly_expense`, `id_user`, `subject`, `amount`, `expense_date`) VALUES
(3, 1, 'louer', 250.000, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `payments`
--

CREATE TABLE `payments` (
  `id_payment` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `name_payement` varchar(255) NOT NULL,
  `payment_date` datetime DEFAULT current_timestamp(),
  `amount` decimal(10,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `payments`
--



-- --------------------------------------------------------

--
-- Structure de la table `savings`
--

CREATE TABLE `savings` (
  `id_savings` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `amount` decimal(10,3) DEFAULT NULL,
  `saving_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `savings`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `salaire` decimal(10,3) DEFAULT NULL,
  `solde` decimal(10,3) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `nom`, `prenom`, `email`, `salaire`, `solde`, `mdp`) VALUES
(1, 'adem ', ' bouafia', 'elelelel@gmail.comdfsdfs', 1200.000, 900, 'testuser');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adds`
--
ALTER TABLE `adds`
  ADD PRIMARY KEY (`id_adds`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `dependents`
--
ALTER TABLE `dependents`
  ADD PRIMARY KEY (`id_dependent`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `monthly_expenses`
--
ALTER TABLE `monthly_expenses`
  ADD PRIMARY KEY (`id_monthly_expense`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id_payment`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `savings`
--
ALTER TABLE `savings`
  ADD PRIMARY KEY (`id_savings`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adds`
--
ALTER TABLE `adds`
  MODIFY `id_adds` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `dependents`
--
ALTER TABLE `dependents`
  MODIFY `id_dependent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `monthly_expenses`
--
ALTER TABLE `monthly_expenses`
  MODIFY `id_monthly_expense` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `payments`
--
ALTER TABLE `payments`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `savings`
--
ALTER TABLE `savings`
  MODIFY `id_savings` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adds`
--
ALTER TABLE `adds`
  ADD CONSTRAINT `adds_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `dependents`
--
ALTER TABLE `dependents`
  ADD CONSTRAINT `dependents_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `monthly_expenses`
--
ALTER TABLE `monthly_expenses`
  ADD CONSTRAINT `monthly_expenses_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `savings`
--
ALTER TABLE `savings`
  ADD CONSTRAINT `savings_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
