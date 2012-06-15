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
 * @property integer $right_sphere_id
 * @property integer $right_cylinder_id
 * @property integer $right_axis_id
 * @property integer $right_corr_va_id
 * @property integer $right_near_va_id
 * @property integer $right_best_va_id
 * @property integer $left_sphere_id
 * @property integer $left_cylinder_id
 * @property integer $left_axis_id
 * @property integer $left_corr_va_id
 * @property integer $left_near_va_id
 * @property integer $left_best_va_id
 *
 * The followings are the available model relations:
 */

class Element_OphCoCataractReferral_CurrentRefraction extends BaseEventTypeElement
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
		return 'et_ophcocataractreferral_currentrefraction';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_id, right_sphere_id, right_cylinder_id, right_axis_id, right_corr_va_id, right_near_va_id, right_best_va_id, left_sphere_id, left_cylinder_id, left_axis_id, left_corr_va_id, left_near_va_id, left_best_va_id, ', 'safe'),
			array('right_sphere_id, right_cylinder_id, right_axis_id, right_corr_va_id, right_near_va_id, right_best_va_id, left_sphere_id, left_cylinder_id, left_axis_id, left_corr_va_id, left_near_va_id, left_best_va_id, ', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, event_id, right_sphere_id, right_cylinder_id, right_axis_id, right_corr_va_id, right_near_va_id, right_best_va_id, left_sphere_id, left_cylinder_id, left_axis_id, left_corr_va_id, left_near_va_id, left_best_va_id, ', 'safe', 'on' => 'search'),
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
			'right_sphere' => array(self::BELONGS_TO, 'EtOphcocataractreferralCurrentrefractionSphere', 'right_sphere_id'),
			'right_cylinder' => array(self::BELONGS_TO, 'EtOphcocataractreferralCurrentrefractionCylinder', 'right_cylinder_id'),
			'right_axis' => array(self::BELONGS_TO, 'EtOphcocataractreferralCurrentrefractionAxis', 'right_axis_id'),
			'right_corr_va' => array(self::BELONGS_TO, 'EtOphcocataractreferralCurrentrefractionCorrVa', 'right_corr_va_id'),
			'right_near_va' => array(self::BELONGS_TO, 'EtOphcocataractreferralCurrentrefractionNearVa', 'right_near_va_id'),
			'right_best_va' => array(self::BELONGS_TO, 'EtOphcocataractreferralCurrentrefractionBestVa', 'right_best_va_id'),
			'left_sphere' => array(self::BELONGS_TO, 'EtOphcocataractreferralCurrentrefractionSphere', 'left_sphere_id'),
			'left_cylinder' => array(self::BELONGS_TO, 'EtOphcocataractreferralCurrentrefractionCylinder', 'left_cylinder_id'),
			'left_axis' => array(self::BELONGS_TO, 'EtOphcocataractreferralCurrentrefractionAxis', 'left_axis_id'),
			'left_corr_va' => array(self::BELONGS_TO, 'EtOphcocataractreferralCurrentrefractionCorrVa', 'left_corr_va_id'),
			'left_near_va' => array(self::BELONGS_TO, 'EtOphcocataractreferralCurrentrefractionNearVa', 'left_near_va_id'),
			'left_best_va' => array(self::BELONGS_TO, 'EtOphcocataractreferralCurrentrefractionBestVa', 'left_best_va_id'),
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
'right_sphere_id' => 'Right sphere',
'right_cylinder_id' => 'Right cylinder',
'right_axis_id' => 'Right axis',
'right_corr_va_id' => 'Right Corr VA',
'right_near_va_id' => 'Right Near VA',
'right_best_va_id' => 'Right Best VA',
'left_sphere_id' => 'Left sphere',
'left_cylinder_id' => 'Left cylinder',
'left_axis_id' => 'Left axis',
'left_corr_va_id' => 'Left Corr VA',
'left_near_va_id' => 'Left Near VA',
'left_best_va_id' => 'Left Best VA',
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

$criteria->compare('right_sphere_id', $this->right_sphere_id);
$criteria->compare('right_cylinder_id', $this->right_cylinder_id);
$criteria->compare('right_axis_id', $this->right_axis_id);
$criteria->compare('right_corr_va_id', $this->right_corr_va_id);
$criteria->compare('right_near_va_id', $this->right_near_va_id);
$criteria->compare('right_best_va_id', $this->right_best_va_id);
$criteria->compare('left_sphere_id', $this->left_sphere_id);
$criteria->compare('left_cylinder_id', $this->left_cylinder_id);
$criteria->compare('left_axis_id', $this->left_axis_id);
$criteria->compare('left_corr_va_id', $this->left_corr_va_id);
$criteria->compare('left_near_va_id', $this->left_near_va_id);
$criteria->compare('left_best_va_id', $this->left_best_va_id);
		
		return new CActiveDataProvider(get_class($this), array(
				'criteria' => $criteria,
			));
	}

	/**
	 * Set default values for forms on create
	 */
	public function setDefaultOptions()
	{
		$this->right_sphere_id = 61;
		$this->right_cylinder_id = 61;
		$this->right_axis_id = 19;
		$this->right_corr_va_id = 1;
		$this->right_near_va_id = 1;
		$this->right_best_va_id = 1;
		$this->left_sphere_id = 61;
		$this->left_cylinder_id = 61;
		$this->left_axis_id = 19;
		$this->left_corr_va_id = 1;
		$this->left_near_va_id = 1;
		$this->left_best_va_id = 1;
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
