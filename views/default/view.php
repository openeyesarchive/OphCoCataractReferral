<?php		$this->breadcrumbs=array($this->module->id);
	$this->header();
?>
<h3 class="withEventIcon" style="background:transparent url(<?php echo $this->assetPath?>/img/medium.png) center left no-repeat;"><?php  echo $this->event_type->name ?></h3>

<?php
	// Event actions
	if($this->canPrint()) {
		$this->event_actions[] = EventAction::button('Print', 'print');
	}
	$this->renderPartial('//patient/event_actions');
?>
<div>
	<?php  $this->renderDefaultElements($this->action->id); ?>	<?php  $this->renderOptionalElements($this->action->id); ?>
	<div class="cleartall"></div>
</div>

<?php  $this->footer();?>
