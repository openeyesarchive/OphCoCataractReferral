
<table class="subtleWhite normalText">
	<tbody>
		<tr>
			<td width="40%">
				<strong><?php echo $element->elementType->name ?></strong>:
			</td>
			<td width="40%">
				<?php echo CHtml::encode($element->getAttributeLabel('driving_status_id'))?>:
				<span class="big"><?php echo $element->driving_status ? $element->driving_status->name : 'None'?></span>
			</td>
			<td width="40%">
				<?php echo CHtml::encode($element->getAttributeLabel('interpreter_id'))?>:
				<span class="big"><?php echo $element->interpreter ? $element->interpreter->name : 'None'?></span>
			</td>
		</tr>
	</tbody>
</table>
