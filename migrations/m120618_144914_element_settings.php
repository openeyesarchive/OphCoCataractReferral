<?php

class m120618_144914_element_settings extends CDbMigration
{
	public function up()
	{
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('name=:name', array(':name'=>'Cataract Referral'))->queryRow();
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:event_type_id', array(':name'=>'Intraocular pressure',':event_type_id'=>$event_type['id']))->queryRow();

		$this->insert('setting_metadata',array(
				'element_type_id' => $element_type['id'],
				'field_type_id' => 2,
				'display_order' => 1,
				'key' => 'default_instrument',
				'name' => 'Default instrument',
				'data' => serialize(array(
					'model' => 'EtOphcocataractreferralIntraocularpressurePressure',
					'field' => 'name',
				)),
				'default_value' => 1,
		));

		$this->insert('setting_metadata',array(
				'element_type_id' => $element_type['id'],
				'field_type_id' => 1,
				'display_order' => 2,
				'key' => 'show_instruments',
				'name' => 'Show instruments',
				'default_value' => 1,
		));

		$this->insert('setting_metadata',array(
				'element_type_id' => $element_type['id'],
				'field_type_id' => 1,
				'display_order' => 3,
				'key' => 'link_selects',
				'name' => 'Link instrument selects',
				'default_value' => 1,
		));
	}

	public function down()
	{
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('name=:name', array(':name'=>'Cataract Referral'))->queryRow();
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:event_type_id', array(':name'=>'Intraocular pressure',':event_type_id'=>$event_type['id']))->queryRow();

		$this->delete('setting_metadata','element_type_id='.$element_type['id']);
		$this->delete('setting_installation','element_type_id='.$element_type['id']);
		$this->delete('setting_institution','element_type_id='.$element_type['id']);
		$this->delete('setting_site','element_type_id='.$element_type['id']);
		$this->delete('setting_specialty','element_type_id='.$element_type['id']);
		$this->delete('setting_subspecialty','element_type_id='.$element_type['id']);
		$this->delete('setting_firm','element_type_id='.$element_type['id']);
		$this->delete('setting_user','element_type_id='.$element_type['id']);
	}
}
