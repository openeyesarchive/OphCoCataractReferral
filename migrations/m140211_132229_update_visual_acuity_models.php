<?php

class m140211_132229_update_visual_acuity_models extends OEMigration
{
	public function up()
	{
		$settingMetadataArray = array(
				array(
						'element_type_id' => $this->getIdOfElementTypeByClassName('Element_OphCoCataractReferral_VisualAcuity'),
						'field_type_id' => 2, // Dropdown
						'key' => 'unit_id', 'name' => 'Units', 'default_value' => 2),
				array(
						'element_type_id' => $this->getIdOfElementTypeByClassName('Element_OphCoCataractReferral_VisualAcuity'),
						'field_type_id' => 1, // Checkbox
						'key' => 'notes', 'name' => 'Show Notes', 'default_value' => 1),
		);

		foreach($settingMetadataArray as $settingMetadata){
			$this->insert('setting_metadata', array(
					'element_type_id' => $settingMetadata['element_type_id'],
					'field_type_id' => $settingMetadata['field_type_id'], // Checkbox
					'key' => $settingMetadata['key'],
					'name' => $settingMetadata['name'],
					'default_value' => $settingMetadata['default_value'],
			));
		}

		$this->addColumn(	'et_ophcocataractreferral_visualacuity','unit_id', 'INT(10) UNSIGNED NOT NULL');
		$this->addForeignKey('et_ophcocataractreferral_visualacuity_unit_fk','et_ophcocataractreferral_visualacuity','unit_id', 'ophcocataractreferral_visualacuity_unit' ,'id');
		$this->createIndex('et_ophcocataractreferral_visualacuity_unit_id_fk','et_ophcocataractreferral_visualacuity','unit_id');

		$this->addColumn(	'et_ophcocataractreferral_visualacuity','left_unable_to_assess', 'TINYINT(1) UNSIGNED NOT NULL');
		$this->addColumn(	'et_ophcocataractreferral_visualacuity','right_unable_to_assess', 'TINYINT(1) UNSIGNED NOT NULL');
		$this->addColumn(	'et_ophcocataractreferral_visualacuity','left_eye_missing', 'TINYINT(1) UNSIGNED NOT NULL');
		$this->addColumn(	'et_ophcocataractreferral_visualacuity','right_eye_missing', ' TINYINT(1) UNSIGNED NOT NULL');

		$this->addColumn('ophcocataractreferral_visualacuity_unit_value','selectable',"TINYINT(1) NOT NULL DEFAULT '1'");

		$this->addColumn('ophcocataractreferral_visualacuity_unit','tooltip', "TINYINT(1) NOT NULL DEFAULT '0'");
		$this->addColumn('ophcocataractreferral_visualacuity_unit','information', "TEXT NULL COLLATE 'utf8_unicode_ci'");

	}

	public function down()
	{
		$this->execute('delete from setting_metadata where element_type_id = ' . $this->getIdOfElementTypeByClassName('Element_OphCoCataractReferral_VisualAcuity'));
		$this->dropForeignKey('et_ophcocataractreferral_visualacuity_unit_fk','et_ophcocataractreferral_visualacuity');
		$this->dropIndex('et_ophcocataractreferral_visualacuity_unit_id_fk','et_ophcocataractreferral_visualacuity');
		$this->dropColumn('et_ophcocataractreferral_visualacuity','unit_id');

		$this->dropColumn('et_ophcocataractreferral_visualacuity','left_unable_to_assess');
		$this->dropColumn('et_ophcocataractreferral_visualacuity','right_unable_to_assess');
		$this->dropColumn('et_ophcocataractreferral_visualacuity','left_eye_missing');
		$this->dropColumn('et_ophcocataractreferral_visualacuity','right_eye_missing');

		$this->dropColumn('ophcocataractreferral_visualacuity_unit_value','selectable');

		$this->dropColumn('ophcocataractreferral_visualacuity_unit','tooltip');
		$this->dropColumn('ophcocataractreferral_visualacuity_unit','information');
	}

}