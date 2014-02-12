<?php $this->beginContent('//patient/event_container'); ?>

<?php
// Event actions
if ($this->checkPrintAccess()) {
	$this->event_actions[] = EventAction::button('Print', 'print', null, array('class' => 'small'));
	$this->event_actions[] = EventAction::button('Print all', 'printall', null, array('id' => 'et_print_all', 'class' => 'small'));
}
?>

	<?php $this->renderOpenElements($this->action->id); ?>
	<?php $this->endContent() ;?>
