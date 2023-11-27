-- Base de données : `gameflash`

-- Structure de la table `utilisateurs`
DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` text,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Structure de la table `recompenses`
DROP TABLE IF EXISTS `recompenses`;
CREATE TABLE IF NOT EXISTS `recompenses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `score` int DEFAULT NULL,
  `utilisateur_id` INT DEFAULT NULL,
  PRIMARY KEY (`id`),
  -- Ajout d'une contrainte de clé étrangère pour lier la table `recompenses` à la table `utilisateurs`
  INDEX `fk_utilisateur_recompense_idx` (`utilisateur_id` ASC),
  CONSTRAINT `fk_utilisateur_recompense` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Déchargement des données de la table `utilisateurs`
INSERT INTO `utilisateurs` (`id`, `username`, `email`, `password`, `token`, `create_at`) VALUES
(1, 'azerty', 'azerty@gmail.com', '$2y$10$iOGyQh68edDciZvsoG48Nu4Q8sjnTJuog2NYM/KlPLt7BMs8myJUO', NULL, '2023-11-25 10:58:23');
