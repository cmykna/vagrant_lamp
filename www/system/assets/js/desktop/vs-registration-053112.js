/*
 ***************************************************************************
 *	VS Registration JS
 ***************************************************************************
*/
var elqPPS = '70';
window.onload = initPage;
function initPage(){
	if (this.GetElqCustomerGUID) {
		document.forms["Vs_registration"].elements["elqCustomerGUID"].value = GetElqCustomerGUID();			
	}
}

if($("#Vs_registration").length > 0) { 

	var schoolDistrictOptions = '';
	var SFDCAccountID = new Array();
	var sfdcCustomerId = new Array();
	var mdrPid = new Array();

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
	//
	jQuery.validator.addMethod('zip', function(value, element) {

		var us_re = /^([0-9]{5})-?([0-9]{4})?$/;
		var ca_re = /^([A-Za-z]{1}[0-9]{1}){3}$/;

		if (us_re.test(value)) {
			if (value.length === 9 && value.search("-") === -1) {
				var formattedZip9 = value.replace(us_re, "$1-$2");
				$('#C_Zip').val(formattedZip9);
			}
			$.getJSON('http://api.zippopotam.us/us/'+value.slice(0,5), function(data) {
				var places = data['places'][0]
				$('#C_Mailing_City11').val(places['place name']);
				$("#C_State_Prov option[value="+places['state abbreviation']+"]").attr('selected','selected');
				$("#C_Country option[value='United States']").attr('selected','selected');
			});
			return true;
		} else if (ca_re.test(value)) {
			var formattedCAPostalCode = value.replace(/^(\w{3})(\w{3})/, "$1 $2").toUpperCase();
			$('#C_Zip').val(formattedCAPostalCode);
			$.getJSON('http://api.zippopotam.us/ca/'+value.toUpperCase().slice(0,3), function(data) {
				$('#C_Mailing_City11').val(data['place name']);
				$("#C_State_Prov option[value="+data['state abbreviation']+"]").attr('selected','selected');
				$("#C_Country option[value='Intl']").attr('selected','selected');
			});
			return true;
		} else {
			console.log("nope");
			return false;
		}

	}, 'Zip code <span class="req">required</span>');
	//
	jQuery.validator.addMethod("valueNotEquals", function(value) {
		if (window.schoolDistrictOptions != "") {
			if (value != "") {
				//so we don't add multiples (may not exist)
				jQuery("#sfdcCustomerId").remove();
				jQuery("#mdrPid").remove();
				//add hidden input fields
				if (sfdcCustomerId[value] !== undefined && mdrPid !== undefined) {
					jQuery("#sfdccampaignid").after("<input type=\"hidden\" id=\"mdrPid\" name=\"mdrPid\" value=\"" + mdrPid[value] + "\" />");
					jQuery("#sfdccampaignid").after("<input type=\"hidden\" id=\"sfdcCustomerId\" name=\"sfdcCustomerId\" value=\"" + sfdcCustomerId[value] + "\" />");						
				} else {
					jQuery("#sfdccampaignid").after("<input type=\"hidden\" id=\"mdrPid\" name=\"mdrPid\" value=\"\" />");
					jQuery("#sfdccampaignid").after("<input type=\"hidden\" id=\"sfdcCustomerId\" name=\"sfdcCustomerId\" value=\"\" />");				
				}
			}
		}
		return value != "";
	}, "Please enter your school or district");
	//
	jQuery.validator.addMethod("ifCountryRequired", function(value) {
		if ($("#location_select").val() == "international") {
			return $("#C_Country").val() != "";
		} else {
			return true;
		}
	}, "Please select your country");
	//
	jQuery.validator.addMethod("newCodeFromState", function(value) {
		window.stateBrowsingFrom = value;
		var campaignCodeEncoded = base64_encode(""+String(window.campaignCode)+"");
		var stateEncoded = base64_encode(""+String(window.stateBrowsingFrom)+"");
		if (!(typeof campaignCodeEncoded === "undefined") && (campaignCodeEncoded.length > 0)) {
			if (!(typeof stateEncoded === "undefined") && (stateEncoded.length > 0)) {
				console.log('campaignCodeEncoded');
				console.log(campaignCodeEncoded);
				console.log('stateEncoded');
				console.log(stateEncoded);
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
		return true;
	});
	//
jQuery.validator.addMethod("schoolsDistrictsReturn", function(postalcode, element) {
		var isSuccess = false;
		var postalcodeEncoded = base64_encode(""+String(postalcode)+"");
		console.log('begin schoolsDistrictsReturn');
		$.ajax({ url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/utils/sfdcCustomer-json.php", 
			data: "zipCode="+postalcodeEncoded,
			dataType: "json",
			async: false, 
			success: 
				function(data) {
					//isSuccess = (!(typeof data === "undefined") && (data.length > 0)) ? true : false;
					//return success always instead, regardless of schools not found, succeed as long as valid zip
					isSuccess = true;
					console.log("got it");
					var selectObj;

					var options = '<option value="" selected="selected">-Select-</option>';
					for(selectObj in data) {
						console.log("loop");
						var value = data[selectObj][0];
						options += '<option value="' + value + '">' + value + '</option>';
						SFDCAccountID[value] = data[selectObj][1];
						mdrPid[value] = data[selectObj][2];
					}
					console.log("window.schoolDistrictOptions: "+window.schoolDistrictOptions);			
					options += '<option value="Homeschool">Homeschool</option>';
					options += '<option value="Not Listed">-- Not Listed --</option>';
					if (window.schoolDistrictOptions != options) {
						$("select#C_SchoolDistrict").html(options);
					}
					$("select#C_SchoolDistrict").prop("disabled", false);
					$('#school-district').removeClass("disabled");
					$('select#C_SchoolDistrict').html(options);
					// $('#school-district').css('display','block');
					$("select#C_SchoolDistrict").parent().closest('div').removeClass("validClass").addClass("errorClass");
					// remove 'disabled' after school or district is selected.
					$('li#submit button').removeClass('disabled');
					$('li#submit button').removeProp('disabled');
					window.schoolDistrictOptions = options;
					console.log("window.schoolDistrictOptions: "+window.schoolDistrictOptions);
				},
			error:
				function(data, textStatus, errorThrown) {
					//return success always, regardless of schools not found, or request error for schools, succeed as long as valid zip
					isSuccess = true;
					<?php if ($_SERVER['HTTP_HOST'] == "int.hmheducation.com") { ?>error('/utils/sfdcCustomer-json.php');
					error('data');
					error(data);
					error('textStatus '+textStatus+' errorThrown '+errorThrown);<?php } ?>
					/*
					var options = '';
					$("select#SchoolOrDistrict").html(options);
					$("select#SchoolOrDistrict").prop("disabled", true);
					$('#school-district').css('display','none');
					window.schoolDistrictOptions = options;
					*/
					console.log("fail");
					// console.log(data);
					console.log("textstatus: "+textStatus+"\nerrorThrown: "+errorThrown);
					var options = '<option value="" selected="selected">-- Please Select School/District --</option>';
					options += '<option value="Homeschool">Homeschool</option>';
					options += '<option value="Not Listed">Not Listed</option>';
					if (window.schoolDistrictOptions != options) {
						$("select#C_SchoolDistrict").html(options);
					}
					$("select#C_SchoolDistrict").prop("disabled", false);
					$('#school-district').removeClass("disabled");
					$('li#submit button').removeProp('disabled');
					$("select#C_SchoolDistrict").parent().closest('div').removeClass("validClass").addClass("errorClass");
					$('li#submit button').removeClass('disabled');
					$('li#submit button').removeProp('disabled');
					window.schoolDistrictOptions = options;
				},
			complete: 
				function() {
					$("#zipLookupImg").hide();
				}
		});
		return isSuccess;
	}, "Zip has no Districts or Schools");
		
	$(document).ready(function() {
		//
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
		//
		$("#location_select").change(function() {
			if ($("#location_select").val() == "") {
				$('.supplementalField').addClass('notVisible');
			} else {
				if ($("#location_select").val() == "international") {
					setupInternational();
				}
				if ($("#location_select").val() == "us") {
					setupUS();
				}
			}
		});
		//
		$("select#C_Company").change(function() {
			if($('select#C_Company option:selected').val() == "") {
				$("select#C_Company").parent().closest('li').removeClass("valid").addClass("error");
			} else {
				$("select#C_Company").parent().closest('li').addClass("valid").removeClass("error");
			}
		});
		
	}).ajaxStart(function() {
		$("#ajaxSpinner").show()
	})
	.ajaxStop(function() {
		$("#ajaxSpinner").hide()
	});
		

	$("#Vs_registration").validate({
		validClass: "valid",
		errorClass: "error",
		onsubmit: false,
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
						return geoRecord.country_code === 'US' && !($('#zip').attr("class") === "valid");
					}
				},
				schoolsDistrictsReturn: {
					depends: function(element) {
						return geoRecord.country_code === 'US' && $('select#C_SchoolDistrict').prop("disabled");
					}
				}
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
}