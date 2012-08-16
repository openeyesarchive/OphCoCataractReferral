<?php

class m120816_080633_element_type_eye_entries extends CDbMigration
{
	public function up()
	{
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('name=:name', array(':name'=>'Cataract Referral'))->queryRow();
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:event_type_id and class_name=:class_name', array(':event_type_id'=>$event_type['id'],':class_name'=>'Element_OphCoCataractReferral_Hpc'))->queryRow();

		$this->insert('element_type_eye',array('element_type_id'=>$element_type['id'],'eye_id'=>1,'display_order'=>3));
		$this->insert('element_type_eye',array('element_type_id'=>$element_type['id'],'eye_id'=>2,'display_order'=>1));
		$this->insert('element_type_eye',array('element_type_id'=>$element_type['id'],'eye_id'=>3,'display_order'=>2));
	}

	public function down()
	{
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('name=:name', array(':name'=>'Cataract Referral'))->queryRow();
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:event_type_id and class_name=:class_name', array(':event_type_id'=>$event_type['id'],':class_name'=>'Element_OphCoCataractReferral_Hpc'))->queryRow();

		$this->delete('element_type_eye','element_type_id='.$element_type['id']);
	}
}
