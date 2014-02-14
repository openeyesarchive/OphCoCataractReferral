<?php

class m140214_132106_reading_column extends CDbMigration
{
	public function up()
	{
		$this->addColumn(	'et_ophcocataractreferral_intraocularpressure','left_reading_id', "INT(10) UNSIGNED NOT NULL");
		$this->addForeignKey('et_ophcocataractreferral_intraocularpressure_left_reading_id_fk','et_ophcocataractreferral_intraocularpressure','left_reading_id', 'ophcocataractreferral_intraocularpressure_reading' ,'id');
		$this->createIndex('et_ophcocataractreferral_intraocularpressure_left_reading_id_in','et_ophcocataractreferral_intraocularpressure','left_reading_id');

		$this->addColumn(	'et_ophcocataractreferral_intraocularpressure','right_reading_id', "INT(10) UNSIGNED NOT NULL");
		$this->addForeignKey('et_ophcocataractreferral_intraocularpressure_right_reading_id_fk','et_ophcocataractreferral_intraocularpressure','right_reading_id', 'ophcocataractreferral_intraocularpressure_reading' ,'id');
		$this->createIndex('et_ophcocataractreferral_intraocularpressure_right_reading_id_in','et_ophcocataractreferral_intraocularpressure','right_reading_id');

		$this->addColumn(	'et_ophcocataractreferral_intraocularpressure_version','right_reading_id', "INT(10) UNSIGNED NOT NULL");
		$this->addForeignKey('acv_ophcocataractreferral_intraocularpressure_rr_id_fk','et_ophcocataractreferral_intraocularpressure_version','right_reading_id', 'ophcocataractreferral_intraocularpressure_reading' ,'id');
		$this->createIndex('acv_ophcocataractreferral_intraocularpressure_rr_id_in','et_ophcocataractreferral_intraocularpressure_version','right_reading_id');

		$this->addColumn(	'et_ophcocataractreferral_intraocularpressure_version','left_reading_id', "INT(10) UNSIGNED NOT NULL");
		$this->addForeignKey('acv_ophcocataractreferral_intraocularpressure_lr_id_fk','et_ophcocataractreferral_intraocularpressure_version','left_reading_id', 'ophcocataractreferral_intraocularpressure_reading' ,'id');
		$this->createIndex('acv_ophcocataractreferral_intraocularpressure_lr_id_in','et_ophcocataractreferral_intraocularpressure_version','left_reading_id');
	}

	public function down()
	{
		$this->dropForeignKey('acv_ophcocataractreferral_intraocularpressure_lr_id_fk','et_ophcocataractreferral_intraocularpressure_version');
		$this->dropIndex('acv_ophcocataractreferral_intraocularpressure_lr_id_in','et_ophcocataractreferral_intraocularpressure_version');
		$this->dropColumn('et_ophcocataractreferral_intraocularpressure_version','left_reading_id');

		$this->dropForeignKey('et_ophcocataractreferral_intraocularpressure_right_reading_id_fk','et_ophcocataractreferral_intraocularpressure');
		$this->dropIndex('et_ophcocataractreferral_intraocularpressure_right_reading_id_in','et_ophcocataractreferral_intraocularpressure');
		$this->dropColumn('et_ophcocataractreferral_intraocularpressure','right_reading_id');

		$this->dropForeignKey('acv_ophcocataractreferral_intraocularpressure_rr_id_fk','et_ophcocataractreferral_intraocularpressure_version');
		$this->dropIndex('acv_ophcocataractreferral_intraocularpressure_rr_id_in','et_ophcocataractreferral_intraocularpressure_version');
		$this->dropColumn('et_ophcocataractreferral_intraocularpressure_version','right_reading_id');

		$this->dropForeignKey('et_ophcocataractreferral_intraocularpressure_left_reading_id_fk','et_ophcocataractreferral_intraocularpressure');
		$this->dropIndex('et_ophcocataractreferral_intraocularpressure_left_reading_id_in','et_ophcocataractreferral_intraocularpressure');
		$this->dropColumn('et_ophcocataractreferral_intraocularpressure','left_reading_id');
	}
}