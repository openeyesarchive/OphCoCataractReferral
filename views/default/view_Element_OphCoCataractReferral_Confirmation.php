
<section class="element">
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
