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
	<?php if ($element->getSetting('show_instruments')) {?>
		<?php echo $form->dropDownList($element, 'right_instrument_id', CHtml::listData(EtOphcocataractreferralIntraocularpressureInstrument::model()->findAll(),'id','name'))?>
	<?php }else{?>
		<?php echo $form->hiddenInput($element, 'right_instrument_id', 1)?>
	<?php }?>
	<?php echo $form->slider($element, 'right_pressure', array('min'=>0,'max'=>80,'step'=>1,'null'=>'NR'))?>
	<?php echo $form->slider($element, 'left_pressure', array('min'=>0,'max'=>80,'step'=>1,'null'=>'NR'))?>
	<?php if ($element->getSetting('show_instruments')) {?>
		<?php echo $form->dropDownList($element, 'left_instrument_id', CHtml::listData(EtOphcocataractreferralIntraocularpressureInstrument::model()->findAll(),'id','name'))?>
	<?php }else{?>
		<?php echo $form->hiddenInput($element, 'left_instrument_id', 1)?>
	<?php }?>
</div>
<script type="text/javascript">
var <?php echo get_class($element)?>_link_instrument_selects = <?php echo $element->getSetting('link_selects') ? 'true' : 'false'?>;
</script>
