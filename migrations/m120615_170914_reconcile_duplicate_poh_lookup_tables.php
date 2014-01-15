<?php

class m120615_170914_reconcile_duplicate_poh_lookup_tables extends CDbMigration
{
	public function up()
	{
		$this->dropTable('et_ophcocataractreferral_poh_left_eye');
		$this->dropTable('et_ophcocataractreferral_poh_right_eye');

		$this->createTable('et_ophcocataractreferral_poh_text', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) NOT NULL',
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
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

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
	}

	public function down()
	{
	}
}
