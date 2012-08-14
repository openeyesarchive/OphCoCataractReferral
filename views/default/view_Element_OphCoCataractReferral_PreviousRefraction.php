
<div class="element <?php echo $element->elementType->class_name ?>">
	<h4 class="elementTypeName">
		<?php  echo $element->elementType->name ?>
	</h4>
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
		<table class="subtleWhite normalText">
			<tbody>
				<tr>
					<td width="30%">Date:</td>
					<td><span class="big"><?php echo $element->NHSDate('previous_refraction_date')?></span></td>
				</tr>
			</tbody>
		</table>
		<div class="cols2 clearfix">
			<div class="left">
				<div>
					<?php
					$this->widget('application.modules.eyedraw.OEEyeDrawWidgetRefraction', array(
							'identifier' => 'PreviousRefraction',
							'side' => 'R',
							'mode' => 'view',
							'model' => $element,
							'attribute' => 'right_axis_eyedraw',
					));
					?>
				</div>
				<div class="eyedrawFields view">
					<div>
						<div class="data">
							<?php echo $element->getCombined('right') ?>
						</div>
					</div>
				</div>
			</div>
			<div class="right">
				<div>
					<?php
					$this->widget('application.modules.eyedraw.OEEyeDrawWidgetRefraction', array(
							'identifier' => 'PreviousRefraction',
							'side' => 'L',
							'mode' => 'view',
							'model' => $element,
							'attribute' => 'left_axis_eyedraw',
					));
					?>
				</div>
				<div class="eyedrawFields view">
					<div>
						<div class="data">
							<?php echo $element->getCombined('left') ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php }?>
</div>
