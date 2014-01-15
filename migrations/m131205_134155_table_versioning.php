<?php

class m131205_134155_table_versioning extends CDbMigration
{
	public function up()
	{
		$this->execute("
CREATE TABLE `et_ophcocataractreferral_confirmation_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`risks_discussed` tinyint(1) unsigned NOT NULL,
	`consider_surgery` tinyint(1) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophcocataractreferral_confirmation_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophcocataractreferral_confirmation_cui_fk` (`created_user_id`),
	KEY `acv_et_ophcocataractreferral_confirmation_ev_fk` (`event_id`),
	CONSTRAINT `acv_et_ophcocataractreferral_confirmation_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_confirmation_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_confirmation_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('et_ophcocataractreferral_confirmation_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcocataractreferral_confirmation_version');

		$this->createIndex('et_ophcocataractreferral_confirmation_aid_fk','et_ophcocataractreferral_confirmation_version','id');
		$this->addForeignKey('et_ophcocataractreferral_confirmation_aid_fk','et_ophcocataractreferral_confirmation_version','id','et_ophcocataractreferral_confirmation','id');

		$this->addColumn('et_ophcocataractreferral_confirmation_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcocataractreferral_confirmation_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcocataractreferral_confirmation_version','version_id');
		$this->alterColumn('et_ophcocataractreferral_confirmation_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcocataractreferral_currentrefraction_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`left_sphere` decimal(5,2) DEFAULT NULL,
	`left_cylinder` decimal(5,2) DEFAULT NULL,
	`left_axis` int(3) DEFAULT '0',
	`left_axis_eyedraw` text,
	`left_type_id` int(10) unsigned DEFAULT NULL,
	`right_sphere` decimal(5,2) DEFAULT NULL,
	`right_cylinder` decimal(5,2) DEFAULT NULL,
	`right_axis` int(3) DEFAULT '0',
	`right_axis_eyedraw` text,
	`right_type_id` int(10) unsigned DEFAULT NULL,
	`left_type_other` varchar(100) DEFAULT NULL,
	`right_type_other` varchar(100) DEFAULT NULL,
	`right_graph_axis_eyedraw` text,
	`left_graph_axis_eyedraw` text,
	PRIMARY KEY (`id`),
	KEY `acv_et_ophcocataractreferral_cr_e_id_fk` (`event_id`),
	KEY `acv_et_ophcocataractreferral_cr_c_u_id_fk` (`created_user_id`),
	KEY `acv_et_ophcocataractreferral_cr_l_m_u_id_fk` (`last_modified_user_id`),
	KEY `acv_et_ophcocataractreferral_cr_l_r_t_id_fk` (`left_type_id`),
	KEY `acv_et_ophcocataractreferral_cr_r_r_t_id_fk` (`right_type_id`),
	CONSTRAINT `acv_et_ophcocataractreferral_cr_c_u_id_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_cr_e_id_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_cr_l_m_u_id_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_cr_l_r_t_id_fk` FOREIGN KEY (`left_type_id`) REFERENCES `et_ophcocataractreferral_refraction_type` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_cr_r_r_t_id_fk` FOREIGN KEY (`right_type_id`) REFERENCES `et_ophcocataractreferral_refraction_type` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('et_ophcocataractreferral_currentrefraction_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcocataractreferral_currentrefraction_version');

		$this->createIndex('et_ophcocataractreferral_currentrefraction_aid_fk','et_ophcocataractreferral_currentrefraction_version','id');
		$this->addForeignKey('et_ophcocataractreferral_currentrefraction_aid_fk','et_ophcocataractreferral_currentrefraction_version','id','et_ophcocataractreferral_currentrefraction','id');

		$this->addColumn('et_ophcocataractreferral_currentrefraction_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcocataractreferral_currentrefraction_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcocataractreferral_currentrefraction_version','version_id');
		$this->alterColumn('et_ophcocataractreferral_currentrefraction_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcocataractreferral_hpc_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`history` text NOT NULL,
	`impact` text NOT NULL,
	`refraction_id` int(10) unsigned NOT NULL,
	`eye_id` int(10) unsigned NOT NULL,
	`onset_id` int(10) unsigned NOT NULL,
	`first_second_eye_id` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophcocataractreferral_hpc_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophcocataractreferral_hpc_cui_fk` (`created_user_id`),
	KEY `acv_et_ophcocataractreferral_hpc_ev_fk` (`event_id`),
	KEY `acv_et_ophcocataractreferral_hpc_refraction_fk` (`refraction_id`),
	KEY `acv_et_ophcocataractreferral_hpc_onset_fk` (`onset_id`),
	KEY `acv_et_ophcocataractreferral_hpc_first_second_eye_fk` (`first_second_eye_id`),
	KEY `acv_et_ophcocataractreferral_hpc_eye_id_fk` (`eye_id`),
	CONSTRAINT `acv_et_ophcocataractreferral_hpc_eye_id_fk` FOREIGN KEY (`eye_id`) REFERENCES `eye` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_hpc_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_hpc_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_hpc_first_second_eye_fk` FOREIGN KEY (`first_second_eye_id`) REFERENCES `et_ophcocataractreferral_hpc_first_second_eye` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_hpc_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_hpc_onset_fk` FOREIGN KEY (`onset_id`) REFERENCES `et_ophcocataractreferral_hpc_onset` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_hpc_refraction_fk` FOREIGN KEY (`refraction_id`) REFERENCES `et_ophcocataractreferral_hpc_refraction` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('et_ophcocataractreferral_hpc_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcocataractreferral_hpc_version');

		$this->createIndex('et_ophcocataractreferral_hpc_aid_fk','et_ophcocataractreferral_hpc_version','id');
		$this->addForeignKey('et_ophcocataractreferral_hpc_aid_fk','et_ophcocataractreferral_hpc_version','id','et_ophcocataractreferral_hpc','id');

		$this->addColumn('et_ophcocataractreferral_hpc_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcocataractreferral_hpc_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcocataractreferral_hpc_version','version_id');
		$this->alterColumn('et_ophcocataractreferral_hpc_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcocataractreferral_hpc_first_second_eye_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophcocataractreferral_hpc_first_second_eye_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophcocataractreferral_hpc_first_second_eye_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_et_ophcocataractreferral_hpc_first_second_eye_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_hpc_first_second_eye_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('et_ophcocataractreferral_hpc_first_second_eye_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcocataractreferral_hpc_first_second_eye_version');

		$this->createIndex('et_ophcocataractreferral_hpc_first_second_eye_aid_fk','et_ophcocataractreferral_hpc_first_second_eye_version','id');
		$this->addForeignKey('et_ophcocataractreferral_hpc_first_second_eye_aid_fk','et_ophcocataractreferral_hpc_first_second_eye_version','id','et_ophcocataractreferral_hpc_first_second_eye','id');

		$this->addColumn('et_ophcocataractreferral_hpc_first_second_eye_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcocataractreferral_hpc_first_second_eye_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcocataractreferral_hpc_first_second_eye_version','version_id');
		$this->alterColumn('et_ophcocataractreferral_hpc_first_second_eye_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcocataractreferral_hpc_history_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophcocataractreferral_hpc_history_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophcocataractreferral_hpc_history_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_et_ophcocataractreferral_hpc_history_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_hpc_history_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('et_ophcocataractreferral_hpc_history_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcocataractreferral_hpc_history_version');

		$this->createIndex('et_ophcocataractreferral_hpc_history_aid_fk','et_ophcocataractreferral_hpc_history_version','id');
		$this->addForeignKey('et_ophcocataractreferral_hpc_history_aid_fk','et_ophcocataractreferral_hpc_history_version','id','et_ophcocataractreferral_hpc_history','id');

		$this->addColumn('et_ophcocataractreferral_hpc_history_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcocataractreferral_hpc_history_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcocataractreferral_hpc_history_version','version_id');
		$this->alterColumn('et_ophcocataractreferral_hpc_history_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcocataractreferral_hpc_impact_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophcocataractreferral_hpc_impact_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophcocataractreferral_hpc_impact_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_et_ophcocataractreferral_hpc_impact_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_hpc_impact_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('et_ophcocataractreferral_hpc_impact_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcocataractreferral_hpc_impact_version');

		$this->createIndex('et_ophcocataractreferral_hpc_impact_aid_fk','et_ophcocataractreferral_hpc_impact_version','id');
		$this->addForeignKey('et_ophcocataractreferral_hpc_impact_aid_fk','et_ophcocataractreferral_hpc_impact_version','id','et_ophcocataractreferral_hpc_impact','id');

		$this->addColumn('et_ophcocataractreferral_hpc_impact_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcocataractreferral_hpc_impact_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcocataractreferral_hpc_impact_version','version_id');
		$this->alterColumn('et_ophcocataractreferral_hpc_impact_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcocataractreferral_hpc_onset_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophcocataractreferral_hpc_onset_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophcocataractreferral_hpc_onset_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_et_ophcocataractreferral_hpc_onset_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_hpc_onset_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('et_ophcocataractreferral_hpc_onset_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcocataractreferral_hpc_onset_version');

		$this->createIndex('et_ophcocataractreferral_hpc_onset_aid_fk','et_ophcocataractreferral_hpc_onset_version','id');
		$this->addForeignKey('et_ophcocataractreferral_hpc_onset_aid_fk','et_ophcocataractreferral_hpc_onset_version','id','et_ophcocataractreferral_hpc_onset','id');

		$this->addColumn('et_ophcocataractreferral_hpc_onset_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcocataractreferral_hpc_onset_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcocataractreferral_hpc_onset_version','version_id');
		$this->alterColumn('et_ophcocataractreferral_hpc_onset_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcocataractreferral_hpc_refraction_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophcocataractreferral_hpc_refraction_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophcocataractreferral_hpc_refraction_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_et_ophcocataractreferral_hpc_refraction_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_hpc_refraction_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('et_ophcocataractreferral_hpc_refraction_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcocataractreferral_hpc_refraction_version');

		$this->createIndex('et_ophcocataractreferral_hpc_refraction_aid_fk','et_ophcocataractreferral_hpc_refraction_version','id');
		$this->addForeignKey('et_ophcocataractreferral_hpc_refraction_aid_fk','et_ophcocataractreferral_hpc_refraction_version','id','et_ophcocataractreferral_hpc_refraction','id');

		$this->addColumn('et_ophcocataractreferral_hpc_refraction_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcocataractreferral_hpc_refraction_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcocataractreferral_hpc_refraction_version','version_id');
		$this->alterColumn('et_ophcocataractreferral_hpc_refraction_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcocataractreferral_intraocularpressure_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`left_instrument_id` int(10) unsigned NOT NULL,
	`left_pressure` int(10) unsigned DEFAULT NULL,
	`right_instrument_id` int(10) unsigned NOT NULL,
	`right_pressure` int(10) unsigned DEFAULT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophcocataractreferral_intraocularpressure_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophcocataractreferral_intraocularpressure_cui_fk` (`created_user_id`),
	KEY `acv_et_ophcocataractreferral_intraocularpressure_ev_fk` (`event_id`),
	KEY `acv_phcocataractreferral_intraocularpressure_left_instrument_fk` (`left_instrument_id`),
	KEY `acv_phcocataractreferral_intraocularpressure_right_instrument_fk` (`right_instrument_id`),
	CONSTRAINT `acv_et_ophcocataractreferral_intraocularpressure_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_intraocularpressure_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
	CONSTRAINT `acv_phcocataractreferral_intraocularpressure_left_instrument_fk` FOREIGN KEY (`left_instrument_id`) REFERENCES `et_ophcocataractreferral_intraocularpressure_instrument` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_intraocularpressure_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_phcocataractreferral_intraocularpressure_right_instrument_fk` FOREIGN KEY (`right_instrument_id`) REFERENCES `et_ophcocataractreferral_intraocularpressure_instrument` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('et_ophcocataractreferral_intraocularpressure_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcocataractreferral_intraocularpressure_version');

		$this->createIndex('et_ophcocataractreferral_intraocularpressure_aid_fk','et_ophcocataractreferral_intraocularpressure_version','id');
		$this->addForeignKey('et_ophcocataractreferral_intraocularpressure_aid_fk','et_ophcocataractreferral_intraocularpressure_version','id','et_ophcocataractreferral_intraocularpressure','id');

		$this->addColumn('et_ophcocataractreferral_intraocularpressure_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcocataractreferral_intraocularpressure_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcocataractreferral_intraocularpressure_version','version_id');
		$this->alterColumn('et_ophcocataractreferral_intraocularpressure_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcocataractreferral_intraocularpressure_instrument_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_oii_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_oii_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_et_oii_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_oii_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('et_ophcocataractreferral_intraocularpressure_instrument_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcocataractreferral_intraocularpressure_instrument_version');

		$this->createIndex('et_ophcocataractreferral_intraocularpressure_instrument_aid_fk','et_ophcocataractreferral_intraocularpressure_instrument_version','id');
		$this->addForeignKey('et_ophcocataractreferral_intraocularpressure_instrument_aid_fk','et_ophcocataractreferral_intraocularpressure_instrument_version','id','et_ophcocataractreferral_intraocularpressure_instrument','id');

		$this->addColumn('et_ophcocataractreferral_intraocularpressure_instrument_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcocataractreferral_intraocularpressure_instrument_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcocataractreferral_intraocularpressure_instrument_version','version_id');
		$this->alterColumn('et_ophcocataractreferral_intraocularpressure_instrument_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcocataractreferral_patientdetails_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`driving_status_id` int(10) unsigned NOT NULL,
	`interpreter_id` int(10) unsigned DEFAULT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophcocataractreferral_patientdetails_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophcocataractreferral_patientdetails_cui_fk` (`created_user_id`),
	KEY `acv_et_ophcocataractreferral_patientdetails_ev_fk` (`event_id`),
	KEY `acv_et_ophcocataractreferral_patientdetails_driving_status_fk` (`driving_status_id`),
	KEY `acv_et_ophcocataractreferral_patientdetails_interpreter_id_fk` (`interpreter_id`),
	CONSTRAINT `acv_et_ophcocataractreferral_patientdetails_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_patientdetails_driving_status_fk` FOREIGN KEY (`driving_status_id`) REFERENCES `et_ophcocataractreferral_patientdetails_driving_status` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_patientdetails_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_patientdetails_interpreter_id_fk` FOREIGN KEY (`interpreter_id`) REFERENCES `language` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_patientdetails_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('et_ophcocataractreferral_patientdetails_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcocataractreferral_patientdetails_version');

		$this->createIndex('et_ophcocataractreferral_patientdetails_aid_fk','et_ophcocataractreferral_patientdetails_version','id');
		$this->addForeignKey('et_ophcocataractreferral_patientdetails_aid_fk','et_ophcocataractreferral_patientdetails_version','id','et_ophcocataractreferral_patientdetails','id');

		$this->addColumn('et_ophcocataractreferral_patientdetails_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcocataractreferral_patientdetails_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcocataractreferral_patientdetails_version','version_id');
		$this->alterColumn('et_ophcocataractreferral_patientdetails_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcocataractreferral_patientdetails_driving_status_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_phcocataractreferral_patientdetails_driving_status_lmui_fk` (`last_modified_user_id`),
	KEY `acv_phcocataractreferral_patientdetails_driving_status_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_phcocataractreferral_patientdetails_driving_status_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_phcocataractreferral_patientdetails_driving_status_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('et_ophcocataractreferral_patientdetails_driving_status_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcocataractreferral_patientdetails_driving_status_version');

		$this->createIndex('et_ophcocataractreferral_patientdetails_driving_status_aid_fk','et_ophcocataractreferral_patientdetails_driving_status_version','id');
		$this->addForeignKey('et_ophcocataractreferral_patientdetails_driving_status_aid_fk','et_ophcocataractreferral_patientdetails_driving_status_version','id','et_ophcocataractreferral_patientdetails_driving_status','id');

		$this->addColumn('et_ophcocataractreferral_patientdetails_driving_status_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcocataractreferral_patientdetails_driving_status_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcocataractreferral_patientdetails_driving_status_version','version_id');
		$this->alterColumn('et_ophcocataractreferral_patientdetails_driving_status_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcocataractreferral_posteriorsegment_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`right_eye` text NOT NULL,
	`left_eye` text NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophcocataractreferral_posteriorsegment_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophcocataractreferral_posteriorsegment_cui_fk` (`created_user_id`),
	KEY `acv_et_ophcocataractreferral_posteriorsegment_ev_fk` (`event_id`),
	CONSTRAINT `acv_et_ophcocataractreferral_posteriorsegment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_posteriorsegment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_posteriorsegment_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('et_ophcocataractreferral_posteriorsegment_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcocataractreferral_posteriorsegment_version');

		$this->createIndex('et_ophcocataractreferral_posteriorsegment_aid_fk','et_ophcocataractreferral_posteriorsegment_version','id');
		$this->addForeignKey('et_ophcocataractreferral_posteriorsegment_aid_fk','et_ophcocataractreferral_posteriorsegment_version','id','et_ophcocataractreferral_posteriorsegment','id');

		$this->addColumn('et_ophcocataractreferral_posteriorsegment_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcocataractreferral_posteriorsegment_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcocataractreferral_posteriorsegment_version','version_id');
		$this->alterColumn('et_ophcocataractreferral_posteriorsegment_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcocataractreferral_posteriorsegment_text_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophcocataractreferral_posteriorsegment_text_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophcocataractreferral_posteriorsegment_text_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_et_ophcocataractreferral_posteriorsegment_text_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_posteriorsegment_text_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('et_ophcocataractreferral_posteriorsegment_text_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcocataractreferral_posteriorsegment_text_version');

		$this->createIndex('et_ophcocataractreferral_posteriorsegment_text_aid_fk','et_ophcocataractreferral_posteriorsegment_text_version','id');
		$this->addForeignKey('et_ophcocataractreferral_posteriorsegment_text_aid_fk','et_ophcocataractreferral_posteriorsegment_text_version','id','et_ophcocataractreferral_posteriorsegment_text','id');

		$this->addColumn('et_ophcocataractreferral_posteriorsegment_text_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcocataractreferral_posteriorsegment_text_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcocataractreferral_posteriorsegment_text_version','version_id');
		$this->alterColumn('et_ophcocataractreferral_posteriorsegment_text_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcocataractreferral_previous_ophthalmic_history_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`right_corneal_graft` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`right_glaucoma` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`right_dry_eye` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`right_scleritis` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`right_squint_surgery` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`right_trabeculectomy` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`right_traumatic_cataract` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`right_uveitis` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`right_vitrectomy` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`right_amblyopia` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`left_corneal_graft` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`left_glaucoma` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`left_dry_eye` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`left_scleritis` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`left_squint_surgery` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`left_trabeculectomy` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`left_traumatic_cataract` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`left_uveitis` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`left_vitrectomy` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`left_amblyopia` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophcocataractreferral_poh_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophcocataractreferral_poh_cui_fk` (`created_user_id`),
	KEY `acv_et_ophcocataractreferral_poh_ev_fk` (`event_id`),
	CONSTRAINT `acv_et_ophcocataractreferral_poh_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_poh_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_poh_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('et_ophcocataractreferral_previous_ophthalmic_history_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcocataractreferral_previous_ophthalmic_history_version');

		$this->createIndex('et_ophcocataractreferral_previous_ophthalmic_history_aid_fk','et_ophcocataractreferral_previous_ophthalmic_history_version','id');
		$this->addForeignKey('et_ophcocataractreferral_previous_ophthalmic_history_aid_fk','et_ophcocataractreferral_previous_ophthalmic_history_version','id','et_ophcocataractreferral_previous_ophthalmic_history','id');

		$this->addColumn('et_ophcocataractreferral_previous_ophthalmic_history_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcocataractreferral_previous_ophthalmic_history_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcocataractreferral_previous_ophthalmic_history_version','version_id');
		$this->alterColumn('et_ophcocataractreferral_previous_ophthalmic_history_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcocataractreferral_previousrefraction_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`previous_refraction_different` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`previous_refraction_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`left_sphere` decimal(5,2) DEFAULT NULL,
	`left_cylinder` decimal(5,2) DEFAULT NULL,
	`left_axis` int(3) DEFAULT '0',
	`left_axis_eyedraw` text,
	`left_type_id` int(10) unsigned DEFAULT NULL,
	`right_sphere` decimal(5,2) DEFAULT NULL,
	`right_cylinder` decimal(5,2) DEFAULT NULL,
	`right_axis` int(3) DEFAULT '0',
	`right_axis_eyedraw` text,
	`right_type_id` int(10) unsigned DEFAULT NULL,
	`left_type_other` varchar(100) DEFAULT NULL,
	`right_type_other` varchar(100) DEFAULT NULL,
	`right_graph_axis_eyedraw` text,
	`left_graph_axis_eyedraw` text,
	PRIMARY KEY (`id`),
	KEY `acv_et_ophcocataractreferral_pr_e_id_fk` (`event_id`),
	KEY `acv_et_ophcocataractreferral_pr_c_u_id_fk` (`created_user_id`),
	KEY `acv_et_ophcocataractreferral_pr_l_m_u_id_fk` (`last_modified_user_id`),
	KEY `acv_et_ophcocataractreferral_pr_l_r_t_id_fk` (`left_type_id`),
	KEY `acv_et_ophcocataractreferral_pr_r_r_t_id_fk` (`right_type_id`),
	CONSTRAINT `acv_et_ophcocataractreferral_pr_c_u_id_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_pr_e_id_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_pr_l_m_u_id_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_pr_l_r_t_id_fk` FOREIGN KEY (`left_type_id`) REFERENCES `et_ophcocataractreferral_refraction_type` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_pr_r_r_t_id_fk` FOREIGN KEY (`right_type_id`) REFERENCES `et_ophcocataractreferral_refraction_type` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('et_ophcocataractreferral_previousrefraction_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcocataractreferral_previousrefraction_version');

		$this->createIndex('et_ophcocataractreferral_previousrefraction_aid_fk','et_ophcocataractreferral_previousrefraction_version','id');
		$this->addForeignKey('et_ophcocataractreferral_previousrefraction_aid_fk','et_ophcocataractreferral_previousrefraction_version','id','et_ophcocataractreferral_previousrefraction','id');

		$this->addColumn('et_ophcocataractreferral_previousrefraction_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcocataractreferral_previousrefraction_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcocataractreferral_previousrefraction_version','version_id');
		$this->alterColumn('et_ophcocataractreferral_previousrefraction_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcocataractreferral_refraction_type_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(255) DEFAULT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '0',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophcocataractreferral_rt_c_u_id_fk` (`created_user_id`),
	KEY `acv_et_ophcocataractreferral_rt_l_m_u_id_fk` (`last_modified_user_id`),
	CONSTRAINT `acv_et_ophcocataractreferral_rt_c_u_id_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_rt_l_m_u_id_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('et_ophcocataractreferral_refraction_type_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcocataractreferral_refraction_type_version');

		$this->createIndex('et_ophcocataractreferral_refraction_type_aid_fk','et_ophcocataractreferral_refraction_type_version','id');
		$this->addForeignKey('et_ophcocataractreferral_refraction_type_aid_fk','et_ophcocataractreferral_refraction_type_version','id','et_ophcocataractreferral_refraction_type','id');

		$this->addColumn('et_ophcocataractreferral_refraction_type_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcocataractreferral_refraction_type_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcocataractreferral_refraction_type_version','version_id');
		$this->alterColumn('et_ophcocataractreferral_refraction_type_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcocataractreferral_surgeryrefraction_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`refractive_surgery` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`refractive_surgery_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`left_sphere` decimal(5,2) DEFAULT NULL,
	`left_cylinder` decimal(5,2) DEFAULT NULL,
	`left_axis` int(3) DEFAULT '0',
	`left_axis_eyedraw` text,
	`left_type_id` int(10) unsigned DEFAULT NULL,
	`right_sphere` decimal(5,2) DEFAULT NULL,
	`right_cylinder` decimal(5,2) DEFAULT NULL,
	`right_axis` int(3) DEFAULT '0',
	`right_axis_eyedraw` text,
	`right_type_id` int(10) unsigned DEFAULT NULL,
	`left_type_other` varchar(100) DEFAULT NULL,
	`right_type_other` varchar(100) DEFAULT NULL,
	`right_graph_axis_eyedraw` text,
	`left_graph_axis_eyedraw` text,
	PRIMARY KEY (`id`),
	KEY `acv_et_ophcocataractreferral_sr_e_id_fk` (`event_id`),
	KEY `acv_et_ophcocataractreferral_sr_c_u_id_fk` (`created_user_id`),
	KEY `acv_et_ophcocataractreferral_sr_l_m_u_id_fk` (`last_modified_user_id`),
	KEY `acv_et_ophcocataractreferral_sr_l_r_t_id_fk` (`left_type_id`),
	KEY `acv_et_ophcocataractreferral_sr_r_r_t_id_fk` (`right_type_id`),
	CONSTRAINT `acv_et_ophcocataractreferral_sr_c_u_id_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_sr_e_id_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_sr_l_m_u_id_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_sr_l_r_t_id_fk` FOREIGN KEY (`left_type_id`) REFERENCES `et_ophcocataractreferral_refraction_type` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_sr_r_r_t_id_fk` FOREIGN KEY (`right_type_id`) REFERENCES `et_ophcocataractreferral_refraction_type` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('et_ophcocataractreferral_surgeryrefraction_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcocataractreferral_surgeryrefraction_version');

		$this->createIndex('et_ophcocataractreferral_surgeryrefraction_aid_fk','et_ophcocataractreferral_surgeryrefraction_version','id');
		$this->addForeignKey('et_ophcocataractreferral_surgeryrefraction_aid_fk','et_ophcocataractreferral_surgeryrefraction_version','id','et_ophcocataractreferral_surgeryrefraction','id');

		$this->addColumn('et_ophcocataractreferral_surgeryrefraction_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcocataractreferral_surgeryrefraction_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcocataractreferral_surgeryrefraction_version','version_id');
		$this->alterColumn('et_ophcocataractreferral_surgeryrefraction_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcocataractreferral_visualacuity_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`left_comments` text,
	`right_comments` text,
	`eye_id` int(10) unsigned NOT NULL DEFAULT '3',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`right_check_method_id` int(10) unsigned DEFAULT NULL,
	`left_check_method_id` int(10) unsigned DEFAULT NULL,
	PRIMARY KEY (`id`),
	KEY `acv_et_ophcocataractreferral_visualacuity_e_id_fk` (`event_id`),
	KEY `acv_et_ophcocataractreferral_visualacuity_c_u_id_fk` (`created_user_id`),
	KEY `acv_et_ophcocataractreferral_visualacuity_l_m_u_id_fk` (`last_modified_user_id`),
	KEY `acv_et_ophcocataractreferral_visualacuity_eye_id_fk` (`eye_id`),
	KEY `acv_et_ophcocataractreferral_visualacuity_rcm_id_fk` (`right_check_method_id`),
	KEY `acv_et_ophcocataractreferral_visualacuity_lcm_id_fk` (`left_check_method_id`),
	CONSTRAINT `acv_et_ophcocataractreferral_visualacuity_lcm_id_fk` FOREIGN KEY (`left_check_method_id`) REFERENCES `ophcocataractreferral_visualacuity_check_method` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_visualacuity_c_u_id_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_visualacuity_e_id_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_visualacuity_id_fk` FOREIGN KEY (`eye_id`) REFERENCES `eye` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_visualacuity_l_m_u_id_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcocataractreferral_visualacuity_rcm_id_fk` FOREIGN KEY (`right_check_method_id`) REFERENCES `ophcocataractreferral_visualacuity_check_method` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('et_ophcocataractreferral_visualacuity_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcocataractreferral_visualacuity_version');

		$this->createIndex('et_ophcocataractreferral_visualacuity_aid_fk','et_ophcocataractreferral_visualacuity_version','id');
		$this->addForeignKey('et_ophcocataractreferral_visualacuity_aid_fk','et_ophcocataractreferral_visualacuity_version','id','et_ophcocataractreferral_visualacuity','id');

		$this->addColumn('et_ophcocataractreferral_visualacuity_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcocataractreferral_visualacuity_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcocataractreferral_visualacuity_version','version_id');
		$this->alterColumn('et_ophcocataractreferral_visualacuity_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophcocataractreferral_visualacuity_check_method_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophcocataractreferral_visualacuity_check_method_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophcocataractreferral_visualacuity_check_method_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_ophcocataractreferral_visualacuity_check_method_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophcocataractreferral_visualacuity_check_method_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('ophcocataractreferral_visualacuity_check_method_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophcocataractreferral_visualacuity_check_method_version');

		$this->createIndex('ophcocataractreferral_visualacuity_check_method_aid_fk','ophcocataractreferral_visualacuity_check_method_version','id');
		$this->addForeignKey('ophcocataractreferral_visualacuity_check_method_aid_fk','ophcocataractreferral_visualacuity_check_method_version','id','ophcocataractreferral_visualacuity_check_method','id');

		$this->addColumn('ophcocataractreferral_visualacuity_check_method_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophcocataractreferral_visualacuity_check_method_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophcocataractreferral_visualacuity_check_method_version','version_id');
		$this->alterColumn('ophcocataractreferral_visualacuity_check_method_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophcocataractreferral_visualacuity_method_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(32) DEFAULT NULL,
	`display_order` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophcocataractreferral_visualacuity_method_cuid_fk` (`created_user_id`),
	KEY `acv_ophcocataractreferral_visualacuity_method_lmuid_fk` (`last_modified_user_id`),
	CONSTRAINT `acv_ophcocataractreferral_visualacuity_method_cuid_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophcocataractreferral_visualacuity_method_lmuid_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('ophcocataractreferral_visualacuity_method_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophcocataractreferral_visualacuity_method_version');

		$this->createIndex('ophcocataractreferral_visualacuity_method_aid_fk','ophcocataractreferral_visualacuity_method_version','id');
		$this->addForeignKey('ophcocataractreferral_visualacuity_method_aid_fk','ophcocataractreferral_visualacuity_method_version','id','ophcocataractreferral_visualacuity_method','id');

		$this->addColumn('ophcocataractreferral_visualacuity_method_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophcocataractreferral_visualacuity_method_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophcocataractreferral_visualacuity_method_version','version_id');
		$this->alterColumn('ophcocataractreferral_visualacuity_method_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophcocataractreferral_visualacuity_reading_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`element_id` int(10) unsigned NOT NULL,
	`value` int(10) unsigned NOT NULL,
	`method_id` int(10) unsigned NOT NULL,
	`side` tinyint(1) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophcocataractreferral_visualacuity_reading_cuid_fk` (`created_user_id`),
	KEY `acv_ophcocataractreferral_visualacuity_reading_lmuid_fk` (`last_modified_user_id`),
	KEY `acv_ophcocataractreferral_visualacuity_reading_element_id_fk` (`element_id`),
	KEY `acv_ophcocataractreferral_visualacuity_reading_method_id_fk` (`method_id`),
	CONSTRAINT `acv_ophcocataractreferral_visualacuity_reading_cuid_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophcocataractreferral_visualacuity_reading_lmuid_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophcocataractreferral_visualacuity_reading_element_id_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcocataractreferral_visualacuity` (`id`),
	CONSTRAINT `acv_ophcocataractreferral_visualacuity_reading_method_id_fk` FOREIGN KEY (`method_id`) REFERENCES `ophcocataractreferral_visualacuity_method` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('ophcocataractreferral_visualacuity_reading_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophcocataractreferral_visualacuity_reading_version');

		$this->createIndex('ophcocataractreferral_visualacuity_reading_aid_fk','ophcocataractreferral_visualacuity_reading_version','id');
		$this->addForeignKey('ophcocataractreferral_visualacuity_reading_aid_fk','ophcocataractreferral_visualacuity_reading_version','id','ophcocataractreferral_visualacuity_reading','id');

		$this->addColumn('ophcocataractreferral_visualacuity_reading_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophcocataractreferral_visualacuity_reading_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophcocataractreferral_visualacuity_reading_version','version_id');
		$this->alterColumn('ophcocataractreferral_visualacuity_reading_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophcocataractreferral_visualacuity_unit_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(40) NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophcocataractreferral_visualacuity_unit_c_u_id_fk` (`created_user_id`),
	KEY `acv_ophcocataractreferral_visualacuity_unit_l_m_u_id_fk` (`last_modified_user_id`),
	CONSTRAINT `acv_ophcocataractreferral_visualacuity_unit_c_u_id_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophcocataractreferral_visualacuity_unit_l_m_u_id_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('ophcocataractreferral_visualacuity_unit_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophcocataractreferral_visualacuity_unit_version');

		$this->createIndex('ophcocataractreferral_visualacuity_unit_aid_fk','ophcocataractreferral_visualacuity_unit_version','id');
		$this->addForeignKey('ophcocataractreferral_visualacuity_unit_aid_fk','ophcocataractreferral_visualacuity_unit_version','id','ophcocataractreferral_visualacuity_unit','id');

		$this->addColumn('ophcocataractreferral_visualacuity_unit_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophcocataractreferral_visualacuity_unit_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophcocataractreferral_visualacuity_unit_version','version_id');
		$this->alterColumn('ophcocataractreferral_visualacuity_unit_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophcocataractreferral_visualacuity_unit_value_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`unit_id` int(10) unsigned NOT NULL,
	`value` varchar(255) NOT NULL,
	`base_value` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophcocataractreferral_visualacuity_unit_value_cuid_fk` (`created_user_id`),
	KEY `acv_ophcocataractreferral_visualacuity_unit_value_lmuid_fk` (`last_modified_user_id`),
	KEY `acv_ophcocataractreferral_visualacuity_unit_value_unit_id_fk` (`unit_id`),
	CONSTRAINT `acv_ophcocataractreferral_visualacuity_unit_value_cuid_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophcocataractreferral_visualacuity_unit_value_lmuid_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophcocataractreferral_visualacuity_unit_value_unit_id_fk` FOREIGN KEY (`unit_id`) REFERENCES `ophcocataractreferral_visualacuity_unit` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('ophcocataractreferral_visualacuity_unit_value_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophcocataractreferral_visualacuity_unit_value_version');

		$this->createIndex('ophcocataractreferral_visualacuity_unit_value_aid_fk','ophcocataractreferral_visualacuity_unit_value_version','id');
		$this->addForeignKey('ophcocataractreferral_visualacuity_unit_value_aid_fk','ophcocataractreferral_visualacuity_unit_value_version','id','ophcocataractreferral_visualacuity_unit_value','id');

		$this->addColumn('ophcocataractreferral_visualacuity_unit_value_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophcocataractreferral_visualacuity_unit_value_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophcocataractreferral_visualacuity_unit_value_version','version_id');
		$this->alterColumn('ophcocataractreferral_visualacuity_unit_value_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->addColumn('et_ophcocataractreferral_confirmation','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_confirmation_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_currentrefraction','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_currentrefraction_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_hpc','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_hpc_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_hpc_first_second_eye','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_hpc_first_second_eye_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_hpc_history','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_hpc_history_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_hpc_impact','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_hpc_impact_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_hpc_onset','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_hpc_onset_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_hpc_refraction','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_hpc_refraction_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_intraocularpressure','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_intraocularpressure_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_intraocularpressure_instrument','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_intraocularpressure_instrument_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_patientdetails','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_patientdetails_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_patientdetails_driving_status','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_patientdetails_driving_status_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_posteriorsegment','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_posteriorsegment_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_posteriorsegment_text','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_posteriorsegment_text_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_previous_ophthalmic_history','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_previous_ophthalmic_history_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_previousrefraction','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_previousrefraction_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_refraction_type','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_refraction_type_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_surgeryrefraction','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_surgeryrefraction_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_visualacuity','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_visualacuity_version','deleted','tinyint(1) unsigned not null');

		$this->addColumn('ophcocataractreferral_visualacuity_check_method','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcocataractreferral_visualacuity_check_method_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcocataractreferral_visualacuity_method','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcocataractreferral_visualacuity_method_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcocataractreferral_visualacuity_reading','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcocataractreferral_visualacuity_reading_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcocataractreferral_visualacuity_unit','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcocataractreferral_visualacuity_unit_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcocataractreferral_visualacuity_unit_value','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcocataractreferral_visualacuity_unit_value_version','deleted','tinyint(1) unsigned not null');
	}

	public function down()
	{
		$this->dropColumn('ophcocataractreferral_visualacuity_check_method','deleted');
		$this->dropColumn('ophcocataractreferral_visualacuity_method','deleted');
		$this->dropColumn('ophcocataractreferral_visualacuity_reading','deleted');
		$this->dropColumn('ophcocataractreferral_visualacuity_unit','deleted');
		$this->dropColumn('ophcocataractreferral_visualacuity_unit_value','deleted');

		$this->dropColumn('et_ophcocataractreferral_confirmation','deleted');
		$this->dropColumn('et_ophcocataractreferral_currentrefraction','deleted');
		$this->dropColumn('et_ophcocataractreferral_hpc','deleted');
		$this->dropColumn('et_ophcocataractreferral_hpc_first_second_eye','deleted');
		$this->dropColumn('et_ophcocataractreferral_hpc_history','deleted');
		$this->dropColumn('et_ophcocataractreferral_hpc_impact','deleted');
		$this->dropColumn('et_ophcocataractreferral_hpc_onset','deleted');
		$this->dropColumn('et_ophcocataractreferral_hpc_refraction','deleted');
		$this->dropColumn('et_ophcocataractreferral_intraocularpressure','deleted');
		$this->dropColumn('et_ophcocataractreferral_intraocularpressure_instrument','deleted');
		$this->dropColumn('et_ophcocataractreferral_patientdetails','deleted');
		$this->dropColumn('et_ophcocataractreferral_patientdetails_driving_status','deleted');
		$this->dropColumn('et_ophcocataractreferral_posteriorsegment','deleted');
		$this->dropColumn('et_ophcocataractreferral_posteriorsegment_text','deleted');
		$this->dropColumn('et_ophcocataractreferral_previous_ophthalmic_history','deleted');
		$this->dropColumn('et_ophcocataractreferral_previousrefraction','deleted');
		$this->dropColumn('et_ophcocataractreferral_refraction_type','deleted');
		$this->dropColumn('et_ophcocataractreferral_surgeryrefraction','deleted');
		$this->dropColumn('et_ophcocataractreferral_visualacuity','deleted');

		$this->dropTable('et_ophcocataractreferral_confirmation_version');
		$this->dropTable('et_ophcocataractreferral_currentrefraction_version');
		$this->dropTable('et_ophcocataractreferral_hpc_version');
		$this->dropTable('et_ophcocataractreferral_hpc_first_second_eye_version');
		$this->dropTable('et_ophcocataractreferral_hpc_history_version');
		$this->dropTable('et_ophcocataractreferral_hpc_impact_version');
		$this->dropTable('et_ophcocataractreferral_hpc_onset_version');
		$this->dropTable('et_ophcocataractreferral_hpc_refraction_version');
		$this->dropTable('et_ophcocataractreferral_intraocularpressure_version');
		$this->dropTable('et_ophcocataractreferral_intraocularpressure_instrument_version');
		$this->dropTable('et_ophcocataractreferral_patientdetails_version');
		$this->dropTable('et_ophcocataractreferral_patientdetails_driving_status_version');
		$this->dropTable('et_ophcocataractreferral_posteriorsegment_version');
		$this->dropTable('et_ophcocataractreferral_posteriorsegment_text_version');
		$this->dropTable('et_ophcocataractreferral_previous_ophthalmic_history_version');
		$this->dropTable('et_ophcocataractreferral_previousrefraction_version');
		$this->dropTable('et_ophcocataractreferral_refraction_type_version');
		$this->dropTable('et_ophcocataractreferral_surgeryrefraction_version');
		$this->dropTable('et_ophcocataractreferral_visualacuity_version');
		$this->dropTable('ophcocataractreferral_visualacuity_check_method_version');
		$this->dropTable('ophcocataractreferral_visualacuity_method_version');
		$this->dropTable('ophcocataractreferral_visualacuity_reading_version');
		$this->dropTable('ophcocataractreferral_visualacuity_unit_version');
		$this->dropTable('ophcocataractreferral_visualacuity_unit_value_version');
	}
}
