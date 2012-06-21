
<h4 class="elementTypeName"><?php  echo $element->elementType->name ?></h4>

<table class="subtleWhite normalText">
	<tbody>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('sex_id'))?>:</td>
			<td><span class="big"><?php echo $element->sex ? $element->sex->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('age'))?>:</td>
			<td><span class="big"><?php echo $element->age?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('driving_status_id'))?>:</td>
			<td><span class="big"><?php echo $element->driving_status ? $element->driving_status->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('interpreter_id'))?>:</td>
			<td><span class="big"><?php echo $element->interpreter ? $element->interpreter->name : 'None'?></span></td>
		</tr>
	</tbody>
</table>
