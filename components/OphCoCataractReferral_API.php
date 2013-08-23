<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2013
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2013, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

class OphCoCataractReferral_API extends BaseAPI
{
    function getEventID($episode_id)
    {
        $episode = Episode::model()->findByPk($episode_id);
        if ($cataract_referral = EventType::model()->find('class_name=?',array('OphCoCataractReferral'))) {
            $criteria = new CDbCriteria;
            $criteria->compare('episode_id',$episode->id);
            $criteria->compare('event_type_id',$cataract_referral->id);
            $criteria->limit = 1;
            $criteria->order = 'created_date desc';
        }
        $event= Event::model()->find($criteria);
        return $event->id;
    }

    public function getRefractionElement($episode_id)
    {
        return (array)Element_OphCoCataractReferral_CurrentRefraction::model()->find('event_id=?',array($this->getEventID($episode_id)))->attributes;
    }

    public function getHistory($episode_id)
    {
        if ($hpc = Element_OphCoCataractReferral_Hpc::model()->find('event_id=?',array($this->getEventID($episode_id)))) {
            $history = array();
            $hpc->history && $history[] = $hpc->history;
            $hpc->impact && $history[] = $hpc->impact;
            $history[] = $hpc->eye->name.' eye'.($hpc->eye_id == 3 ? 's' : '');
            $history[] = $hpc->onset->name;
            $history[] = $hpc->first_second_eye->name;
            return implode(', ',$history);
        }
    }

    public function getVisualAcuityElement($episode_id)
    {
        $element = Element_OphCoCataractReferral_VisualAcuity::model()->find('event_id=?',array($this->getEventID($episode_id)));
        $readings = (array)$element->attributes;
        $readings['left_readings']=$element->getFormReadings('left');
        $readings['right_readings']=$element->getFormReadings('right');

        return $readings;

    }
}