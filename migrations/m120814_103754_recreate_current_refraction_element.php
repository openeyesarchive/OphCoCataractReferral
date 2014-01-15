<?php

class m120814_103754_recreate_current_refraction_element extends CDbMigration
{
	public function up()
	{
		$this->dropTable('et_ophcocataractreferral_currentrefraction');
		$this->dropTable('et_ophcocataractreferral_currentrefraction_va1');
		$this->dropTable('et_ophcocataractreferral_currentrefraction_va2');

		$this->createTable('et_ophcocataractreferral_refraction_type', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(255)',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 0',
				'last_modified_user_id' => "int(10) unsigned NOT NULL DEFAULT '1'",
				'last_modified_date' => "datetime NOT NULL DEFAULT '1901-01-01 00:00:00'",
				'created_user_id' => "int(10) unsigned NOT NULL DEFAULT '1'",
				'created_date' => "datetime NOT NULL DEFAULT '1901-01-01 00:00:00'",
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcocataractreferral_rt_c_u_id_fk` (`created_user_id`)',
				'KEY `et_ophcocataractreferral_rt_l_m_u_id_fk` (`last_modified_user_id`)',
				'CONSTRAINT `et_ophcocataractreferral_rt_c_u_id_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_rt_l_m_u_id_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)'
			), 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->insert('et_ophcocataractreferral_refraction_type',array('name'=>'Auto-refraction','display_order'=>1));
		$this->insert('et_ophcocataractreferral_refraction_type',array('name'=>'Ophthalmologist','display_order'=>2));
		$this->insert('et_ophcocataractreferral_refraction_type',array('name'=>'Optometrist','display_order'=>3));
		$this->insert('et_ophcocataractreferral_refraction_type',array('name'=>'Other','display_order'=>4));

		$this->createTable('et_ophcocataractreferral_currentrefraction', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => "int(10) unsigned NOT NULL DEFAULT '1'",
				'last_modified_date' => "datetime NOT NULL DEFAULT '1901-01-01 00:00:00'",
				'created_user_id' => "int(10) unsigned NOT NULL DEFAULT '1'",
				'created_date' => "datetime NOT NULL DEFAULT '1901-01-01 00:00:00'",
				'left_sphere' => 'decimal(5,2) DEFAULT NULL',
				'left_cylinder' => 'decimal(5,2) DEFAULT NULL',
				'left_axis' => 'int(3) DEFAULT 0',
				'left_axis_eyedraw' => 'text',
				'left_refraction_type_id' => 'int(10) unsigned NOT NULL',
				'right_sphere' => 'decimal(5,2) DEFAULT NULL',
				'right_cylinder' => 'decimal(5,2) DEFAULT NULL',
				'right_axis' => 'int(3) DEFAULT 0',
				'right_axis_eyedraw' => 'text',
				'right_refraction_type_id' => 'int(10) unsigned NOT NULL',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcocataractreferral_cr_e_id_fk` (`event_id`)',
				'KEY `et_ophcocataractreferral_cr_c_u_id_fk` (`created_user_id`)',
				'KEY `et_ophcocataractreferral_cr_l_m_u_id_fk` (`last_modified_user_id`)',
				'KEY `et_ophcocataractreferral_cr_l_r_t_id_fk` (`left_refraction_type_id`)',
				'KEY `et_ophcocataractreferral_cr_r_r_t_id_fk` (`right_refraction_type_id`)',
				'CONSTRAINT `et_ophcocataractreferral_cr_c_u_id_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_cr_e_id_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_cr_l_m_u_id_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_cr_l_r_t_id_fk` FOREIGN KEY (`left_refraction_type_id`) REFERENCES `et_ophcocataractreferral_refraction_type` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_cr_r_r_t_id_fk` FOREIGN KEY (`right_refraction_type_id`) REFERENCES `et_ophcocataractreferral_refraction_type` (`id`)',
			), 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');
	}

	public function down()
	{
		$this->dropTable('et_ophcocataractreferral_currentrefraction');
		$this->dropTable('et_ophcocataractreferral_refraction_type');

		$this->createTable('et_ophcocataractreferral_currentrefraction_va1', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) NOT NULL',
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
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		foreach (array('NR','6/5','6/6','6/9','6/12','6/18','6/24','6/36','6/60','3/60','CF','HM','PL','NPL') as $i => $value) {
			$this->insert('et_ophcocataractreferral_currentrefraction_va1',array('name'=>$value,'display_order'=>$i+1));
		}

		$this->createTable('et_ophcocataractreferral_currentrefraction_va2', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) NOT NULL',
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
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		foreach (array('NR','N4.5','N5','N8','N9','N10','N12','N14','N18','N24','N36','N48') as $value) {
			$this->insert('et_ophcocataractreferral_currentrefraction_va2',array('name'=>$value,'display_order'=>$i+1));
		}

		$this->createTable('et_ophcocataractreferral_currentrefraction', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'right_sphere' => "decimal(4,2) NOT NULL DEFAULT '0.00'",
				'right_cylinder' => "decimal(4,2) NOT NULL DEFAULT '0.00'",
				'right_axis' => "tinyint(1) NOT NULL DEFAULT '0'",
				'right_corr_va_id' => 'int(10) unsigned NOT NULL',
				'right_near_va_id' => 'int(10) unsigned NOT NULL',
				'right_best_va_id' => 'int(10) unsigned NOT NULL',
				'left_sphere' => "decimal(4,2) NOT NULL DEFAULT '0.00'",
				'left_cylinder' => "decimal(4,2) NOT NULL DEFAULT '0.00'",
				'left_axis' => "tinyint(1) NOT NULL DEFAULT '0'",
				'left_corr_va_id' => 'int(10) unsigned NOT NULL',
				'left_near_va_id' => 'int(10) unsigned NOT NULL',
				'left_best_va_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => "int(10) unsigned NOT NULL DEFAULT '1'",
				'last_modified_date' => "datetime NOT NULL DEFAULT '1901-01-01 00:00:00'",
				'created_user_id' => "int(10) unsigned NOT NULL DEFAULT '1'",
				'created_date' => "datetime NOT NULL DEFAULT '1901-01-01 00:00:00'",
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_cui_fk` (`created_user_id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_ev_fk` (`event_id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_left_corr_va_fk` (`left_corr_va_id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_right_corr_va_fk` (`right_corr_va_id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_left_near_va_fk` (`left_near_va_id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_right_near_va_fk` (`right_near_va_id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_left_best_va_fk` (`left_best_va_id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_right_best_va_fk` (`right_best_va_id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_left_best_va_fk` FOREIGN KEY (`left_best_va_id`) REFERENCES `et_ophcocataractreferral_currentrefraction_va1` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_left_corr_va_fk` FOREIGN KEY (`left_corr_va_id`) REFERENCES `et_ophcocataractreferral_currentrefraction_va1` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_left_near_va_fk` FOREIGN KEY (`left_near_va_id`) REFERENCES `et_ophcocataractreferral_currentrefraction_va2` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_right_best_va_fk` FOREIGN KEY (`right_best_va_id`) REFERENCES `et_ophcocataractreferral_currentrefraction_va1` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_right_corr_va_fk` FOREIGN KEY (`right_corr_va_id`) REFERENCES `et_ophcocataractreferral_currentrefraction_va1` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_right_near_va_fk` FOREIGN KEY (`right_near_va_id`) REFERENCES `et_ophcocataractreferral_currentrefraction_va2` (`id`)'
		), 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');
	}
}
