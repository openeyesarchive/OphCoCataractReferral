
<h4 class="elementTypeName"><?php  echo $element->elementType->name ?></h4>

<div class="view">

			<div class="view">
				<b><?php  echo CHtml::encode($element->getAttributeLabel('risks_discussed')); ?>:</b>
				<?php  echo $element->risks_discussed ? 'Yes' : 'No' ?>				<br />
			</div>
								<div class="view">
				<b><?php  echo CHtml::encode($element->getAttributeLabel('consider_surgery')); ?>:</b>
				<?php  echo $element->consider_surgery ? 'Yes' : 'No' ?>				<br />
			</div>
					</div>

