
<h4 class="elementTypeName"><?php  echo $element->elementType->name ?></h4>

<table class="subtleWhite normalText">
	<tbody>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('right_sphere'))?>:</td>
			<td><span class="big"><?php echo $element->right_sphere?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('right_cylinder'))?>:</td>
			<td><span class="big"><?php echo $element->right_cylinder?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('right_axis'))?>:</td>
			<td><span class="big"><?php echo $element->right_axis?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('right_corr_va_id'))?>:</td>
			<td><span class="big"><?php echo $element->right_corr_va ? $element->right_corr_va->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('right_near_va_id'))?>:</td>
			<td><span class="big"><?php echo $element->right_near_va ? $element->right_near_va->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('right_best_va_id'))?>:</td>
			<td><span class="big"><?php echo $element->right_best_va ? $element->right_best_va->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('left_sphere'))?>:</td>
			<td><span class="big"><?php echo $element->left_sphere?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('left_cylinder'))?>:</td>
			<td><span class="big"><?php echo $element->left_cylinder?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('left_axis'))?>:</td>
			<td><span class="big"><?php echo $element->left_axis?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('left_corr_va_id'))?>:</td>
			<td><span class="big"><?php echo $element->left_corr_va ? $element->left_corr_va->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('left_near_va_id'))?>:</td>
			<td><span class="big"><?php echo $element->left_near_va ? $element->left_near_va->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('left_best_va_id'))?>:</td>
			<td><span class="big"><?php echo $element->left_best_va ? $element->left_best_va->name : 'None'?></span></td>
		</tr>
	</tbody>
</table>
