
<section class="element">
	<header class="element-header">
		<h3 class="element-title"><?php echo $element->elementType->name?></h3>
	</header>

	<table class="subtleWhite normalText">
		<tbody>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('refraction_id'))?>:</td>
			<td><span class="big"><?php echo $element->refraction ? $element->refraction->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('eye_id'))?>:</td>
			<td><span class="big"><?php echo $element->eye ? $element->eye->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('onset_id'))?>:</td>
			<td><span class="big"><?php echo $element->onset ? $element->onset->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('first_second_eye_id'))?>:</td>
			<td><span class="big"><?php echo $element->first_second_eye ? $element->first_second_eye->name : 'None'?></span></td>
		</tr>
		</tbody>
	</table>
</section>