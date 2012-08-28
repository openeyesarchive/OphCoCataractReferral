<?php

class m120828_120829_make_previous_referral_compatible_with_the_new_refraction_eyedraw_widget_subclass extends CDbMigration
{
	public function up()
	{
		$this->dropForeignKey('et_ophcocataractreferral_pr_l_r_t_id_fk','et_ophcocataractreferral_previousrefraction');
		$this->dropIndex('et_ophcocataractreferral_pr_l_r_t_id_fk','et_ophcocataractreferral_previousrefraction');
		$this->renameColumn('et_ophcocataractreferral_previousrefraction','left_refraction_type_id','left_type_id');
		$this->createIndex('et_ophcocataractreferral_pr_l_r_t_id_fk','et_ophcocataractreferral_previousrefraction','left_type_id');
		$this->addForeignKey('et_ophcocataractreferral_pr_l_r_t_id_fk','et_ophcocataractreferral_previousrefraction','left_type_id','et_ophcocataractreferral_refraction_type','id');

		$this->dropForeignKey('et_ophcocataractreferral_pr_r_r_t_id_fk','et_ophcocataractreferral_previousrefraction');
		$this->dropIndex('et_ophcocataractreferral_pr_r_r_t_id_fk','et_ophcocataractreferral_previousrefraction');
		$this->renameColumn('et_ophcocataractreferral_previousrefraction','right_refraction_type_id','right_type_id');
		$this->createIndex('et_ophcocataractreferral_pr_r_r_t_id_fk','et_ophcocataractreferral_previousrefraction','right_type_id');
		$this->addForeignKey('et_ophcocataractreferral_pr_r_r_t_id_fk','et_ophcocataractreferral_previousrefraction','right_type_id','et_ophcocataractreferral_refraction_type','id');
	}

	public function down()
	{
		$this->dropForeignKey('et_ophcocataractreferral_pr_l_r_t_id_fk','et_ophcocataractreferral_previousrefraction');
		$this->dropIndex('et_ophcocataractreferral_pr_l_r_t_id_fk','et_ophcocataractreferral_previousrefraction');
		$this->renameColumn('et_ophcocataractreferral_previousrefraction','left_type_id','left_refraction_type_id');
		$this->createIndex('et_ophcocataractreferral_pr_l_r_t_id_fk','et_ophcocataractreferral_previousrefraction','left_refraction_type_id');
		$this->addForeignKey('et_ophcocataractreferral_pr_l_r_t_id_fk','et_ophcocataractreferral_previousrefraction','left_refraction_type_id','et_ophcocataractreferral_refraction_type','id');

		$this->dropForeignKey('et_ophcocataractreferral_pr_r_r_t_id_fk','et_ophcocataractreferral_previousrefraction');
		$this->dropIndex('et_ophcocataractreferral_pr_r_r_t_id_fk','et_ophcocataractreferral_previousrefraction');
		$this->renameColumn('et_ophcocataractreferral_previousrefraction','right_type_id','right_refraction_type_id');
		$this->createIndex('et_ophcocataractreferral_pr_r_r_t_id_fk','et_ophcocataractreferral_previousrefraction','right_refraction_type_id');
		$this->addForeignKey('et_ophcocataractreferral_pr_r_r_t_id_fk','et_ophcocataractreferral_previousrefraction','right_refraction_type_id','et_ophcocataractreferral_refraction_type','id');
	}
}
