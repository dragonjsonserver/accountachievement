CREATE TABLE `accountachievements` (
	`accountachievement_id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
	`modified` TIMESTAMP NOT NULL DEFAULT NOW() ON UPDATE NOW(),
	`created` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
	`account_id` BIGINT(20) UNSIGNED NOT NULL,
	`gamedesign_identifier` VARCHAR(255) NOT NULL,
	`data` TEXT NOT NULL,
	`level` INTEGER(11) NOT NULL,
	PRIMARY KEY (`accountachievement_id`),
	UNIQUE KEY `account_id` (`account_id`, `gamedesign_identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
