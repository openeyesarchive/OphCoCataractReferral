<?php

class m120619_135751_fix_interpreter_foreign_key_constraint extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('et_ophcocataractreferral_patientdetails','interpreter_id','int(10) unsigned NULL');
	}

	public function down()
	{
		$this->alterColumn('et_ophcocataractreferral_patientdetails','interpreter_id','int(10) unsigned NOT NULL');
	}
}
