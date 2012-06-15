
<h4 class="elementTypeName"><?php  echo $element->elementType->name ?></h4>

<div class="view">

							<div class="view">
				<b><?php  echo CHtml::encode($element->getAttributeLabel('refraction_id')); ?>:</b>
				<?php  echo $element->refraction ? $element->refraction->name : 'None'?>				<br />
			</div>
								<div class="view">
				<b><?php  echo CHtml::encode($element->getAttributeLabel('site_id')); ?>:</b>
				<?php  echo $element->site ? $element->site->name : 'None'?>				<br />
			</div>
								<div class="view">
				<b><?php  echo CHtml::encode($element->getAttributeLabel('onset_id')); ?>:</b>
				<?php  echo $element->onset ? $element->onset->name : 'None'?>				<br />
			</div>
								<div class="view">
				<b><?php  echo CHtml::encode($element->getAttributeLabel('first_second_eye_id')); ?>:</b>
				<?php  echo $element->first_second_eye ? $element->first_second_eye->name : 'None'?>				<br />
			</div>
					</div>

