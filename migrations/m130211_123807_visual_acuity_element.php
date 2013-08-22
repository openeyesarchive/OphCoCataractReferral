<?php

class m130211_123807_visual_acuity_element extends CDbMigration
{
	public function up()
	{
		$event_type = EventType::model()->find('class_name=?',array('OphCoCataractReferral'));

		$this->insert('element_type',array('name'=>'Visual acuity','class_name'=>'Element_OphCoCataractReferral_VisualAcuity','event_type_id'=>$event_type->id,'display_order'=>75,'default'=>1));

		$element_type = ElementType::model()->find('event_type_id=? and class_name=?',array($event_type->id,'Element_OphCoCataractReferral_VisualAcuity'));

		$this->insert('setting_metadata',array('element_type_id'=>$element_type->id,'field_type_id'=>2,'key'=>'unit_id','name'=>'Units','default_value'=>2));

		$this->createTable('et_ophcocataractreferral_visualacuity', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'left_comments' => 'text COLLATE utf8_bin',
				'right_comments' => 'text COLLATE utf8_bin',
				'eye_id' => 'int(10) unsigned NOT NULL DEFAULT 3',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcocataractreferral_visualacuity_e_id_fk` (`event_id`)',
				'KEY `et_ophcocataractreferral_visualacuity_c_u_id_fk` (`created_user_id`)',
				'KEY `et_ophcocataractreferral_visualacuity_l_m_u_id_fk` (`last_modified_user_id`)',
				'KEY `et_ophcocataractreferral_visualacuity_eye_id_fk` (`eye_id`)',
				'CONSTRAINT `et_ophcocataractreferral_visualacuity_e_id_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_visualacuity_c_u_id_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_visualacuity_l_m_u_id_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_visualacuity_id_fk` FOREIGN KEY (`eye_id`) REFERENCES `eye` (`id`)',
		), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophcocataractreferral_visualacuity_unit', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(40) COLLATE utf8_bin NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcocataractreferral_visualacuity_unit_c_u_id_fk` (`created_user_id`)',
				'KEY `ophcocataractreferral_visualacuity_unit_l_m_u_id_fk` (`last_modified_user_id`)',
				'CONSTRAINT `ophcocataractreferral_visualacuity_unit_c_u_id_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcocataractreferral_visualacuity_unit_l_m_u_id_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
		), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcocataractreferral_visualacuity_unit',array('id'=>1,'name'=>'ETDRS Letters'));
		$this->insert('ophcocataractreferral_visualacuity_unit',array('id'=>2,'name'=>'Snellen Metre'));
		$this->insert('ophcocataractreferral_visualacuity_unit',array('id'=>3,'name'=>'Snellen Foot'));
		$this->insert('ophcocataractreferral_visualacuity_unit',array('id'=>4,'name'=>'logMAR'));
		$this->insert('ophcocataractreferral_visualacuity_unit',array('id'=>5,'name'=>'Decimal'));

		$this->createTable('ophcocataractreferral_visualacuity_unit_value', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'unit_id' => 'int(10) unsigned NOT NULL',
				'value' => 'varchar(255) COLLATE utf8_bin NOT NULL',
				'base_value' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcocataractreferral_visualacuity_unit_value_cuid_fk` (`created_user_id`)',
				'KEY `ophcocataractreferral_visualacuity_unit_value_lmuid_fk` (`last_modified_user_id`)',
				'KEY `ophcocataractreferral_visualacuity_unit_value_unit_id_fk` (`unit_id`)',
				'CONSTRAINT `ophcocataractreferral_visualacuity_unit_value_cuid_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcocataractreferral_visualacuity_unit_value_lmuid_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcocataractreferral_visualacuity_unit_value_unit_id_fk` FOREIGN KEY (`unit_id`) REFERENCES `ophcocataractreferral_visualacuity_unit` (`id`)',
		), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcocataractreferral_visualacuity_unit_value',array('unit_id'=>1,'value'=>'NPL','base_value'=>1));
		$this->insert('ophcocataractreferral_visualacuity_unit_value',array('unit_id'=>1,'value'=>'PL','base_value'=>2));
		$this->insert('ophcocataractreferral_visualacuity_unit_value',array('unit_id'=>1,'value'=>'HM','base_value'=>3));
		$this->insert('ophcocataractreferral_visualacuity_unit_value',array('unit_id'=>1,'value'=>'CF','base_value'=>4));

		for ($i=5; $i<=100; $i++) {
			$this->insert('ophcocataractreferral_visualacuity_unit_value',array('unit_id'=>1,'value'=>$i,'base_value'=>$i+5));
		}

		$this->insert('ophcocataractreferral_visualacuity_unit_value',array('unit_id'=>2,'value'=>'NPL','base_value'=>1));
		$this->insert('ophcocataractreferral_visualacuity_unit_value',array('unit_id'=>2,'value'=>'PL','base_value'=>2));
		$this->insert('ophcocataractreferral_visualacuity_unit_value',array('unit_id'=>2,'value'=>'HM','base_value'=>3));
		$this->insert('ophcocataractreferral_visualacuity_unit_value',array('unit_id'=>2,'value'=>'CF','base_value'=>4));
		$this->insert('ophcocataractreferral_visualacuity_unit_value',array('unit_id'=>2,'value'=>'3/60','base_value'=>25));
		$this->insert('ophcocataractreferral_visualacuity_unit_value',array('unit_id'=>2,'value'=>'6/60','base_value'=>40));
		$this->insert('ophcocataractreferral_visualacuity_unit_value',array('unit_id'=>2,'value'=>'6/36','base_value'=>51));
		$this->insert('ophcocataractreferral_visualacuity_unit_value',array('unit_id'=>2,'value'=>'6/24','base_value'=>60));
		$this->insert('ophcocataractreferral_visualacuity_unit_value',array('unit_id'=>2,'value'=>'6/18','base_value'=>66));
		$this->insert('ophcocataractreferral_visualacuity_unit_value',array('unit_id'=>2,'value'=>'6/12','base_value'=>75));
		$this->insert('ophcocataractreferral_visualacuity_unit_value',array('unit_id'=>2,'value'=>'6/9','base_value'=>81));
		$this->insert('ophcocataractreferral_visualacuity_unit_value',array('unit_id'=>2,'value'=>'6/6','base_value'=>90));
		$this->insert('ophcocataractreferral_visualacuity_unit_value',array('unit_id'=>2,'value'=>'6/5','base_value'=>94));

		$this->createTable('ophcocataractreferral_visualacuity_method', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(32) COLLATE utf8_bin DEFAULT NULL',
				'display_order' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcocataractreferral_visualacuity_method_cuid_fk` (`created_user_id`)',
				'KEY `ophcocataractreferral_visualacuity_method_lmuid_fk` (`last_modified_user_id`)',
				'CONSTRAINT `ophcocataractreferral_visualacuity_method_cuid_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcocataractreferral_visualacuity_method_lmuid_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
		), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcocataractreferral_visualacuity_method',array('name'=>'Unaided','display_order'=>1));
		$this->insert('ophcocataractreferral_visualacuity_method',array('name'=>'Glasses','display_order'=>2));
		$this->insert('ophcocataractreferral_visualacuity_method',array('name'=>'Contact lens','display_order'=>3));
		$this->insert('ophcocataractreferral_visualacuity_method',array('name'=>'Pinhole','display_order'=>4));
		$this->insert('ophcocataractreferral_visualacuity_method',array('name'=>'Auto-refraction','display_order'=>5));
		$this->insert('ophcocataractreferral_visualacuity_method',array('name'=>'Formal refraction','display_order'=>6));

		$this->createTable('ophcocataractreferral_visualacuity_reading', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned NOT NULL',
				'value' => 'int(10) unsigned NOT NULL',
				'method_id' => 'int(10) unsigned NOT NULL',
				'side' => 'tinyint(1) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcocataractreferral_visualacuity_reading_cuid_fk` (`created_user_id`)',
				'KEY `ophcocataractreferral_visualacuity_reading_lmuid_fk` (`last_modified_user_id`)',
				'KEY `ophcocataractreferral_visualacuity_reading_element_id_fk` (`element_id`)',
				'KEY `ophcocataractreferral_visualacuity_reading_method_id_fk` (`method_id`)',
				'CONSTRAINT `ophcocataractreferral_visualacuity_reading_cuid_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcocataractreferral_visualacuity_reading_lmuid_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcocataractreferral_visualacuity_reading_element_id_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcocataractreferral_visualacuity` (`id`)',
				'CONSTRAINT `ophcocataractreferral_visualacuity_reading_method_id_fk` FOREIGN KEY (`method_id`) REFERENCES `ophcocataractreferral_visualacuity_method` (`id`)',
		), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');
	}

	public function down()
	{
		$this->dropTable('ophcocataractreferral_visualacuity_reading');
		$this->dropTable('ophcocataractreferral_visualacuity_method');
		$this->dropTable('ophcocataractreferral_visualacuity_unit_value');
		$this->dropTable('ophcocataractreferral_visualacuity_unit');
		$this->dropTable('et_ophcocataractreferral_visualacuity');

		$event_type = EventType::model()->find('class_name=?',array('OphCoCataractReferral'));
		$element_type = ElementType::model()->find('event_type_id=? and class_name=?',array($event_type->id,'Element_OphCoCataractReferral_VisualAcuity'));

		$this->delete('setting_metadata',"element_type_id = $element_type->id and `key`='unit_id'");
		$this->delete('element_type',"event_type_id = $event_type->id and class_name = 'Element_OphCoCataractReferral_VisualAcuity'");
	}
}
