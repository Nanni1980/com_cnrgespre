CREATE TABLE IF NOT EXISTS `#__cnrgespre_utenti` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`asset_id` INT(10) UNSIGNED NOT NULL DEFAULT '0',

`codicefiscale` VARCHAR(16)  NOT NULL ,
`utentesistema` INT(11)  NOT NULL ,
`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
`created_by` INT(11)  NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS `#__cnrgespre_giustificativi` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
`created_by` INT(11)  NOT NULL ,
`codicecnr` VARCHAR(255)  NOT NULL ,
`titolo` VARCHAR(255)  NOT NULL ,
`descrizione` TEXT NOT NULL ,
`applicazione` TINYINT(1)  NOT NULL ,
`tipo` VARCHAR(255)  NOT NULL ,
`soglia` VARCHAR(255)  NOT NULL ,
`attribuzionebuonipasto` TINYINT(1)  NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

