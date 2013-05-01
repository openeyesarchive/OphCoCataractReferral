<?php
$field_prefix = get_class($element).'_';
$integers = array_combine(range(0,20), range(0,20));
$integer = abs((int) $element->$field);
$fractions = array(
		'0' => '.00',
		'0.25' => '.25',
		'0.50' => '.50',
		'0.75' => '.75',
);
$fractions2 = array(
	'0' => array('data-value' => '.00'),
	'0.25' => array('data-value' => '.25'),
	'0.50' => array('data-value' => '.50'),
	'0.75' => array('data-value' => '.75'),
);

$fraction = abs($element->$field) - $integer;
$signs = array('1' => '+', '-1' => '-');
$signs2 = array('1' => array('data-value'=>'+'), '-1' => array('data-value'=>'-'));
$sign = ($element->$field >= 0) ? 1 : -1;
var_dump($sign);
?>
<?php echo CHtml::dropDownList($field_prefix.$field.'_sign', $sign, $signs, array('options'=>$signs2))?>
<?php echo CHtml::dropDownList($field_prefix.$field.'_integer', $integer, $integers)?>
<?php echo CHtml::dropDownList($field_prefix.$field.'_fraction', $fraction, $fractions, array('options'=>$fractions2))?>
<?php echo CHtml::activeHiddenField($element, $field)?>
