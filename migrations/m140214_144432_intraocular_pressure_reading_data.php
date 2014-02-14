<?php

class m140214_144432_intraocular_pressure_reading_data extends CDbMigration
{
	public function up()
	{
		$this->execute("insert into ophcocataractreferral_intraocularpressure_reading (id,name,value,display_order) values (1,'NR',null,1)");
		for ($i = 1; $i < 81; $i++) {
			$this->execute("insert into ophcocataractreferral_intraocularpressure_reading (id,name,value,display_order) values (".($i+1).",".$i.",".$i.",".($i+1).")");
		}
	}

	public function down()
	{
		$this->execute("delete from ophcocataractreferral_intraocularpressure_reading");
	}

}