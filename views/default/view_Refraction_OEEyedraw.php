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

			$this->widget('application.modules.eyedraw.OEEyeDrawWidget', array(
					'doodleToolBarArray' => array(),
					'toolbar' => false,
					'onReadyCommandArray' => array(
						array('addDoodle', array('GraphAxes')),
						array('addDoodle', array('Slider2D')),
						array('deselectDoodles', array()),
					),
					'idSuffix' => $side.'_g'.$element->elementType->id,
					'side' => strtoupper($side[0]),
					'mode' => 'view',
					'width' => 150,
					'height' => 150,
					'model' => $element,
					'attribute' => $side.'_graph_axis_eyedraw',
			));

			$this->widget('application.modules.eyedraw.OEEyeDrawWidget', array(
					'doodleToolBarArray' => array(),
					'toolbar' => false,
					'onReadyCommandArray' => array(
						array('addDoodle', array('TrialFrame')),
						array('addDoodle', array('TrialLens')),
						array('deselectDoodles', array()),
					),
					'idSuffix' => $side.'_'.$element->elementType->id,
					'side' => strtoupper($side[0]),
					'mode' => 'view',
					'width' => 150,
					'height' => 150,
					'model' => $element,
					'attribute' => $side.'_axis_eyedraw',
			))?>
			<div class="eyedrawFields view">
				<div>
					<div class="data">
						<?php echo $element->getCombined($side)?>
					</div>
				</div>
			</div>
