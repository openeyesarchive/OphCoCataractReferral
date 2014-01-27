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

	<div class="element-data element-eyes row">
		<div class="element-eye right-eye column">
			<div class="data-row">
				<?php foreach (array('right_amblyopia','right_corneal_graft','right_glaucoma','right_dry_eye','right_scleritis','right_squint_surgery','right_trabeculectomy','right_traumatic_cataract','right_uveitis','right_vitrectomy') as $field) {?>
					<input type="hidden" name="<?php echo get_class($element)?>[<?php echo $field?>]" value="0" />
				<?php }?>
				<?php echo $form->checkBoxArray($element, '', array('right_amblyopia','right_corneal_graft','right_glaucoma','right_dry_eye','right_scleritis','right_squint_surgery','right_trabeculectomy','right_traumatic_cataract','right_uveitis','right_vitrectomy'), array('header'=>'Right eye'))?>
			</div>
		</div>
		<div class="element-eye left-eye column">
			<div class="data-row">
				<?php foreach (array('left_amblyopia','left_corneal_graft','left_glaucoma','left_dry_eye','left_scleritis','left_squint_surgery','left_trabeculectomy','left_traumatic_cataract','left_uveitis','left_vitrectomy') as $field) {?>
					<input type="hidden" name="<?php echo get_class($element)?>[<?php echo $field?>]" value="0" />
				<?php }?>
				<?php echo $form->checkBoxArray($element, '', array('left_amblyopia','left_corneal_graft','left_glaucoma','left_dry_eye','left_scleritis','left_squint_surgery','left_trabeculectomy','left_traumatic_cataract','left_uveitis','left_vitrectomy'), array('header'=>'Left eye', 'nolabel' => true))?>
			</div>
		</div>
	</div>

</section>

