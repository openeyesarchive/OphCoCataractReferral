<?php

class m140212_112612_update_refraction_models extends OEMigration
{
	public function up()
	{
		$this->addColumn(	'et_ophcocataractreferral_currentrefraction','eye_id', "INT(10) UNSIGNED NOT NULL DEFAULT '3'");
		$this->addForeignKey('et_ophcocataractreferral_currentrefraction_eye_id_fk','et_ophcocataractreferral_currentrefraction','eye_id', 'eye' ,'id');
		$this->createIndex('et_ophcocataractreferral_currentrefraction_eye_id_in','et_ophcocataractreferral_currentrefraction','eye_id',true);
	}

	public function down()
	{
		$this->dropForeignKey('et_ophcocataractreferral_currentrefraction_eye_id_fk','et_ophcocataractreferral_currentrefraction');
		$this->dropIndex('et_ophcocataractreferral_currentrefraction_eye_id_in','et_ophcocataractreferral_currentrefraction');
		$this->dropColumn('et_ophcocataractreferral_currentrefraction','eye_id');
	}

}