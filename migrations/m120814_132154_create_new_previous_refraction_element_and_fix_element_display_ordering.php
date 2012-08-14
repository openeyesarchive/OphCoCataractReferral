<?php

class m120814_132154_create_new_previous_refraction_element_and_fix_element_display_ordering extends CDbMigration
{
	public function up()
	{
		$this->createTable('et_ophcocataractreferral_previousrefraction', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'previous_refraction_different' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'previous_refraction_date' => "datetime NOT NULL DEFAULT '1901-01-01 00:00:00'",
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
				'KEY `et_ophcocataractreferral_pr_e_id_fk` (`event_id`)',
				'KEY `et_ophcocataractreferral_pr_c_u_id_fk` (`created_user_id`)',
				'KEY `et_ophcocataractreferral_pr_l_m_u_id_fk` (`last_modified_user_id`)',
				'KEY `et_ophcocataractreferral_pr_l_r_t_id_fk` (`left_refraction_type_id`)',
				'KEY `et_ophcocataractreferral_pr_r_r_t_id_fk` (`right_refraction_type_id`)',
				'CONSTRAINT `et_ophcocataractreferral_pr_c_u_id_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_pr_e_id_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_pr_l_m_u_id_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_pr_l_r_t_id_fk` FOREIGN KEY (`left_refraction_type_id`) REFERENCES `et_ophcocataractreferral_refraction_type` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_pr_r_r_t_id_fk` FOREIGN KEY (`right_refraction_type_id`) REFERENCES `et_ophcocataractreferral_refraction_type` (`id`)',
			), 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('name=:name', array(':name'=>'Cataract Referral'))->queryRow();
		$this->insert('element_type',array('event_type_id'=>$event_type['id'],'name'=>'Previous Refraction','class_name'=>'Element_OphCoCataractReferral_PreviousRefraction','display_order'=>50,'default'=>1));

		$this->update('element_type',array('display_order'=>10),'event_type_id='.$event_type['id']." and class_name = 'Element_OphCoCataractReferral_PatientDetails'");
		$this->update('element_type',array('display_order'=>20),'event_type_id='.$event_type['id']." and class_name = 'Element_OphCoCataractReferral_Hpc'");
		$this->update('element_type',array('display_order'=>30),'event_type_id='.$event_type['id']." and class_name = 'Element_OphCoCataractReferral_PreviousOphthalmicHistory'");
		$this->update('element_type',array('display_order'=>40),'event_type_id='.$event_type['id']." and class_name = 'Element_OphCoCataractReferral_CurrentRefraction'");
		$this->update('element_type',array('display_order'=>60),'event_type_id='.$event_type['id']." and class_name = 'Element_OphCoCataractReferral_IntraocularPressure'");
		$this->update('element_type',array('display_order'=>70),'event_type_id='.$event_type['id']." and class_name = 'Element_OphCoCataractReferral_PosteriorSegment'");
		$this->update('element_type',array('display_order'=>80),'event_type_id='.$event_type['id']." and class_name = 'Element_OphCoCataractReferral_Confirmation'");
	}

	public function down()
	{
		$this->dropTable('et_ophcocataractreferral_previousrefraction');

		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('name=:name', array(':name'=>'Cataract Referral'))->queryRow();
		$this->delete('element_type','event_type_id='.$event_type['id']." and class_name = 'Element_OphCoCataractReferral_PreviousRefraction'");

		$this->update('element_type',array('display_order'=>1),'event_type_id='.$event_type['id']);
	}
}
