<?php /**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2012
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2012, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */
?>
<section class="element <?php echo $element->elementType->class_name?>"
				 data-element-type-id="<?php echo $element->elementType->id?>"
				 data-element-type-class="<?php echo $element->elementType->class_name?>"
				 data-element-type-name="<?php echo $element->elementType->name?>"
				 data-element-display-order="<?php echo $element->elementType->display_order?>">
	<element-header>
		<h3 class="element-title"><?php  echo $element->elementType->name; ?></h3>
	</element-header>

	<div class="element-fields element-eyes row">
		<div class="element-eye right-eye column">
			<div class="field-row">
				<?php echo $form->dropDownList($element, 'right_reading_id', CHtml::listData(OphCiExamination_IntraocularPressure_Reading::model()->notDeletedOrPk($element->right_reading_id)->findAll(array('order'=>'display_order')),'id','name'), array('class' => 'inline iopReading', 'nowrapper'=>true))?>
				<span class="unit">mmHg,</span>
				<?php if ($element->getSetting('show_instruments')) {
					echo $form->dropDownList($element, 'right_instrument_id', CHtml::listData(OphCoCataractReferral_Instrument::model()->notDeletedOrPk($element->right_instrument_id)->findAll(array('order' => 'display_order')), 'id', 'name'), array('class' => 'inline iopInstrument', 'nowrapper'=>true));
				} else {
					echo $form->hiddenField($element, 'right_instrument_id');
				}?>
			</div>
		</div>
		<div class="element-eye left-eye column">
			<div class="field-row">
				<?php echo $form->dropDownList($element, 'left_reading_id', CHtml::listData(OphCiExamination_IntraocularPressure_Reading::model()->notDeletedOrPk($element->left_reading_id)->findAll(array('order'=>'display_order')),'id','name'), array('class' => 'inline iopReading', 'nowrapper'=>true))?>
				<span class="unit">mmHg,</span>
				<?php if ($element->getSetting('show_instruments')) {
					echo $form->dropDownList($element, 'left_instrument_id', CHtml::listData(OphCoCataractReferral_Instrument::model()->notDeletedOrPk($element->left_instrument_id)->findAll(array('order' => 'display_order')), 'id', 'name'), array('class' => 'inline iopInstrument', 'nowrapper'=>true));
				} else {
					echo $form->hiddenField($element, 'left_instrument_id');
				}?>
			</div>
		</div>
	</div>
</section>
