<?php

class m140213_143442_update_version_tables extends CDbMigration
{
	public function up()
	{
		$this->addColumn(	'et_ophcocataractreferral_visualacuity_version','unit_id', 'INT(10) UNSIGNED NOT NULL');
		$this->addForeignKey('acv_ophcocataractreferral_visualacuity_unit_fk','et_ophcocataractreferral_visualacuity_version','unit_id', 'ophcocataractreferral_visualacuity_unit' ,'id');
		$this->createIndex('acv_ophcocataractreferral_visualacuity_unit_id_fk','et_ophcocataractreferral_visualacuity_version','unit_id');

		$this->addColumn(	'et_ophcocataractreferral_visualacuity_version','left_unable_to_assess', 'TINYINT(1) UNSIGNED NOT NULL');
		$this->addColumn(	'et_ophcocataractreferral_visualacuity_version','right_unable_to_assess', 'TINYINT(1) UNSIGNED NOT NULL');
		$this->addColumn(	'et_ophcocataractreferral_visualacuity_version','left_eye_missing', 'TINYINT(1) UNSIGNED NOT NULL');
		$this->addColumn(	'et_ophcocataractreferral_visualacuity_version','right_eye_missing', ' TINYINT(1) UNSIGNED NOT NULL');

		$this->addColumn('ophcocataractreferral_visualacuity_unit_value_version','selectable',"TINYINT(1) NOT NULL DEFAULT '1'");

		$this->addColumn('ophcocataractreferral_visualacuity_unit_version','tooltip', "TINYINT(1) NOT NULL DEFAULT '0'");
		$this->addColumn('ophcocataractreferral_visualacuity_unit_version','information', "TEXT NULL COLLATE 'utf8_unicode_ci'");

		$this->addColumn(	'et_ophcocataractreferral_currentrefraction_version','eye_id', "INT(10) UNSIGNED NOT NULL DEFAULT '3'");
		$this->addForeignKey('acv_ophcocataractreferral_currentrefraction_eye_id_fk','et_ophcocataractreferral_currentrefraction_version','eye_id', 'eye' ,'id');
		$this->createIndex('acv_ophcocataractreferral_currentrefraction_eye_id_in','et_ophcocataractreferral_currentrefraction_version','eye_id');
	}

	public function down()
	{
		$this->dropForeignKey('acv_ophcocataractreferral_visualacuity_unit_fk','et_ophcocataractreferral_visualacuity_version');
		$this->dropIndex('acv_ophcocataractreferral_visualacuity_unit_id_fk','et_ophcocataractreferral_visualacuity_version');
		$this->dropColumn('et_ophcocataractreferral_visualacuity_version','unit_id');

		$this->dropColumn('et_ophcocataractreferral_visualacuity_version','left_unable_to_assess');
		$this->dropColumn('et_ophcocataractreferral_visualacuity_version','right_unable_to_assess');
		$this->dropColumn('et_ophcocataractreferral_visualacuity_version','left_eye_missing');
		$this->dropColumn('et_ophcocataractreferral_visualacuity_version','right_eye_missing');

		$this->dropColumn('ophcocataractreferral_visualacuity_unit_value_version','selectable');

		$this->dropColumn('ophcocataractreferral_visualacuity_unit_version','tooltip');
		$this->dropColumn('ophcocataractreferral_visualacuity_unit_version','information');

		$this->dropForeignKey('acv_ophcocataractreferral_currentrefraction_eye_id_fk','et_ophcocataractreferral_currentrefraction_version');
		$this->dropIndex('acv_ophcocataractreferral_currentrefraction_eye_id_in','et_ophcocataractreferral_currentrefraction_version');
		$this->dropColumn('et_ophcocataractreferral_currentrefraction_version','eye_id');
	}

}