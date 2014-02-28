<div class="element-data element-eyes row">
	<div class="element-eye right-eye column">
		<?php if ($element->hasRight()) {?>
			<?php if ($element->getCombined('right')) {?>
				<div class="data-row">
					<div class="data-value">
						<?php echo $element->unit->name?>
					</div>
				</div>
				<div class="data-row">
					<div class="data-value">
						<?php echo $element->getCombined('right')?>
					</div>
				</div>
			<?php }else{?>
				<div class="data-row">
					<div class="data-value">
						Not recorded
						<?php if ($element->right_unable_to_assess) {?>
							(Unable to assess<?php if ($element->right_eye_missing) {?>, eye missing<?php }?>)
						<?php } elseif ($element->right_eye_missing) {?>
							(Eye missing)
						<?php }?>
					</div>
				</div>
			<?php }?>
			<?php if ($element->right_comments) {?>
				<div class="data-row">
					<div class="data-value">
						<?= Yii::app()->format->Ntext($element->right_comments) ?>
					</div>
				</div>
			<?php }?>
		<?php }else{?>
			<div class="data-row">
				<div class="data-value">
					Not recorded
				</div>
			</div>
		<?php }?>
	</div>
	<div class="element-eye left-eye column">
		<?php if ($element->hasLeft()) {?>
			<?php if ($element->getCombined('left')) {?>
				<div class="data-row">
					<div class="data-value">
						<?php echo $element->unit->name?>
					</div>
				</div>
				<div class="data-row">
					<div class="data-value">
						<?php echo $element->getCombined('left')?>
					</div>
				</div>
			<?php }else{?>
				<div class="data-row">
					<div class="data-value">
						Not recorded
						<?php if ($element->left_unable_to_assess) {?>
							(Unable to assess<?php if ($element->left_eye_missing) {?>, eye missing<?php }?>)
						<?php } elseif ($element->left_eye_missing) {?>
							(Eye missing)
						<?php }?>
					</div>
				</div>
			<?php }?>
			<?php if ($element->left_comments) {?>
				<div class="data-row">
					<div class="data-value">
						<?= Yii::app()->format->Ntext($element->left_comments) ?>
					</div>
				</div>
			<?php }?>
		<?php }else{?>
			<div class="data-row">
				<div class="data-value">
					Not recorded
				</div>
			</div>
		<?php }?>
	</div>
</div>