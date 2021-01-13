$(document).ready(function(){
	$('#terms1').on('change', function(){
		if($('#terms1').is(":checked")){
			$('#error').html('');
			validateForm();
			if(isValid == false){
				$('#error').html('');
				$('#error').html(error);
				$('#submitmontsav').hide();
				$('#terms1').attr('checked', false);
			}
			else if(isValid == true){
				error = '';
				$('#error').html('');
				$('#submitmontsav').show();
			}
			//console.log(error);
		}
		else{
			$('#error').html('');				
			$('#terms1').attr('checked', false);
			
		}
	});
	
	function checkamount(facilityid, amount, amountid){
		if(facilityid != '')
		$.ajax({
			type:'post',
			url: '../include/appajax.php',
			data:{facilityid: facilityid, facilityamount:amount},
			success: function(results){
				if($.trim(results) != '')
				{
					$('#' + amountid).focus();
					$('#error' + amountid).html(results);
					console.log(amountid);
					//++count;
				}
				else {
					$('#error' + amountid).html('');
				}
			}
		});
		else{
			$('#facilityerror').html('Pick a Facility Name');
			$('#error' + amountid).html('Pick a Facility Name');
		}
	}
	$('.form-field').on('change', function(){
		if ( $(this).val() === '' )
		{
			$('#submitreg').hide();
			isValid = false;
			$('#terms1').attr('checked', false);
		}
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
	function searchname(id){
		$('#'+id).autocomplete({
			source: function( request, response ) {
				$.ajax( {
					url: "../include/appajax.php",
					dataType: "jsonp",
					data: {
						term: request.term
					},
					success: function( data ) {
						if(data != '' && $('#'+id).val() != '')
						{
							response( data );
						}
					}
				} );
			},
			minLength: 2,
			select: function( event, ui ) {
				if($(this).attr('id') == 'accname1')
				{
					$('#memid1').val(ui.item.id);
					$('#memid1').trigger('change');
					console.log(ui.item.monthlysavings);
					var v = (ui.item.monthlysavings).replace('NaN', '');
					v = v.replace(/\,/g,'');
					if (v.indexOf('.') > -1 ){
						n = v.toString().split(".")[0];
						a = v.toString().split(".")[1];
						n = parseFloat(n.replace(/\,/g,''),10);
						$('#prsntmontcontr').val(n.toLocaleString() + "." + a);
					}
					else{
						n = v;
						n = parseFloat(n.replace(/\,/g,''),10);
						$('#prsntmontcontr').val(n.toLocaleString());	
					}
					$('#prsntmontcontr').trigger('change');
				}
			}
		});
	}
	$('#accname1').on('keyup', function(){
		$('#memid1').val('');
		searchname('accname1');
	});
	$('.namesearch').on('change', function(){
		if($(this).attr('id') == 'accname1' && $('#memid1').val() == '')
		{			
			$('#accname1').val('');
		}
	});
	$.ajax({
		type: 'post',
		url: '../include/appajax.php',
		data: {banks:'banks'},
		dataType: 'json',
		success: function(results){
			console.log('hi');
			$("#bank").append("<option value = '' selected></option>");
			for(var result in results){
				//console.log(results[result].title)
				$("#bank").append("<option value = '" + results[result].id + "'>"+ results[result].bankname +"</option>")
			}
		}
	});
	$.ajax({
		type: 'post',
		url: '../include/appajax.php',
		data: {instruments:'instruments'},
		dataType: 'json',
		success: function(results){
			$("#instrument").append("<option value = '' selected></option>");
			for(var result in results){
				//console.log(results[result].title)
				$("#instrument").append("<option value = '" + results[result].instrumentid + "'>"+ results[result].instrument +"</option>")
			}
		}
	});
	$(".dates").datepicker({
	  changeMonth: true,
	  changeYear: true,
	  dateFormat: 'yy-mm-dd'
	});
	$('.dates').on('keyup', function(){
		if(/^\d{4}-((0\d)|(1[012]))-(([012]\d)|3[01])$/.test($(this).val()) == false){
			$(this).val('');
		}
	});
	$(".selectbox").select2({
		placeholder: "",
		allowClear: true
	});
	$(".numbers").on('keyup', function(evt){
		var v = $(this).val().replace('NaN', '');
		v = v.replace(/\,/g,'');
		if (evt.which == 110 || v.indexOf('.') > -1 ){
			n = v.toString().split(".")[0];
			a = v.toString().split(".")[1];
			n = parseFloat(n.replace(/\,/g,''),10);
			$(this).val(n.toLocaleString() + "." + a);
		}
		else{
			n = v;
			n = parseFloat(n.replace(/\,/g,''),10);
			$(this).val(n.toLocaleString());	
		}
	});
	$(".numbers").on('change', function(evt){
		var n = $(this).val().replace('NaN', '');
		$(this).val(n);
		if($(this).val().replace(/\,/g, '') != '' )
		{
			if($(this).attr('id') == 'amount'){
				checkamount(2, $(this).val().replace(/\,/g, ''), $(this).attr('id'));
			}
		}
	});
	$(".numbers").on('blur', function(evt){
		var n = $(this).val().replace('NaN', '');
		$(this).val(n);
	});
});