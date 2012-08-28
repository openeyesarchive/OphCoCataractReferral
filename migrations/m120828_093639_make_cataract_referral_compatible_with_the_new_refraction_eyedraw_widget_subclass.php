<?php

class m120828_093639_make_cataract_referral_compatible_with_the_new_refraction_eyedraw_widget_subclass extends CDbMigration
{
	public function up()
	{
		$this->dropForeignKey('et_ophcocataractreferral_cr_l_r_t_id_fk','et_ophcocataractreferral_currentrefraction');
		$this->dropIndex('et_ophcocataractreferral_cr_l_r_t_id_fk','et_ophcocataractreferral_currentrefraction');
		$this->renameColumn('et_ophcocataractreferral_currentrefraction','left_refraction_type_id','left_type_id');
		$this->createIndex('et_ophcocataractreferral_cr_l_r_t_id_fk','et_ophcocataractreferral_currentrefraction','left_type_id');
		$this->addForeignKey('et_ophcocataractreferral_cr_l_r_t_id_fk','et_ophcocataractreferral_currentrefraction','left_type_id','et_ophcocataractreferral_refraction_type','id');

		$this->dropForeignKey('et_ophcocataractreferral_cr_r_r_t_id_fk','et_ophcocataractreferral_currentrefraction');
		$this->dropIndex('et_ophcocataractreferral_cr_r_r_t_id_fk','et_ophcocataractreferral_currentrefraction');
		$this->renameColumn('et_ophcocataractreferral_currentrefraction','right_refraction_type_id','right_type_id');
		$this->createIndex('et_ophcocataractreferral_cr_r_r_t_id_fk','et_ophcocataractreferral_currentrefraction','right_type_id');
		$this->addForeignKey('et_ophcocataractreferral_cr_r_r_t_id_fk','et_ophcocataractreferral_currentrefraction','right_type_id','et_ophcocataractreferral_refraction_type','id');
	}

	public function down()
	{
		$this->dropForeignKey('et_ophcocataractreferral_cr_r_r_t_id_fk','et_ophcocataractreferral_currentrefraction');
		$this->dropIndex('et_ophcocataractreferral_cr_r_r_t_id_fk','et_ophcocataractreferral_currentrefraction');
		$this->renameColumn('et_ophcocataractreferral_currentrefraction','right_type_id','right_refraction_type_id');
		$this->createIndex('et_ophcocataractreferral_cr_r_r_t_id_fk','et_ophcocataractreferral_currentrefraction','right_refraction_type_id');
		$this->addForeignKey('et_ophcocataractreferral_cr_r_r_t_id_fk','et_ophcocataractreferral_currentrefraction','right_refraction_type_id','et_ophcocataractreferral_refraction_type','id');

		$this->dropForeignKey('et_ophcocataractreferral_cr_l_r_t_id_fk','et_ophcocataractreferral_currentrefraction');
		$this->dropIndex('et_ophcocataractreferral_cr_l_r_t_id_fk','et_ophcocataractreferral_currentrefraction');
		$this->renameColumn('et_ophcocataractreferral_currentrefraction','left_type_id','left_refraction_type_id');
		$this->createIndex('et_ophcocataractreferral_cr_l_r_t_id_fk','et_ophcocataractreferral_currentrefraction','left_refraction_type_id');
		$this->addForeignKey('et_ophcocataractreferral_cr_l_r_t_id_fk','et_ophcocataractreferral_currentrefraction','left_refraction_type_id','et_ophcocataractreferral_refraction_type','id');
	}
}
