
/* Module-specific javascript can be placed here */

$(document).ready(function() {
	handleButton($('#et_save'));

	handleButton($('#et_cancel'),function(e) {
		if (m = window.location.href.match(/\/update\/[0-9]+/)) {
			window.location.href = window.location.href.replace('/update/','/view/');
		} else {
			window.location.href = baseUrl+'/patient/episodes/'+et_patient_id;
		}
	});

	handleButton($('#et_deleteevent'));

	handleButton($('#et_canceldelete'),function(e) {
		if (m = window.location.href.match(/\/delete\/[0-9]+/)) {
			window.location.href = window.location.href.replace('/delete/','/view/');
		} else {
			window.location.href = baseUrl+'/patient/episodes/'+et_patient_id;
		}
	});

	$('select.populate_textarea').unbind('change').change(function() {
		if ($(this).val() != '') {
			var cLass = $(this).parent().parent().parent().attr('class').match(/Element.*/);
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

	$(this).delegate('#event_content .Element_OphCoCataractReferral_VisualAcuity .removeReading', 'click', function(e) {
		var block = $(this).closest('.data');
		$(this).closest('tr').remove();
		if ($('tbody', block).children('tr').length == 0) {
			$('.noReadings', block).show();
			$('table', block).hide();
		}
		e.preventDefault();
	});

	$(this).delegate('#event_content .Element_OphCoCataractReferral_VisualAcuity .addReading', 'click', function(e) {
		var side = $(this).closest('.side').attr('data-side');
		OphCoCataractReferral_VisualAcuity_addReading(side);
		e.preventDefault();
	});

	$(this).delegate('#event_content .side .activeForm a.removeSide', 'click', function(e) {
	 
		// Update side field to indicate other side
		var side = $(this).closest('.side');
	 
		var remove_physical_side = 'left';
		var show_physical_side = 'right';
	 
		var eye_side = 1;
		if(side.attr('data-side') == 'left') {
			eye_side = 2; // Right
			remove_physical_side = 'right';
			show_physical_side = 'left';
		}
	 
		$(this).closest('.element').find('input.sideField').each(function() {
			$(this).val(eye_side);
		});
	 
		// If other side is already inactive, then activate it (can't have both sides inactive)
		$(this).closest('.element').find('.side.'+show_physical_side).removeClass('inactive');
	 
		// Make this side inactive
		$(this).closest('.element').find('.side.'+remove_physical_side).addClass('inactive');

		e.preventDefault();
	});

	$(this).delegate('#event_content .side .inactiveForm a', 'click', function(e) {
		var element = $(this).closest('.element');
		element.find('input.sideField').each(function() {
			$(this).val(3); // Both eyes
		});

		element.find('.side').removeClass('inactive');

		e.preventDefault();
	});

	$('input[type="checkbox"][id="Element_OphCoCataractReferral_Confirmation_risks_discussed"]').hover(function(e) {
		var offsetY = 28;
		var offsetX = 10;
		var tipWidth = 0;

		$('<p class="alertIconHelp"></p>').text($(this).data('hover')).appendTo('body');
		tipWidth = $('.alertIconHelp').outerWidth();
		$('.alertIconHelp').css('top', (e.pageY - offsetY) + 'px').css('left', (e.pageX - (tipWidth + offsetX)) + 'px').fadeIn('fast');
	},function(e) {
		$('.alertIconHelp').remove();
	}).mousemove(function(e) {
		var offsetY = 28;
		var offsetX = 10;
		var tipWidth = 0;

		$('.alertIconHelp').css('top', (e.pageY - offsetY) + 'px').css('left', (e.pageX - (tipWidth + offsetX)) + 'px');
	});

	handleButton($('#et_print'),function(e) {
		e.preventDefault();
		printIFrameUrl(OE_print_url,null);
	});

	$(this).delegate('.addReading', 'click', function(e) {
		var side = $(this).closest('.side').attr('data-side');
		OphCoCataractReferral_VisualAcuity_addReading(side);
		e.preventDefault();
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

/*
 * TODO: this masking of the 'other' field should be abstracted to be part of the eyedraw widget
 * 
 */
function OphCoCataractReferral_Refraction_updateType(field) {
	var other = $(field).next();
	if ($(field).val() == '') {
		other.show();
		other.focus();
	} else {
		other.val('');
		other.hide();
	}
}

function OphCoCataractReferral_Refraction_init(element_type) {
	$('#event_content .' + element_type + ' .refractionType').each(function() {
		OphCoCataractReferral_Refraction_updateType(this);
	});
	$(this).delegate('#event_content .' + element_type + ' .refractionType', 'change', function() {
		OphCoCataractReferral_Refraction_updateType(this);
	});
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

/**
 * Visual Acuity
 */

function OphCoCataractReferral_VisualAcuity_ReadingTooltip(row) {
	var iconHover = row.find('.va-info-icon:last');

	iconHover.hover(function(e) {
		var sel = $(this).parent().parent().find('select.va-selector');
		var val = sel.val();
		var conversions = [];

		sel.find('option').each(function() {
			if ($(this).val() == val) {
				conversions = $(this).data('tooltip');
				return true;
			}
		});

		var tooltip_text = '';
		var approx = false;
		for (var i = 0; i < conversions.length; i++) {
			tooltip_text += conversions[i].name + ": " + conversions[i].value;
			if (conversions[i].approx) {
				approx = true;
				tooltip_text += '*';
			}
			tooltip_text += "<br />";
		}
		if (approx) {
			tooltip_text += "<i>* Approximate</i>";
		}

		var infoWrap = $('<div class="quicklook">' + tooltip_text + '</div>');
		infoWrap.appendTo('body');
		var offsetPos = $(this).offset();
		var top = offsetPos.top;
		var left = offsetPos.left + 25;

		top = top - (infoWrap.height()/2) + 8;

		if (left + infoWrap.width() > 1150) left = left - infoWrap.width() - 40;
		infoWrap.css({'position': 'absolute', 'top': top + "px", 'left': left + "px"});
		infoWrap.fadeIn('fast');

	}, function(e) {
		$('body > div:last').remove();
	});
}

function OphCoCataractReferral_VisualAcuity_getNextKey() {
	var keys = $('.visualAcuityReading').map(function(index, el) {
		return parseInt($(el).attr('data-key'));
	}).get();
	if(keys.length) {
		return Math.max.apply(null, keys) + 1;
	} else {
		return 0;
	}
}

function OphCoCataractReferral_VisualAcuity_addReading(side) {
	var template = $('#visualacuity_reading_template').html();
	var data = {
		"key" : OphCoCataractReferral_VisualAcuity_getNextKey(),
		"side" : (side == 'right' ? 0 : 1)
	};
	var form = Mustache.render(template, data);
	$('.element[data-element-type-class="Element_OphCoCataractReferral_VisualAcuity"] .element-eye.'+side+'-eye .noReadings').hide();
	var table = $('.element[data-element-type-class="Element_OphCoCataractReferral_VisualAcuity"] .element-eye[data-side="'+side+'"] table');
	table.show();
	var nextMethodId = OphCoCataractReferral_VisualAcuity_getNextMethodId(side);
	$('tbody', table).append(form);
	$('.method_id', table).last().val(nextMethodId);

	OphCoCataractReferral_VisualAcuity_ReadingTooltip(table.find('tr').last());

}

/**
 * Which method ID to preselect on newly added readings.
 * Returns the next unused ID.
 * @param side
 * @returns integer
 */
function OphCoCataractReferral_VisualAcuity_getNextMethodId(side) {
	var method_ids = OphCoCataractReferral_VisualAcuity_method_ids;
	$('#event-content .Element_OphCoCataractReferral_VisualAcuity [data-side="' + side + '"] .method_id').each(function() {
		var method_id = $(this).val();
		method_ids = $.grep(method_ids, function(value) {
			return value != method_id;
		});
	});
	return method_ids[0];
}

function OphCoCataractReferral_VisualAcuity_bestForSide(side) {
	var table = $('#event-content .Element_OphCoCataractReferral_VisualAcuity [data-side="' + side + '"] table');
	if (table.is(':visible')) {
		var best = 0;
		table.find('tr .va-selector').each(function() {
			if (parseInt($(this).val()) > best) {
				best = parseInt($(this).val());
			}
		});
		return best;
	}
	return null;
}

function OphCoCataractReferral_VisualAcuity_init() {
	// ensure tooltip works when loading for an edit
	$('#event-content .Element_OphCoCataractReferral_VisualAcuity .side').each(function() {
		$(this).find('tr.visualAcuityReading').each(function() {
			OphCoCataractReferral_VisualAcuity_ReadingTooltip($(this));
		});
	});
}
