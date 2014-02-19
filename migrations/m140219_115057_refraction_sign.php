<?php

class m140219_115057_refraction_sign extends CDbMigration
{
	public function up()
	{
		$this->execute("CREATE TABLE `ophcocataractreferral_refraction_sign` (
					`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
					`name` VARCHAR(4) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
					`value` VARCHAR(4) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
					`display_order` TINYINT(3) UNSIGNED NULL DEFAULT '0',
					`last_modified_user_id` INT(10) UNSIGNED NOT NULL DEFAULT '1',
					`last_modified_date` DATETIME NOT NULL DEFAULT '1900-01-01 00:00:00',
					`created_user_id` INT(10) UNSIGNED NOT NULL DEFAULT '1',
					`created_date` DATETIME NOT NULL DEFAULT '1900-01-01 00:00:00',
					`deleted` TINYINT(1) UNSIGNED NOT NULL,
					PRIMARY KEY (`id`),
					INDEX `ophcocataractreferral_refraction_sign_lmui_fk` (`last_modified_user_id`),
					INDEX `ophcocataractreferral_refraction_sign_cui_fk` (`created_user_id`),
					CONSTRAINT `ophcocataractreferral_refraction_sign_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
					CONSTRAINT `ophcocataractreferral_refraction_sign_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
				)
				COLLATE='utf8_unicode_ci'
				ENGINE=InnoDB
				AUTO_INCREMENT=3;
		");

		$this->execute("CREATE TABLE `ophcocataractreferral_refraction_sign_version` (
					`id` INT(10) UNSIGNED NOT NULL,
					`name` VARCHAR(4) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
					`value` VARCHAR(4) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
					`display_order` TINYINT(3) UNSIGNED NULL DEFAULT '0',
					`last_modified_user_id` INT(10) UNSIGNED NOT NULL DEFAULT '1',
					`last_modified_date` DATETIME NOT NULL DEFAULT '1900-01-01 00:00:00',
					`created_user_id` INT(10) UNSIGNED NOT NULL DEFAULT '1',
					`created_date` DATETIME NOT NULL DEFAULT '1900-01-01 00:00:00',
					`version_date` DATETIME NOT NULL DEFAULT '1900-01-01 00:00:00',
					`version_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
					`deleted` TINYINT(1) UNSIGNED NOT NULL,
					PRIMARY KEY (`version_id`),
					INDEX `acv_ophcocataractreferral_refraction_sign_lmui_fk` (`last_modified_user_id`),
					INDEX `acv_ophcocataractreferral_refraction_sign_cui_fk` (`created_user_id`),
					INDEX `ophcocataractreferral_refraction_sign_aid_fk` (`id`),
					CONSTRAINT `acv_ophcocataractreferral_refraction_sign_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
					CONSTRAINT `acv_ophcocataractreferral_refraction_sign_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
					CONSTRAINT `ophcocataractreferral_refraction_sign_aid_fk` FOREIGN KEY (`id`) REFERENCES `ophcocataractreferral_refraction_sign` (`id`)
				)
				COLLATE='utf8_unicode_ci'
				ENGINE=InnoDB;
	
");

		$this->execute("insert into ophcocataractreferral_refraction_sign (id,name,value,display_order) values (1,1,'+',1)");
		$this->execute("insert into ophcocataractreferral_refraction_sign (id,name,value,display_order) values (2,-1,'-',2)");


	}

	public function down()
	{
		$this->execute("drop table ophcocataractreferral_refraction_sign_version");
		$this->execute("drop table ophcocataractreferral_refraction_sign");
	}

}