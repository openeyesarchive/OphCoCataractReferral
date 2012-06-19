
<h4 class="elementTypeName"><?php  echo $element->elementType->name ?></h4>

<div class="view">

			<div class="view">
				<b><?php  echo CHtml::encode($element->getAttributeLabel('right_sphere')); ?>:</b>
				<?php  echo $element->right_sphere?>				<br />
			</div>
								<div class="view">
				<b><?php  echo CHtml::encode($element->getAttributeLabel('right_cylinder')); ?>:</b>
				<?php  echo $element->right_cylinder?><br/>
			</div>
								<div class="view">
				<b><?php  echo CHtml::encode($element->getAttributeLabel('right_axis')); ?>:</b>
				<?php  echo $element->right_axis?><br/>
			</div>
								<div class="view">
				<b><?php  echo CHtml::encode($element->getAttributeLabel('right_corr_va_id')); ?>:</b>
				<?php  echo $element->right_corr_va ? $element->right_corr_va->name : 'None'?>				<br />
			</div>
								<div class="view">
				<b><?php  echo CHtml::encode($element->getAttributeLabel('right_near_va_id')); ?>:</b>
				<?php  echo $element->right_near_va ? $element->right_near_va->name : 'None'?>				<br />
			</div>
								<div class="view">
				<b><?php  echo CHtml::encode($element->getAttributeLabel('right_best_va_id')); ?>:</b>
				<?php  echo $element->right_best_va ? $element->right_best_va->name : 'None'?>				<br />
			</div>
								<div class="view">
				<b><?php  echo CHtml::encode($element->getAttributeLabel('left_sphere')); ?>:</b>
				<?php  echo $element->left_sphere?><br/>
			</div>
								<div class="view">
				<b><?php  echo CHtml::encode($element->getAttributeLabel('left_cylinder')); ?>:</b>
				<?php  echo $element->left_cylinder?><br/>
			</div>
								<div class="view">
				<b><?php  echo CHtml::encode($element->getAttributeLabel('left_axis')); ?>:</b>
				<?php  echo $element->left_axis?><br/>
			</div>
								<div class="view">
				<b><?php  echo CHtml::encode($element->getAttributeLabel('left_corr_va_id')); ?>:</b>
				<?php  echo $element->left_corr_va ? $element->left_corr_va->name : 'None'?>				<br />
			</div>
								<div class="view">
				<b><?php  echo CHtml::encode($element->getAttributeLabel('left_near_va_id')); ?>:</b>
				<?php  echo $element->left_near_va ? $element->left_near_va->name : 'None'?>				<br />
			</div>
								<div class="view">
				<b><?php  echo CHtml::encode($element->getAttributeLabel('left_best_va_id')); ?>:</b>
				<?php  echo $element->left_best_va ? $element->left_best_va->name : 'None'?>				<br />
			</div>
					</div>

