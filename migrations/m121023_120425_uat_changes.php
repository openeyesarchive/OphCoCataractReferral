<?php

class m121023_120425_uat_changes extends CDbMigration
{
	public function up()
	{
		// migration might fail if you have any refraction type elements with the type set to "Other"
		// requires a manual process to determine what should happen to records in this situation.
		$this->delete('et_ophcocataractreferral_refraction_type',"name='Other'");
		
		// Add other field to refraction types allow null in the type selection
		$this->addColumn('et_ophcocataractreferral_currentrefraction', 'left_type_other', 'varchar(100)');
		$this->addColumn('et_ophcocataractreferral_currentrefraction', 'right_type_other', 'varchar(100)');
		$this->alterColumn('et_ophcocataractreferral_currentrefraction', 'left_type_id', "int(10) unsigned NULL");
		$this->alterColumn('et_ophcocataractreferral_currentrefraction', 'right_type_id', "int(10) unsigned NULL");
		
		$this->addColumn('et_ophcocataractreferral_previousrefraction', 'left_type_other', 'varchar(100)');
		$this->addColumn('et_ophcocataractreferral_previousrefraction', 'right_type_other', 'varchar(100)');
		$this->alterColumn('et_ophcocataractreferral_previousrefraction', 'left_type_id', "int(10) unsigned NULL");
		$this->alterColumn('et_ophcocataractreferral_previousrefraction', 'right_type_id', "int(10) unsigned NULL");
		
		$this->addColumn('et_ophcocataractreferral_surgeryrefraction', 'left_type_other', 'varchar(100)');
		$this->addColumn('et_ophcocataractreferral_surgeryrefraction', 'right_type_other', 'varchar(100)');
		$this->alterColumn('et_ophcocataractreferral_surgeryrefraction', 'left_type_id', "int(10) unsigned NULL");
		$this->alterColumn('et_ophcocataractreferral_surgeryrefraction', 'right_type_id', "int(10) unsigned NULL");
		
	}

	public function down()
	{
		// migration down might fail at this point if you have records with null values for the refraction types.
		$this->alterColumn('et_ophcocataractreferral_currentrefraction', 'left_type_id', "int(10) unsigned NOT NULL");
		$this->alterColumn('et_ophcocataractreferral_currentrefraction', 'right_type_id', "int(10) unsigned NOT NULL");
		$this->alterColumn('et_ophcocataractreferral_previousrefraction', 'left_type_id', "int(10) unsigned NOT NULL");
		$this->alterColumn('et_ophcocataractreferral_previousrefraction', 'right_type_id', "int(10) unsigned NOT NULL");
		$this->alterColumn('et_ophcocataractreferral_surgeryrefraction', 'left_type_id', "int(10) unsigned NOT NULL");
		$this->alterColumn('et_ophcocataractreferral_surgeryrefraction', 'right_type_id', "int(10) unsigned NOT NULL");
		
		
		$this->dropColumn('et_ophcocataractreferral_currentrefraction', 'left_type_other');
		$this->dropColumn('et_ophcocataractreferral_currentrefraction', 'right_type_other');

				
		$this->dropColumn('et_ophcocataractreferral_previousrefraction', 'left_type_other');
		$this->dropColumn('et_ophcocataractreferral_previousrefraction', 'right_type_other');
		
		$this->dropColumn('et_ophcocataractreferral_surgeryrefraction', 'left_type_other');
		$this->dropColumn('et_ophcocataractreferral_surgeryrefraction', 'right_type_other');
		
		$this->insert('et_ophcocataractreferral_refraction_type',array('name'=>'Other','display_order'=>4));
		
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}
