<?php

class m120621_134909_make_iop_fields_into_integer_values_so_the_fields_can_be_slider_widgets extends CDbMigration
{
	public function up()
	{
		$this->dropForeignKey('et_ophcocataractreferral_intraocularpressure_left_pressure_fk','et_ophcocataractreferral_intraocularpressure');
		$this->dropIndex('et_ophcocataractreferral_intraocularpressure_left_pressure_fk','et_ophcocataractreferral_intraocularpressure');
		$this->renameColumn('et_ophcocataractreferral_intraocularpressure','left_pressure_id','left_pressure');

		$this->alterColumn('et_ophcocataractreferral_intraocularpressure','left_pressure','int(10) unsigned NULL');

		$this->dropForeignKey('et_ophcocataractreferral_intraocularpressure_right_pressure_fk','et_ophcocataractreferral_intraocularpressure');
		$this->dropIndex('et_ophcocataractreferral_intraocularpressure_right_pressure_fk','et_ophcocataractreferral_intraocularpressure');
		$this->renameColumn('et_ophcocataractreferral_intraocularpressure','right_pressure_id','right_pressure');

		$this->alterColumn('et_ophcocataractreferral_intraocularpressure','right_pressure','int(10) unsigned NULL');

		$this->dropTable('et_ophcocataractreferral_intraocularpressure_pressure');
	}

	public function down()
	{
		$this->createTable('et_ophcocataractreferral_intraocularpressure_pressure', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_oip_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_oip_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_oip_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_oip_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->insert('et_ophcocataractreferral_intraocularpressure_pressure',array('name'=>'NR','display_order'=>1));

		$display_order = 2;

		for ($i=1; $i<=80; $i++) {
			$this->insert('et_ophcocataractreferral_intraocularpressure_pressure',array('name'=>$i,'display_order'=>$display_order++));
		}

		$this->alterColumn('et_ophcocataractreferral_intraocularpressure','right_pressure','int(10) unsigned NOT NULL');

		$this->renameColumn('et_ophcocataractreferral_intraocularpressure','right_pressure','right_pressure_id');
		$this->createIndex('et_ophcocataractreferral_intraocularpressure_right_pressure_fk','et_ophcocataractreferral_intraocularpressure','right_pressure_id');
		$this->addForeignKey('et_ophcocataractreferral_intraocularpressure_right_pressure_fk','et_ophcocataractreferral_intraocularpressure','right_pressure_id','et_ophcocataractreferral_intraocularpressure_pressure','id');

		$this->alterColumn('et_ophcocataractreferral_intraocularpressure','left_pressure','int(10) unsigned NOT NULL');

		$this->renameColumn('et_ophcocataractreferral_intraocularpressure','left_pressure','left_pressure_id');
		$this->createIndex('et_ophcocataractreferral_intraocularpressure_left_pressure_fk','et_ophcocataractreferral_intraocularpressure','left_pressure_id');
		$this->addForeignKey('et_ophcocataractreferral_intraocularpressure_left_pressure_fk','et_ophcocataractreferral_intraocularpressure','left_pressure_id','et_ophcocataractreferral_intraocularpressure_pressure','id');
	}
}
