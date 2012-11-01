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

	function utf8_encode (argString) {
		// Encodes an ISO-8859-1 string to UTF-8  
		// 
		// version: 1109.2015
		// discuss at: http://phpjs.org/functions/utf8_encode
		// +   original by: Webtoolkit.info (http://www.webtoolkit.info/)
		// +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
		// +   improved by: sowberry
		// +    tweaked by: Jack
		// +   bugfixed by: Onno Marsman
		// +   improved by: Yves Sucaet
		// +   bugfixed by: Onno Marsman
		// +   bugfixed by: Ulrich
		// +   bugfixed by: Rafal Kukawski
		// *     example 1: utf8_encode('Kevin van Zonneveld');
		// *     returns 1: 'Kevin van Zonneveld'
		if (argString === null || typeof argString === "undefined") {
			return "";
		}
	 
		var string = (argString + ''); // .replace(/\r\n/g, "\n").replace(/\r/g, "\n");
		var utftext = "",
			start, end, stringl = 0;
	 
		start = end = 0;
		stringl = string.length;
		for (var n = 0; n < stringl; n++) {
			var c1 = string.charCodeAt(n);
			var enc = null;
	 
			if (c1 < 128) {
				end++;
			} else if (c1 > 127 && c1 < 2048) {
				enc = String.fromCharCode((c1 >> 6) | 192) + String.fromCharCode((c1 & 63) | 128);
			} else {
				enc = String.fromCharCode((c1 >> 12) | 224) + String.fromCharCode(((c1 >> 6) & 63) | 128) + String.fromCharCode((c1 & 63) | 128);
			}
			if (enc !== null) {
				if (end > start) {
					utftext += string.slice(start, end);
				}
				utftext += enc;
				start = end = n + 1;
			}
		}
	 
		if (end > start) {
			utftext += string.slice(start, stringl);
		}
	 
		return utftext;
	}
	//
	function base64_encode (data) {
		// Encodes string using MIME base64 algorithm  
		// 
		// version: 1109.2015
		// discuss at: http://phpjs.org/functions/base64_encode
		// +   original by: Tyler Akins (http://rumkin.com)
		// +   improved by: Bayron Guevara
		// +   improved by: Thunder.m
		// +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
		// +   bugfixed by: Pellentesque Malesuada
		// +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
		// +   improved by: Rafal Kukawski (http://kukawski.pl)
		// -    depends on: utf8_encode
		// *     example 1: base64_encode('Kevin van Zonneveld');
		// *     returns 1: 'S2V2aW4gdmFuIFpvbm5ldmVsZA=='
		// mozilla has this native
		// - but breaks in 2.0.0.12!
		//if (typeof this.window['atob'] == 'function') {
		//    return atob(data);
		//}
		var b64 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
		var o1, o2, o3, h1, h2, h3, h4, bits, i = 0,
			ac = 0,
			enc = "",
			tmp_arr = [];
	 
		if (!data) {
			return data;
		}
	 
		data = utf8_encode(data + '');
	 
		do { // pack three octets into four hexets
			o1 = data.charCodeAt(i++);
			o2 = data.charCodeAt(i++);
			o3 = data.charCodeAt(i++);
	 
			bits = o1 << 16 | o2 << 8 | o3;
	 
			h1 = bits >> 18 & 0x3f;
			h2 = bits >> 12 & 0x3f;
			h3 = bits >> 6 & 0x3f;
			h4 = bits & 0x3f;
	 
			// use hexets to index into b64, and append result to encoded string
			tmp_arr[ac++] = b64.charAt(h1) + b64.charAt(h2) + b64.charAt(h3) + b64.charAt(h4);
		} while (i < data.length);
	 
		enc = tmp_arr.join('');
		
		var r = data.length % 3;
		
		return (r ? enc.slice(0, r - 3) : enc) + '==='.slice(r || 3);
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

	jQuery.validator.addMethod('zip', function(value) {

		var us_re = /^([0-9]{5})-?([0-9]{4})?$/;
		var ca_re = /^([A-Za-z]{1}[0-9]{1}){3}$/;

		if (us_re.test(value)) {
			if (value.length === 9 && value.search("-") === -1) {
				var formattedZip9 = value.replace(us_re, "$1-$2");
				$('#C_Zip').val(formattedZip9);
			}
			$.getJSON('http://zippopotam.us/us/'+value.slice(0,5), function(data) {
				$('#C_Mailing_City11').val(data['place name']);
				$("#C_State_Prov option[value="+data['state abbreviation']+"]").attr('selected','selected');
				$("#C_Country option[value='United States']").attr('selected','selected');
			});
			return true;
		} else if (ca_re.test(value)) {
			var formattedCAPostalCode = value.replace(/^(\w{3})(\w{3})/, "$1 $2").toUpperCase();
			$('#C_Zip').val(formattedCAPostalCode);
			$.getJSON('http://zippopotam.us/ca/'+value.toUpperCase().slice(0,3), function(data) {
				$('#C_Mailing_City11').val(data['place name']);
				$("#C_State_Prov option[value="+data['state abbreviation']+"]").attr('selected','selected');
				$("#C_Country option[value='Intl']").attr('selected','selected');
			});
			return true;
		} else {
			return false;
		}

	}, 'Zip code <span class="req">required</span>');

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
					options += '<option value="Homeschool">Homeschool</option>';
					console.log(options);
					console.log(data)
					for(selectObj in data) {
						var value = data[selectObj][0];
						options += '<option value="' + value + '">' + value + '</option>';
						SFDCAccountID[value] = data[selectObj][1];
						mdrPid[value] = data[selectObj][2];
					}
					console.log("window.schoolDistrictOptions: "+window.schoolDistrictOptions);			
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
					console.log("textstatus: "+textStatus+"\nerrorThrown: "+errorThrown);
					var options = '<option value="" selected="selected">-- Please Select School/District --</option>';
					options += '<option value="Homeschool">Homeschool</option>';
					options += '<option value="Not Listed">Not Listed</option>';
					if (window.schoolDistrictOptions != options) {
						$("select#C_SchoolDistrict").html(options);
					}
					$("select#C_SchoolDistrict").prop("disabled", false);
					$('#school-district').removeClass("disabled");
					$("select#C_SchoolDistrict").parent().closest('div').removeClass("validClass").addClass("errorClass");
					$('li#submit button').removeClass('disabled');
					window.schoolDistrictOptions = options;
				},
			complete: 
				function() {
					$("#zipLookup").css("display", "none");
				}
		});
		return isSuccess;
	}, "Zip has no Districts or Schools");

	$(document).ready(function(){
		$('#C_FirstName').blur(function() {
			if ($('#C_FirstName').val().length <= 0) {
				$('#C_FirstName').parent().closest('li').addClass('errorClass');
			}
		});
	});



	$("#Contact_us").validate({
		validClass: "valid",
		errorClass: "error",
		debug: true,
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
				zip: true,
				schoolsDistrictsReturn: true
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