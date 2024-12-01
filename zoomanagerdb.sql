CREATE TABLE IF NOT EXISTS `Enclos` (
	`id` int NOT NULL AUTO_INCREMENT,
	`nom` varchar(255) NOT NULL DEFAULT '255',
	`description` text,
	`created_at` datetime NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `Animaux` (
	`id` int NOT NULL AUTO_INCREMENT,
	`nom` varchar(255) NOT NULL DEFAULT '255',
	`description` text,
	`espece_id` int NOT NULL,
	`created_at` datetime NOT NULL,
	`enclos_id` int NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `Especes` (
	`id` int NOT NULL AUTO_INCREMENT,
	`nom` varchar(255) NOT NULL DEFAULT '100',
	`description` text,
	PRIMARY KEY (`id`)
);

