<?php
/**
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
 * This is the model class for table "ophcocataractreferral_visualacuity_reading".
 *
 * @property integer $id
 * @property integer $element_id
 * @property integer $side
 * @property integer $value
 * @property integer $method_id

 */
class OphCoCataractReferral_VisualAcuity_Reading extends BaseActiveRecord {

	/**
	 * Returns the static model of the specified AR class.
	 * @return OphCoCataractReferral_VisualAcuity_Reading the static model class
	 */
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'ophcocataractreferral_visualacuity_reading';
	}

	/**
	 * @return array validation rules for model visualacuity_methods.
	 */
	public function rules() {
		return array(
				array('id', 'safe'),
				array('value, method_id, element_id, side', 'required'),
				array('id, value, method_id, element_id, side', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		return array(
				'element' => array(self::BELONGS_TO, 'Element_OphCoCataractReferral_VisualAcuity', 'element_id'),
				'method' => array(self::BELONGS_TO, 'OphCoCataractReferral_VisualAcuity_Method', 'method_id'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search() {
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id,true);
		$criteria->compare('value',$this->value,true);
		$criteria->compare('method_id',$this->method_id,true);
		$criteria->compare('element_id',$this->element_id,true);
		$criteria->compare('side',$this->side,true);
		return new CActiveDataProvider(get_class($this), array(
				'criteria'=>$criteria,
		));
	}

	/**
	 * Convert a base_value (ETDRS + 5) to a different unit
	 * @param integer $base_value
	 * @param integer $unit_id
	 * @return string
	 */
	public function convertTo($base_value, $unit_id = null) {
		$value = $this->getClosest($base_value, $unit_id);
		return $value->value;
	}

	/**
	 * Get the closest step value for a unit
	 * @param integer $base_value
	 * @param integer $unit_id
	 * @return OphCoCataractReferral_VisualAcuityUnitValue
	 */
	public function getClosest($base_value, $unit_id = null) {
		if(!$unit_id) {
			$unit_id = Element_OphCoCataractReferral_VisualAcuity::model()->getUnit()->id;
		}
		$criteria = new CDbCriteria();
		$criteria->select = array('*','ABS(base_value - :base_value) AS delta');
		$criteria->condition = 'unit_id = :unit_id';
		$criteria->params = array(':unit_id' => $unit_id, ':base_value' => $base_value);
		$criteria->order = 'delta';
		$value = OphCoCataractReferral_VisualAcuityUnitValue::model()->find($criteria);
		return $value;
	}

	/**
	 * Load model with closest base_values for current unit. This is to allow for switching units.
	 * @param integer $unit_id
	 */
	public function loadClosest($unit_id = null) {
		$base_value = $this->value;
		if($base_value) {
			$value = $this->getClosest($base_value, $unit_id);
			$this->value = $value->base_value;
		}
	}

}
