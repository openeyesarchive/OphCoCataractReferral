<?php $this->beginContent('//patient/event_container'); ?>


<?php			$form = $this->beginWidget('BaseEventTypeCActiveForm', array(
		'id'=>'clinical-create',
		'enableAjaxValidation'=>false,
		'htmlOptions' => array('class'=>'sliding'),
		'focus'=>'#procedure_id'
));
$this->event_actions[] = EventAction::button('Save', 'save', array('colour' => 'green'),array('class' => 'button small', 'form'=>'clinical-create'));

?>
<?php  $this->displayErrors($errors)?>
<?php  $this->renderOpenElements($this->action->id, $form); ?>
<?php  $this->displayErrors($errors)?>


<?php $this->endWidget()?>

<?php $this->endContent() ;?>


