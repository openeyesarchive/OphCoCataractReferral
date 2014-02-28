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
	<div class="element-data element-eyes row">
		<div class="element-eye right-eye column">
			<div class="data-row">
				<?php echo $form->dropDownListNoPost('history', CHtml::listData(EtOphcocataractreferralHpcHistory::model()->notDeleted()->findAll(),'id','name'),'',array('empty'=>'- History -','class'=>'populate_textarea','nowrapper'=>true))?>
				<?php echo $form->textArea($element, 'history', array('rows' => 6, 'cols' => 40,'nowrapper'=>true)); ?>
			</div>
		</div>
		<div class="element-eye left-eye column">
			<div class="data-row">
				<?php echo $form->dropDownListNoPost('impact', CHtml::listData(EtOphcocataractreferralHpcImpact::model()->notDeleted()->findAll(),'id','name'),'',array('empty'=>'- Impact -','class'=>'populate_textarea','nowrapper'=>true))?>
				<?php echo $form->textArea($element, 'impact', array('rows' => 6, 'cols' => 40,'nowrapper'=>true)); ?>
			</div>
		</div>
	</div>
	<div class="element-fields">
		<?php echo $form->radioButtons($element, 'refraction_id', CHtml::listData(EtOphcocataractreferralHpcRefraction::model()->notDeletedOrPk($element->refraction_id)->findAll(array('order'=>'display_order asc')),'id','name'))?>
		<?php echo $form->radioButtons($element, 'eye_id', CHtml::listData(Eye::model()->findAll(array('order'=>'display_order asc')),'id','name'))?>
		<?php echo $form->radioButtons($element, 'onset_id', CHtml::listData(EtOphcocataractreferralHpcOnset::model()->notDeletedOrPk($element->onset_id)->findAll(array('order'=>'display_order asc')),'id','name'))?>
		<?php echo $form->radioButtons($element, 'first_second_eye_id', CHtml::listData(EtOphcocataractreferralHpcFirstSecondEye::model()->notDeletedOrPk($element->first_second_eye_id)->findAll(array('order'=>'display_order asc')),'id','name'))?>
	</div>
</section>
