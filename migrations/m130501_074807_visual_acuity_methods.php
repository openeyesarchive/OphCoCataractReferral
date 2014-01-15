<?php

class m130501_074807_visual_acuity_methods extends CDbMigration
{
	public function up()
	{
		$this->createTable('ophcocataractreferral_visualacuity_check_method', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcocataractreferral_visualacuity_check_method_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcocataractreferral_visualacuity_check_method_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcocataractreferral_visualacuity_check_method_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcocataractreferral_visualacuity_check_method_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->insert('ophcocataractreferral_visualacuity_check_method',array('name'=>'Snellen','display_order'=>1));
		$this->insert('ophcocataractreferral_visualacuity_check_method',array('name'=>'logMAR','display_order'=>2));
		$this->insert('ophcocataractreferral_visualacuity_check_method',array('name'=>'Thomson','display_order'=>3));
		$this->insert('ophcocataractreferral_visualacuity_check_method',array('name'=>'City University','display_order'=>4));

		$this->addColumn('et_ophcocataractreferral_visualacuity','right_check_method_id','int(10) unsigned NULL');
		$this->createIndex('et_ophcocataractreferral_visualacuity_rcm_id_fk','et_ophcocataractreferral_visualacuity','right_check_method_id');
		$this->addForeignKey('et_ophcocataractreferral_visualacuity_rcm_id_fk','et_ophcocataractreferral_visualacuity','right_check_method_id','ophcocataractreferral_visualacuity_check_method','id');

		$this->addColumn('et_ophcocataractreferral_visualacuity','left_check_method_id','int(10) unsigned NULL');
		$this->createIndex('et_ophcocataractreferral_visualacuity_lcm_id_fk','et_ophcocataractreferral_visualacuity','left_check_method_id');
		$this->addForeignKey('et_ophcocataractreferral_visualacuity_lcm_id_fk','et_ophcocataractreferral_visualacuity','left_check_method_id','ophcocataractreferral_visualacuity_check_method','id');
	}

	public function down()
	{
		$this->dropForeignKey('et_ophcocataractreferral_visualacuity_rcm_id_fk','et_ophcocataractreferral_visualacuity');
		$this->dropIndex('et_ophcocataractreferral_visualacuity_rcm_id_fk','et_ophcocataractreferral_visualacuity');
		$this->dropColumn('et_ophcocataractreferral_visualacuity','right_check_method_id');
		$this->dropForeignKey('et_ophcocataractreferral_visualacuity_lcm_id_fk','et_ophcocataractreferral_visualacuity');
		$this->dropIndex('et_ophcocataractreferral_visualacuity_lcm_id_fk','et_ophcocataractreferral_visualacuity');
		$this->dropColumn('et_ophcocataractreferral_visualacuity','left_check_method_id');
		$this->dropTable('ophcocataractreferral_visualacuity_check_method');
	}
}
