
<h4 class="elementTypeName"><?php  echo $element->elementType->name ?></h4>

<table class="subtleWhite normalText">
	<tbody>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('left_instrument_id'))?>:</td>
			<td><span class="big"><?php echo $element->left_instrument ? $element->left_instrument->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('left_pressure_id'))?>:</td>
			<td><span class="big"><?php echo $element->left_pressure ? $element->left_pressure->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('right_instrument_id'))?>:</td>
			<td><span class="big"><?php echo $element->right_instrument ? $element->right_instrument->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('right_pressure_id'))?>:</td>
			<td><span class="big"><?php echo $element->right_pressure ? $element->right_pressure->name : 'None'?></span></td>
		</tr>
	</tbody>
</table>
