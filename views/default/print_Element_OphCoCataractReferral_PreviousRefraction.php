
<div class="element <?php echo $element->elementType->class_name ?>" style="margin-top: 1em;">
	<strong>
		<?php  echo $element->elementType->name ?> <?php if ($element->previous_refraction_different) {?> (<?php echo $element->NHSDate('previous_refraction_date')?>)<?php }?>
	</strong>
	<?php if (!$element->previous_refraction_different) {?>
		<table class="subtleWhite normalText">
			<tbody>
				<tr>
					<td width="30%"></td>
					<td><span class="big">None</span></td>
				</tr>
			</tbody>
		</table>
	<?php }else{?>
		<div class="cols2 clearfix">
			<div class="left">
				<div>
					<?php echo $this->renderPartial('view_Refraction_OEEyedraw',array('side'=>'right','element'=>$element))?>
				</div>
			</div>
			<div class="right">
				<div>
					<?php echo $this->renderPartial('view_Refraction_OEEyedraw',array('side'=>'left','element'=>$element))?>
				</div>
			</div>
		</div>
	<?php }?>
</div>
