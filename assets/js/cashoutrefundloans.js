$(document).ready(function(){
	$('#loanregno').on('change', function(){
		loanregno = $('#loanregno').val();
		$.ajax({
			type: 'post',
			url: '../include/appajax.php',
			data:{loancashregno:loanregno},
			dataType: 'json',
			success: function(result){
				//console.log(result)
				$('#payer').val(result[0].sname + ' ' + result[0].fname + ' ' + result[0].mname);
				$('#payer').trigger('change')
				$('#payerid').val(result[0].midno)
				$('#repaymentfor').val(result[0].facility)
				$('#repaymentfor').trigger('change')
				$('#repaymentforid').val(result[0].fidno)
			}
		});
	});
	function number(v){
		v = v.replace('NaN', '');
		v = v.replace(/\,/g,'');
		if (v.indexOf('.') > -1 ){
			n = v.toString().split(".")[0];
			a = v.toString().split(".")[1];
			n = parseFloat(n.replace(/\,/g,''),10);
			return n.toLocaleString() + "." + a;
		}
		else{
			n = v;
			n = parseFloat(n.replace(/\,/g,''),10);
			return n.toLocaleString();	
		}
	}
	$(".dates").datepicker({
	  changeMonth: true,
	  changeYear: true,
	  dateFormat: 'yy-mm-dd'
	});
	$('.dates').on('keyup', function(){
		if(/^\d{4}-((0\d)|(1[012]))-(([012]\d)|3[01])$/.test($(this).val()) == false){
			$(this).val('');
		}
	});/* 
	$.ajax({
		type: 'post',
		url: '../include/appajax.php',
		data: {facilities:'facility'},
		dataType: 'json',
		success: function(results){
			$("#repaymentfor").append("<option value = '' selected></option>");
			for(var result in results){
				//console.log(results[result].title)
				$("#repaymentfor").append("<option value = '" + results[result].fidno + "'>"+ results[result].facility +"</option>")
			}
		}
	}); */
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
	$.ajax({
		type: 'post',
		url: '../include/appajax.php',
		data: {banks:'banks'},
		dataType: 'json',
		success: function(results){
			$("#bank").append("<option value = '' selected></option>");
			for(var result in results){
				//console.log(results[result].title)
				$("#bank").append("<option value = '" + results[result].id + "'>"+ results[result].bankname +"</option>")
			}
		}
	});
	$(".select-box").select2({
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
	});

	/* $(".numbers").on('keyup', function(){
		var n = $(this).val().replace('/\,/g', '');
		var n = $(this).val().replace('NaN', '');
		n = (n * 1).toLocaleString();
		//console.log(n);
		$(this).val(n);
	}); */
});