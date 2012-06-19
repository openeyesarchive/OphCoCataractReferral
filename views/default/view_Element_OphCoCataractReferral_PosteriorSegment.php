
<h4 class="elementTypeName"><?php  echo $element->elementType->name ?></h4>

<div class="view">
	<div class="view">
		<b><?php	echo CHtml::encode($element->getAttributeLabel('left_eye'))?></b>
		<?php echo $element->left_eye?><br/>
	</div>
	<div class="view">
		<b><?php	echo CHtml::encode($element->getAttributeLabel('right_eye'))?></b>
		<?php echo $element->right_eye?><br/>
	</div>
</div>
