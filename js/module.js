
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

	$('#Element_OphCoCataractReferral_CurrentRefraction_right_sphere').change(function() {
		if (parseFloat($(this).val()) <= -10.5 || parseFloat($(this).val()) >= 10.5) {
			$(this).attr('step','0.5');
		} else {
			$(this).attr('step','0.25');
		}
	});

  $('#Element_OphCoCataractReferral_CurrentRefraction_left_sphere').change(function() {
    if (parseFloat($(this).val()) <= -10.5 || parseFloat($(this).val()) >= 10.5) {
      $(this).attr('step','0.5');
    } else {
      $(this).attr('step','0.25');
    }
  });

  $('#Element_OphCoCataractReferral_CurrentRefraction_right_cylinder').change(function() {
    if (parseFloat($(this).val()) <= -10.5 || parseFloat($(this).val()) >= 10.5) {
      $(this).attr('step','0.5');
    } else {
      $(this).attr('step','0.25');
    }
  });

  $('#Element_OphCoCataractReferral_CurrentRefraction_left_cylinder').change(function() {
    if (parseFloat($(this).val()) <= -10.5 || parseFloat($(this).val()) >= 10.5) {
      $(this).attr('step','0.5');
    } else {
      $(this).attr('step','0.25');
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
});

function ucfirst(str) { str += ''; var f = str.charAt(0).toUpperCase(); return f + str.substr(1); }

function eDparameterListener(_drawing) {
	if (_drawing.selectedDoodle != null) {
		// handle event
	}
}
