
<strong><?php  echo $element->elementType->name ?></strong>

<table class="subtleWhite normalText">
	<tbody>
		<tr>
			<td width="20%">
				<?php echo CHtml::encode($element->getAttributeLabel('refraction_id'))?>:
				<span class="big"><?php echo $element->refraction ? $element->refraction->name : 'None'?></span>
			</td>
			<td width="20%">
				<?php echo CHtml::encode($element->getAttributeLabel('eye_id'))?>:
				<span class="big"><?php echo $element->eye ? $element->eye->name : 'None'?></span>
			</td>
			<td width="20%">
				<?php echo CHtml::encode($element->getAttributeLabel('onset_id'))?>:
				<span class="big"><?php echo $element->onset ? $element->onset->name : 'None'?></span>
			</td>
			<td width="20%">
				<?php echo CHtml::encode($element->getAttributeLabel('first_second_eye_id'))?>:
				<span class="big"><?php echo $element->first_second_eye ? $element->first_second_eye->name : 'None'?></span>
			</td>
		</tr>
	</tbody>
</table>
