<?php

class m120620_120018_data_correction extends CDbMigration
{
	public function up()
	{
		$this->update('et_ophcocataractreferral_hpc_impact',array('name'=>'Falls in last year'),'id=1');
	}

	public function down()
	{
		$this->update('et_ophcocataractreferral_hpc_impact',array('name'=>'Fall'),'id=1');
	}
}
