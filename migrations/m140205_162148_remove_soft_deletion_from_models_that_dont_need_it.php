<?php

class m140205_162148_remove_soft_deletion_from_models_that_dont_need_it extends CDbMigration
{
	public $tables = array(
		'et_ophcocataractreferral_confirmation',
		'et_ophcocataractreferral_currentrefraction',
		'et_ophcocataractreferral_hpc',
		'et_ophcocataractreferral_intraocularpressure',
		'et_ophcocataractreferral_patientdetails',
		'et_ophcocataractreferral_posteriorsegment',
		'et_ophcocataractreferral_previous_ophthalmic_history',
		'et_ophcocataractreferral_visualacuity',
		'ophcocataractreferral_visualacuity_reading',
	);

	public function up()
	{
		foreach ($this->tables as $table) {
			$this->dropColumn($table,'deleted');
			$this->dropColumn($table.'_version','deleted');

			$this->dropForeignKey("{$table}_aid_fk",$table."_version");
		}
	}

	public function down()
	{
		foreach ($this->tables as $table) {
			$this->addColumn($table,'deleted','tinyint(1) unsigned not null');
			$this->addColumn($table."_version",'deleted','tinyint(1) unsigned not null');

			$this->addForeignKey("{$table}_aid_fk",$table."_version","id",$table,"id");
		}
	}
}
