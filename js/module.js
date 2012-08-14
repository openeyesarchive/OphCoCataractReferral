
/* Module-specific javascript can be placed here */

$(document).ready(function() {
	$('#et_save').unbind('click').click(function() {
		if (!$(this).hasClass('inactive')) {
			disableButtons();

			
			return true;
		}
		return false;
	});

	$('#et_cancel').unbind('click').click(function() {
		if (!$(this).hasClass('inactive')) {
			disableButtons();

			if (m = window.location.href.match(/\/update\/[0-9]+/)) {
				window.location.href = window.location.href.replace('/update/','/view/');
			} else {
				window.location.href = '/patient/episodes/'+et_patient_id;
			}
		}
		return false;
	});

	$('#et_deleteevent').unbind('click').click(function() {
		if (!$(this).hasClass('inactive')) {
			disableButtons();
			$('#deleteForm').submit();
		}
		return false;
	});

	$('#et_canceldelete').unbind('click').click(function() {
		if (!$(this).hasClass('inactive')) {
			disableButtons();

			if (m = window.location.href.match(/\/delete\/[0-9]+/)) {
				window.location.href = window.location.href.replace('/delete/','/view/');
			} else {
				window.location.href = '/patient/episodes/'+et_patient_id;
			}
		} 
		return false;
	});

	$('select.populate_textarea').unbind('change').change(function() {
		if ($(this).val() != '') {
			var cLass = $(this).parent().parent().parent().attr('class');
			var el = $('#'+cLass+'_'+$(this).attr('id'));
			var currentText = el.text();
			var newText = $(this).children('option:selected').text();

			if (currentText.length == 0) {
				el.text(ucfirst(newText));
			} else {
				el.text(currentText+', '+newText);
			}
		}
	});

	if (window.Element_OphCoCataractReferral_IntraocularPressure_link_instrument_selects !== undefined) {
		if (Element_OphCoCataractReferral_IntraocularPressure_link_instrument_selects) {
			$('#Element_OphCoCataractReferral_IntraocularPressure_left_instrument_id').change(function() {
				$('#Element_OphCoCataractReferral_IntraocularPressure_right_instrument_id').val($(this).val());
			});
			$('#Element_OphCoCataractReferral_IntraocularPressure_right_instrument_id').change(function() {
				$('#Element_OphCoCataractReferral_IntraocularPressure_left_instrument_id').val($(this).val());
			});
		}
	}

	$('#event_display').delegate('.element input.axis', 'change', function() {
		var axis = $(this).val();
		axis = axis % 180;
		$(this).val(axis);
		var side = $(this).closest('[data-side]').attr('data-side');
		var element_type_id = $(this).closest('.element').attr('data-element-type-id');
		var eyedraw = window['ed_drawing_edit_' + side + '_' + element_type_id];
		eyedraw.setParameterForDoodleOfClass('TrialLens', 'axis', axis);
	});

	$('#event_display').delegate('.element .segmented select', 'change', function() {
		var field = $(this).nextAll('input');
		updateSegmentedField(field);
	});

	$('input:checkbox[name="Element_OphCoCataractReferral_PreviousRefraction[previous_refraction_different]"]').click(function() {
		var datepicker_div = $('#Element_OphCoCataractReferral_PreviousRefraction_previous_refraction_date_0').parent().parent();

		if ($('input:checkbox[name="Element_OphCoCataractReferral_PreviousRefraction[previous_refraction_different]"]').attr('checked')) {
			$('div.PreviousRefraction:hidden').slideToggle('fast');
			datepicker_div.slideToggle('fast');
			$('#Element_OphCoCataractReferral_PreviousRefraction_previous_refraction_date_0').attr('hidden',false);
		} else {
			$('div.PreviousRefraction:visible').slideToggle('fast');
			if (datepicker_div.is(':visible')) {
				datepicker_div.slideToggle('fast');
			}
		}
	});

	$('input:checkbox[name="Element_OphCoCataractReferral_RefractionPriorToRefractiveSurgery[refractive_surgery]"]').click(function() {
		var datepicker_div = $('#Element_OphCoCataractReferral_RefractionPriorToRefractiveSurgery_refractive_surgery_date_0').parent().parent();

		if ($('input:checkbox[name="Element_OphCoCataractReferral_RefractionPriorToRefractiveSurgery[refractive_surgery]"]').attr('checked')) {
			$('div.RefractionPriorToRefractiveSurgery:hidden').slideToggle('fast');
			datepicker_div.slideToggle('fast');
			$('#Element_OphCoCataractReferral_RefractionPriorToRefractiveSurgery_refractive_surgery_date_0').attr('hidden',false);
		} else {
			$('div.RefractionPriorToRefractiveSurgery:visible').slideToggle('fast');
			if (datepicker_div.is(':visible')) {
				datepicker_div.slideToggle('fast');
			}
		}
	});
});

function updateSegmentedField(field) {
	var parts = $(field).parent().children('select');
	var value = $(parts[0]).val() * (parseFloat($(parts[1]).val()) + parseFloat($(parts[2]).val()));
	$(field).val(value.toFixed(2));
}

function updateElement_OphCoCataractReferral_CurrentRefraction(drawing, doodle) {
	if (doodle && doodle.className == 'TrialLens') {
		var side = (drawing.eye == 0) ? 'right' : 'left';
		$('#Element_OphCoCataractReferral_CurrentRefraction_'+side+'_axis').val(doodle.getParameter('axis'));
	}
}

function updateElement_OphCoCataractReferral_PreviousRefraction(drawing, doodle) {
	if (doodle && doodle.className == 'TrialLens') {
		var side = (drawing.eye == 0) ? 'right' : 'left';
		$('#Element_OphCoCataractReferral_PreviousRefraction_'+side+'_axis').val(doodle.getParameter('axis'));
	}
}

function updateElement_OphCoCataractReferral_RefractionPriorToRefractiveSurgery(drawing, doodle) {
	if (doodle && doodle.className == 'TrialLens') {
		var side = (drawing.eye == 0) ? 'right' : 'left';
		$('#Element_OphCoCataractReferral_RefractionPriorToRefractiveSurgery_'+side+'_axis').val(doodle.getParameter('axis'));
	}
}

function ucfirst(str) { str += ''; var f = str.charAt(0).toUpperCase(); return f + str.substr(1); }

function eDparameterListener(_drawing) {
	var doodle = null;
	if (_drawing.selectedDoodle) {
		doodle = _drawing.selectedDoodle;
	}
	var element_type = $(_drawing.canvasParent).closest('.element').attr('data-element-type-class');
	if (typeof window['update' + element_type] === 'function') {
		window['update' + element_type](_drawing, doodle);
	}
}
