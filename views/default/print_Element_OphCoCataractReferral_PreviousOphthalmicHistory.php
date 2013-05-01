
<strong><?php  echo $element->elementType->name ?></strong>

<div class="cols2 clearfix">
	<div class="left">
		<div style="margin-left: 10px;">
			<?php echo $element->getOphthalmicHistoryRight()?>
		</div>
	</div>
	<div class="right">
		<?php echo $element->getOphthalmicHistoryLeft()?>
	</div>
</div>
