
<h4 class="elementTypeName"><?php  echo $element->elementType->name ?></h4>

<table class="subtleWhite normalText">
	<tbody>
		<tr>
			<td width="30%">Right eye:</td>
			<td><span class="big"><?php echo $element->getOphthalmicHistoryRight()?></span></td>
		</tr>
		<tr>
			<td width="30%">Left eye:</td>
			<td><span class="big"><?php echo $element->getOphthalmicHistoryLeft()?></span></td>
		</tr>
	</tbody>
</table>
