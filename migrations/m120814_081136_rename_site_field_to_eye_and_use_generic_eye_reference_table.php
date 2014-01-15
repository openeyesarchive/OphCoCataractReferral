<?php

class m120814_081136_rename_site_field_to_eye_and_use_generic_eye_reference_table extends CDbMigration
{
	public function up()
	{
		$this->dropForeignKey('et_ophcocataractreferral_hpc_site_fk','et_ophcocataractreferral_hpc');
		$this->dropIndex('et_ophcocataractreferral_hpc_site_fk','et_ophcocataractreferral_hpc');
		$this->dropTable('et_ophcocataractreferral_hpc_site');
		$this->renameColumn('et_ophcocataractreferral_hpc','site_id','eye_id');
		$this->createIndex('et_ophcocataractreferral_hpc_eye_id_fk','et_ophcocataractreferral_hpc','eye_id');
		$this->addForeignKey('et_ophcocataractreferral_hpc_eye_id_fk','et_ophcocataractreferral_hpc','eye_id','eye','id');
	}

	public function down()
	{
		$this->dropForeignKey('et_ophcocataractreferral_hpc_eye_id_fk','et_ophcocataractreferral_hpc');
		$this->dropIndex('et_ophcocataractreferral_hpc_eye_id_fk','et_ophcocataractreferral_hpc');
		$this->renameColumn('et_ophcocataractreferral_hpc','eye_id','site_id');

		$this->createTable('et_ophcocataractreferral_hpc_site', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcocataractreferral_hpc_site_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcocataractreferral_hpc_site_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcocataractreferral_hpc_site_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_hpc_site_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->insert('et_ophcocataractreferral_hpc_site',array('name'=>'Right eye','display_order'=>1));
		$this->insert('et_ophcocataractreferral_hpc_site',array('name'=>'Left eye','display_order'=>2));
		$this->insert('et_ophcocataractreferral_hpc_site',array('name'=>'Both eyes','display_order'=>3));

		$this->createIndex('et_ophcocataractreferral_hpc_site_fk','et_ophcocataractreferral_hpc','site_id');
		$this->addForeignKey('et_ophcocataractreferral_hpc_site_fk','et_ophcocataractreferral_hpc','site_id','site','id');
	}
}
