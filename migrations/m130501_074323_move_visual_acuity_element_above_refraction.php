<?php

class m130501_074323_move_visual_acuity_element_above_refraction extends CDbMigration
{
	public function up()
	{
		$event_type = $this->dbConnection->createCommand()->select("*")->from("event_type")->where("class_name = :class_name",array(":class_name" => "OphCoCataractReferral"))->queryRow();
		$this->update('element_type',array('display_order' => 35),"event_type_id = {$event_type['id']} and class_name = 'Element_OphCoCataractReferral_VisualAcuity'");
	}

	public function down()
	{
		$event_type = $this->dbConnection->createCommand()->select("*")->from("event_type")->where("class_name = :class_name",array(":class_name" => "OphCoCataractReferral"))->queryRow();
		$this->update('element_type',array('display_order' => 75),"event_type_id = {$event_type['id']} and class_name = 'Element_OphCoCataractReferral_VisualAcuity'");
	}
}
