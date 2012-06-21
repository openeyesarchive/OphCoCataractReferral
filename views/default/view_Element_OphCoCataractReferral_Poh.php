
<h4 class="elementTypeName"><?php  echo $element->elementType->name ?></h4>

<table class="subtleWhite normalText">
	<tbody>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('right_eye'))?>:</td>
			<td><span class="big"><?php echo $element->right_eye?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('left_eye'))?>:</td>
			<td><span class="big"><?php echo $element->left_eye?></span></td>
		</tr>
	</tbody>
</table>
