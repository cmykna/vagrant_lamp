/*
 ***************************************************************************
 *	Form JS
 ***************************************************************************
*/
var elqPPS = '70';
function initPage(){
	if (this.GetElqCustomerGUID) {
		document.forms["<?php echo $theForm; ?>"].elements["elqCustomerGUID"].value = GetElqCustomerGUID();			
	}
}
window.onload = initPage;
var schoolDistrictOptions = '';
var SFDCAccountID = new Array();
var mdrPid = new Array();
var theForm = function() {
	if (window.location.pathname.match('vs-registration')) {
		return {
			formId: "Vs_registration",
			elqName: "Vs_form",
			button: "Sample Now"
		};
	} else if (window.location.pathname.match('contact-us')) {
		return {
			formId: "Contact_us",
			elqName: "Contact_form",
			button: "Contact Us"
		};	
	}
}();
/**************************************************************************
*	Begin custom validator methods
**************************************************************************/
// Validate and format US phone numbers.
jQuery.validator.addMethod('phone', function(value) {
	// Only validating US phone numbers.
	var re = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;

	if (re.test(value)) {
		var formattedPhoneNumber = value.replace(re, "($1) $2-$3");
		$('#C_BusPhone').val(formattedPhoneNumber);
		return true;
	} else {
		return false;
	}
}, 'Phone <span class="req">required</span>');

// Validate US zip codes
jQuery.validator.addMethod('zip', function(value, element) {

	var us_re = /^([0-9]{5})-?([0-9]{4})?$/;
	var ca_re = /^([A-Za-z]{1}[0-9]{1}){3}$/;

	if (us_re.test(value)) {
		if (value.length === 9 && value.search("-") === -1) {
			var formattedZip9 = value.replace(us_re, "$1-$2");
			$('#C_Zip').val(formattedZip9);
		}
		// $.getJSON('http://api.zippopotam.us/us/'+value.slice(0,5), function(data) {
		// 	var places = data['places'][0]
		// 	$('#C_Mailing_City11').val(places['place name']);
		// 	$("#C_State_Prov option[value="+places['state abbreviation']+"]").attr('selected','selected');
		// 	$("#C_Country option[value='United States']").attr('selected','selected');
		// });
		return true;
	} else if (ca_re.test(value)) {
		var formattedCAPostalCode = value.replace(/^(\w{3})(\w{3})/, "$1 $2").toUpperCase();
		$('#C_Zip').val(formattedCAPostalCode);
		// $.getJSON('http://api.zippopotam.us/ca/'+value.toUpperCase().slice(0,3), function(data) {
		// 	$('#C_Mailing_City11').val(data['place name']);
		// 	$("#C_State_Prov option[value="+data['state abbreviation']+"]").attr('selected','selected');
		// 	$("#C_Country option[value='Intl']").attr('selected','selected');
		// });
		return true;
	} else {
		return false;
	}
}, 'Zip code <span class="req">required</span>');

// Add hidden fields for mdrPid and sfdcCustomerId.
jQuery.validator.addMethod("valueNotEquals", function(value) {
	if (window.schoolDistrictOptions != "") {
		if (value != "") {
			//so we don't add multiples (may not exist)
			jQuery("#SFDCAccountID").remove();
			jQuery("#mdrPid").remove();
			//add hidden input fields
			if (SFDCAccountID[value] !== undefined && mdrPid !== undefined) {
				jQuery("#sfdccampaignid").after("<input type=\"hidden\" id=\"mdrPid\" name=\"mdrPid\" value=\"" + mdrPid[value] + "\" />");
				jQuery("#sfdccampaignid").after("<input type=\"hidden\" id=\"SFDCAccountID\" name=\"SFDCAccountID\" value=\"" + SFDCAccountID[value] + "\" />");						
			} else {
				jQuery("#sfdccampaignid").after("<input type=\"hidden\" id=\"mdrPid\" name=\"mdrPid\" value=\"\" />");
				jQuery("#sfdccampaignid").after("<input type=\"hidden\" id=\"SFDCAccountID\" name=\"SFDCAccountID\" value=\"\" />");				
			}
		}
	}
	return value != "";
}, "Please enter your school or district");

/***************************************************************************
*	End custom validator methods
***************************************************************************/

/***************************************************************************
*	Begin DOM manipulation functions
***************************************************************************/

function resetTabIndex() {
	var formElements = $('#vs-form li label').next();
	var formLength = formElements.length
	for (i = 0; i < formLength; i++) {
		$(formElements[i]).attr('tabindex', i+1);
	}
	$('#submit').attr('tabindex', formLength+1);
}

function initUs() {
	var districtSelect = [
		'<label for="C_SchoolDistrict">School or District <span class="req">required</span></label>',
		'<select name="C_SchoolDistrict" id="C_SchoolDistrict" size="1" tabindex="10" disabled>',
		'<option value="" selected="selected">-Select-</option>',
		'</select>'
	].join("\n");
	var ccode = geoRecord.country_code.toLowerCase();
	var geoState = geoRecord.region;
	$('form#'+theForm.formId).attr('name', theForm.elqName+'_domestic');
	$('#C_Zip').val('');
	$('#C_State_Prov').val(geoState);
	$('input[name=elqFormName]').attr('value', theForm.elqName+'_domestic');
	$('#C_EmailAddress').focus();
	$('#C_Location option[value="us"]').prop('selected', true);
	$('#C_Country option[value='+ccode+']').prop('selected',true);
	$('#country').hide();
	$('#state').show();
	$('#zip').show();
	$('#school-district').addClass('disabled').html(districtSelect);
	$('#job-role').insertBefore($('#phone-number'));
	$('.spacer').hide();
	resetTabIndex();
}

function initIntl() {
	var districtText = [
		'<label for="C_SchoolDistrict">School or District <span class="req">required</span></label>',
		'<input type="text" name="C_SchoolDistrict" id="C_SchoolDistrict" size="31" tabindex="5">'
	].join("\n");
	var ccode = geoRecord.country_code.toLowerCase();
	$('form#'+theForm.formId).attr('name', theForm.elqName+'_intl');
	$('#C_Zip').val('');
	$('#C_State_Prov').val('');
	$('input[name=elqFormName]').attr('value', theForm.elqName+'_intl');
	$('#C_EmailAddress').focus();
	$('#C_Location option[value="international"]').prop('selected', true);
	$('#C_Country option[value='+ccode+']').prop('selected',true);
	$('#state').hide();
	$('#zip').hide();
	$('#country').show();
	$('#school-district').removeClass('disabled').html(districtText);
	$('#phone-number').insertBefore($('#job-role'));
	$('.spacer').show();
	resetTabIndex();
}
/***************************************************************************
*	End DOM manipulation functions
***************************************************************************/

$(document).ready(function() {

	// If the user is browsing from a state that has a state-specific
	// campaign code for this campaign, convert #C_Campaign11's value
	// from the nat'l campaign code to the state campaign code.
	var campaignCodeEncoded = base64_encode(""+String(window.campaignCode)+"");
	var stateEncoded = base64_encode(""+String(window.stateBrowsingFrom)+"");

	if (!(typeof campaignCodeEncoded === "undefined") && (campaignCodeEncoded.length > 0)) {
		if (!(typeof stateEncoded === "undefined") && (stateEncoded.length > 0)) {
			$.ajax({ url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/utils/nationalCodeAndStateToCampaignCode.php", 
				data: "campaignCode="+campaignCodeEncoded+"&state="+stateEncoded,
				dataType: "json",
				async: false, 
				success: 
					function(data) {
						if (data !== null) {
							if (!(typeof data['campaignCode'] === "undefined") && (data['campaignCode'].length > 0)) {
								jQuery("#C_Campaign11").val(data['campaignCode']);
							}
						} else {
							jQuery("#C_Campaign11").val(String(window.campaignCode));
						}
					}
			});
		}
	}

	// Initialize form fields based on geoIP lookup data.
	if (geoRecord.country_code === 'US') {
		initUs();
	} else {
		initIntl();
	}

	// Allow the user to swap between domestic and int'l forms
	// via the #location dropdown.
	$('#location').change(function() {
		var loc = $('#location option:selected').val();
		if (loc === 'us') {
			initUs();
		} else if (loc === 'international') {
			initIntl();
		}
	});

	// Trigger enabling of Submit button on #job-role change
	// in int'l form.
	$('#job-role').change(function() {
		var loc = $('#location option:selected').val();
		if (loc === 'international') {
			$('li#submit button').removeClass('disabled');
			$('li#submit button').removeProp('disabled');
		}
	});

	$("select#C_Company").change(function() {
		if($('select#C_Company option:selected').val() == "") {
			$("select#C_Company").parent().closest('li').removeClass("valid").addClass("error");
		} else {
			$("select#C_Company").parent().closest('li').addClass("valid").removeClass("error");
		}
	});

	// Moving SF lookup to input change event instead of validation. This prevents the validation
	// from re-running the lookup on submit and blasting the value the user selected.
	$('#C_Zip').change(function() {
		// Make sure we're looking up a 5-digit zip, as the SOAP service will happily send us 
		// looooong responses on even a single digit.
		var zip = $(this).val();
		var zip_re = /^([0-9]{5})$/;
		var populateAndEnable = function(options) {
			if (window.schoolDistrictOptions != options) {
				$("select#C_SchoolDistrict").html(options);
			}
			$("select#C_SchoolDistrict").prop("disabled", false);
			$('#school-district').removeClass("disabled");
			$("select#C_SchoolDistrict").parent().closest('div').removeClass("validClass").addClass("errorClass");
			$('li#submit button').removeClass('disabled');
			$('li#submit button').removeProp('disabled');
			window.schoolDistrictOptions = options;
			$("select#C_SchoolDistrict").focus();
		};
		if (zip_re.test(zip)) {
			$.ajax({ url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/utils/sfdcCustomer-json.php", 
			data: "zipCode="+base64_encode($(this).val().toString()),
			dataType: "json",
			async: false, 
			success: 
				function(data) {
					//return success always instead, regardless of schools not found, succeed as long as valid zip
					isSuccess = true;
					var options = '<option value="" selected="selected">-Select-</option>';
					for(var selectObj in data) {
						var value = data[selectObj][0];
						options += '<option value="' + value + '">' + value + '</option>';
						SFDCAccountID[value] = data[selectObj][1];
						mdrPid[value] = data[selectObj][2];
					}		
					options += '<option value="Homeschool">Homeschool</option>';
					options += '<option value="Not Listed">-- Not Listed --</option>';
					populateAndEnable(options);
				},
			error:
				function(data, textStatus, errorThrown) {
					//return success always, regardless of schools not found, or request error for schools, succeed as long as valid zip
					isSuccess = true;
					<?php if ($_SERVER['HTTP_HOST'] == "int.hmheducation.com") { ?>error('/utils/sfdcCustomer-json.php');
					error('data');
					error(data);
					error('textStatus '+textStatus+' errorThrown '+errorThrown);<?php } ?>
					var options = '<option value="" selected="selected">-- Please Select School/District --</option>';
					options += '<option value="Homeschool">Homeschool</option>';
					options += '<option value="Not Listed">Not Listed</option>';
					populateAndEnable(options);
				},
			complete: 
				function() {
					$("#zipLookupImg").hide();
				}
			});
		}
	});
	
}).ajaxStart(function() {
	$("#ajaxSpinner").show()
})
.ajaxStop(function() {
	$("#ajaxSpinner").hide()
});
	
$("#"+theForm.formId).validate({
	validClass: "valid",
	errorClass: "error",
	ignore: ".ignore",
	rules: {
		C_FirstName: {
			required: true,
			minlength: 2,
			maxlength: 24
		},
		C_LastName: {
			required: true,
			minlength: 2,
			maxlength: 24
		},
		C_EmailAddress: {
			required: true,
			email: true
		},
		C_BusPhone: {
			required: true,
			phone: true
		},
		C_Zip: {
			required: true,
			zip: {
				depends: function(element) {
					return geoRecord.country_code === 'US';
				}
			}
		},
		C_SchoolDistrict: {
			valueNotEquals: true
		},
		C_Mailing_City11: {
			required: true
		},
		C_State_Prov: {
			required: true
		},
		C_Country: {
			required: true
		},
		C_Company: {
			required: true
		},
		C_Job_Role1: {
			required: true
		},
		C_Special_Requests1: {
			required: false
		}
	},
	messages: {
		C_FirstName: {
			required: 'First name <span class="req">required</span>',
			minlength: '<span class="msg">Last name must contain more characters</span>',
			maxlength: '<span class="msg">Last name can not exceed 24 characters</span>'
		},
		C_LastName: {
			required: 'Last name <span class="req">required</span>',
			minlength: '<span class="msg">Last name must contain more characters</span>',
			maxlength: '<span class="msg">Last name can not exceed 24 characters</span>'
		},
		C_EmailAddress: {
			required: "Email address",
			email: 'Email address <span class="req">required</span>'
		},
		C_BusPhone: {
			required: 'Phone number <span class="req">required</span>'
		},
		C_Zip: {
			required: 'Zip code <span class="req">required</span>'
		},
		C_Mailing_City11: {
			required: 'City <span class="req">required</span>'
		},
		C_Special_Requests1: {
			required: 'Please enter your request <span class="req">required</span>'
		},
		C_State_Prov: {
			required: 'State <span class="req">required</span>'
		},
		C_Country: {
			required: 'Country <span class="req">required</span>'
		},
		C_Company: {
			required: 'School or district <span class="req">required</span>'
		},
		C_Job_Role1: {
			required: 'Role <span class="req">required</span>'
		}
	},
	highlight: function(element, errorClass, validClass) {
		$(element).parent().closest('li').removeClass(validClass).addClass(errorClass);
	},
	unhighlight: function(element, errorClass, validClass) {
		$(element).parent().closest('li').removeClass(errorClass).addClass(validClass);
	}
});
