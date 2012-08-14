<?php

class m120814_145403_remove_normal_from_posterior_segment_dropdown_list extends CDbMigration
{
	public function up()
	{
		$this->delete('et_ophcocataractreferral_posteriorsegment_text');

		$this->insert('et_ophcocataractreferral_posteriorsegment_text',array('name'=>'ARMD','display_order'=>1));
		$this->insert('et_ophcocataractreferral_posteriorsegment_text',array('name'=>'Diabetic retinopathy','display_order'=>2));
		$this->insert('et_ophcocataractreferral_posteriorsegment_text',array('name'=>'Hazy view','display_order'=>3));
		$this->insert('et_ophcocataractreferral_posteriorsegment_text',array('name'=>'Not seen','display_order'=>4));
		$this->insert('et_ophcocataractreferral_posteriorsegment_text',array('name'=>'Vitreous opacities','display_order'=>5));
		$this->insert('et_ophcocataractreferral_posteriorsegment_text',array('name'=>'Asteroid hyalosis','display_order'=>6));
	}

	public function down()
	{
		$this->delete('et_ophcocataractreferral_posteriorsegment_text');

		$this->insert('et_ophcocataractreferral_posteriorsegment_text',array('name'=>'Normal','display_order'=>1));
		$this->insert('et_ophcocataractreferral_posteriorsegment_text',array('name'=>'ARMD','display_order'=>2));
		$this->insert('et_ophcocataractreferral_posteriorsegment_text',array('name'=>'Diabetic retinopathy','display_order'=>3));
		$this->insert('et_ophcocataractreferral_posteriorsegment_text',array('name'=>'Hazy view','display_order'=>4));
		$this->insert('et_ophcocataractreferral_posteriorsegment_text',array('name'=>'Not seen','display_order'=>5));
		$this->insert('et_ophcocataractreferral_posteriorsegment_text',array('name'=>'Vitreous opacities','display_order'=>6));
		$this->insert('et_ophcocataractreferral_posteriorsegment_text',array('name'=>'Asteroid hyalosis','display_order'=>7));
	}
}
