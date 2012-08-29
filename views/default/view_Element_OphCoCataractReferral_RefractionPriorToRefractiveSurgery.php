
<div class="element <?php echo $element->elementType->class_name ?>">
	<h4 class="elementTypeName">
		<?php  echo $element->elementType->name ?>
	</h4>
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
		<table class="subtleWhite normalText">
			<tbody>
				<tr>
					<td width="30%">Date:</td>
					<td><span class="big"><?php echo $element->NHSDate('refractive_surgery_date')?></span></td>
				</tr>
			</tbody>
		</table>
		<div class="cols2 clearfix">
			<div class="left">
				<?php
				$this->widget('application.modules.eyedraw.OEEyeDrawWidgetRefraction', array(
						'identifier' => 'RefractionPriorToRefractiveSurgery',
						'side' => 'R',
						'mode' => 'view',
						'model' => $element,
						'attribute' => 'right_axis_eyedraw',
				))?>
			</div>
			<div class="right">
				<?php
				$this->widget('application.modules.eyedraw.OEEyeDrawWidgetRefraction', array(
						'identifier' => 'RefractionPriorToRefractiveSurgery',
						'side' => 'L',
						'mode' => 'view',
						'model' => $element,
						'attribute' => 'left_axis_eyedraw',
				))?>
			</div>
		</div>
	<?php }?>
</div>