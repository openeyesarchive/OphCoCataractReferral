<?php

class m140219_112431_refraction_fraction extends CDbMigration
{
	public function up()
	{
		$this->execute("CREATE TABLE `ophcocataractreferral_refraction_fraction` (
				`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
				`name` varchar(4) DEFAULT NULL,
				`value` varchar(3) DEFAULT NULL,
				`display_order` tinyint(3) unsigned DEFAULT '0',
				`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
				`last_modified_date` datetime NOT NULL DEFAULT '1900-01-01 00:00:00',
				`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
				`created_date` datetime NOT NULL DEFAULT '1900-01-01 00:00:00',
				PRIMARY KEY (`id`),
				KEY `ophcocataractreferral_refraction_fraction_lmui_fk` (`last_modified_user_id`),
				KEY `ophcocataractreferral_refraction_fraction_cui_fk` (`created_user_id`),
				CONSTRAINT `ophcocataractreferral_refraction_fraction_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
				CONSTRAINT `ophcocataractreferral_refraction_fraction_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->execute("CREATE TABLE `ophcocataractreferral_refraction_fraction_version` (
				`id` INT(10) UNSIGNED NOT NULL,
				`name` VARCHAR(4) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
				`value` VARCHAR(3) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
				`display_order` TINYINT(3) UNSIGNED NULL DEFAULT '0',
				`last_modified_user_id` INT(10) UNSIGNED NOT NULL DEFAULT '1',
				`last_modified_date` DATETIME NOT NULL DEFAULT '1900-01-01 00:00:00',
				`created_user_id` INT(10) UNSIGNED NOT NULL DEFAULT '1',
				`created_date` DATETIME NOT NULL DEFAULT '1900-01-01 00:00:00',
				`version_date` DATETIME NOT NULL DEFAULT '1900-01-01 00:00:00',
				`version_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				`deleted` TINYINT(1) UNSIGNED NOT NULL,
				PRIMARY KEY (`version_id`),
				INDEX `acv_ophcocataractreferral_refraction_fraction_lmui_fk` (`last_modified_user_id`),
				INDEX `acv_ophcocataractreferral_refraction_fraction_cui_fk` (`created_user_id`),
				INDEX `ophcocataractreferral_refraction_fraction_aid_fk` (`id`),
				CONSTRAINT `acv_ophcocataractreferral_refraction_fraction_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
				CONSTRAINT `acv_ophcocataractreferral_refraction_fraction_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
				CONSTRAINT `ophcocataractreferral_refraction_fraction_aid_fk` FOREIGN KEY (`id`) REFERENCES `ophcocataractreferral_refraction_fraction` (`id`)
				)
				COLLATE='utf8_unicode_ci'
				ENGINE=InnoDB;
");

		$this->execute("insert into ophcocataractreferral_refraction_fraction (id,name,value,display_order) values (1,0,.00,1)");
		$this->execute("insert into ophcocataractreferral_refraction_fraction (id,name,value,display_order) values (2,0.25,.25,2)");
		$this->execute("insert into ophcocataractreferral_refraction_fraction (id,name,value,display_order) values (3,0.50,.50,3)");
		$this->execute("insert into ophcocataractreferral_refraction_fraction (id,name,value,display_order) values (4,0.75,.75,4)");

	}

	public function down()
	{
		$this->execute("drop table ophcocataractreferral_refraction_fraction_version");
		$this->execute("drop table ophcocataractreferral_refraction_fraction");
	}

}