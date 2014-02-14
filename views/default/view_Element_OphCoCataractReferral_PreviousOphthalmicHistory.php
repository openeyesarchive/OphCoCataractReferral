<section class="element">
	<header class="element-header">
		<h3 class="element-title"><?php echo $element->elementType->name?></h3>
	</header>
	<div class="element-data element-eyes row">
		<div class="element-eye right-eye column">
			<div class="data-row">
				<div style="margin-left: 10px;">
					<?php echo $element->getOphthalmicHistoryRight()?>
				</div>
			</div>
		</div>
		<div class="element-eye right-eye column">
			<div class="data-row">
				<?php echo $element->getOphthalmicHistoryLeft()?>
			</div>
		</div>
	</div>
</section>