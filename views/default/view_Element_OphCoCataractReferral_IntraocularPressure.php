
<h4 class="elementTypeName"><?php  echo $element->elementType->name ?></h4>

<table class="subtleWhite normalText">
  <tbody>
    <tr>
      <td width="130px"></td>
      <td>
				<div class="view_Element_OphCoCataractReferral_CurrentRefraction_iop_right_instrument">
					<?php if ($element->getSetting('show_instruments')) {?>
						<?php echo $element->right_instrument ? $element->right_instrument->name : 'None'?>
					<?php }?>
				</div>
				<div class="view_Element_OphCoCataractReferral_CurrentRefraction_iop_right_pressure"<?php if (!$element->getSetting('show_instruments')) {?> style="margin-left: 185px;"<?php }?>>
					<?php echo $element->right_pressure != 0 ? $element->right_pressure : 'NR'?>
				</div>
				<img src="<?php echo $this->assetPath?>/img/iop_divider.png" style="float: left; margin-left: -70px; margin-top: 2px" />
				<div class="view_Element_OphCoCataractReferral_CurrentRefraction_iop_left_pressure">
					<?php echo $element->left_pressure != 0 ? $element->left_pressure : 'NR'?>
				</div>
				<div class="view_Element_OphCoCataractReferral_CurrentRefraction_iop_left_instrument">
					<?php if ($element->getSetting('show_instruments')) {?>
						<?php echo $element->left_instrument ? $element->left_instrument->name : 'None'?>
					<?php }?>
				</div>
			</td>
		</tr>
	</tbody>
</table>
