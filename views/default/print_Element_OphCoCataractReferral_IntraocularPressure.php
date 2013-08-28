
<strong><?php  echo $element->elementType->name ?></strong>

<table class="subtleWhite normalText">
  <tbody>
	<tr>
			<td width="470px">
				<?php if ($element->getSetting('show_instruments')) {?>
					<?php echo $element->right_instrument ? $element->right_instrument->name : 'None'?>
				<?php }?>
				<?php echo $element->right_pressure != 0 ? $element->right_pressure : 'NR'?>
			</td>
			<td width="40%">
				<?php echo $element->left_pressure != 0 ? $element->left_pressure : 'NR'?>
				<?php if ($element->getSetting('show_instruments')) {?>
					<?php echo $element->left_instrument ? $element->left_instrument->name : 'None'?>
				<?php }?>
			</td>
		</tr>
	</tbody>
</table>
