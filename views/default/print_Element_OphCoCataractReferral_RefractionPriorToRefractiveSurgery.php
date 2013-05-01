
<div class="element <?php echo $element->elementType->class_name ?>">
	<strong>
		<?php  echo $element->elementType->name ?> <?php if ($element->refractive_surgery) {?>(<?php echo $element->NHSDate('refractive_surgery_date')?>)<?php }?>
	</strong>
	<?php if (!$element->refractive_surgery) {?>
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
				<?php echo $this->renderPartial('view_Refraction_OEEyedraw',array('side'=>'right','element'=>$element))?>
			</div>
			<div class="right">
				<?php echo $this->renderPartial('view_Refraction_OEEyedraw',array('side'=>'left','element'=>$element))?>
			</div>
		</div>
	<?php }?>
</div>
