<?php

class m140304_091549_transactions extends CDbMigration
{
	public $tables = array('et_ophcocataractreferral_confirmation','et_ophcocataractreferral_currentrefraction','et_ophcocataractreferral_hpc_first_second_eye','et_ophcocataractreferral_hpc_history','et_ophcocataractreferral_hpc_impact','et_ophcocataractreferral_hpc_onset','et_ophcocataractreferral_hpc_refraction','et_ophcocataractreferral_hpc','et_ophcocataractreferral_intraocularpressure_instrument','et_ophcocataractreferral_intraocularpressure','et_ophcocataractreferral_patientdetails_driving_status','et_ophcocataractreferral_patientdetails','et_ophcocataractreferral_posteriorsegment_text','et_ophcocataractreferral_posteriorsegment','et_ophcocataractreferral_previous_ophthalmic_history','et_ophcocataractreferral_refraction_type','et_ophcocataractreferral_visualacuity','ophcocataractreferral_instrument','ophcocataractreferral_intraocularpressure_reading','ophcocataractreferral_refraction_fraction','ophcocataractreferral_refraction_integer','ophcocataractreferral_refraction_sign','ophcocataractreferral_visualacuity_check_method','ophcocataractreferral_visualacuity_method','ophcocataractreferral_visualacuity_reading','ophcocataractreferral_visualacuity_unit_value','ophcocataractreferral_visualacuity_unit');

	public function up()
	{
		foreach ($this->tables as $table) {
			$this->addColumn($table,'hash','varchar(40) not null');
			$this->addColumn($table,'transaction_id','int(10) unsigned null');
			$this->createIndex($table.'_tid',$table,'transaction_id');
			$this->addForeignKey($table.'_tid',$table,'transaction_id','transaction','id');

			$this->addColumn($table.'_version','hash','varchar(40) not null');
			$this->addColumn($table.'_version','transaction_id','int(10) unsigned null');
			$this->addColumn($table.'_version','deleted_transaction_id','int(10) unsigned null');
			$this->createIndex($table.'_vtid',$table.'_version','transaction_id');
			$this->addForeignKey($table.'_vtid',$table.'_version','transaction_id','transaction','id');
			$this->createIndex($table.'_dtid',$table.'_version','deleted_transaction_id');
			$this->addForeignKey($table.'_dtid',$table.'_version','deleted_transaction_id','transaction','id');
		}
	}

	public function down()
	{
		foreach ($this->tables as $table) {
			$this->dropColumn($table,'hash');
			$this->dropForeignKey($table.'_tid',$table);
			$this->dropIndex($table.'_tid',$table);
			$this->dropColumn($table,'transaction_id');

			$this->dropColumn($table.'_version','hash');
			$this->dropForeignKey($table.'_vtid',$table.'_version');
			$this->dropIndex($table.'_vtid',$table.'_version');
			$this->dropColumn($table.'_version','transaction_id');
			$this->dropForeignKey($table.'_dtid',$table.'_version');
			$this->dropIndex($table.'_dtid',$table.'_version');
			$this->dropColumn($table.'_version','deleted_transaction_id');
		}
	}
}
