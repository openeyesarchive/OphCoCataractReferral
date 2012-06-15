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

	
		<?php echo $form->dropDownList($element, 'right_sphere_id', CHtml::listData(EtOphcocataractreferralCurrentrefractionRightSphere::model()->findAll(),'id','name')); ?>
	
		<?php echo $form->dropDownList($element, 'right_cylinder_id', CHtml::listData(EtOphcocataractreferralCurrentrefractionRightCylinder::model()->findAll(),'id','name')); ?>
	
		<?php echo $form->dropDownList($element, 'right_axis_id', CHtml::listData(EtOphcocataractreferralCurrentrefractionRightAxis::model()->findAll(),'id','name')); ?>
	
		<?php echo $form->dropDownList($element, 'right_corr_va_id', CHtml::listData(EtOphcocataractreferralCurrentrefractionRightCorrVa::model()->findAll(),'id','name')); ?>
	
		<?php echo $form->dropDownList($element, 'right_near_va_id', CHtml::listData(EtOphcocataractreferralCurrentrefractionRightNearVa::model()->findAll(),'id','name')); ?>
	
		<?php echo $form->dropDownList($element, 'right_best_va_id', CHtml::listData(EtOphcocataractreferralCurrentrefractionRightBestVa::model()->findAll(),'id','name')); ?>
	
		<?php echo $form->dropDownList($element, 'left_sphere_id', CHtml::listData(EtOphcocataractreferralCurrentrefractionLeftSphere::model()->findAll(),'id','name')); ?>
	
		<?php echo $form->dropDownList($element, 'left_cylinder_id', CHtml::listData(EtOphcocataractreferralCurrentrefractionLeftCylinder::model()->findAll(),'id','name')); ?>
	
		<?php echo $form->dropDownList($element, 'left_axis_id', CHtml::listData(EtOphcocataractreferralCurrentrefractionLeftAxis::model()->findAll(),'id','name')); ?>
	
		<?php echo $form->dropDownList($element, 'left_corr_va_id', CHtml::listData(EtOphcocataractreferralCurrentrefractionLeftCorrVa::model()->findAll(),'id','name')); ?>
	
		<?php echo $form->dropDownList($element, 'left_near_va_id', CHtml::listData(EtOphcocataractreferralCurrentrefractionLeftNearVa::model()->findAll(),'id','name')); ?>
	
		<?php echo $form->dropDownList($element, 'left_best_va_id', CHtml::listData(EtOphcocataractreferralCurrentrefractionLeftBestVa::model()->findAll(),'id','name')); ?>
	</div>
