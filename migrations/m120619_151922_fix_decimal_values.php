<?php

class m120619_151922_fix_decimal_values extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('et_ophcocataractreferral_currentrefraction','right_sphere','decimal (4,2) not null default 0.00');
		$this->alterColumn('et_ophcocataractreferral_currentrefraction','right_cylinder','decimal (4,2) not null default 0.00');
		$this->alterColumn('et_ophcocataractreferral_currentrefraction','left_sphere','decimal (4,2) not null default 0.00');
		$this->alterColumn('et_ophcocataractreferral_currentrefraction','left_cylinder','decimal (4,2) not null default 0.00');
	}

	public function down()
	{
		$this->alterColumn('et_ophcocataractreferral_currentrefraction','right_sphere','decimal (2,2) not null default 0.00');
		$this->alterColumn('et_ophcocataractreferral_currentrefraction','right_cylinder','decimal (2,2) not null default 0.00');
		$this->alterColumn('et_ophcocataractreferral_currentrefraction','left_sphere','decimal (2,2) not null default 0.00');
		$this->alterColumn('et_ophcocataractreferral_currentrefraction','left_cylinder','decimal (2,2) not null default 0.00');
	}
}
