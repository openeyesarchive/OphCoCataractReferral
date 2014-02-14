
<section class="element">
	<header class="element-header">
		<h3 class="element-title"><?php echo $element->elementType->name?></h3>
	</header>
	<table>
		<tbody>
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
</section>