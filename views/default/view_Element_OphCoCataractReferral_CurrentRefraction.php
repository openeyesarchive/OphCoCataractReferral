
<div class="element <?php echo $element->elementType->class_name ?>">
	<h4 class="elementTypeName">
		<?php  echo $element->elementType->name ?>
	</h4>
	<div class="cols2 clearfix">
		<div class="left">
			<div>
				<?php
				$this->widget('application.modules.eyedraw.OEEyeDrawWidgetRefraction', array(
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
</div>
