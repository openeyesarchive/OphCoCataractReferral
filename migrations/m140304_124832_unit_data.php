<?php

class m140304_124832_unit_data extends OEMigration
{
	public function up()
	{
		$this->Execute('delete from ophcocataractreferral_visualacuity_unit_value');
		$handle = fopen('modules/OphCoCataractReferral/migrations/csv/ophcocataractreferral_visual_acuity_unit_value.csv', "r");
		fgetcsv($handle, 1000);
		while (false !== ($row = fgetcsv($handle, 1000))) {
			$this->insert('ophcocataractreferral_visualacuity_unit_value', array(
					'id' => $row[0],
					'unit_id' => $row[1],
					'value' => $row[2],
					'base_value' => $row[3],
					'selectable' => $row[4],
			));
		}
		fclose($handle);

	}

	public function down()
	{
		$this->Execute('delete from ophcocataractreferral_visualacuity_unit_value');
	}

}