<?php

class m140220_103529_intraocular_versionable extends CDbMigration
{
	public function up()
	{
		$this->addColumn('ophcocataractreferral_intraocularpressure_reading','deleted','tinyint(1) unsigned not null');
	}

	public function down()
	{
		$this->dropColumn('ophcocataractreferral_intraocularpressure_reading','deleted');
	}

}