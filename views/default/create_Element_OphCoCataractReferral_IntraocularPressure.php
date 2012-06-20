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
<div class="<?php echo $element->elementType->class_name?>">
	<h4 class="elementTypeName"><?php  echo $element->elementType->name; ?></h4>

	<div class="splitElement clearfix" style="background-color: #DAE6F1;">
		<div class="Element_OphCoCataractReferral_CurrentRefraction_iop_left_instrument">
			<?php if ($element->getSetting('show_instruments')) {?>
				<?php echo $form->dropDownList($element, 'left_instrument_id', CHtml::listData(EtOphcocataractreferralIntraocularpressureInstrument::model()->findAll(),'id','name'),array('nolabel'=>true))?>
			<?php }else{?>
				<?php echo $form->hiddenInput($element, 'left_instrument_id', 1)?>
			<?php }?>
		</div>
		<div class="Element_OphCoCataractReferral_CurrentRefraction_iop_left_pressure"<?php if (!$element->getSetting('show_instruments')) {?> style="margin-left: 185px;"<?php }?>>
			<?php echo $form->dropDownList($element, 'left_pressure_id', CHtml::listData(EtOphcocataractreferralIntraocularpressurePressure::model()->findAll(),'id','name'),array('nolabel'=>true))?>
		</div>
		<img src="<?php echo $this->imgPath?>/iop_divider.png" style="float: left; margin-left: -70px; margin-top: 2px" />
		<div class="Element_OphCoCataractReferral_CurrentRefraction_iop_right_pressure">
			<?php echo $form->dropDownList($element, 'right_pressure_id', CHtml::listData(EtOphcocataractreferralIntraocularpressurePressure::model()->findAll(),'id','name'),array('nolabel'=>true))?>
		</div>
		<div class="Element_OphCoCataractReferral_CurrentRefraction_iop_right_instrument">
			<?php if ($element->getSetting('show_instruments')) {?>
				<?php echo $form->dropDownList($element, 'right_instrument_id', CHtml::listData(EtOphcocataractreferralIntraocularpressureInstrument::model()->findAll(),'id','name'),array('nolabel'=>true))?>
			<?php }else{?>
				<?php echo $form->hiddenInput($element, 'right_instrument_id', 1)?>
			<?php }?>
		</div>
	</div>
</div>
<script type="text/javascript">
var <?php echo get_class($element)?>_link_instrument_selects = <?php echo $element->getSetting('link_selects') ? 'true' : 'false'?>;
</script>
