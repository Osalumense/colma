$(document).ready(function(){
	$.ajax({
		type: 'post',
		url: '../include/appajax.php',
		data: {loadtitles:'loadtitles'},
		dataType: 'json',
		success: function(results){
			$("#title").append("<option value = '' selected></option>");
			for(var result in results){
				//console.log(results[result].title)
				$("#title").append("<option value = '" + results[result].titleid + "'>"+ results[result].fulltitle +"</option>");
			}
		}
	});
	$.ajax({
		type: 'post',
		url: '../include/appajax.php',
		data: {loadgender:'loadgender'},
		dataType: 'json',
		success: function(results){
			$("#gender").append("<option value = '' selected></option>");
			for(var result in results){
				//console.log(results[result].title)
				$("#gender").append("<option value = '" + results[result].gender + "'>"+ results[result].full +"</option>")
			}
		}
	});
	$.ajax({
		type: 'post',
		url: '../include/appajax.php',
		data: {loadposts:'loadpost'},
		dataType: 'json',
		success: function(results){
			$("#post").append("<option value = '' selected></option>");
			for(var result in results){
				//console.log(results[result].title)
				$("#post").append("<option value = '" + results[result].postid + "'>"+ results[result].post +"</option>")
			}
		}
	});
	$.ajax({
		type: 'post',
		url: '../include/appajax.php',
		data: {loadduty:'loadduty'},
		dataType: 'json',
		success: function(results){
			$("#duty").append("<option value = '' selected></option>");
			for(var result in results){
				//console.log(results[result].title)
				$("#duty").append("<option value = '" + results[result].dutyid + "'>"+ results[result].duty +"</option>")
			}
		}
	});
	$(".selectbox").select2({
		placeholder: "",
		allowClear: true
	});
	$(".dates").datepicker({
	  changeMonth: true,
	  changeYear: true,
	  dateFormat: 'yy-mm-dd'
	});
	$('#terms1').on('change', function(){
		if($('#terms1').is(":checked")){
			$('#error').html('');
			validateForm();
			if(isValid == false){
				$('#error').html('');
				$('#error').html(error);
				$('#submitreg').hide();
				$('#terms1').attr('checked', false);
			}
			else if(isValid == true){
				error = '';
				$('#error').html('');
				$('#submitreg').show();
			}
			//console.log(error);
		}
		else{
			$('#error').html('');				
			$('#terms1').attr('checked', false);
			
		}
		//console.log('hi');
	});
	var isValid = true;
	var error = '';
	function validateForm() {
		$('#error').html('');
		error = '';
		$('.form-field').each(function() {
			if ( $(this).val() === '' ){
				isValid = false;
				error += $('[for = ' + $(this).attr('id') + ']').html() + ' is empty<br />';
			}
		});
		return isValid;
	}
	$('.form-field').on('change', function(){
		if ( $(this).val() === '' )
		{
			$('#submitreg').hide();
			isValid = false;
			$('#terms1').attr('checked', false);
		}
	});
	
});