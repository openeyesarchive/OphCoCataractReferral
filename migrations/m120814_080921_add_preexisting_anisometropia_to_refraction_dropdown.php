<?php

class m120814_080921_add_preexisting_anisometropia_to_refraction_dropdown extends CDbMigration
{
	public function up()
	{
		$this->insert('et_ophcocataractreferral_hpc_refraction',array('name'=>'Pre-existing anisometropia >= 3D','display_order'=>3));
	}

	public function down()
	{
		$this->delete('et_ophcocataractreferral_hpc_refraction',"name='Pre-existing anisometropia >= 3D'");
	}
}
