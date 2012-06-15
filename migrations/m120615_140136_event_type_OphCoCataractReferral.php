<?php 
class m120615_140136_event_type_OphCoCataractReferral extends CDbMigration
{
	public function up() {

		// --- EVENT TYPE ENTRIES ---

		// create an event_type entry for this event type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('event_type')->where('name=:name', array(':name'=>'Cataract Referral'))->queryRow()) {
			$group = $this->dbConnection->createCommand()->select('id')->from('event_group')->where('name=:name',array(':name'=>'Communication events'))->queryRow();
			$this->insert('event_type', array('class_name' => 'OphCoCataractReferral', 'name' => 'Cataract Referral','event_group_id' => $group['id']));
		}
		// select the event_type id for this event type name
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('name=:name', array(':name'=>'Cataract Referral'))->queryRow();

		// --- ELEMENT TYPE ENTRIES ---

				// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Patient details',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Patient details','class_name' => 'Element_OphCoCataractReferral_PatientDetails', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name', array(':name'=>'Patient details'))->queryRow();
						// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'HPC',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'HPC','class_name' => 'Element_OphCoCataractReferral_Hpc', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name', array(':name'=>'HPC'))->queryRow();
						// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'POH',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'POH','class_name' => 'Element_OphCoCataractReferral_Poh', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name', array(':name'=>'POH'))->queryRow();
						// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Current refraction',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Current refraction','class_name' => 'Element_OphCoCataractReferral_CurrentRefraction', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name', array(':name'=>'Current refraction'))->queryRow();
						// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Intraocular pressure',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Intraocular pressure','class_name' => 'Element_OphCoCataractReferral_IntraocularPressure', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name', array(':name'=>'Intraocular pressure'))->queryRow();
						// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Posterior segment',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Posterior segment','class_name' => 'Element_OphCoCataractReferral_PosteriorSegment', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name', array(':name'=>'Posterior segment'))->queryRow();
						// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Confirmation',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Confirmation','class_name' => 'Element_OphCoCataractReferral_Confirmation', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name', array(':name'=>'Confirmation'))->queryRow();
				
				// element lookup table et_ophcocataractreferral_patientdetails_driving_status
		$this->createTable('et_ophcocataractreferral_patientdetails_driving_status', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
								'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcocataractreferral_patientdetails_driving_status_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcocataractreferral_patientdetails_driving_status_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcocataractreferral_patientdetails_driving_status_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_patientdetails_driving_status_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

						$this->insert('et_ophcocataractreferral_patientdetails_driving_status',array('name'=>'Class 1','display_order'=>1));
						$this->insert('et_ophcocataractreferral_patientdetails_driving_status',array('name'=>'Class 2 (LGV/PCV)','display_order'=>2));
						$this->insert('et_ophcocataractreferral_patientdetails_driving_status',array('name'=>'None','display_order'=>3));
							
				
		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophcocataractreferral_patientdetails', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'sex_id' => 'int(10) unsigned NOT NULL', // Sex
			'age' => 'varchar(255) DEFAULT \'\'', // Age
			'driving_status_id' => 'int(10) unsigned NOT NULL', // Driving status
			'interpreter_id' => 'int(10) unsigned NOT NULL', // Interpreter
							'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `Patient details_lmui_fk` (`last_modified_user_id`)',
				'KEY `Patient details_cui_fk` (`created_user_id`)',
				'KEY `Patient details_ev_fk` (`event_id`)',
								'KEY `et_ophcocataractreferral_patientdetails_sex_id_fk` (`sex_id`)',
								'KEY `et_ophcocataractreferral_patientdetails_driving_status_fk` (`driving_status_id`)',
								'KEY `et_ophcocataractreferral_patientdetails_interpreter_id_fk` (`interpreter_id`)',
								'CONSTRAINT `Patient details_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `Patient details_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `Patient details_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
								'CONSTRAINT `et_ophcocataractreferral_patientdetails_sex_id_fk` FOREIGN KEY (`sex_id`) REFERENCES `gender` (`id`)',
								'CONSTRAINT `et_ophcocataractreferral_patientdetails_driving_status_fk` FOREIGN KEY (`driving_status_id`) REFERENCES `et_ophcocataractreferral_patientdetails_driving_status` (`id`)',
								'CONSTRAINT `et_ophcocataractreferral_patientdetails_interpreter_id_fk` FOREIGN KEY (`interpreter_id`) REFERENCES `language` (`id`)',
							), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

						// element lookup table et_ophcocataractreferral_hpc_history
		$this->createTable('et_ophcocataractreferral_hpc_history', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
								'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcocataractreferral_hpc_history_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcocataractreferral_hpc_history_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcocataractreferral_hpc_history_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_hpc_history_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

						$this->insert('et_ophcocataractreferral_hpc_history',array('name'=>'Asymptomatic','display_order'=>1));
						$this->insert('et_ophcocataractreferral_hpc_history',array('name'=>'Distortion of vision','display_order'=>2));
						$this->insert('et_ophcocataractreferral_hpc_history',array('name'=>'Glare','display_order'=>3));
						$this->insert('et_ophcocataractreferral_hpc_history',array('name'=>'Loss of vision','display_order'=>4));
									// element lookup table et_ophcocataractreferral_hpc_impact
		$this->createTable('et_ophcocataractreferral_hpc_impact', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
								'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcocataractreferral_hpc_impact_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcocataractreferral_hpc_impact_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcocataractreferral_hpc_impact_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_hpc_impact_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

						$this->insert('et_ophcocataractreferral_hpc_impact',array('name'=>'Fall','display_order'=>1));
						$this->insert('et_ophcocataractreferral_hpc_impact',array('name'=>'Problems driving','display_order'=>2));
						$this->insert('et_ophcocataractreferral_hpc_impact',array('name'=>'Recreation related difficulty','display_order'=>3));
						$this->insert('et_ophcocataractreferral_hpc_impact',array('name'=>'Work related difficulty','display_order'=>4));
									// element lookup table et_ophcocataractreferral_hpc_refraction
		$this->createTable('et_ophcocataractreferral_hpc_refraction', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
								'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcocataractreferral_hpc_refraction_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcocataractreferral_hpc_refraction_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcocataractreferral_hpc_refraction_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_hpc_refraction_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

						$this->insert('et_ophcocataractreferral_hpc_refraction',array('name'=>'Always worn','display_order'=>1));
						$this->insert('et_ophcocataractreferral_hpc_refraction',array('name'=>'Glasses for myopia','display_order'=>2));
									// element lookup table et_ophcocataractreferral_hpc_site
		$this->createTable('et_ophcocataractreferral_hpc_site', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
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
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

						$this->insert('et_ophcocataractreferral_hpc_site',array('name'=>'Right eye','display_order'=>1));
						$this->insert('et_ophcocataractreferral_hpc_site',array('name'=>'Left eye','display_order'=>2));
						$this->insert('et_ophcocataractreferral_hpc_site',array('name'=>'Both eyes','display_order'=>3));
									// element lookup table et_ophcocataractreferral_hpc_onset
		$this->createTable('et_ophcocataractreferral_hpc_onset', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
								'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcocataractreferral_hpc_onset_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcocataractreferral_hpc_onset_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcocataractreferral_hpc_onset_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_hpc_onset_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

						$this->insert('et_ophcocataractreferral_hpc_onset',array('name'=>'Noticed by optometrist','display_order'=>1));
						$this->insert('et_ophcocataractreferral_hpc_onset',array('name'=>'Noticed by patient','display_order'=>2));
									// element lookup table et_ophcocataractreferral_hpc_first_second_eye
		$this->createTable('et_ophcocataractreferral_hpc_first_second_eye', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
								'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcocataractreferral_hpc_first_second_eye_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcocataractreferral_hpc_first_second_eye_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcocataractreferral_hpc_first_second_eye_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_hpc_first_second_eye_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

						$this->insert('et_ophcocataractreferral_hpc_first_second_eye',array('name'=>'1st cataract referral','display_order'=>1));
						$this->insert('et_ophcocataractreferral_hpc_first_second_eye',array('name'=>'2nd cataract referral','display_order'=>2));
							
				
		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophcocataractreferral_hpc', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'history' => 'text NOT NULL', // History
			'impact' => 'text NOT NULL', // Impact
			'refraction_id' => 'int(10) unsigned NOT NULL', // Refraction
			'site_id' => 'int(10) unsigned NOT NULL', // Site
			'onset_id' => 'int(10) unsigned NOT NULL', // Onset
			'first_second_eye_id' => 'int(10) unsigned NOT NULL', // 1st 2nd eye
							'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `HPC_lmui_fk` (`last_modified_user_id`)',
				'KEY `HPC_cui_fk` (`created_user_id`)',
				'KEY `HPC_ev_fk` (`event_id`)',
								'KEY `et_ophcocataractreferral_hpc_refraction_fk` (`refraction_id`)',
								'KEY `et_ophcocataractreferral_hpc_site_fk` (`site_id`)',
								'KEY `et_ophcocataractreferral_hpc_onset_fk` (`onset_id`)',
								'KEY `et_ophcocataractreferral_hpc_first_second_eye_fk` (`first_second_eye_id`)',
								'CONSTRAINT `HPC_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `HPC_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `HPC_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
								'CONSTRAINT `et_ophcocataractreferral_hpc_refraction_fk` FOREIGN KEY (`refraction_id`) REFERENCES `et_ophcocataractreferral_hpc_refraction` (`id`)',
								'CONSTRAINT `et_ophcocataractreferral_hpc_site_fk` FOREIGN KEY (`site_id`) REFERENCES `et_ophcocataractreferral_hpc_site` (`id`)',
								'CONSTRAINT `et_ophcocataractreferral_hpc_onset_fk` FOREIGN KEY (`onset_id`) REFERENCES `et_ophcocataractreferral_hpc_onset` (`id`)',
								'CONSTRAINT `et_ophcocataractreferral_hpc_first_second_eye_fk` FOREIGN KEY (`first_second_eye_id`) REFERENCES `et_ophcocataractreferral_hpc_first_second_eye` (`id`)',
							), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

						// element lookup table et_ophcocataractreferral_poh_right_eye
		$this->createTable('et_ophcocataractreferral_poh_right_eye', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
								'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcocataractreferral_poh_right_eye_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcocataractreferral_poh_right_eye_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcocataractreferral_poh_right_eye_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_poh_right_eye_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

						$this->insert('et_ophcocataractreferral_poh_right_eye',array('name'=>'Amblyopia','display_order'=>1));
						$this->insert('et_ophcocataractreferral_poh_right_eye',array('name'=>'Corneal graft','display_order'=>2));
						$this->insert('et_ophcocataractreferral_poh_right_eye',array('name'=>'Glaucoma','display_order'=>3));
						$this->insert('et_ophcocataractreferral_poh_right_eye',array('name'=>'Dry eye','display_order'=>4));
						$this->insert('et_ophcocataractreferral_poh_right_eye',array('name'=>'Scleritis','display_order'=>5));
						$this->insert('et_ophcocataractreferral_poh_right_eye',array('name'=>'Squint surgery','display_order'=>6));
						$this->insert('et_ophcocataractreferral_poh_right_eye',array('name'=>'Trabeculectomy','display_order'=>7));
						$this->insert('et_ophcocataractreferral_poh_right_eye',array('name'=>'Traumatic cataract','display_order'=>8));
						$this->insert('et_ophcocataractreferral_poh_right_eye',array('name'=>'Uveitis','display_order'=>9));
						$this->insert('et_ophcocataractreferral_poh_right_eye',array('name'=>'Vitrectomy','display_order'=>10));
									// element lookup table et_ophcocataractreferral_poh_left_eye
		$this->createTable('et_ophcocataractreferral_poh_left_eye', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
								'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcocataractreferral_poh_left_eye_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcocataractreferral_poh_left_eye_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcocataractreferral_poh_left_eye_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_poh_left_eye_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

						$this->insert('et_ophcocataractreferral_poh_left_eye',array('name'=>'Amblyopia','display_order'=>1));
						$this->insert('et_ophcocataractreferral_poh_left_eye',array('name'=>'Corneal graft','display_order'=>2));
						$this->insert('et_ophcocataractreferral_poh_left_eye',array('name'=>'Glaucoma','display_order'=>3));
						$this->insert('et_ophcocataractreferral_poh_left_eye',array('name'=>'Dry eye','display_order'=>4));
						$this->insert('et_ophcocataractreferral_poh_left_eye',array('name'=>'Scleritis','display_order'=>5));
						$this->insert('et_ophcocataractreferral_poh_left_eye',array('name'=>'Squint surgery','display_order'=>6));
						$this->insert('et_ophcocataractreferral_poh_left_eye',array('name'=>'Trabeculectomy','display_order'=>7));
						$this->insert('et_ophcocataractreferral_poh_left_eye',array('name'=>'Traumatic cataract','display_order'=>8));
						$this->insert('et_ophcocataractreferral_poh_left_eye',array('name'=>'Uveitis','display_order'=>9));
						$this->insert('et_ophcocataractreferral_poh_left_eye',array('name'=>'Vitrectomy','display_order'=>10));
							
				
		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophcocataractreferral_poh', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'right_eye' => 'text NOT NULL', // Right eye
			'left_eye' => 'text NOT NULL', // Left eye
							'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `POH_lmui_fk` (`last_modified_user_id`)',
				'KEY `POH_cui_fk` (`created_user_id`)',
				'KEY `POH_ev_fk` (`event_id`)',
								'CONSTRAINT `POH_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `POH_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `POH_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
							), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

						// element lookup table et_ophcocataractreferral_currentrefraction_right_sphere
		$this->createTable('et_ophcocataractreferral_currentrefraction_right_sphere', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
								'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_right_sphere_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_right_sphere_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_right_sphere_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_right_sphere_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

						$this->insert('et_ophcocataractreferral_currentrefraction_right_sphere',array('name'=>'-0.25','display_order'=>1));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_sphere',array('name'=>'0.00','display_order'=>2));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_sphere',array('name'=>'+0.25','display_order'=>3));
									// element lookup table et_ophcocataractreferral_currentrefraction_right_cylinder
		$this->createTable('et_ophcocataractreferral_currentrefraction_right_cylinder', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
								'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ocrc_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_right_cylinder_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ocrc_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_right_cylinder_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

						$this->insert('et_ophcocataractreferral_currentrefraction_right_cylinder',array('name'=>'-0.25','display_order'=>1));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_cylinder',array('name'=>'0.00','display_order'=>2));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_cylinder',array('name'=>'+0.25','display_order'=>3));
									// element lookup table et_ophcocataractreferral_currentrefraction_right_axis
		$this->createTable('et_ophcocataractreferral_currentrefraction_right_axis', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
								'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_right_axis_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_right_axis_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_right_axis_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_right_axis_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

						$this->insert('et_ophcocataractreferral_currentrefraction_right_axis',array('name'=>'-10','display_order'=>1));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_axis',array('name'=>'0','display_order'=>2));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_axis',array('name'=>'10','display_order'=>3));
									// element lookup table et_ophcocataractreferral_currentrefraction_right_corr_va
		$this->createTable('et_ophcocataractreferral_currentrefraction_right_corr_va', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
								'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_right_corr_va_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_right_corr_va_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_right_corr_va_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_right_corr_va_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

						$this->insert('et_ophcocataractreferral_currentrefraction_right_corr_va',array('name'=>'NR','display_order'=>1));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_corr_va',array('name'=>'6/5','display_order'=>2));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_corr_va',array('name'=>'6/6','display_order'=>3));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_corr_va',array('name'=>'6/9','display_order'=>4));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_corr_va',array('name'=>'6/12','display_order'=>5));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_corr_va',array('name'=>'6/18','display_order'=>6));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_corr_va',array('name'=>'6/24','display_order'=>7));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_corr_va',array('name'=>'6/36','display_order'=>8));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_corr_va',array('name'=>'6/60','display_order'=>9));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_corr_va',array('name'=>'3/60','display_order'=>10));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_corr_va',array('name'=>'CF','display_order'=>11));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_corr_va',array('name'=>'HM','display_order'=>12));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_corr_va',array('name'=>'PL','display_order'=>13));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_corr_va',array('name'=>'NPL','display_order'=>14));
									// element lookup table et_ophcocataractreferral_currentrefraction_right_near_va
		$this->createTable('et_ophcocataractreferral_currentrefraction_right_near_va', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
								'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_right_near_va_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_right_near_va_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_right_near_va_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_right_near_va_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

						$this->insert('et_ophcocataractreferral_currentrefraction_right_near_va',array('name'=>'NR','display_order'=>1));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_near_va',array('name'=>'N4.5','display_order'=>2));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_near_va',array('name'=>'N5','display_order'=>3));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_near_va',array('name'=>'N8','display_order'=>4));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_near_va',array('name'=>'N9','display_order'=>5));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_near_va',array('name'=>'N10','display_order'=>6));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_near_va',array('name'=>'N12','display_order'=>7));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_near_va',array('name'=>'N14','display_order'=>8));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_near_va',array('name'=>'N18','display_order'=>9));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_near_va',array('name'=>'N24','display_order'=>10));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_near_va',array('name'=>'N36','display_order'=>11));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_near_va',array('name'=>'N48','display_order'=>12));
									// element lookup table et_ophcocataractreferral_currentrefraction_right_best_va
		$this->createTable('et_ophcocataractreferral_currentrefraction_right_best_va', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
								'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_right_best_va_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_right_best_va_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_right_best_va_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_right_best_va_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

						$this->insert('et_ophcocataractreferral_currentrefraction_right_best_va',array('name'=>'NR','display_order'=>1));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_best_va',array('name'=>'6/5','display_order'=>2));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_best_va',array('name'=>'6/6','display_order'=>3));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_best_va',array('name'=>'6/9','display_order'=>4));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_best_va',array('name'=>'6/12','display_order'=>5));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_best_va',array('name'=>'6/18','display_order'=>6));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_best_va',array('name'=>'6/24','display_order'=>7));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_best_va',array('name'=>'6/36','display_order'=>8));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_best_va',array('name'=>'6/60','display_order'=>9));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_best_va',array('name'=>'3/60','display_order'=>10));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_best_va',array('name'=>'CF','display_order'=>11));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_best_va',array('name'=>'HM','display_order'=>12));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_best_va',array('name'=>'PL','display_order'=>13));
						$this->insert('et_ophcocataractreferral_currentrefraction_right_best_va',array('name'=>'NPL','display_order'=>14));
									// element lookup table et_ophcocataractreferral_currentrefraction_left_sphere
		$this->createTable('et_ophcocataractreferral_currentrefraction_left_sphere', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
								'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_left_sphere_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_left_sphere_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_left_sphere_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_left_sphere_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

						$this->insert('et_ophcocataractreferral_currentrefraction_left_sphere',array('name'=>'-0.25','display_order'=>1));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_sphere',array('name'=>'0.00','display_order'=>2));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_sphere',array('name'=>'+0.25','display_order'=>3));
									// element lookup table et_ophcocataractreferral_currentrefraction_left_cylinder
		$this->createTable('et_ophcocataractreferral_currentrefraction_left_cylinder', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
								'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_left_cylinder_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_left_cylinder_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_left_cylinder_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_left_cylinder_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

						$this->insert('et_ophcocataractreferral_currentrefraction_left_cylinder',array('name'=>'-0.25','display_order'=>1));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_cylinder',array('name'=>'0.00','display_order'=>2));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_cylinder',array('name'=>'+0.25','display_order'=>3));
									// element lookup table et_ophcocataractreferral_currentrefraction_left_axis
		$this->createTable('et_ophcocataractreferral_currentrefraction_left_axis', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
								'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_left_axis_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_left_axis_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_left_axis_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_left_axis_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

						$this->insert('et_ophcocataractreferral_currentrefraction_left_axis',array('name'=>'-10','display_order'=>1));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_axis',array('name'=>'0','display_order'=>2));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_axis',array('name'=>'10','display_order'=>3));
									// element lookup table et_ophcocataractreferral_currentrefraction_left_corr_va
		$this->createTable('et_ophcocataractreferral_currentrefraction_left_corr_va', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
								'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_left_corr_va_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_left_corr_va_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_left_corr_va_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_left_corr_va_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

						$this->insert('et_ophcocataractreferral_currentrefraction_left_corr_va',array('name'=>'NR','display_order'=>1));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_corr_va',array('name'=>'6/5','display_order'=>2));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_corr_va',array('name'=>'6/6','display_order'=>3));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_corr_va',array('name'=>'6/9','display_order'=>4));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_corr_va',array('name'=>'6/12','display_order'=>5));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_corr_va',array('name'=>'6/18','display_order'=>6));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_corr_va',array('name'=>'6/24','display_order'=>7));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_corr_va',array('name'=>'6/36','display_order'=>8));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_corr_va',array('name'=>'6/60','display_order'=>9));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_corr_va',array('name'=>'3/60','display_order'=>10));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_corr_va',array('name'=>'CF','display_order'=>11));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_corr_va',array('name'=>'HM','display_order'=>12));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_corr_va',array('name'=>'PL','display_order'=>13));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_corr_va',array('name'=>'NPL','display_order'=>14));
									// element lookup table et_ophcocataractreferral_currentrefraction_left_near_va
		$this->createTable('et_ophcocataractreferral_currentrefraction_left_near_va', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
								'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_left_near_va_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_left_near_va_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_left_near_va_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_left_near_va_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

						$this->insert('et_ophcocataractreferral_currentrefraction_left_near_va',array('name'=>'NR','display_order'=>1));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_near_va',array('name'=>'N4.5','display_order'=>2));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_near_va',array('name'=>'N5','display_order'=>3));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_near_va',array('name'=>'N8','display_order'=>4));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_near_va',array('name'=>'N9','display_order'=>5));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_near_va',array('name'=>'N10','display_order'=>6));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_near_va',array('name'=>'N12','display_order'=>7));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_near_va',array('name'=>'N14','display_order'=>8));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_near_va',array('name'=>'N18','display_order'=>9));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_near_va',array('name'=>'N24','display_order'=>10));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_near_va',array('name'=>'N36','display_order'=>11));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_near_va',array('name'=>'N48','display_order'=>12));
									// element lookup table et_ophcocataractreferral_currentrefraction_left_best_va
		$this->createTable('et_ophcocataractreferral_currentrefraction_left_best_va', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
								'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_left_best_va_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcocataractreferral_currentrefraction_left_best_va_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_left_best_va_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_currentrefraction_left_best_va_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

						$this->insert('et_ophcocataractreferral_currentrefraction_left_best_va',array('name'=>'NR','display_order'=>1));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_best_va',array('name'=>'6/5','display_order'=>2));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_best_va',array('name'=>'6/6','display_order'=>3));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_best_va',array('name'=>'6/9','display_order'=>4));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_best_va',array('name'=>'6/12','display_order'=>5));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_best_va',array('name'=>'6/18','display_order'=>6));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_best_va',array('name'=>'6/24','display_order'=>7));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_best_va',array('name'=>'6/36','display_order'=>8));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_best_va',array('name'=>'6/60','display_order'=>9));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_best_va',array('name'=>'3/60','display_order'=>10));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_best_va',array('name'=>'CF','display_order'=>11));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_best_va',array('name'=>'HM','display_order'=>12));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_best_va',array('name'=>'PL','display_order'=>13));
						$this->insert('et_ophcocataractreferral_currentrefraction_left_best_va',array('name'=>'NPL','display_order'=>14));
							
				
		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophcocataractreferral_currentrefraction', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'right_sphere_id' => 'int(10) unsigned NOT NULL', // Right sphere
			'right_cylinder_id' => 'int(10) unsigned NOT NULL', // Right cylinder
			'right_axis_id' => 'int(10) unsigned NOT NULL', // Right axis
			'right_corr_va_id' => 'int(10) unsigned NOT NULL', // Right Corr VA
			'right_near_va_id' => 'int(10) unsigned NOT NULL', // Right Near VA
			'right_best_va_id' => 'int(10) unsigned NOT NULL', // Right Best VA
			'left_sphere_id' => 'int(10) unsigned NOT NULL', // Left sphere
			'left_cylinder_id' => 'int(10) unsigned NOT NULL', // Left cylinder
			'left_axis_id' => 'int(10) unsigned NOT NULL', // Left axis
			'left_corr_va_id' => 'int(10) unsigned NOT NULL', // Left Corr VA
			'left_near_va_id' => 'int(10) unsigned NOT NULL', // Left Near VA
			'left_best_va_id' => 'int(10) unsigned NOT NULL', // Left Best VA
							'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `Current refraction_lmui_fk` (`last_modified_user_id`)',
				'KEY `Current refraction_cui_fk` (`created_user_id`)',
				'KEY `Current refraction_ev_fk` (`event_id`)',
								'KEY `et_ophcocataractreferral_currentrefraction_right_sphere_fk` (`right_sphere_id`)',
								'KEY `et_ophcocataractreferral_currentrefraction_right_cylinder_fk` (`right_cylinder_id`)',
								'KEY `et_ophcocataractreferral_currentrefraction_right_axis_fk` (`right_axis_id`)',
								'KEY `et_ophcocataractreferral_currentrefraction_right_corr_va_fk` (`right_corr_va_id`)',
								'KEY `et_ophcocataractreferral_currentrefraction_right_near_va_fk` (`right_near_va_id`)',
								'KEY `et_ophcocataractreferral_currentrefraction_right_best_va_fk` (`right_best_va_id`)',
								'KEY `et_ophcocataractreferral_currentrefraction_left_sphere_fk` (`left_sphere_id`)',
								'KEY `et_ophcocataractreferral_currentrefraction_left_cylinder_fk` (`left_cylinder_id`)',
								'KEY `et_ophcocataractreferral_currentrefraction_left_axis_fk` (`left_axis_id`)',
								'KEY `et_ophcocataractreferral_currentrefraction_left_corr_va_fk` (`left_corr_va_id`)',
								'KEY `et_ophcocataractreferral_currentrefraction_left_near_va_fk` (`left_near_va_id`)',
								'KEY `et_ophcocataractreferral_currentrefraction_left_best_va_fk` (`left_best_va_id`)',
								'CONSTRAINT `Current refraction_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `Current refraction_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `Current refraction_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
								'CONSTRAINT `et_ophcocataractreferral_currentrefraction_right_sphere_fk` FOREIGN KEY (`right_sphere_id`) REFERENCES `et_ophcocataractreferral_currentrefraction_right_sphere` (`id`)',
								'CONSTRAINT `et_ophcocataractreferral_currentrefraction_right_cylinder_fk` FOREIGN KEY (`right_cylinder_id`) REFERENCES `et_ophcocataractreferral_currentrefraction_right_cylinder` (`id`)',
								'CONSTRAINT `et_ophcocataractreferral_currentrefraction_right_axis_fk` FOREIGN KEY (`right_axis_id`) REFERENCES `et_ophcocataractreferral_currentrefraction_right_axis` (`id`)',
								'CONSTRAINT `et_ophcocataractreferral_currentrefraction_right_corr_va_fk` FOREIGN KEY (`right_corr_va_id`) REFERENCES `et_ophcocataractreferral_currentrefraction_right_corr_va` (`id`)',
								'CONSTRAINT `et_ophcocataractreferral_currentrefraction_right_near_va_fk` FOREIGN KEY (`right_near_va_id`) REFERENCES `et_ophcocataractreferral_currentrefraction_right_near_va` (`id`)',
								'CONSTRAINT `et_ophcocataractreferral_currentrefraction_right_best_va_fk` FOREIGN KEY (`right_best_va_id`) REFERENCES `et_ophcocataractreferral_currentrefraction_right_best_va` (`id`)',
								'CONSTRAINT `et_ophcocataractreferral_currentrefraction_left_sphere_fk` FOREIGN KEY (`left_sphere_id`) REFERENCES `et_ophcocataractreferral_currentrefraction_left_sphere` (`id`)',
								'CONSTRAINT `et_ophcocataractreferral_currentrefraction_left_cylinder_fk` FOREIGN KEY (`left_cylinder_id`) REFERENCES `et_ophcocataractreferral_currentrefraction_left_cylinder` (`id`)',
								'CONSTRAINT `et_ophcocataractreferral_currentrefraction_left_axis_fk` FOREIGN KEY (`left_axis_id`) REFERENCES `et_ophcocataractreferral_currentrefraction_left_axis` (`id`)',
								'CONSTRAINT `et_ophcocataractreferral_currentrefraction_left_corr_va_fk` FOREIGN KEY (`left_corr_va_id`) REFERENCES `et_ophcocataractreferral_currentrefraction_left_corr_va` (`id`)',
								'CONSTRAINT `et_ophcocataractreferral_currentrefraction_left_near_va_fk` FOREIGN KEY (`left_near_va_id`) REFERENCES `et_ophcocataractreferral_currentrefraction_left_near_va` (`id`)',
								'CONSTRAINT `et_ophcocataractreferral_currentrefraction_left_best_va_fk` FOREIGN KEY (`left_best_va_id`) REFERENCES `et_ophcocataractreferral_currentrefraction_left_best_va` (`id`)',
							), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

						// element lookup table et_ophcocataractreferral_intraocularpressure_left_instrument
		$this->createTable('et_ophcocataractreferral_intraocularpressure_left_instrument', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
								'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_oili_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_oili_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_oili_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_oili_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

						$this->insert('et_ophcocataractreferral_intraocularpressure_left_instrument',array('name'=>'Goldmann','display_order'=>1));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_instrument',array('name'=>'Tonopen','display_order'=>2));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_instrument',array('name'=>'i-care','display_order'=>3));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_instrument',array('name'=>'Perkins','display_order'=>4));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_instrument',array('name'=>'Other','display_order'=>5));
									// element lookup table et_ophcocataractreferral_intraocularpressure_left_pressure
		$this->createTable('et_ophcocataractreferral_intraocularpressure_left_pressure', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
								'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_oilp_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_oilp_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_oilp_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_oilp_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'NR','display_order'=>1));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'1','display_order'=>2));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'2','display_order'=>3));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'3','display_order'=>4));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'4','display_order'=>5));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'5','display_order'=>6));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'6','display_order'=>7));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'7','display_order'=>8));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'8','display_order'=>9));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'9','display_order'=>10));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'10','display_order'=>11));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'11','display_order'=>12));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'12','display_order'=>13));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'13','display_order'=>14));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'14','display_order'=>15));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'15','display_order'=>16));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'16','display_order'=>17));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'17','display_order'=>18));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'18','display_order'=>19));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'19','display_order'=>20));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'20','display_order'=>21));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'21','display_order'=>22));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'22','display_order'=>23));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'23','display_order'=>24));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'24','display_order'=>25));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'25','display_order'=>26));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'26','display_order'=>27));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'27','display_order'=>28));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'28','display_order'=>29));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'29','display_order'=>30));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'30','display_order'=>31));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'31','display_order'=>32));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'32','display_order'=>33));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'33','display_order'=>34));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'34','display_order'=>35));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'35','display_order'=>36));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'36','display_order'=>37));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'37','display_order'=>38));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'38','display_order'=>39));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'39','display_order'=>40));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'40','display_order'=>41));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'41','display_order'=>42));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'42','display_order'=>43));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'43','display_order'=>44));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'44','display_order'=>45));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'45','display_order'=>46));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'46','display_order'=>47));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'47','display_order'=>48));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'48','display_order'=>49));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'49','display_order'=>50));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'50','display_order'=>51));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'51','display_order'=>52));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'52','display_order'=>53));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'53','display_order'=>54));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'54','display_order'=>55));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'55','display_order'=>56));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'56','display_order'=>57));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'57','display_order'=>58));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'58','display_order'=>59));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'59','display_order'=>60));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'60','display_order'=>61));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'61','display_order'=>62));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'62','display_order'=>63));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'63','display_order'=>64));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'64','display_order'=>65));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'65','display_order'=>66));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'66','display_order'=>67));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'67','display_order'=>68));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'68','display_order'=>69));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'69','display_order'=>70));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'70','display_order'=>71));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'71','display_order'=>72));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'72','display_order'=>73));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'73','display_order'=>74));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'74','display_order'=>75));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'75','display_order'=>76));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'76','display_order'=>77));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'77','display_order'=>78));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'78','display_order'=>79));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'79','display_order'=>80));
						$this->insert('et_ophcocataractreferral_intraocularpressure_left_pressure',array('name'=>'80','display_order'=>81));
									// element lookup table et_ophcocataractreferral_intraocularpressure_right_instrument
		$this->createTable('et_ophcocataractreferral_intraocularpressure_right_instrument', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
								'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_oiri_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_oiri_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_oiri_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_oiri_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

						$this->insert('et_ophcocataractreferral_intraocularpressure_right_instrument',array('name'=>'Goldmann','display_order'=>1));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_instrument',array('name'=>'Tonopen','display_order'=>2));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_instrument',array('name'=>'i-care','display_order'=>3));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_instrument',array('name'=>'Perkins','display_order'=>4));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_instrument',array('name'=>'Other','display_order'=>5));
									// element lookup table et_ophcocataractreferral_intraocularpressure_right_pressure
		$this->createTable('et_ophcocataractreferral_intraocularpressure_right_pressure', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
								'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_oirp_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_oirp_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_oirp_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_oirp_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'NR','display_order'=>1));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'1','display_order'=>2));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'2','display_order'=>3));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'3','display_order'=>4));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'4','display_order'=>5));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'5','display_order'=>6));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'6','display_order'=>7));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'7','display_order'=>8));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'8','display_order'=>9));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'9','display_order'=>10));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'10','display_order'=>11));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'11','display_order'=>12));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'12','display_order'=>13));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'13','display_order'=>14));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'14','display_order'=>15));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'15','display_order'=>16));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'16','display_order'=>17));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'17','display_order'=>18));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'18','display_order'=>19));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'19','display_order'=>20));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'20','display_order'=>21));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'21','display_order'=>22));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'22','display_order'=>23));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'23','display_order'=>24));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'24','display_order'=>25));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'25','display_order'=>26));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'26','display_order'=>27));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'27','display_order'=>28));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'28','display_order'=>29));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'29','display_order'=>30));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'30','display_order'=>31));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'31','display_order'=>32));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'32','display_order'=>33));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'33','display_order'=>34));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'34','display_order'=>35));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'35','display_order'=>36));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'36','display_order'=>37));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'37','display_order'=>38));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'38','display_order'=>39));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'39','display_order'=>40));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'40','display_order'=>41));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'41','display_order'=>42));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'42','display_order'=>43));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'43','display_order'=>44));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'44','display_order'=>45));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'45','display_order'=>46));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'46','display_order'=>47));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'47','display_order'=>48));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'48','display_order'=>49));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'49','display_order'=>50));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'50','display_order'=>51));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'51','display_order'=>52));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'52','display_order'=>53));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'53','display_order'=>54));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'54','display_order'=>55));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'55','display_order'=>56));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'56','display_order'=>57));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'57','display_order'=>58));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'58','display_order'=>59));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'59','display_order'=>60));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'60','display_order'=>61));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'61','display_order'=>62));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'62','display_order'=>63));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'63','display_order'=>64));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'64','display_order'=>65));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'65','display_order'=>66));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'66','display_order'=>67));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'67','display_order'=>68));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'68','display_order'=>69));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'69','display_order'=>70));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'70','display_order'=>71));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'71','display_order'=>72));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'72','display_order'=>73));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'73','display_order'=>74));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'74','display_order'=>75));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'75','display_order'=>76));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'76','display_order'=>77));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'77','display_order'=>78));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'78','display_order'=>79));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'79','display_order'=>80));
						$this->insert('et_ophcocataractreferral_intraocularpressure_right_pressure',array('name'=>'80','display_order'=>81));
							
				
		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophcocataractreferral_intraocularpressure', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'left_instrument_id' => 'int(10) unsigned NOT NULL', // Left instrument
			'left_pressure_id' => 'int(10) unsigned NOT NULL', // Left pressure
			'right_instrument_id' => 'int(10) unsigned NOT NULL', // Right instrument
			'right_pressure_id' => 'int(10) unsigned NOT NULL', // Right pressure
							'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `Intraocular pressure_lmui_fk` (`last_modified_user_id`)',
				'KEY `Intraocular pressure_cui_fk` (`created_user_id`)',
				'KEY `Intraocular pressure_ev_fk` (`event_id`)',
								'KEY `et_ophcocataractreferral_intraocularpressure_left_instrument_fk` (`left_instrument_id`)',
								'KEY `et_ophcocataractreferral_intraocularpressure_left_pressure_fk` (`left_pressure_id`)',
								'KEY `et_ophcocataractreferral_intraocularpressure_right_instrument_fk` (`right_instrument_id`)',
								'KEY `et_ophcocataractreferral_intraocularpressure_right_pressure_fk` (`right_pressure_id`)',
								'CONSTRAINT `Intraocular pressure_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `Intraocular pressure_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `Intraocular pressure_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
								'CONSTRAINT `et_ophcocataractreferral_intraocularpressure_left_instrument_fk` FOREIGN KEY (`left_instrument_id`) REFERENCES `et_ophcocataractreferral_intraocularpressure_left_instrument` (`id`)',
								'CONSTRAINT `et_ophcocataractreferral_intraocularpressure_left_pressure_fk` FOREIGN KEY (`left_pressure_id`) REFERENCES `et_ophcocataractreferral_intraocularpressure_left_pressure` (`id`)',
								'CONSTRAINT `et_ophcocataractreferral_intraocularpressure_right_instrument_fk` FOREIGN KEY (`right_instrument_id`) REFERENCES `et_ophcocataractreferral_intraocularpressure_right_instrument` (`id`)',
								'CONSTRAINT `et_ophcocataractreferral_intraocularpressure_right_pressure_fk` FOREIGN KEY (`right_pressure_id`) REFERENCES `et_ophcocataractreferral_intraocularpressure_right_pressure` (`id`)',
							), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

						// element lookup table et_ophcocataractreferral_posteriorsegment_right_eye
		$this->createTable('et_ophcocataractreferral_posteriorsegment_right_eye', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
								'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcocataractreferral_posteriorsegment_right_eye_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcocataractreferral_posteriorsegment_right_eye_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcocataractreferral_posteriorsegment_right_eye_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_posteriorsegment_right_eye_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

						$this->insert('et_ophcocataractreferral_posteriorsegment_right_eye',array('name'=>'Normal','display_order'=>1));
						$this->insert('et_ophcocataractreferral_posteriorsegment_right_eye',array('name'=>'ARMD','display_order'=>2));
						$this->insert('et_ophcocataractreferral_posteriorsegment_right_eye',array('name'=>'Diabetic retinopathy','display_order'=>3));
						$this->insert('et_ophcocataractreferral_posteriorsegment_right_eye',array('name'=>'Hazy view','display_order'=>4));
						$this->insert('et_ophcocataractreferral_posteriorsegment_right_eye',array('name'=>'Not seen','display_order'=>5));
						$this->insert('et_ophcocataractreferral_posteriorsegment_right_eye',array('name'=>'Vitreous opacities','display_order'=>6));
						$this->insert('et_ophcocataractreferral_posteriorsegment_right_eye',array('name'=>'Asteroid hyalosis','display_order'=>7));
									// element lookup table et_ophcocataractreferral_posteriorsegment_left_eye
		$this->createTable('et_ophcocataractreferral_posteriorsegment_left_eye', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
								'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcocataractreferral_posteriorsegment_left_eye_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcocataractreferral_posteriorsegment_left_eye_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcocataractreferral_posteriorsegment_left_eye_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcocataractreferral_posteriorsegment_left_eye_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

						$this->insert('et_ophcocataractreferral_posteriorsegment_left_eye',array('name'=>'Normal','display_order'=>1));
						$this->insert('et_ophcocataractreferral_posteriorsegment_left_eye',array('name'=>'ARMD','display_order'=>2));
						$this->insert('et_ophcocataractreferral_posteriorsegment_left_eye',array('name'=>'Diabetic retinopathy','display_order'=>3));
						$this->insert('et_ophcocataractreferral_posteriorsegment_left_eye',array('name'=>'Hazy view','display_order'=>4));
						$this->insert('et_ophcocataractreferral_posteriorsegment_left_eye',array('name'=>'Not seen','display_order'=>5));
						$this->insert('et_ophcocataractreferral_posteriorsegment_left_eye',array('name'=>'Vitreous opacities','display_order'=>6));
						$this->insert('et_ophcocataractreferral_posteriorsegment_left_eye',array('name'=>'Asteroid hyalosis','display_order'=>7));
							
				
		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophcocataractreferral_posteriorsegment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'right_eye' => 'text NOT NULL', // Right eye
			'left_eye' => 'text NOT NULL', // Left eye
							'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `Posterior segment_lmui_fk` (`last_modified_user_id`)',
				'KEY `Posterior segment_cui_fk` (`created_user_id`)',
				'KEY `Posterior segment_ev_fk` (`event_id`)',
								'CONSTRAINT `Posterior segment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `Posterior segment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `Posterior segment_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
							), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

				
				
		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophcocataractreferral_confirmation', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'risks_discussed' => 'tinyint(1) unsigned NOT NULL', // Patient has been provided with cataract surgery information and general risks and benefits for an average case have been discussed
			'consider_surgery' => 'tinyint(1) unsigned NOT NULL', // Patient wishes to consider cataract surgery
							'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `Confirmation_lmui_fk` (`last_modified_user_id`)',
				'KEY `Confirmation_cui_fk` (`created_user_id`)',
				'KEY `Confirmation_ev_fk` (`event_id`)',
								'CONSTRAINT `Confirmation_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `Confirmation_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `Confirmation_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
							), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

						}

	public function down() {
		// --- drop any element related tables ---
		// --- drop element tables ---
				$this->dropTable('et_ophcocataractreferral_patientdetails');

		
				$this->dropTable('et_ophcocataractreferral_patientdetails_driving_status');
		
				$this->dropTable('et_ophcocataractreferral_hpc');

		
				$this->dropTable('et_ophcocataractreferral_hpc_history');
				$this->dropTable('et_ophcocataractreferral_hpc_impact');
				$this->dropTable('et_ophcocataractreferral_hpc_refraction');
				$this->dropTable('et_ophcocataractreferral_hpc_site');
				$this->dropTable('et_ophcocataractreferral_hpc_onset');
				$this->dropTable('et_ophcocataractreferral_hpc_first_second_eye');
		
				$this->dropTable('et_ophcocataractreferral_poh');

		
				$this->dropTable('et_ophcocataractreferral_poh_right_eye');
				$this->dropTable('et_ophcocataractreferral_poh_left_eye');
		
				$this->dropTable('et_ophcocataractreferral_currentrefraction');

		
				$this->dropTable('et_ophcocataractreferral_currentrefraction_right_sphere');
				$this->dropTable('et_ophcocataractreferral_currentrefraction_right_cylinder');
				$this->dropTable('et_ophcocataractreferral_currentrefraction_right_axis');
				$this->dropTable('et_ophcocataractreferral_currentrefraction_right_corr_va');
				$this->dropTable('et_ophcocataractreferral_currentrefraction_right_near_va');
				$this->dropTable('et_ophcocataractreferral_currentrefraction_right_best_va');
				$this->dropTable('et_ophcocataractreferral_currentrefraction_left_sphere');
				$this->dropTable('et_ophcocataractreferral_currentrefraction_left_cylinder');
				$this->dropTable('et_ophcocataractreferral_currentrefraction_left_axis');
				$this->dropTable('et_ophcocataractreferral_currentrefraction_left_corr_va');
				$this->dropTable('et_ophcocataractreferral_currentrefraction_left_near_va');
				$this->dropTable('et_ophcocataractreferral_currentrefraction_left_best_va');
		
				$this->dropTable('et_ophcocataractreferral_intraocularpressure');

		
				$this->dropTable('et_ophcocataractreferral_intraocularpressure_left_instrument');
				$this->dropTable('et_ophcocataractreferral_intraocularpressure_left_pressure');
				$this->dropTable('et_ophcocataractreferral_intraocularpressure_right_instrument');
				$this->dropTable('et_ophcocataractreferral_intraocularpressure_right_pressure');
		
				$this->dropTable('et_ophcocataractreferral_posteriorsegment');

		
				$this->dropTable('et_ophcocataractreferral_posteriorsegment_right_eye');
				$this->dropTable('et_ophcocataractreferral_posteriorsegment_left_eye');
		
				$this->dropTable('et_ophcocataractreferral_confirmation');

		
		
		
		// --- delete event entries ---
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('name=:name', array(':name'=>'Cataract Referral'))->queryRow();

		foreach ($this->dbConnection->createCommand()->select('id')->from('event')->where('event_type_id=:event_type_id', array(':event_type_id'=>$event_type['id']))->queryAll() as $row) {
			$this->delete('audit', 'event_id='.$row['id']);
			$this->delete('event', 'id='.$row['id']);
		}

		// --- delete entries from element_type ---
		$this->delete('element_type', 'event_type_id='.$event_type['id']);

		// --- delete entries from event_type ---
		$this->delete('event_type', 'id='.$event_type['id']);

		// echo "m000000_000001_event_type_OphCoCataractReferral does not support migration down.\n";
		// return false;
		echo "If you are removing this module you may also need to remove references to it in your configuration files\n";
		return true;
	}
}
?>