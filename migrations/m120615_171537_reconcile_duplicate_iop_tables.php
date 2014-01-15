<?php

class m120615_171537_reconcile_duplicate_iop_tables extends CDbMigration
{
	public function up()
	{
		$this->createTable('et_ophcocataractreferral_intraocularpressure_instrument', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_oii_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_oii_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_oii_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_oii_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->insert('et_ophcocataractreferral_intraocularpressure_instrument',array('name'=>'Goldmann','display_order'=>1));
		$this->insert('et_ophcocataractreferral_intraocularpressure_instrument',array('name'=>'Tonopen','display_order'=>2));
		$this->insert('et_ophcocataractreferral_intraocularpressure_instrument',array('name'=>'i-care','display_order'=>3));
		$this->insert('et_ophcocataractreferral_intraocularpressure_instrument',array('name'=>'Perkins','display_order'=>4));
		$this->insert('et_ophcocataractreferral_intraocularpressure_instrument',array('name'=>'Other','display_order'=>5));

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

		$this->dropForeignKey('et_ophcocataractreferral_intraocularpressure_left_instrument_fk','et_ophcocataractreferral_intraocularpressure');
		$this->dropIndex('et_ophcocataractreferral_intraocularpressure_left_instrument_fk','et_ophcocataractreferral_intraocularpressure');
		$this->dropTable('et_ophcocataractreferral_intraocularpressure_left_instrument');

		$this->createIndex('et_ophcocataractreferral_intraocularpressure_left_instrument_fk','et_ophcocataractreferral_intraocularpressure','left_instrument_id');
		$this->addForeignKey('et_ophcocataractreferral_intraocularpressure_left_instrument_fk','et_ophcocataractreferral_intraocularpressure','left_instrument_id','et_ophcocataractreferral_intraocularpressure_instrument','id');

		$this->dropForeignKey('et_ophcocataractreferral_intraocularpressure_right_instrument_fk','et_ophcocataractreferral_intraocularpressure');
		$this->dropIndex('et_ophcocataractreferral_intraocularpressure_right_instrument_fk','et_ophcocataractreferral_intraocularpressure');
		$this->dropTable('et_ophcocataractreferral_intraocularpressure_right_instrument');

		$this->createIndex('et_ophcocataractreferral_intraocularpressure_right_instrument_fk','et_ophcocataractreferral_intraocularpressure','right_instrument_id');
		$this->addForeignKey('et_ophcocataractreferral_intraocularpressure_right_instrument_fk','et_ophcocataractreferral_intraocularpressure','right_instrument_id','et_ophcocataractreferral_intraocularpressure_instrument','id');

		$this->dropForeignKey('et_ophcocataractreferral_intraocularpressure_left_pressure_fk','et_ophcocataractreferral_intraocularpressure');
		$this->dropIndex('et_ophcocataractreferral_intraocularpressure_left_pressure_fk','et_ophcocataractreferral_intraocularpressure');
		$this->dropTable('et_ophcocataractreferral_intraocularpressure_left_pressure');

		$this->createIndex('et_ophcocataractreferral_intraocularpressure_left_pressure_fk','et_ophcocataractreferral_intraocularpressure','left_pressure_id');
		$this->addForeignKey('et_ophcocataractreferral_intraocularpressure_left_pressure_fk','et_ophcocataractreferral_intraocularpressure','left_pressure_id','et_ophcocataractreferral_intraocularpressure_pressure','id');

		$this->dropForeignKey('et_ophcocataractreferral_intraocularpressure_right_pressure_fk','et_ophcocataractreferral_intraocularpressure');
		$this->dropIndex('et_ophcocataractreferral_intraocularpressure_right_pressure_fk','et_ophcocataractreferral_intraocularpressure');
		$this->dropTable('et_ophcocataractreferral_intraocularpressure_right_pressure');

		$this->createIndex('et_ophcocataractreferral_intraocularpressure_right_pressure_fk','et_ophcocataractreferral_intraocularpressure','right_pressure_id');
		$this->addForeignKey('et_ophcocataractreferral_intraocularpressure_right_pressure_fk','et_ophcocataractreferral_intraocularpressure','right_pressure_id','et_ophcocataractreferral_intraocularpressure_pressure','id');
	}

	public function down()
	{
	}
}
