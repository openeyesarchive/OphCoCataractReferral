<?php

class m120814_075701_remove_age_and_sex_from_patientdetails_element extends CDbMigration
{
	public function up()
	{
		$this->dropForeignKey('et_ophcocataractreferral_patientdetails_sex_id_fk','et_ophcocataractreferral_patientdetails');
		$this->dropIndex('et_ophcocataractreferral_patientdetails_sex_id_fk','et_ophcocataractreferral_patientdetails');
		$this->dropColumn('et_ophcocataractreferral_patientdetails','sex_id');
		$this->dropColumn('et_ophcocataractreferral_patientdetails','age');
	}

	public function down()
	{
		$this->addColumn('et_ophcocataractreferral_patientdetails','sex_id','int(10) unsigned NOT NULL');
		$this->createIndex('et_ophcocataractreferral_patientdetails_sex_id_fk','et_ophcocataractreferral_patientdetails','sex_id');
		$this->addForeignKey('et_ophcocataractreferral_patientdetails_sex_id_fk','et_ophcocataractreferral_patientdetails','sex_id','gender','id');
		$this->addColumn('et_ophcocataractreferral_patientdetails','age','tinyint(1) unsigned NOT NULL');
	}
}
