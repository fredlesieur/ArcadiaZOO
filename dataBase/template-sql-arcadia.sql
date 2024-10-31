# appuyer sue run pour creer les tables pour inserer les données faire insert into table_name (col1, col2, col3) values ('val1', 'val2', 'val3');

 CREATE TABLE `accueil` (
    `id` int NOT NULL AUTO_INCREMENT,
    `name` varchar(100) NOT NULL,
    `description` text NOT NULL,
    `image` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`)
 );
 CREATE TABLE `addavis` (
    `id` int NOT NULL AUTO_INCREMENT,
    `pseudo` varchar(100) NOT NULL DEFAULT '0',
    `comment` text NOT NULL,
    `valid` tinyint(1) DEFAULT '0',
    PRIMARY KEY (`id`)
 );
 CREATE TABLE `animaux` (
    `id` int NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
    `nom` varchar(255) DEFAULT NULL,
    `age` int DEFAULT NULL,
    `race` varchar(55) DEFAULT NULL,
    `image` varchar(255) DEFAULT NULL,
    `id_habitats` int DEFAULT NULL,
    `views` int DEFAULT '0',
    PRIMARY KEY (`id`),
    KEY `fk_new_column` (`id_habitats`),
);
    CONSTRAINT `fk_new_column` FOREIGN KEY (`id_habitats`) REFERENCES `habitats` (`id`)
 CREATE TABLE `carousel_images` (
    `id` int NOT NULL AUTO_INCREMENT,
    `item_name` varchar(255) NOT NULL,
    `image_path` varchar(255) NOT NULL,
    `alt_text` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
 );
 CREATE TABLE `coordonnee` (
    `id` int NOT NULL AUTO_INCREMENT,
    `adresse` varchar(255) DEFAULT NULL,
    `cp_ville` varchar(30) DEFAULT NULL,
    `telephone` varchar(20) DEFAULT NULL,
    PRIMARY KEY (`id`)
 );
 CREATE TABLE `habitats` (
    `id` int NOT NULL AUTO_INCREMENT,
    `name` varchar(100) NOT NULL,
    `description` text NOT NULL,
    `description_courte` text,
    `image` varchar(255) DEFAULT NULL,
    `image2` varchar(255) DEFAULT NULL,
    `image3` varchar(255) DEFAULT NULL,
    `commentaire` text,
    `user_id` int DEFAULT NULL,
    PRIMARY KEY (`id`)
 );
 CREATE TABLE `rapports` (
    `id` int NOT NULL AUTO_INCREMENT,
    `user_id` int DEFAULT NULL,
    `animal_id` int DEFAULT NULL,
    `etat` text,
    `nourriture_preconisee` varchar(255) DEFAULT NULL,
    `grammage_preconise` varchar(255) DEFAULT NULL,
    `date_passage` date DEFAULT NULL,
    `detail_etat` text,
    `date_heure` datetime DEFAULT NULL,
    `grammage_donne` varchar(255) DEFAULT NULL,
    `nourriture_donnee` varchar(255) DEFAULT NULL,
    `employe_id` int DEFAULT NULL,
    `veterinaire_id` int DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `user_id` (`user_id`),
    KEY `animal_id` (`animal_id`),
    KEY `fk_veterinaire` (`veterinaire_id`),
    KEY `fk_employe` (`employe_id`),
    CONSTRAINT `fk_employe` FOREIGN KEY (`employe_id`) REFERENCES `users` (`id`),
    CONSTRAINT `fk_veterinaire` FOREIGN KEY (`veterinaire_id`) REFERENCES `users` (`id`),
    CONSTRAINT `rapports_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON
 DELETE CASCADE,
    CONSTRAINT `rapports_ibfk_2` FOREIGN KEY (`animal_id`) REFERENCES `animaux` (`id`)
 ON DELETE CASCADE
 );
 CREATE TABLE `roles` (
    `id` int NOT NULL AUTO_INCREMENT,
    `role_name` varchar(50) NOT NULL,
    PRIMARY KEY (`id`)
 );
 CREATE TABLE `services` (
    `id` int NOT NULL AUTO_INCREMENT,
    `name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
    `description` text COLLATE utf8mb4_general_ci,
    `categorie` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
    `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
    `image2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
    `duree` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
    `tarifs` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
    `horaires` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
 );
 CREATE TABLE `users` (
    `id` int NOT NULL AUTO_INCREMENT,
    `nom_prenom` varchar(55) DEFAULT NULL,
    `email` varchar(100) NOT NULL,
    `password` varchar(255) NOT NULL,
    `role_id` int DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `role_id` (`role_id`),
    CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
 );

