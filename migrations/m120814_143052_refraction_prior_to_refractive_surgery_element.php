<?php

class m120814_143052_refraction_prior_to_refractive_surgery_element extends CDbMigration
{
	public function up()
	{
		$this->createTable('et_ophcocataractreferral_surgeryrefraction', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'refractive_surgery' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'refractive_surgery_date' => "datetime NOT NULL DEFAULT '1901-01-01 00:00:00'",
				'last_modified_user_id' => "int(10) unsigned NOT NULL DEFAULT '1'",
				'last_modified_date' => "datetime NOT NULL DEFAULT '1901-01-01 00:00:00'",
				'created_user_id' => "int(10) unsigned NOT NULL DEFAULT '1'",
				'created_date' => "datetime NOT NULL DEFAULT '1901-01-01 00:00:00'",
				'left_sphere' => 'decimal(5,2) DEFAULT NULL',
				'left_cylinder' => 'decimal(5,2) DEFAULT NULL',
				'left_axis' => 'int(3) DEFAULT 0',
				'left_axis_eyedraw' => 'text COLLATE utf8_bin',
				'left_refraction_type_id' => 'int(10) unsigned NOT NULL',
				'right_sphere' => 'decimal(5,2) DEFAULT NULL',
				'right_cylinder' => 'decimal(5,2) DEFAULT NULL',
				'right_axis' => 'int(3) DEFAULT 0',
				'right_axis_eyedraw' => 'text COLLATE utf8_bin',
				'right_refraction_type_id' => 'int(10) unsigned NOT NULL',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcocataractreferral_sr_e_id_fk` (`event_id`)',
				'KEY `et_ophcocataractreferral_sr_c_u_id_fk` (`created_user_id`)',
				'KEY `et_ophcocataractreferral_sr_l_m_u_id_fk` (`last_modified_user_id`)',
				'KEY `et_ophcocataractreferral_sr_l_r_t_id_fk` (`left_refraction_type_id`)',
				'KEY `et_ophcocataractreferral_sr_r_r_t_id_fk` (`right_refraction_type_id`)',
				'CONSTRAINT `et_ophcocataractreferral_sr_c_u_id_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_sr_e_id_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_sr_l_m_u_id_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_sr_l_r_t_id_fk` FOREIGN KEY (`left_refraction_type_id`) REFERENCES `et_ophcocataractreferral_refraction_type` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_sr_r_r_t_id_fk` FOREIGN KEY (`right_refraction_type_id`) REFERENCES `et_ophcocataractreferral_refraction_type` (`id`)',
			), 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('name=:name', array(':name'=>'Cataract Referral'))->queryRow();
		$this->insert('element_type',array('event_type_id'=>$event_type['id'],'name'=>'Refraction Prior To Refractive Surgery','class_name'=>'Element_OphCoCataractReferral_RefractionPriorToRefractiveSurgery','display_order'=>55,'default'=>1));
	}

	public function down()
	{
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('name=:name', array(':name'=>'Cataract Referral'))->queryRow();
		$this->delete('element_type','event_type_id='.$event_type['id']." and class_name = 'Element_OphCoCataractReferral_RefractionPriorToRefractiveSurgery'");

		$this->dropTable('et_ophcocataractreferral_surgeryrefraction');
	}
}
