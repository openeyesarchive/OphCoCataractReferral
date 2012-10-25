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
 * @property integer $refractive_surgery 
 * @property datetime $refractive_surgery_date
 * @property integer $right_sphere
 * @property integer $right_cylinder
 * @property integer $right_axis
 * @property string $right_axis_eyedraw
 * @property integer $right_type_id
 * @property string $right_type_other
 * @property integer $left_sphere
 * @property integer $left_cylinder
 * @property integer $left_axis
 * @property string $left_axis_eyedraw
 * @property integer $left_type_id
 * @property string $left_type_other
 *
 * The followings are the available model relations:
 */

class Element_OphCoCataractReferral_RefractionPriorToRefractiveSurgery extends OphCoCataractReferral_Refraction
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
		return 'et_ophcocataractreferral_surgeryrefraction';
	}
	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		$p_rules = parent::rules();
		array_push($p_rules,
		array('refractive_surgery', 'required'),
		array('refractive_surgery, refractive_surgery_date', 'safe')
		);
		return $p_rules;
	}

	/**
	 * @return boolean whether the element should be hidden based on if it has been enabled or not
	 * 
	 * TODO: move this logic to the controller
	 */
	public function getHidden() {
		if (Yii::app()->getController()->getAction()->id == 'create') {
			return !@$_POST['Element_OphCoCataractReferral_RefractionPriorToRefractiveSurgery']['refractive_surgery'];
		} else {
			if (empty($_POST)) {
				return !$this->refractive_surgery;
			} else {
				return !@$_POST['Element_OphCoCataractReferral_RefractionPriorToRefractiveSurgery']['refractive_surgery'];
			}
		}
	}

	/**
	 * Set default values for forms on create
	 */
	public function setDefaultOptions()
	{
		if (Yii::app()->getController()->getAction()->id == 'create') {
			$this->refractive_surgery_date = date('j M Y');
		}
		parent::setDefaultOptions();
	}
	
}
?>
