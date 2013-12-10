<?php

class m131210_144527_soft_deletion extends CDbMigration
{
	public function up()
	{
		$this->addColumn('ophcocataractreferral_visualacuity_check_method','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcocataractreferral_visualacuity_check_method_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcocataractreferral_visualacuity_method','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcocataractreferral_visualacuity_method_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcocataractreferral_visualacuity_reading','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcocataractreferral_visualacuity_reading_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcocataractreferral_visualacuity_unit','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcocataractreferral_visualacuity_unit_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcocataractreferral_visualacuity_unit_value','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophcocataractreferral_visualacuity_unit_value_version','deleted','tinyint(1) unsigned not null');
	}

	public function down()
	{
		$this->dropColumn('ophcocataractreferral_visualacuity_check_method','deleted');
		$this->dropColumn('ophcocataractreferral_visualacuity_check_method_version','deleted');
		$this->dropColumn('ophcocataractreferral_visualacuity_method','deleted');
		$this->dropColumn('ophcocataractreferral_visualacuity_method_version','deleted');
		$this->dropColumn('ophcocataractreferral_visualacuity_reading','deleted');
		$this->dropColumn('ophcocataractreferral_visualacuity_reading_version','deleted');
		$this->dropColumn('ophcocataractreferral_visualacuity_unit','deleted');
		$this->dropColumn('ophcocataractreferral_visualacuity_unit_version','deleted');
		$this->dropColumn('ophcocataractreferral_visualacuity_unit_value','deleted');
		$this->dropColumn('ophcocataractreferral_visualacuity_unit_value_version','deleted');
	}
}
