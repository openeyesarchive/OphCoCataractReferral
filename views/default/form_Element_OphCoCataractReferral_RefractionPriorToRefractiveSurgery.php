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
			<input type="hidden" name="Element_OphCoCataractReferral_RefractionPriorToRefractiveSurgery[refractive_surgery]" value="0" />
			<?php echo $form->checkBox($element, 'refractive_surgery', array('nowrapper'=>true))?>
			Refractive surgery<br/>
		</div>
		<?php echo $form->datePicker($element, 'refractive_surgery_date', array('maxDate' => 'today'), array('hidden' => $element->hidden))?>

		<div class="left eventDetail RefractionPriorToRefractiveSurgery"<?php if ($element->hidden) {?> style="display: none;"<?php }?>>
			<?php
			$this->widget('application.modules.eyedraw.OEEyeDrawWidgetRefraction', array(
					'identifier' => 'right_'.$element->elementType->id,
					'side' => 'R',
					'mode' => 'edit',
					'model' => $element,
					'attribute' => 'right_axis_eyedraw',
					'refraction_types' => EtOphcocataractreferralRefractionType::model()->getOptions(),
			))
			?>
		</div>
		<div class="right eventDetail RefractionPriorToRefractiveSurgery"<?php if ($element->hidden) {?> style="display: none;"<?php }?>>
			<?php
			$this->widget('application.modules.eyedraw.OEEyeDrawWidgetRefraction', array(
					'identifier' => 'left_'.$element->elementType->id,
					'side' => 'L',
					'mode' => 'edit',
					'model' => $element,
					'attribute' => 'left_axis_eyedraw',
					'refraction_types' => EtOphcocataractreferralRefractionType::model()->getOptions(),
			))
			?>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		OphCoCataractReferral_Refraction_init('<?php echo $element->elementType->class_name ?>');
	});
</script>
