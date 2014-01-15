<?php

class m120619_114951_sliders_for_current_refraction_element extends CDbMigration
{
	public function up()
	{
		$this->dropForeignKey('et_ophcocataractreferral_currentrefraction_right_sphere_fk','et_ophcocataractreferral_currentrefraction');
		$this->dropIndex('et_ophcocataractreferral_currentrefraction_right_sphere_fk','et_ophcocataractreferral_currentrefraction');
		$this->renameColumn('et_ophcocataractreferral_currentrefraction','right_sphere_id','right_sphere');
		$this->alterColumn('et_ophcocataractreferral_currentrefraction','right_sphere','decimal (2,2) not null default 0.00');

		$this->dropForeignKey('et_ophcocataractreferral_currentrefraction_right_cylinder_fk','et_ophcocataractreferral_currentrefraction');
		$this->dropIndex('et_ophcocataractreferral_currentrefraction_right_cylinder_fk','et_ophcocataractreferral_currentrefraction');
		$this->renameColumn('et_ophcocataractreferral_currentrefraction','right_cylinder_id','right_cylinder');
		$this->alterColumn('et_ophcocataractreferral_currentrefraction','right_cylinder','decimal (2,2) not null default 0.00');

		$this->dropForeignKey('et_ophcocataractreferral_currentrefraction_right_axis_fk','et_ophcocataractreferral_currentrefraction');
		$this->dropIndex('et_ophcocataractreferral_currentrefraction_right_axis_fk','et_ophcocataractreferral_currentrefraction');
		$this->renameColumn('et_ophcocataractreferral_currentrefraction','right_axis_id','right_axis');
		$this->alterColumn('et_ophcocataractreferral_currentrefraction','right_axis','tinyint(1) not null default 0');

		$this->dropForeignKey('et_ophcocataractreferral_currentrefraction_left_sphere_fk','et_ophcocataractreferral_currentrefraction');
		$this->dropIndex('et_ophcocataractreferral_currentrefraction_left_sphere_fk','et_ophcocataractreferral_currentrefraction');
		$this->renameColumn('et_ophcocataractreferral_currentrefraction','left_sphere_id','left_sphere');
		$this->alterColumn('et_ophcocataractreferral_currentrefraction','left_sphere','decimal (2,2) not null default 0.00');

		$this->dropForeignKey('et_ophcocataractreferral_currentrefraction_left_cylinder_fk','et_ophcocataractreferral_currentrefraction');
		$this->dropIndex('et_ophcocataractreferral_currentrefraction_left_cylinder_fk','et_ophcocataractreferral_currentrefraction');
		$this->renameColumn('et_ophcocataractreferral_currentrefraction','left_cylinder_id','left_cylinder');
		$this->alterColumn('et_ophcocataractreferral_currentrefraction','left_cylinder','decimal (2,2) not null default 0.00');

		$this->dropForeignKey('et_ophcocataractreferral_currentrefraction_left_axis_fk','et_ophcocataractreferral_currentrefraction');
		$this->dropIndex('et_ophcocataractreferral_currentrefraction_left_axis_fk','et_ophcocataractreferral_currentrefraction');
		$this->renameColumn('et_ophcocataractreferral_currentrefraction','left_axis_id','left_axis');
		$this->alterColumn('et_ophcocataractreferral_currentrefraction','left_axis','tinyint(1) not null default 0');

		$this->dropTable('et_ophcocataractreferral_currentrefraction_sphere');
		$this->dropTable('et_ophcocataractreferral_currentrefraction_cylinder');
		$this->dropTable('et_ophcocataractreferral_currentrefraction_axis');
	}

	public function down()
	{
		$this->createTable('et_ophcocataractreferral_currentrefraction_sphere', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_sphere_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_sphere_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_sphere_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_sphere_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$display_order = 1;

		for ($i=-20;$i<=-10;$i+=0.5) {
			$this->insert('et_ophcocataractreferral_currentrefraction_sphere',array('name'=>number_format($i,2),'display_order'=>$display_order++));
		}
		for ($i=-9.75;$i<=10;$i+=0.25) {
			if ($i >0) {
				$value = '+'.number_format($i,2);
			} else {
				$value = number_format($i,2);
			}
			$this->insert('et_ophcocataractreferral_currentrefraction_sphere',array('name'=>$value,'display_order'=>$display_order++));
		}
		for ($i=10.5;$i<=20;$i+=0.5) {
			$this->insert('et_ophcocataractreferral_currentrefraction_sphere',array('name'=>'+'.number_format($i,2),'display_order'=>$display_order++));
		}

		$this->createTable('et_ophcocataractreferral_currentrefraction_cylinder', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_cylinder_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_cylinder_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_cylinder_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_cylinder_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$display_order = 1;

		for ($i=-20;$i<=-10;$i+=0.5) {
			$this->insert('et_ophcocataractreferral_currentrefraction_cylinder',array('name'=>number_format($i,2),'display_order'=>$display_order++));
		}
		for ($i=-9.75;$i<=10;$i+=0.25) {
			if ($i >0) {
				$value = '+'.number_format($i,2);
			} else {
				$value = number_format($i,2);
			}
			$this->insert('et_ophcocataractreferral_currentrefraction_cylinder',array('name'=>$value,'display_order'=>$display_order++));
		}
		for ($i=10.5;$i<=20;$i+=0.5) {
			$this->insert('et_ophcocataractreferral_currentrefraction_cylinder',array('name'=>'+'.number_format($i,2),'display_order'=>$display_order++));
		}

		$this->createTable('et_ophcocataractreferral_currentrefraction_axis', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_axis_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_axis_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_axis_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_axis_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$display_order = 1;

		for ($i=-180;$i<=180;$i+=10) {
			$this->insert('et_ophcocataractreferral_currentrefraction_axis',array('name'=>$i,'display_order'=>$display_order++));
		}

		$this->alterColumn('et_ophcocataractreferral_currentrefraction','right_sphere','int(10) unsigned NOT NULL');
		$this->renameColumn('et_ophcocataractreferral_currentrefraction','right_sphere','right_sphere_id');
		$this->createIndex('et_ophcocataractreferral_currentrefraction_right_sphere_fk','et_ophcocataractreferral_currentrefraction','right_sphere_id');
		$this->addForeignKey('et_ophcocataractreferral_currentrefraction_right_sphere_fk','et_ophcocataractreferral_currentrefraction','right_sphere_id','et_ophcocataractreferral_currentrefraction_sphere','id');

		$this->alterColumn('et_ophcocataractreferral_currentrefraction','right_cylinder','int(10) unsigned NOT NULL');
		$this->renameColumn('et_ophcocataractreferral_currentrefraction','right_cylinder','right_cylinder_id');
		$this->createIndex('et_ophcocataractreferral_currentrefraction_right_cylinder_fk','et_ophcocataractreferral_currentrefraction','right_cylinder_id');
		$this->addForeignKey('et_ophcocataractreferral_currentrefraction_right_cylinder_fk','et_ophcocataractreferral_currentrefraction','right_cylinder_id','et_ophcocataractreferral_currentrefraction_cylinder','id');

		$this->alterColumn('et_ophcocataractreferral_currentrefraction','right_axis','int(10) unsigned NOT NULL');
		$this->renameColumn('et_ophcocataractreferral_currentrefraction','right_axis','right_axis_id');
		$this->createIndex('et_ophcocataractreferral_currentrefraction_right_axis_fk','et_ophcocataractreferral_currentrefraction','right_axis_id');
		$this->addForeignKey('et_ophcocataractreferral_currentrefraction_right_axis_fk','et_ophcocataractreferral_currentrefraction','right_axis_id','et_ophcocataractreferral_currentrefraction_axis','id');

		$this->alterColumn('et_ophcocataractreferral_currentrefraction','left_sphere','int(10) unsigned NOT NULL');
		$this->renameColumn('et_ophcocataractreferral_currentrefraction','left_sphere','left_sphere_id');
		$this->createIndex('et_ophcocataractreferral_currentrefraction_left_sphere_fk','et_ophcocataractreferral_currentrefraction','left_sphere_id');
		$this->addForeignKey('et_ophcocataractreferral_currentrefraction_left_sphere_fk','et_ophcocataractreferral_currentrefraction','left_sphere_id','et_ophcocataractreferral_currentrefraction_sphere','id');

		$this->alterColumn('et_ophcocataractreferral_currentrefraction','left_cylinder','int(10) unsigned NOT NULL');
		$this->renameColumn('et_ophcocataractreferral_currentrefraction','left_cylinder','left_cylinder_id');
		$this->createIndex('et_ophcocataractreferral_currentrefraction_left_cylinder_fk','et_ophcocataractreferral_currentrefraction','left_cylinder_id');
		$this->addForeignKey('et_ophcocataractreferral_currentrefraction_left_cylinder_fk','et_ophcocataractreferral_currentrefraction','left_cylinder_id','et_ophcocataractreferral_currentrefraction_cylinder','id');

		$this->alterColumn('et_ophcocataractreferral_currentrefraction','left_axis','int(10) unsigned NOT NULL');
		$this->renameColumn('et_ophcocataractreferral_currentrefraction','left_axis','left_axis_id');
		$this->createIndex('et_ophcocataractreferral_currentrefraction_left_axis_fk','et_ophcocataractreferral_currentrefraction','left_axis_id');
		$this->addForeignKey('et_ophcocataractreferral_currentrefraction_left_axis_fk','et_ophcocataractreferral_currentrefraction','left_axis_id','et_ophcocataractreferral_currentrefraction_axis','id');
	}
}
