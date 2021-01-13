$(document).ready(function(){
	$('#dialog-message2').hide();
	$("#closemont").submit(function(e) {
		e.preventDefault();

		var self = this,
			yes = $('input[name=yes]').val();

		$.ajax({
			type: "POST",
			url: "../include/salprefix.php",
			data: {check_closemonth_approval: yes},
			//cache: false
		}).done(function(result) {
			if (result == "YES") 
			{
				$( "#dialog-confirm" ).dialog({
					resizable: false,
					height: "auto",
					width: 400,
					modal: true,
					buttons: {
						"YES": function() {
							$( this ).dialog( "close" );
							self.submit();
							$("#hideform").hide();
						},
						Cancel: function() {
							$( this ).dialog( "close" );
						}
					}
				});
			}
			else {
				document.getElementById("msg").innerHTML = result;
				$( "#dialog-message1" ).dialog({
					modal: true,
					buttons: {
						Ok: function() {
							$( this ).dialog( "close" );
						}
					}
				});
			}
		}).fail(function() {
			alert("Error!!");
		});
	});
	$("#salaprov").submit(function(e) {
		e.preventDefault();

		var self = this,
			yes = $('input[name=yes]').val();

		$.ajax({
			type: "POST",
			url: "../include/salprefix.php",
			data: {check_salary_approval: yes},
			//cache: false
		}).done(function(result) {
			if (result == "YES") 
			{
				$( "#dialog-confirm" ).dialog({
					resizable: false,
					height: "auto",
					width: 400,
					modal: true,
					buttons: {
						"YES": function() {
							$( this ).dialog( "close" );
							self.submit();
							$("#hideform").hide();
						},
						"NO": function() {
							$( this ).dialog( "close" );
						}
					}
				});
			}
			else {
				document.getElementById("msg").innerHTML = result;
				$( "#dialog-message1" ).dialog({
					modal: true,
					buttons: {
						Ok: function() {
							$( this ).dialog( "close" );
						}
					}
				});
			}
		}).fail(function() {
			alert("Error!!");
		});
	});
	$('#dialog-confirm').hide();
	$('#dialog-message1').hide();
	$.ajax({
			type: 'post',
			url: '../include/salprefix.php',
			data:'get_option='+$('#category').val(),
			success: function (response) {
				$('#salprefix').val(response);
			}
	});
	$('#house').change (function (){
		var house = document.getElementById("house").value;
		if (house == 'NO')
		{
			$('#salprefix').val('');
		}
	});
	//cateory change affects the salary level in editstaff.php
	$('#category').change (function (){
		$.ajax({
			type: 'post',
			url: '../include/salprefix.php',
			data:'get_option='+$(this).val(),
			success: function (response) {
				$('#salprefix').val(response).trigger('change');
			}
		});
		$('.hide-option').hide();
	});
	//this is efeected in newstaff.php where units appear
	$('#salprefix').change (function (){
		$.ajax({
			type: 'post',
			url: '../include/salprefix.php',
			data:'get_units='+$(this).val(),
			success: function (response) {
				$('#unit').html(response);
			}
		});
	});
	$("#hide-form").hide();
	$('#searchstaff').attr('disabled','disabled');
	$('#frmSearch').submit(function(e){
		e.preventDefault(); // Prevent Default Submission
		$.post("../include/salprefix.php", $(this).serialize() )
		.done(function(data){
		})
		.fail(function(){
			alert('Ajax Submit Failed ...');
			$('#searchstaff').attr('disabled','disabled');
		});
	});
	$('.sallev').change (function (){
		var x = document.getElementById("salprefix").value + document.getElementById("level").value + 
				'/' + document.getElementById("step").value;
		$("#sscale").val(x);
	});
	//fullname changes in realtime when either ther first, middle or last name is changed in editstaff.php
	$('.fullname').change (function (){
		var x = document.getElementById("title").value + ' ' + document.getElementById("sname").value + 
				' ' + document.getElementById("fname").value + ' ' + document.getElementById("mname").value;
		$("#fullname").val(x);
	});
	$('#submitmonth').attr('disabled','disabled');
	$('#mno').change (function (){
		$.ajax({
			type: "POST",
			url: "../include/salprefix.php",
			data:'check_monthid='+$(this).val(),
			dataType: 'json',
			success: function(data){
				if(data[0] != '')
				{
					document.getElementById("sterror").innerHTML = data[1];
					$("#month").val(data[2]);
					$("#bdate").val(data[3]);
					$("#edate").val(data[4]);
					$("#ymt").val(data[5]);
					$("#ndays").val(data[6]);
					$("#year").val(data[7]);
				}
				else{
					document.getElementById("sterror").innerHTML = data[1];
					$("#month").val(data[2]);
					$("#bdate").val(data[3]);
					$("#edate").val(data[4]);
					$("#ymt").val(data[5]);
					$("#ndays").val(data[6]);
					$("#year").val(data[7]);
					$('input[type="submit"]').removeAttr('disabled');
				}
			}
		});
	});
	$(function() {
		$( "#dialog-message" ).dialog({
			modal: true,
			buttons: {
				Ok: function() {
					$( this ).dialog( "close" );
				}
			}
		});
		function log( message ) {
			$('#submitname').val(message);
			$("form[name='formsearch']").submit();	
		}
		// Initialize form validation on the registration form.
		// It has the name attribute "registration"
		$("form[name='severanceform']").validate({
			// Specify validation rules
			rules: {
				// The key name on the left side is the name attribute
				// of an input field. Validation rules are defined
				// on the right side
			},
			// Specify validation error messages
			messages: {
				// Make sure the form is submitted to the destination defined
				// in the "action" attribute of the form when valid
				submitHandler: function(form) {
					form.submit();
				}
			}
		});
		$("form[name='vadform']").validate({
			// Specify validation rules
			rules: {
				// The key name on the left side is the name attribute
				// of an input field. Validation rules are defined
				// on the right side
				refn: "required",
				principal: "required",
				installment: "required"
			},
			// Specify validation error messages
			messages: {
				refno:	"Please enter the reference number",
				principal: "Please enter the principal",
				installment: "Please enter the installment",
			  
				// Make sure the form is submitted to the destination defined
				// in the "action" attribute of the form when valid
				submitHandler: function(form) {
					form.submit();
				}
			}
		});
		$("form[name='advform']").validate({
			// Specify validation rules
			rules: {
				// The key name on the left side is the name attribute
				// of an input field. Validation rules are defined
				// on the right side
				principal: "required",
				installment: "required",
				dresume: "required"
			},
			// Specify validation error messages
			messages: {
				principal: "Please enter the principal",
				installment: "Please enter the installment",
				dresume: "Please enter the correct date",
				
				// Make sure the form is submitted to the destination defined
				// in the "action" attribute of the form when valid
				submitHandler: function(form) {
					form.submit();
				}
			}
		});
		
			jQuery.validator.addMethod("date", function(value, element) {
				return this.optional(element) || date.match(/^\d{4}-((0\d)|(1[012]))-(([012]\d)|3[01])$/);
			}, "Please input correct date");
			jQuery.validator.classRuleSettings.date = { date: true };
		$("form[name='staffreg']").validate({
			// Specify validation rules
			rules: {
				// The key name on the left side is the name attribute
				// of an input field. Validation rules are defined
				// on the right side
				fname: "required",
				sname: "required",
				dresume: "required"
			},
			// Specify validation error messages
			messages: {
				fname: "Please enter your firstname",
				sname: "Please enter your lastname",
				dresume: "Please enter the correct date",
				// Make sure the form is submitted to the destination defined
				// in the "action" attribute of the form when valid
				submitHandler: function(form) {
					form.submit();
				}
			}
		});
	});
});