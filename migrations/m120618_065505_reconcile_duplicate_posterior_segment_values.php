<?php

class m120618_065505_reconcile_duplicate_posterior_segment_values extends CDbMigration
{
	public function up()
	{
		$this->createTable('et_ophcocataractreferral_posteriorsegment_text', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcocataractreferral_posteriorsegment_text_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcocataractreferral_posteriorsegment_text_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcocataractreferral_posteriorsegment_text_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_posteriorsegment_text_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('et_ophcocataractreferral_posteriorsegment_text',array('name'=>'Normal','display_order'=>1));
		$this->insert('et_ophcocataractreferral_posteriorsegment_text',array('name'=>'ARMD','display_order'=>2));
		$this->insert('et_ophcocataractreferral_posteriorsegment_text',array('name'=>'Diabetic retinopathy','display_order'=>3));
		$this->insert('et_ophcocataractreferral_posteriorsegment_text',array('name'=>'Hazy view','display_order'=>4));
		$this->insert('et_ophcocataractreferral_posteriorsegment_text',array('name'=>'Not seen','display_order'=>5));
		$this->insert('et_ophcocataractreferral_posteriorsegment_text',array('name'=>'Vitreous opacities','display_order'=>6));
		$this->insert('et_ophcocataractreferral_posteriorsegment_text',array('name'=>'Asteroid hyalosis','display_order'=>7));

		$this->dropTable('et_ophcocataractreferral_posteriorsegment_right_eye');
		$this->dropTable('et_ophcocataractreferral_posteriorsegment_left_eye');
	}

	public function down()
	{
	}
}
