<?php

class m120615_155918_add_missing_sphere_cylinder_and_axis_values extends CDbMigration
{
	public function up()
	{
		$this->createTable('et_ophcocataractreferral_currentrefraction_sphere', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
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
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

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
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
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
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

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
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
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
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$display_order = 1;

		for ($i=-180;$i<=180;$i+=10) {
			$this->insert('et_ophcocataractreferral_currentrefraction_axis',array('name'=>$i,'display_order'=>$display_order++));
		}

		$this->createTable('et_ophcocataractreferral_currentrefraction_va1', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_va1_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_va1_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_va1_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_va1_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		foreach (array('NR','6/5','6/6','6/9','6/12','6/18','6/24','6/36','6/60','3/60','CF','HM','PL','NPL') as $i => $value) {
			$this->insert('et_ophcocataractreferral_currentrefraction_va1',array('name'=>$value,'display_order'=>$i+1));
		}

		$this->createTable('et_ophcocataractreferral_currentrefraction_va2', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_va2_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_va2_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_va2_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_va2_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		foreach (array('NR','N4.5','N5','N8','N9','N10','N12','N14','N18','N24','N36','N48') as $value) {
			$this->insert('et_ophcocataractreferral_currentrefraction_va2',array('name'=>$value,'display_order'=>$i+1));
		}

		$this->dropForeignKey('et_ophcocataractreferral_currentrefraction_left_sphere_fk','et_ophcocataractreferral_currentrefraction');
		$this->dropIndex('et_ophcocataractreferral_currentrefraction_left_sphere_fk','et_ophcocataractreferral_currentrefraction');
		$this->dropTable('et_ophcocataractreferral_currentrefraction_left_sphere');

		$this->createIndex('et_ophcocataractreferral_currentrefraction_left_sphere_fk','et_ophcocataractreferral_currentrefraction','left_sphere_id');
		$this->addForeignKey('et_ophcocataractreferral_currentrefraction_left_sphere_fk','et_ophcocataractreferral_currentrefraction','left_sphere_id','et_ophcocataractreferral_currentrefraction_sphere','id');

		$this->dropForeignKey('et_ophcocataractreferral_currentrefraction_right_sphere_fk','et_ophcocataractreferral_currentrefraction');
		$this->dropIndex('et_ophcocataractreferral_currentrefraction_right_sphere_fk','et_ophcocataractreferral_currentrefraction');
		$this->dropTable('et_ophcocataractreferral_currentrefraction_right_sphere');

		$this->createIndex('et_ophcocataractreferral_currentrefraction_right_sphere_fk','et_ophcocataractreferral_currentrefraction','right_sphere_id');
		$this->addForeignKey('et_ophcocataractreferral_currentrefraction_right_sphere_fk','et_ophcocataractreferral_currentrefraction','right_sphere_id','et_ophcocataractreferral_currentrefraction_sphere','id');

		$this->dropForeignKey('et_ophcocataractreferral_currentrefraction_left_cylinder_fk','et_ophcocataractreferral_currentrefraction');
		$this->dropIndex('et_ophcocataractreferral_currentrefraction_left_cylinder_fk','et_ophcocataractreferral_currentrefraction');
		$this->dropTable('et_ophcocataractreferral_currentrefraction_left_cylinder');

		$this->createIndex('et_ophcocataractreferral_currentrefraction_left_cylinder_fk','et_ophcocataractreferral_currentrefraction','left_cylinder_id');
		$this->addForeignKey('et_ophcocataractreferral_currentrefraction_left_cylinder_fk','et_ophcocataractreferral_currentrefraction','left_cylinder_id','et_ophcocataractreferral_currentrefraction_cylinder','id');

		$this->dropForeignKey('et_ophcocataractreferral_currentrefraction_right_cylinder_fk','et_ophcocataractreferral_currentrefraction');
		$this->dropIndex('et_ophcocataractreferral_currentrefraction_right_cylinder_fk','et_ophcocataractreferral_currentrefraction');
		$this->dropTable('et_ophcocataractreferral_currentrefraction_right_cylinder');

		$this->createIndex('et_ophcocataractreferral_currentrefraction_right_cylinder_fk','et_ophcocataractreferral_currentrefraction','right_cylinder_id');
		$this->addForeignKey('et_ophcocataractreferral_currentrefraction_right_cylinder_fk','et_ophcocataractreferral_currentrefraction','right_cylinder_id','et_ophcocataractreferral_currentrefraction_cylinder','id');

		$this->dropForeignKey('et_ophcocataractreferral_currentrefraction_left_axis_fk','et_ophcocataractreferral_currentrefraction');
		$this->dropIndex('et_ophcocataractreferral_currentrefraction_left_axis_fk','et_ophcocataractreferral_currentrefraction');
		$this->dropTable('et_ophcocataractreferral_currentrefraction_left_axis');

		$this->createIndex('et_ophcocataractreferral_currentrefraction_left_axis_fk','et_ophcocataractreferral_currentrefraction','left_axis_id');
		$this->addForeignKey('et_ophcocataractreferral_currentrefraction_left_axis_fk','et_ophcocataractreferral_currentrefraction','left_axis_id','et_ophcocataractreferral_currentrefraction_axis','id');

		$this->dropForeignKey('et_ophcocataractreferral_currentrefraction_right_axis_fk','et_ophcocataractreferral_currentrefraction');
		$this->dropIndex('et_ophcocataractreferral_currentrefraction_right_axis_fk','et_ophcocataractreferral_currentrefraction');
		$this->dropTable('et_ophcocataractreferral_currentrefraction_right_axis');

		$this->createIndex('et_ophcocataractreferral_currentrefraction_right_axis_fk','et_ophcocataractreferral_currentrefraction','right_axis_id');
		$this->addForeignKey('et_ophcocataractreferral_currentrefraction_right_axis_fk','et_ophcocataractreferral_currentrefraction','right_axis_id','et_ophcocataractreferral_currentrefraction_axis','id');

		$this->dropForeignKey('et_ophcocataractreferral_currentrefraction_left_corr_va_fk','et_ophcocataractreferral_currentrefraction');
		$this->dropIndex('et_ophcocataractreferral_currentrefraction_left_corr_va_fk','et_ophcocataractreferral_currentrefraction');
		$this->dropTable('et_ophcocataractreferral_currentrefraction_left_corr_va');

		$this->createIndex('et_ophcocataractreferral_currentrefraction_left_corr_va_fk','et_ophcocataractreferral_currentrefraction','left_corr_va_id');
		$this->addForeignKey('et_ophcocataractreferral_currentrefraction_left_corr_va_fk','et_ophcocataractreferral_currentrefraction','left_corr_va_id','et_ophcocataractreferral_currentrefraction_va1','id');

		$this->dropForeignKey('et_ophcocataractreferral_currentrefraction_right_corr_va_fk','et_ophcocataractreferral_currentrefraction');
		$this->dropIndex('et_ophcocataractreferral_currentrefraction_right_corr_va_fk','et_ophcocataractreferral_currentrefraction');
		$this->dropTable('et_ophcocataractreferral_currentrefraction_right_corr_va');

		$this->createIndex('et_ophcocataractreferral_currentrefraction_right_corr_va_fk','et_ophcocataractreferral_currentrefraction','right_corr_va_id');
		$this->addForeignKey('et_ophcocataractreferral_currentrefraction_right_corr_va_fk','et_ophcocataractreferral_currentrefraction','right_corr_va_id','et_ophcocataractreferral_currentrefraction_va1','id');

		$this->dropForeignKey('et_ophcocataractreferral_currentrefraction_left_near_va_fk','et_ophcocataractreferral_currentrefraction');
		$this->dropIndex('et_ophcocataractreferral_currentrefraction_left_near_va_fk','et_ophcocataractreferral_currentrefraction');
		$this->dropTable('et_ophcocataractreferral_currentrefraction_left_near_va');

		$this->createIndex('et_ophcocataractreferral_currentrefraction_left_near_va_fk','et_ophcocataractreferral_currentrefraction','left_near_va_id');
		$this->addForeignKey('et_ophcocataractreferral_currentrefraction_left_near_va_fk','et_ophcocataractreferral_currentrefraction','left_near_va_id','et_ophcocataractreferral_currentrefraction_va2','id');

		$this->dropForeignKey('et_ophcocataractreferral_currentrefraction_right_near_va_fk','et_ophcocataractreferral_currentrefraction');
		$this->dropIndex('et_ophcocataractreferral_currentrefraction_right_near_va_fk','et_ophcocataractreferral_currentrefraction');
		$this->dropTable('et_ophcocataractreferral_currentrefraction_right_near_va');

		$this->createIndex('et_ophcocataractreferral_currentrefraction_right_near_va_fk','et_ophcocataractreferral_currentrefraction','right_near_va_id');
		$this->addForeignKey('et_ophcocataractreferral_currentrefraction_right_near_va_fk','et_ophcocataractreferral_currentrefraction','right_near_va_id','et_ophcocataractreferral_currentrefraction_va2','id');

		$this->dropForeignKey('et_ophcocataractreferral_currentrefraction_left_best_va_fk','et_ophcocataractreferral_currentrefraction');
		$this->dropIndex('et_ophcocataractreferral_currentrefraction_left_best_va_fk','et_ophcocataractreferral_currentrefraction');
		$this->dropTable('et_ophcocataractreferral_currentrefraction_left_best_va');

		$this->createIndex('et_ophcocataractreferral_currentrefraction_left_best_va_fk','et_ophcocataractreferral_currentrefraction','left_best_va_id');
		$this->addForeignKey('et_ophcocataractreferral_currentrefraction_left_best_va_fk','et_ophcocataractreferral_currentrefraction','left_best_va_id','et_ophcocataractreferral_currentrefraction_va1','id');

		$this->dropForeignKey('et_ophcocataractreferral_currentrefraction_right_best_va_fk','et_ophcocataractreferral_currentrefraction');
		$this->dropIndex('et_ophcocataractreferral_currentrefraction_right_best_va_fk','et_ophcocataractreferral_currentrefraction');
		$this->dropTable('et_ophcocataractreferral_currentrefraction_right_best_va');

		$this->createIndex('et_ophcocataractreferral_currentrefraction_right_best_va_fk','et_ophcocataractreferral_currentrefraction','right_best_va_id');
		$this->addForeignKey('et_ophcocataractreferral_currentrefraction_right_best_va_fk','et_ophcocataractreferral_currentrefraction','right_best_va_id','et_ophcocataractreferral_currentrefraction_va1','id');
	}

	public function down()
	{
	}
}
