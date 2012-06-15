
<h4 class="elementTypeName"><?php  echo $element->elementType->name ?></h4>

<div class="view">

			<div class="view">
				<b><?php  echo CHtml::encode($element->getAttributeLabel('left_instrument_id')); ?>:</b>
				<?php  echo $element->left_instrument ? $element->left_instrument->name : 'None'?>				<br />
			</div>
								<div class="view">
				<b><?php  echo CHtml::encode($element->getAttributeLabel('left_pressure_id')); ?>:</b>
				<?php  echo $element->left_pressure ? $element->left_pressure->name : 'None'?>				<br />
			</div>
								<div class="view">
				<b><?php  echo CHtml::encode($element->getAttributeLabel('right_instrument_id')); ?>:</b>
				<?php  echo $element->right_instrument ? $element->right_instrument->name : 'None'?>				<br />
			</div>
								<div class="view">
				<b><?php  echo CHtml::encode($element->getAttributeLabel('right_pressure_id')); ?>:</b>
				<?php  echo $element->right_pressure ? $element->right_pressure->name : 'None'?>				<br />
			</div>
					</div>

