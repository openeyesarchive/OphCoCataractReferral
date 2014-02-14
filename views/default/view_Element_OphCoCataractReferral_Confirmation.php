
<section class="element">
	<header class="element-header">
		<h3 class="element-title"><?php echo $element->elementType->name?></h3>
	</header>

	<table class="subtleWhite normalText">
		<tbody>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('risks_discussed'))?>:</td>
			<td><span class="big"><?php echo $element->risks_discussed ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('consider_surgery'))?>:</td>
			<td><span class="big"><?php echo $element->consider_surgery ? 'Yes' : 'No'?></span></td>
		</tr>
		</tbody>
	</table>

</section>
