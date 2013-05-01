<?php /**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2012
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2012, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

/**
 * This is the model class for table "et_ophcocataractreferral_visualacuity".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property integer $refraction_id
 * @property integer $eye_id
 * @property integer $onset_id
 * @property integer $first_second_eye_id
 *
 * The followings are the available model relations:
 */

class Element_OphCoCataractReferral_VisualAcuity extends SplitEventTypeElement
{
	public $service;

	/**
	 * Returns the static model of the specified AR class.
	 * @return the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'et_ophcocataractreferral_visualacuity';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_id, left_comments, right_comments, eye_id, left_check_method_id, right_check_method_id', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, event_id, left_comments, right_comments, eye_id', 'safe', 'on' => 'search'),
		);
	}
	
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'element_type' => array(self::HAS_ONE, 'ElementType', 'id','on' => "element_type.class_name='".get_class($this)."'"),
			'eventType' => array(self::BELONGS_TO, 'EventType', 'event_type_id'),
			'event' => array(self::BELONGS_TO, 'Event', 'event_id'),
			'user' => array(self::BELONGS_TO, 'User', 'created_user_id'),
			'usermodified' => array(self::BELONGS_TO, 'User', 'last_modified_user_id'),
			'eye' => array(self::BELONGS_TO, 'Eye', 'eye_id'),
			'readings' => array(self::HAS_MANY, 'OphCoCataractReferral_VisualAcuity_Reading', 'element_id'),
			'right_readings' => array(self::HAS_MANY, 'OphCoCataractReferral_VisualAcuity_Reading', 'element_id', 'on' => 'right_readings.side = 0'),
			'left_readings' => array(self::HAS_MANY, 'OphCoCataractReferral_VisualAcuity_Reading', 'element_id', 'on' => 'left_readings.side = 1'),
			'left_check_method' => array(self::BELONGS_TO, 'OphCoCataractReferral_VisualAcuity_CheckMethod', 'left_check_method_id'),
			'right_check_method' => array(self::BELONGS_TO, 'OphCoCataractReferral_VisualAcuity_CheckMethod', 'right_check_method_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'event_id' => 'Event',
			'left_check_method_id' => 'Check method',
			'right_check_method_id' => 'Check method',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('event_id', $this->event_id, true);
		$criteria->compare('history', $this->history);
		$criteria->compare('impact', $this->impact);
		$criteria->compare('refraction_id', $this->refraction_id);
		$criteria->compare('eye_id', $this->eye_id);
		$criteria->compare('onset_id', $this->onset_id);
		$criteria->compare('first_second_eye_id', $this->first_second_eye_id);
		
		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Converts a (POSTed) form to an array of reading models.
	 * Required when redisplaying form after validation error.
	 * @param array $readings array POSTed array of readings
	 * @param string $side
	 */
	public function convertReadings($readings, $side) {
		$return = array();
		$side_id = ($side == 'right') ? 0 : 1;
		if (is_array($readings)) {
			foreach($readings as $reading) {
				if($reading['side'] == $side_id) {
					$reading_model = new OphCoCataractReferral_VisualAcuity_Reading();
					$reading_model->attributes = $reading;
					$return[] = $reading_model;
				}
			}
		}
		return $return;
	}

	public function getFormReadings($side) {
		if($this->id) {
			return $this->{$side.'_readings'};
		} else {
			$readings = array();
			$methods = OphCoCataractReferral_VisualAcuity_Method::model()->findAll(array(
					'order' => 'id',
					'limit' => 2,
			));
			foreach($methods as $method) {
				$reading = new OphCoCataractReferral_VisualAcuity_Reading();
				$reading->side = ($side == 'right') ? 0 : 1;
				$reading->method_id = $method->id;
				$readings[] = $reading;
			}
			return $readings;
		}
	}
 
	/**
	 * Get the measurement unit
	 */
	public function getUnit() {
		$unit_id = $this->getSetting('unit_id');
		return OphCoCataractReferral_VisualAcuityUnit::model()->findByPk($unit_id);
	}

	/**
	 * Array of unit values for dropdown
	 * @param integer $unit_id
	 * @return array
	 */
	public function getUnitValues($unit_id = null) {
		if($unit_id) {
			$unit = OphCoCataractReferral_VisualAcuityUnit::model()->findByPk($unit_id);
		} else {
			$unit = $this->getUnit();
		}
		return CHtml::listData($unit->values, 'base_value', 'value');
	}

	/**
	 * Get a combined string of the different readings
	 * @param string $side
	 * @return string
	 */
	public function getCombined($side) {
		$combined = array();
		foreach($this->{$side.'_readings'} as $reading) {
			$combined[] = $reading->convertTo($reading->value) . ' ' . $reading->method->name;
		}
		return implode(', ',$combined);
	}

	/**
	 * Get the best reading for the specified side
	 * @param string $side
	 * @return string
	 */
	public function getBest($side) {
		$best = false;
		foreach ($this->{$side.'_readings'} as $reading) {
			if (!$best || $reading->value >= $best->value) {
				$best = $reading;
			}
		}

		if ($best) {
			return $best->convertTo($best->value);
		}
	}

	protected function beforeValidate() {
		if (!isset($_POST['visualacuity_reading'])) {
			$this->addError('visualacuity_reading','Please enter at least one reading, or remove the element');
		}

		return parent::beforeValidate();
	}

	protected function beforeDelete() {
		foreach ($this->readings as $reading) {
			if (!$reading->delete()) {
				throw new Exception('Delete reading failed: '.print_r($reading->getErrors(),true));
			}
		}
		return parent::beforeDelete();
	}

	/**
	 * Save readings
	 * @todo This probably doesn't belong here, but there doesn't seem to be an easy way
	 * of doing it through the controller at the moment
	 */
	protected function afterSave() {
		// Check to see if readings have been posted
		if(isset($_POST['visualacuity_readings_valid']) && $_POST['visualacuity_readings_valid']) {

			// Get a list of ids so we can keep track of what's been removed
			$existing_reading_ids = array();
			foreach($this->readings as $reading) {
				$existing_reading_ids[$reading->id] = $reading->id;
			}

			// Process (any) posted readings
			$new_readings = (isset($_POST['visualacuity_reading'])) ? $_POST['visualacuity_reading'] : array();
			foreach($new_readings as $reading) {
 
				// Check to see if side is inactive
				if($reading['side'] == 0 && $this->eye_id == 1
						|| $reading['side'] == 1 && $this->eye_id == 2) {
					continue;
				}
 
				if(isset($reading['id']) && isset($existing_reading_ids[$reading['id']])) {

					// Reading is being updated
					$reading_model = OphCoCataractReferral_VisualAcuity_Reading::model()->findByPk($reading['id']);
					unset($existing_reading_ids[$reading['id']]);

				} else {

					// Reading is new
					$reading_model = new OphCoCataractReferral_VisualAcuity_Reading();
					$reading_model->element_id = $this->id;

				}

				// Save reading attributes
				$reading_model->value = $reading['value'];
				$reading_model->method_id = $reading['method_id'];
				$reading_model->side = $reading['side'];
				$reading_model->save();

			}

			// Delete remaining (removed) ids
			OphCoCataractReferral_VisualAcuity_Reading::model()->deleteByPk(array_values($existing_reading_ids));
		}

		return parent::afterSave();
	}
}
?>
