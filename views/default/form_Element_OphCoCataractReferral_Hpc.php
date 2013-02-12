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
<div class="element <?php echo $element->elementType->class_name?>"
	data-element-type-id="<?php echo $element->elementType->id ?>"
	data-element-type-class="<?php echo $element->elementType->class_name ?>"
	data-element-type-name="<?php echo $element->elementType->name ?>"
	data-element-display-order="<?php echo $element->elementType->display_order ?>">
	<h4 class="elementTypeName"><?php  echo $element->elementType->name; ?></h4>
	<div class="cols2 colsX clearfix" id="left_right_textareas">
		<div class="left eventDetail">
			<?php echo $form->dropDownListNoPost('history', CHtml::listData(EtOphcocataractreferralHpcHistory::model()->findAll(),'id','name'),'',array('empty'=>'- History -','class'=>'populate_textarea', 'nowrapper'=>true))?>
			<?php echo $form->textArea($element, 'history', array('rows' => 6, 'cols' => 40)); ?>
		</div>
		<div class="right eventDetail">
			<?php echo $form->dropDownListNoPost('impact', CHtml::listData(EtOphcocataractreferralHpcImpact::model()->findAll(),'id','name'),'',array('empty'=>'- Impact -','class'=>'populate_textarea', 'nowrapper'=>true))?>
			<?php echo $form->textArea($element, 'impact', array('rows' => 6, 'cols' => 40)); ?>
		</div>
	</div>
	<?php echo $form->radioButtons($element, 'refraction_id', 'et_ophcocataractreferral_hpc_refraction')?>
	<?php echo $form->radioButtons($element, 'eye_id', 'eye')?>
	<?php echo $form->radioButtons($element, 'onset_id', 'et_ophcocataractreferral_hpc_onset')?>
	<?php echo $form->radioButtons($element, 'first_second_eye_id', 'et_ophcocataractreferral_hpc_first_second_eye')?>
</div>
