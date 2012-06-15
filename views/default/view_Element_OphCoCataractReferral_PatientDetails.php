
<h4 class="elementTypeName"><?php  echo $element->elementType->name ?></h4>

<div class="view">

			<div class="view">
				<b><?php  echo CHtml::encode($element->getAttributeLabel('sex_id')); ?>:</b>
				<?php  echo $element->sex ? $element->sex->name : 'None'?>				<br />
			</div>
								<div class="view">
				<b><?php  echo CHtml::encode($element->getAttributeLabel('age')); ?>:</b>
				<?php  echo $element->age ?>				<br />
			</div>
								<div class="view">
				<b><?php  echo CHtml::encode($element->getAttributeLabel('driving_status_id')); ?>:</b>
				<?php  echo $element->driving_status ? $element->driving_status->name : 'None'?>				<br />
			</div>
								<div class="view">
				<b><?php  echo CHtml::encode($element->getAttributeLabel('interpreter_id')); ?>:</b>
				<?php  echo $element->interpreter ? $element->interpreter->name : 'None'?>				<br />
			</div>
					</div>

