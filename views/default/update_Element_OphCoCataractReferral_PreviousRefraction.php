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
<div class="element <?php echo $element->elementType->class_name ?>"
	data-element-type-id="<?php echo $element->elementType->id ?>"
	data-element-type-class="<?php echo $element->elementType->class_name ?>"
	data-element-type-name="<?php echo $element->elementType->name ?>"
	data-element-display-order="<?php echo $element->elementType->display_order ?>">
	<h4 class="elementTypeName"><?php  echo $element->elementType->name; ?></h4>
	<div class="cols2 clearfix">
		<div class="eventDetail">
			<div class="label"></div>
			<input type="hidden" name="Element_OphCoCataractReferral_PreviousRefraction[previous_refraction_different]" value="0" />
			<?php echo $form->checkBox($element, 'previous_refraction_different', array('nowrapper'=>true))?>
			Previous refraction different<br/>
		</div>
		<?php echo $form->datePicker($element, 'previous_refraction_date', array('maxDate' => 'today'), array('hidden' => $element->hidden))?>

		<div class="left eventDetail PreviousRefraction"<?php if ($element->hidden) {?> style="display: none;"<?php }?>>
			<div data-side="right">
				<?php
				$this->widget('application.modules.eyedraw.OEEyeDrawWidgetRefraction', array(
						'identifier' => 'PreviousRefraction',
						'side' => 'R',
						'mode' => 'edit',
						'model' => $element,
						'attribute' => 'right_axis_eyedraw',
				));
				?>
				<div class="eyedrawFields">
					<div>
						<div class="label">
							<?php echo $element->getAttributeLabel('right_sphere'); ?>
							:
						</div>
						<div class="data segmented">
							<?php $this->renderPartial(
									'_segmented_field',
									array('element' => $element, 'field' => 'right_sphere'),
									false, false
							) ?>
						</div>
					</div>
					<div>
						<div class="label">
							<?php echo $element->getAttributeLabel('right_cylinder'); ?>
							:
						</div>
						<div class="data segmented">
							<?php $this->renderPartial(
									'_segmented_field',
									array('element' => $element, 'field' => 'right_cylinder'),
									false, false
							) ?>
						</div>
					</div>
					<div>
						<div class="label">
							<?php echo $element->getAttributeLabel('right_axis'); ?>
							:
						</div>
						<div class="data">
							<?php echo CHtml::activeTextField($element, 'right_axis', array('class' => 'axis')) ?>
						</div>
					</div>
					<div>
						<div class="label">
							<?php echo $element->getAttributeLabel('right_refraction_type_id'); ?>
							:
						</div>
						<div class="data">
							<?php echo CHtml::activeDropDownList($element, 'right_refraction_type_id', CHtml::listData(EtOphcocataractreferralRefractionType::model()->findAll(array('order'=>'display_order')),'id','name'))?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="right eventDetail PreviousRefraction"<?php if ($element->hidden) {?> style="display: none;"<?php }?>>
			<div data-side="left">
				<?php
				$this->widget('application.modules.eyedraw.OEEyeDrawWidgetRefraction', array(
						'identifier' => 'PreviousRefraction',
						'side' => 'L',
						'mode' => 'edit',
						'model' => $element,
						'attribute' => 'left_axis_eyedraw',
				));
				?>
				<div class="eyedrawFields">
					<div>
						<div class="label">
							<?php echo $element->getAttributeLabel('left_sphere'); ?>
							:
						</div>
						<div class="data segmented">
							<?php $this->renderPartial(
									'_segmented_field',
									array('element' => $element, 'field' => 'left_sphere'),
									false, false
							) ?>
						</div>
					</div>
					<div>
						<div class="label">
							<?php echo $element->getAttributeLabel('left_cylinder'); ?>
							:
						</div>
						<div class="data segmented">
							<?php $this->renderPartial(
									'_segmented_field',
									array('element' => $element, 'field' => 'left_cylinder'),
									false, false
							) ?>
						</div>
					</div>
					<div>
						<div class="label">
							<?php echo $element->getAttributeLabel('left_axis'); ?>
							:
						</div>
						<div class="data">
							<?php echo CHtml::activeTextField($element, 'left_axis', array('class' => 'axis')) ?>
						</div>
					</div>
					<div>
						<div class="label">
							<?php echo $element->getAttributeLabel('left_refraction_type_id'); ?>
							:
						</div>
						<div class="data">
							<?php echo CHtml::activeDropDownList($element, 'left_refraction_type_id', CHtml::listData(EtOphcocataractreferralRefractionType::model()->findAll(array('order'=>'display_order')),'id','name')) ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
