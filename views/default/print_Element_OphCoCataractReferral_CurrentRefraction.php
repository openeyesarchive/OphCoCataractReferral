
<div class="element <?php echo $element->elementType->class_name ?>" style="margin-top: 1em;">
	<strong>
		<?php  echo $element->elementType->name ?>
	</strong>
	<div class="cols2 clearfix">
		<div class="left">
			<div>
				<?php echo $this->renderPartial('view_Refraction_OEEyedraw',array('side'=>'right','element'=>$element))?>
			</div>
		</div>
		<div class="right">
			<div>
				<?php echo $this->renderPartial('view_Refraction_OEEyedraw',array('side'=>'left','element'=>$element))?>
			</div>
		</div>
	</div>
</div>
