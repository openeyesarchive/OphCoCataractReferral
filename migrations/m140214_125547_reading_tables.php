<?php

class m140214_125547_reading_tables extends CDbMigration
{

		public function up()
	{
		$this->execute("CREATE TABLE `ophcocataractreferral_intraocularpressure_reading` (
		`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
		`name` VARCHAR(3) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
		`value` INT(10) UNSIGNED NULL DEFAULT NULL,
		`display_order` TINYINT(3) UNSIGNED NULL DEFAULT '0',
		`last_modified_user_id` INT(10) UNSIGNED NOT NULL DEFAULT '1',
		`last_modified_date` DATETIME NOT NULL DEFAULT '1900-01-01 00:00:00',
		`created_user_id` INT(10) UNSIGNED NOT NULL DEFAULT '1',
		`created_date` DATETIME NOT NULL DEFAULT '1900-01-01 00:00:00',
		PRIMARY KEY (`id`),
		INDEX `ophcocataractreferral_intraocularpressure_reading_lmui_fk` (`last_modified_user_id`),
		INDEX `ophcocataractreferral_intraocularpressure_reading_cui_fk` (`created_user_id`),
		CONSTRAINT `ophcocataractreferral_intraocularpressure_reading_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
		CONSTRAINT `ophcocataractreferral_intraocularpressure_reading_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
		)
		COLLATE='utf8_unicode_ci'
		ENGINE=InnoDB
		AUTO_INCREMENT=82;
	");

		$this->execute("CREATE TABLE `ophcocataractreferral_intraocularpressure_reading_version` (
		`id` INT(10) UNSIGNED NOT NULL,
		`name` VARCHAR(3) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
		`value` INT(10) UNSIGNED NULL DEFAULT NULL,
		`display_order` TINYINT(3) UNSIGNED NULL DEFAULT '0',
		`last_modified_user_id` INT(10) UNSIGNED NOT NULL DEFAULT '1',
		`last_modified_date` DATETIME NOT NULL DEFAULT '1900-01-01 00:00:00',
		`created_user_id` INT(10) UNSIGNED NOT NULL DEFAULT '1',
		`created_date` DATETIME NOT NULL DEFAULT '1900-01-01 00:00:00',
		`version_date` DATETIME NOT NULL DEFAULT '1900-01-01 00:00:00',
		`version_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
		PRIMARY KEY (`version_id`),
		INDEX `acv_ophcocataractreferral_intraocularpressure_reading_lmui_fk` (`last_modified_user_id`),
		INDEX `acv_ophcocataractreferral_intraocularpressure_reading_cui_fk` (`created_user_id`),
		INDEX `ophcocataractreferral_intraocularpressure_reading_aid_fk` (`id`),
		CONSTRAINT `acv_ophcocataractreferral_intraocularpressure_reading_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
		CONSTRAINT `acv_ophcocataractreferral_intraocularpressure_reading_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
		)
		COLLATE='utf8_unicode_ci'
		ENGINE=InnoDB;
");
	}

	public function down()
	{
		$this->execute("drop table ophcocataractreferral_intraocularpressure_reading_version");
		$this->execute("drop table ophcocataractreferral_intraocularpressure_reading");
	}

}