/*
 ***************************************************************************
 *	Contact Us JS
 ***************************************************************************
*/
if($("#Contact_us").length > 0) {
	var schoolDistrictOptions = '';
	var SFDCAccountID = new Array();
	var mdrPid = new Array();

	var elqPPS = '70';
	window.onload = initPage;
	function initPage(){
		if (this.GetElqCustomerGUID) {
			document.forms["Contact_us"].elements["elqCustomerGUID"].value = GetElqCustomerGUID();			
		}
	}

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

	jQuery.validator.addMethod('zip', function(value, element) {

		var us_re = /^([0-9]{5})-?([0-9]{4})?$/;
		var ca_re = /^([A-Za-z]{1}[0-9]{1}){3}$/;

		if (us_re.test(value)) {
			console.log("yep");
			if (value.length === 9 && value.search("-") === -1) {
				var formattedZip9 = value.replace(us_re, "$1-$2");
				$('#C_Zip').val(formattedZip9);
			}
			$.getJSON('http://api.zippopotam.us/us/'+value.slice(0,5), function(data) {
				var places = data['places'][0]
				$('#C_Mailing_City11').val(places['place name']);
				$("#C_State_Prov option[value="+places['state abbreviation']+"]").attr('selected','selected');
				$("#C_Country option[value='United States']").attr('selected','selected');
				console.log(data.places['place name']);
				console.log(data);
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

	jQuery.validator.addMethod("schoolsDistrictsReturn", function(postalcode, element) {
		var isSuccess = false;
		var postalcodeEncoded = base64_encode(""+String(postalcode)+"");
		$.ajax({ url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/utils/sfdcCustomer-json.php", 
			data: "zipCode="+postalcodeEncoded,
			dataType: "json",
			async: false, 
			success: 
				function(data) {
					//isSuccess = (!(typeof data === "undefined") && (data.length > 0)) ? true : false;
					//return success always instead, regardless of schools not found, succeed as long as valid zip
					$('#zipLookupImg').show();
					isSuccess = true;
					var selectObj;
					var options = '<option value="" selected="selected">-Select-</option>';
					for(selectObj in data) {
						var value = data[selectObj][0];
						options += '<option value="' + value + '">' + value + '</option>';
						SFDCAccountID[value] = data[selectObj][1];
						mdrPid[value] = data[selectObj][2];
					}	
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
					// console.log("fail");
					// console.log(data);
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

	$(document)
	.ready(function(){
		//$('ol#vs-form li').length === $('ol#vs-form li.valid').length
		$('ol#vs-form li input').blur(function(e) {
			console.log(e);
		});
	})
	.ajaxStart(function() {
		$("#ajaxSpinner").show()
	})
	.ajaxStop(function() {
		$("#ajaxSpinner").hide()
	});

	$("#Contact_us").validate({
		validClass: "valid",
		errorClass: "error",
		//onsubmit: geoRecord.country_code !== 'US',
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
				phone: {
					depends: function(element) {
						return geoRecord.country_code === 'US';
					}
				}
			},
			C_Zip: {
				required: true,
				zip: {
					depends: function(element) {
						return geoRecord.country_code === 'US';
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
				minlength: "First name must contain more characters",
				maxlength: "First name can not exceed 24 characters"
			},
			C_LastName: {
				required: 'Last name <span class="req">required</span>',
				minlength: "Last name must contain more characters",
				maxlength: "Last name can not exceed 24 characters"
			},
			C_EmailAddress: {
				required: "Email",
				email: 'Email <span class="req">required</span>'
			},
			C_BusPhone: {
				required: 'Phone <span class="req">required</span>'
			},
			C_Zip: {
				required: 'Postal code <span class="req">required</span>'
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