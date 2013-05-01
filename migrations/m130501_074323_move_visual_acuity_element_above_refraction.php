<?php

class m130501_074323_move_visual_acuity_element_above_refraction extends CDbMigration
{
	public function up()
	{
		$event_type = EventType::model()->find('class_name=?',array('OphCoCataractReferral'));
		$va = ElementType::model()->find('event_type_id=? and class_name=?',array($event_type->id,'Element_OphCoCataractReferral_VisualAcuity'));
		$va->display_order = 35;
		$va->save();
	}

	public function down()
	{
		$event_type = EventType::model()->find('class_name=?',array('OphCoCataractReferral'));
		$va = ElementType::model()->find('event_type_id=? and class_name=?',array($event_type->id,'Element_OphCoCataractReferral_VisualAcuity'));
		$va->display_order = 75;
		$va->save();
	}
}
