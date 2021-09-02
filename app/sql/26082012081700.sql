ALTER TABLE `users` CHANGE `login` `email` VARCHAR(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;

ALTER TABLE `users` ADD UNIQUE(`email`);

ALTER TABLE `users` CHANGE `pwd` `pwd` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
ALTER TABLE `clients` ADD `prenom` VARCHAR(50) NOT NULL AFTER `nom`;
ALTER TABLE `clients` CHANGE `tel` `tel` VARCHAR(11) NOT NULL;
ALTER TABLE `fournisseurs` CHANGE `tel` `tel` VARCHAR(11) NOT NULL;
ALTER TABLE `produits` CHANGE `status` `status` TINYINT(1) NOT NULL DEFAULT '1';