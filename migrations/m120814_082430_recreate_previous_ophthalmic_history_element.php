<?php

class m120814_082430_recreate_previous_ophthalmic_history_element extends CDbMigration
{
	public function up()
	{
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('name=:name', array(':name'=>'Cataract Referral'))->queryRow();
		$this->update('element_type',array('name' => 'Previous Ophthalmic History', 'class_name' => 'Element_OphCoCataractReferral_PreviousOphthalmicHistory'), 'event_type_id='.$event_type['id']." and name = 'POH'");

		$this->dropTable('et_ophcocataractreferral_poh_text');
		$this->dropTable('et_ophcocataractreferral_poh');

		$this->createTable('et_ophcocataractreferral_previous_ophthalmic_history', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'right_corneal_graft' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'right_glaucoma' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'right_dry_eye' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'right_scleritis' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'right_squint_surgery' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'right_trabeculectomy' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'right_traumatic_cataract' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'right_uveitis' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'right_vitrectomy' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'right_amblyopia' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'left_corneal_graft' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'left_glaucoma' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'left_dry_eye' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'left_scleritis' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'left_squint_surgery' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'left_trabeculectomy' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'left_traumatic_cataract' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'left_uveitis' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'left_vitrectomy' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'left_amblyopia' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcocataractreferral_poh_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcocataractreferral_poh_cui_fk` (`created_user_id`)',
				'KEY `et_ophcocataractreferral_poh_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophcocataractreferral_poh_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_poh_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_poh_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
		), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');
	}

	public function down()
	{
		$this->dropTable('et_ophcocataractreferral_previous_ophthalmic_history');

		$this->createTable('et_ophcocataractreferral_poh_text', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcocataractreferral_poh_left_eye_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcocataractreferral_poh_left_eye_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcocataractreferral_poh_left_eye_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_poh_left_eye_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('et_ophcocataractreferral_poh_text',array('name'=>'Amblyopia','display_order'=>1));
		$this->insert('et_ophcocataractreferral_poh_text',array('name'=>'Corneal graft','display_order'=>2));
		$this->insert('et_ophcocataractreferral_poh_text',array('name'=>'Glaucoma','display_order'=>3));
		$this->insert('et_ophcocataractreferral_poh_text',array('name'=>'Dry eye','display_order'=>4));
		$this->insert('et_ophcocataractreferral_poh_text',array('name'=>'Scleritis','display_order'=>5));
		$this->insert('et_ophcocataractreferral_poh_text',array('name'=>'Squint surgery','display_order'=>6));
		$this->insert('et_ophcocataractreferral_poh_text',array('name'=>'Trabeculectomy','display_order'=>7));
		$this->insert('et_ophcocataractreferral_poh_text',array('name'=>'Traumatic cataract','display_order'=>8));
		$this->insert('et_ophcocataractreferral_poh_text',array('name'=>'Uveitis','display_order'=>9));
		$this->insert('et_ophcocataractreferral_poh_text',array('name'=>'Vitrectomy','display_order'=>10));

		$this->createTable('et_ophcocataractreferral_poh', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'right_eye' => 'text NOT NULL',
				'left_eye' => 'text NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcocataractreferral_poh_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcocataractreferral_poh_cui_fk` (`created_user_id`)',
				'KEY `et_ophcocataractreferral_poh_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophcocataractreferral_poh_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_poh_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_poh_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
		), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('name=:name', array(':name'=>'Cataract Referral'))->queryRow();
		$this->update('element_type',array('name' => 'POH', 'class_name' => 'Element_OphCoCataractReferral_Poh'), 'event_type_id='.$event_type['id']." and name = 'Previous Ophthalmic History'");
	}
}
