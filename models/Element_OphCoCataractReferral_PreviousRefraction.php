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
 * This is the model class for table "et_ophcocataractreferral_currentrefraction".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property integer previous_refraction_different
 * @property datetime previous_refraction_date
 * @property integer $right_sphere
 * @property integer $right_cylinder
 * @property integer $right_axis
 * @property string $right_axis_eyedraw
 * @property integer $right_refraction_type_id
 * @property integer $left_sphere
 * @property integer $left_cylinder
 * @property integer $left_axis
 * @property string $left_axis_eyedraw
 * @property integer $left_refraction_type_id
 *
 * The followings are the available model relations:
 */

class Element_OphCoCataractReferral_PreviousRefraction extends BaseEventTypeElement
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
		return 'et_ophcocataractreferral_previousrefraction';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_id, right_sphere, right_cylinder, right_axis, right_axis_eyedraw, right_refraction_type_id, left_sphere, left_cylinder, left_axis, left_axis_eyedraw, left_refraction_type_id, previous_refraction_different, previous_refraction_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, event_id, right_cylinder, right_axis, right_axis_eyedraw, right_refraction_type_id, left_sphere, left_cylinder, left_axis, left_axis_eyedraw, left_refraction_type_id, previous_refraction_different, previous_refraction_date', 'safe', 'on' => 'search'),
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
			'previous_refraction_date' => 'Previous refraction',
			'right_sphere' => 'Sphere',
			'left_sphere' => 'Sphere',
			'right_cylinder' => 'Cylinder',
			'left_cylinder' => 'Cylinder',
			'right_axis' => 'Axis',
			'left_axis' => 'Axis',
			'right_refraction_type_id' => 'Type',
			'left_refraction_type_id' => 'Type',
		);
	}

	public function getCombined($side) {
		return $this->{$side.'_sphere'} . '/' . $this->{$side.'_cylinder'} . ' @ ' . $this->{$side.'_axis'} . '&deg;';
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
		$criteria->compare('right_sphere', $this->right_sphere_id);
		$criteria->compare('right_cylinder', $this->right_cylinder_id);
		$criteria->compare('right_axis', $this->right_axis_id);
		$criteria->compare('left_sphere', $this->left_sphere_id);
		$criteria->compare('left_cylinder', $this->left_cylinder_id);
		$criteria->compare('left_axis', $this->left_axis_id);
		
		return new CActiveDataProvider(get_class($this), array(
				'criteria' => $criteria,
			));
	}

	public function getHidden() {
		if (Yii::app()->getController()->getAction()->id == 'create') {
			return !@$_POST['Element_OphCoCataractReferral_PreviousRefraction']['previous_refraction_different'];
		} else {
			if (empty($_POST)) {
				return !$this->previous_refraction_different;
			} else {
				return !@$_POST['Element_OphCoCataractReferral_PreviousRefraction']['previous_refraction_different'];
			}
		}
	}

	/**
	 * Set default values for forms on create
	 */
	public function setDefaultOptions()
	{
		if (Yii::app()->getController()->getAction()->id == 'create') {
			$this->previous_refraction_date = date('j M Y');
		}
	}
	
	protected function beforeSave()
	{
		return parent::beforeSave();
	}

	protected function afterSave()
	{
		
		return parent::afterSave();
	}

	protected function beforeValidate()
	{
		return parent::beforeValidate();
	}
}
?>
