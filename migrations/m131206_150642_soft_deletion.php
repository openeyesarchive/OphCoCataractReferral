<?php

class m131206_150642_soft_deletion extends CDbMigration
{
	public function up()
	{
		$this->addColumn('et_ophcocataractreferral_confirmation','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_confirmation_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_currentrefraction','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_currentrefraction_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_hpc','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_hpc_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_hpc_first_second_eye','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_hpc_first_second_eye_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_hpc_history','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_hpc_history_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_hpc_impact','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_hpc_impact_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_hpc_onset','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_hpc_onset_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_hpc_refraction','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_hpc_refraction_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_intraocularpressure','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_intraocularpressure_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_intraocularpressure_instrument','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_intraocularpressure_instrument_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_patientdetails','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_patientdetails_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_patientdetails_driving_status','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_patientdetails_driving_status_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_posteriorsegment','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_posteriorsegment_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_posteriorsegment_text','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_posteriorsegment_text_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_previous_ophthalmic_history','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_previous_ophthalmic_history_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_previousrefraction','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_previousrefraction_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_refraction_type','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_refraction_type_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_surgeryrefraction','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_surgeryrefraction_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_visualacuity','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcocataractreferral_visualacuity_version','deleted','tinyint(1) unsigned not null');
	}

	public function down()
	{
		$this->dropColumn('et_ophcocataractreferral_confirmation','deleted');
		$this->dropColumn('et_ophcocataractreferral_confirmation_version','deleted');
		$this->dropColumn('et_ophcocataractreferral_currentrefraction','deleted');
		$this->dropColumn('et_ophcocataractreferral_currentrefraction_version','deleted');
		$this->dropColumn('et_ophcocataractreferral_hpc','deleted');
		$this->dropColumn('et_ophcocataractreferral_hpc_version','deleted');
		$this->dropColumn('et_ophcocataractreferral_hpc_first_second_eye','deleted');
		$this->dropColumn('et_ophcocataractreferral_hpc_first_second_eye_version','deleted');
		$this->dropColumn('et_ophcocataractreferral_hpc_history','deleted');
		$this->dropColumn('et_ophcocataractreferral_hpc_history_version','deleted');
		$this->dropColumn('et_ophcocataractreferral_hpc_impact','deleted');
		$this->dropColumn('et_ophcocataractreferral_hpc_impact_version','deleted');
		$this->dropColumn('et_ophcocataractreferral_hpc_onset','deleted');
		$this->dropColumn('et_ophcocataractreferral_hpc_onset_version','deleted');
		$this->dropColumn('et_ophcocataractreferral_hpc_refraction','deleted');
		$this->dropColumn('et_ophcocataractreferral_hpc_refraction_version','deleted');
		$this->dropColumn('et_ophcocataractreferral_intraocularpressure','deleted');
		$this->dropColumn('et_ophcocataractreferral_intraocularpressure_version','deleted');
		$this->dropColumn('et_ophcocataractreferral_intraocularpressure_instrument','deleted');
		$this->dropColumn('et_ophcocataractreferral_intraocularpressure_instrument_version','deleted');
		$this->dropColumn('et_ophcocataractreferral_patientdetails','deleted');
		$this->dropColumn('et_ophcocataractreferral_patientdetails_version','deleted');
		$this->dropColumn('et_ophcocataractreferral_patientdetails_driving_status','deleted');
		$this->dropColumn('et_ophcocataractreferral_patientdetails_driving_status_version','deleted');
		$this->dropColumn('et_ophcocataractreferral_posteriorsegment','deleted');
		$this->dropColumn('et_ophcocataractreferral_posteriorsegment_version','deleted');
		$this->dropColumn('et_ophcocataractreferral_posteriorsegment_text','deleted');
		$this->dropColumn('et_ophcocataractreferral_posteriorsegment_text_version','deleted');
		$this->dropColumn('et_ophcocataractreferral_previous_ophthalmic_history','deleted');
		$this->dropColumn('et_ophcocataractreferral_previous_ophthalmic_history_version','deleted');
		$this->dropColumn('et_ophcocataractreferral_previousrefraction','deleted');
		$this->dropColumn('et_ophcocataractreferral_previousrefraction_version','deleted');
		$this->dropColumn('et_ophcocataractreferral_refraction_type','deleted');
		$this->dropColumn('et_ophcocataractreferral_refraction_type_version','deleted');
		$this->dropColumn('et_ophcocataractreferral_surgeryrefraction','deleted');
		$this->dropColumn('et_ophcocataractreferral_surgeryrefraction_version','deleted');
		$this->dropColumn('et_ophcocataractreferral_visualacuity','deleted');
		$this->dropColumn('et_ophcocataractreferral_visualacuity_version','deleted');
	}
}
