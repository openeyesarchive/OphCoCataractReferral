<?php

class m140214_123018_instrument_tables extends OEMigration
{
	public function up()
	{
		$this->execute("CREATE TABLE `ophcocataractreferral_instrument` (
		`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
		`name` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
		`last_modified_user_id` INT(10) UNSIGNED NOT NULL DEFAULT '1',
		`last_modified_date` DATETIME NOT NULL DEFAULT '1900-01-01 00:00:00',
		`created_user_id` INT(10) UNSIGNED NOT NULL DEFAULT '1',
		`created_date` DATETIME NOT NULL DEFAULT '1900-01-01 00:00:00',
		`display_order` INT(10) UNSIGNED NULL DEFAULT '1',
		`deleted` TINYINT(1) UNSIGNED NOT NULL,
		PRIMARY KEY (`id`),
		INDEX `ophcocataractreferral_instrument_last_modified_user_id_fk` (`last_modified_user_id`),
		INDEX `ophcocataractreferral_instrument_created_user_id_fk` (`created_user_id`),
		CONSTRAINT `ophcocataractreferral_instrument_created_user_id_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
		CONSTRAINT `ophcocataractreferral_instrument_last_modified_user_id_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
		)
		COLLATE='utf8_unicode_ci'
		ENGINE=InnoDB
		AUTO_INCREMENT=7;
		");
		
		$this->execute("CREATE TABLE `ophcocataractreferral_instrument_version` (
		`id` INT(10) UNSIGNED NOT NULL,
		`name` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
		`last_modified_user_id` INT(10) UNSIGNED NOT NULL DEFAULT '1',
		`last_modified_date` DATETIME NOT NULL DEFAULT '1900-01-01 00:00:00',
		`created_user_id` INT(10) UNSIGNED NOT NULL DEFAULT '1',
		`created_date` DATETIME NOT NULL DEFAULT '1900-01-01 00:00:00',
		`display_order` INT(10) UNSIGNED NULL DEFAULT '1',
		`version_date` DATETIME NOT NULL DEFAULT '1900-01-01 00:00:00',
		`version_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
		`deleted` TINYINT(1) UNSIGNED NOT NULL,
		PRIMARY KEY (`version_id`),
		INDEX `acv_ophcocataractreferral_instrument_last_modified_user_id_fk` (`last_modified_user_id`),
		INDEX `acv_ophcocataractreferral_instrument_created_user_id_fk` (`created_user_id`),
		INDEX `ophcocataractreferral_instrument_aid_fk` (`id`),
		CONSTRAINT `acv_ophcocataractreferral_instrument_created_user_id_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
		CONSTRAINT `acv_ophcocataractreferral_instrument_last_modified_user_id_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
		CONSTRAINT `ophcocataractreferral_instrument_aid_fk` FOREIGN KEY (`id`) REFERENCES `ophcocataractreferral_instrument` (`id`)
		)
		COLLATE='utf8_unicode_ci'
		ENGINE=InnoDB;
");

	}

	public function down()
	{
		$this->execute("drop table ophcocataractreferral_instrument_version");
		$this->execute("drop table ophcocataractreferral_instrument");
	}
}