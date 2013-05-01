<?php

class m130501_092821_refraction_graph_axis extends CDbMigration
{
	public function up()
	{
		$this->addColumn('et_ophcocataractreferral_currentrefraction','right_graph_axis_eyedraw','text COLLATE utf8_bin');
		$this->addColumn('et_ophcocataractreferral_currentrefraction','left_graph_axis_eyedraw','text COLLATE utf8_bin');
		$this->addColumn('et_ophcocataractreferral_previousrefraction','right_graph_axis_eyedraw','text COLLATE utf8_bin');
		$this->addColumn('et_ophcocataractreferral_previousrefraction','left_graph_axis_eyedraw','text COLLATE utf8_bin');
		$this->addColumn('et_ophcocataractreferral_surgeryrefraction','right_graph_axis_eyedraw','text COLLATE utf8_bin');
		$this->addColumn('et_ophcocataractreferral_surgeryrefraction','left_graph_axis_eyedraw','text COLLATE utf8_bin');
	}

	public function down()
	{
		$this->dropColumn('et_ophcocataractreferral_surgeryrefraction','right_graph_axis_eyedraw');
		$this->dropColumn('et_ophcocataractreferral_surgeryrefraction','left_graph_axis_eyedraw');
		$this->dropColumn('et_ophcocataractreferral_previousrefraction','right_graph_axis_eyedraw');
		$this->dropColumn('et_ophcocataractreferral_previousrefraction','left_graph_axis_eyedraw');
		$this->dropColumn('et_ophcocataractreferral_currentrefraction','right_graph_axis_eyedraw');
		$this->dropColumn('et_ophcocataractreferral_currentrefraction','left_graph_axis_eyedraw');
	}
}
