
<h4 class="elementTypeName"><?php  echo $element->elementType->name ?></h4>

<div class="cols2 clearfix" style="margin-bottom: 2em;">
	<div class="left">
		<div style="margin-left: 10px;">
			<?php echo $element->getOphthalmicHistoryRight()?>
		</div>
	</div>
	<div class="right">
		<?php echo $element->getOphthalmicHistoryLeft()?>
	</div>
</div>
