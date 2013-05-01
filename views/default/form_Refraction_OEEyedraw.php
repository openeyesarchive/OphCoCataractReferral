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
			$this->widget('application.modules.eyedraw.OEEyeDrawWidget', array(
					'doodleToolBarArray' => array(),
					'toolbar' => false,
					'onReadyCommandArray' => array(
						array('addDoodle', array('TrialFrame')),
						array('addDoodle', array('TrialLens')),
						array('deselectDoodles', array()),
					),
					'idSuffix' => $side.'_'.$element->elementType->id,
					'side' => strtoupper($side[0]),
					'mode' => 'edit',
					'width' => 160,
					'height' => 160,
					'model' => $element,
					'attribute' => $side.'_axis_eyedraw',
			))?>
			<div class="eyedrawFields">
				<div class="aligned">
					<div class="label">
						<?php echo $element->getAttributeLabel($side.'_sphere'); ?>
						:
					</div>
					<div class="data segmented">
						<?php Yii::app()->getController()->renderPartial('_segmented_field', array('element' => $element, 'field' => $side.'_sphere'), false, false)?>
					</div>
				</div>
				<div class="aligned">
					<div class="label">
						<?php echo $element->getAttributeLabel($side.'_cylinder'); ?>
						:
					</div>
					<div class="data segmented">
						<?php Yii::app()->getController()->renderPartial('_segmented_field', array('element' => $element, 'field' => $side.'_cylinder'), false, false)?>
					</div>
				</div>
				<div class="aligned">
					<div class="label">
						<?php echo $element->getAttributeLabel($side.'_axis'); ?>
						:
					</div>
					<div class="data">
						<?php echo CHtml::activeTextField($element, $side.'_axis', array('class' => 'axis')) ?>
					</div>
				</div>
				<div class="aligned">
					<div class="label">
						<?php echo $element->getAttributeLabel($side.'_type_id'); ?>
						:
					</div>
					<div class="data">
						<?php echo CHtml::activeDropDownList($element, $side.'_type_id', EtOphcocataractreferralRefractionType::model()->getOptions(), array('class' => 'refractionType'))?>
						<?php if ($element->hasProperty($side.'_type_other')) {?>
							<?php echo CHtml::activeTextField($element, $side.'_type_other')?>
						<?php }?>
					</div>
				</div>
			</div>
