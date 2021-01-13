$(document).ready(function(){
	$.ajax({
		type: 'post',
		url: '../include/appajax.php',
		data: {loadgroupnames:'loadgroupnames'},
		dataType: 'json',
		success: function(results){
			$("#grpname").append("<option value = '' selected></option>");
			for(var result in results){
				// console.log(results[result].groupname)
				$("#grpname").append("<option value = '" + results[result].groupid + "'>"+ results[result].groupname +"</option>");
			}
		}
	});
	function checkrecpno(id){
		var checkrecpno = $('#' + id).val();
		console.log(checkrecpno);
		$.ajax({
			type: 'post',
			url: '../include/appajax.php',
			data: {confirmreceiptno: checkrecpno},
			success: function(results){
				if($.trim(results) != ''){
					$('#error'+id).html(results);
					$(id).focus();
					$(id).html('');
				}else{
					$('#error'+id).html('');
				}
			}
		});
	}
	function checkrefno(id){
		var checkrefno = $('#' + id).val();
		console.log(checkrefno);
		$.ajax({
			type: 'post',
			url: '../include/appajax.php',
			data: {confirmrefno: checkrefno},
			success: function(results){
				if($.trim(results) != ''){
					$('#error'+id).html(results);
					$(id).focus();
					$(id).html('');
				}else{
					$('#error'+id).html('');
				}
			}
		});
	}
	
	$('.refno').on('change', function(){
		var id = $(this).attr('id');
		checkrefno(id);
	});
	$('.receiptno').on('change', function(){
		var id = $(this).attr('id');
		checkrecpno(id);
	});
	$('.refno').on('blur', function(){
		if($(this).val() == '' || $('#errorrefno').html() != '')
			$(this).focus();
	});
	$('.receiptno').on('blur', function(){
		if($(this).val() == '' || $('#errorreceiptno').html() != '')
			$(this).focus();
	});
	$.ajax({
		type: 'post',
		url: '../include/appajax.php',
		data: {loadtitles:'loadtitles'},
		dataType: 'json',
		success: function(results){
			$("#title").append("<option value = '' selected></option>");
			$("#nktitle").append("<option value = '' selected></option>");
			for(var result in results){
				//console.log(results[result].title)
				$("#title").append("<option value = '" + results[result].titleid + "'>"+ results[result].fulltitle +"</option>");
				$("#nktitle").append("<option value = '" + results[result].titleid + "'>"+ results[result].fulltitle +"</option>");
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
				$("#gender").append("<option value = '" + results[result].id + "'>"+ results[result].full +"</option>")
			}
		}
	});
	function loadcountry(id, stateid = '')
	{
		$.ajax({
			type: 'post',
			url: '../include/appajax.php',
			data: {loadnationality:'loadnationality', stateid: stateid},
			dataType: 'json',
			success: function(results){
				$("#" + id).append("<option value = '' selected></option>");
				for(var result in results){
					//console.log(results[result].title)
					$("#" + id).append("<option value = '" + results[result].countrycode + "'>"+ results[result].country +"</option>")
				}
			}
		});
	}
	loadcountry('nationality');
	$.ajax({
		type: 'post',
		url: '../include/appajax.php',
		data: {loadstates:'loadstates'},
		dataType: 'json',
		success: function(results){
			$(".states").append("<option value = '' selected></option>");
			for(var result in results){
				//console.log(results[result].title)
				$(".states").append("<option value = '" + results[result].state_id + "'>"+ results[result].state_name +"</option>");
			}
		}
	});
	$.ajax({
		type: 'post',
		url: '../include/appajax.php',
		data: {loadmstat:'loadmstat'},
		dataType: 'json',
		success: function(results){
			$("#mstat").append("<option value = '' selected></option>");
			for(var result in results){
				//console.log(results[result].title)
				$("#mstat").append("<option value = '" + results[result].mstatid + "'>"+ results[result].maristatus +"</option>")
			}
		}
	});
	$.ajax({
		type: 'post',
		url: '../include/appajax.php',
		data: {instruments:'instruments'},
		dataType: 'json',
		success: function(results){
			$(".instrument").append("<option value = '' selected></option>");
			for(var result in results){
				//console.log(results[result].title)
				$(".instrument").append("<option value = '" + results[result].instrumentid + "'>"+ results[result].instrument +"</option>")
			}
		}
	});
	$.ajax({
		type: 'post',
		url: '../include/appajax.php',
		data: {banks:'banks'},
		dataType: 'json',
		success: function(results){
			$(".bank").append("<option value = '' selected></option>");
			for(var result in results){
				//console.log(results[result].title)
				$(".bank").append("<option value = '" + results[result].id + "'>"+ results[result].bankname +"</option>")
			}
		}
	});
	$.ajax({
		type: 'post',
		url: '../include/appajax.php',
		data: {relationships:'relationships'},
		dataType: 'json',
		success: function(results){
			$("#nkrel").append("<option value = '' selected></option>");
			for(var result in results){
				//console.log(results[result].title)
				$("#nkrel").append("<option value = '" + results[result].relid + "'>"+ results[result].relname +"</option>")
			}
		}
	});
	$.ajax({
		type: 'post',
		url: '../include/appajax.php',
		data: {wofbilevels:'wofbilevels'},
		dataType: 'json',
		success: function(results){
			$("#wofbi").append("<option value = '' selected></option>");
			for(var result in results){
				//console.log(results[result].title)
				$("#wofbi").append("<option value = '" + results[result].certid + "'>"+ results[result].certname +"</option>")
			}
		}
	});
	$.ajax({
		type: 'post',
		url: '../include/appajax.php',
		data: {joinchurch:'joinchurch'},
		success: function(results){
			//console.log('hi');
			$("#joinchurch").html(results);
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
	$('.states').on('change', function(){
		var selectid = $(this).attr('id');
		var id = selectid.replace('state', '');
		if($(this).val() != '')
		{			
			loadcountry(id + 'country', $(this).val());
		}
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
		if($(this).attr('id') == 'amount'){
			$('#erroramount').html('');
		}
		if($(this).attr('id') == 'shareamt'){
			$('#errorshareamt').html('');
		}
	});
	$('.fileupload').on('change', function(){
		var id = $(this).attr('id')
		if (id == 'passportupload'){
			checkfileformat(id, ['jpeg', 'jpg', 'png']);
		}
		else {
			checkfileformat(id, ['jpeg', 'jpg', 'png', 'pdf']);
		}
	});
	$('.fileupload').on('blur', function(){
		var id = $(this).attr('id')
		if (id == 'passportupload'){
			checkfileformat(id, ['jpeg', 'jpg', 'png']);
		}
		else {
			checkfileformat(id, ['jpeg', 'jpg', 'png', 'pdf']);
		} 
	});
	function checkfileformat(fieldname, extensionarray){
		var ext = $('#' + fieldname).val().split('.').pop().toLowerCase();
		if($.inArray(ext, extensionarray) == -1) {
			$('#error' + fieldname).html('Invalid file format');
			$('#'+fieldname).focus();
		}else $('#error' + fieldname).html('');
	}
	count = 0;
	$(".numbers").on('change', function(evt){
		var n = $(this).val().replace('NaN', '');
		$(this).val(n);
		if($(this).val().replace(/\,/g, ' ') != '')
		{
			if($(this).attr('id') == 'amount'){
				checkamount(1, $(this).val().replace(/\,/g, ''), $(this).attr('id'));
			}
			else if($(this).attr('id') == 'shareamt'){
				checkamount(3, $(this).val().replace(/\,/g, ''), $(this).attr('id'));
			}
		}
		
	});
	$(".numbers").on('blur', function(){
		if($(this).val().replace(/\,/g, ' ') != '' )
		{
			if($(this).attr('id') == 'amount')
				checkamount(1, $(this).val().replace(/\,/g, ''), $(this).attr('id'));
			else if($(this).attr('id') == 'shareamt')
				checkamount(3, $(this).val().replace(/\,/g, ''), $(this).attr('id'));
		}
		
	});  
	function checkamount(facilityid, amount, amountid){
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
					++count;
				}
				else $('#error' + amountid).html('');
			}
		});
	} 

	//
	$('#terms1').on('change', function(){
		if($('#terms1').is(":checked")){
			$('#submitreg').attr('disabled', false);
			//$('#error').html('');
			// //validateForm();
			// if(isValid == false){
			// 	// $('#msg').html('');
			// 	// $('#msg').html(error);
			// 	// $('#terms1').attr('checked', false);
			// 	$('#submitreg').attr('disabled', true);
			// }
			// else if(isValid == true){
			// 	error = '';
			// 	$('#error').html('');
			// 					
			// }
		}
		else{
			// $('#error').html('');				
			// $('#terms1').attr('checked', false);
			$('#submitreg').attr('disabled', true);				
		}
	});

	//Show tooltip on button hover
	// $('#submitreg').on('hover', function(){
	// 	$(this).attr('title', '');
	// });

	var isValid = true;
	var error = '';
	function validateForm() {
		$('#error').html('');
		error = '';
		$('.form-field').each(function(){
			if ( $(this).val() === '' ){
				isValid = false;
				error += $('[for = ' + $(this).attr('id') + ']').html() + ' is empty<br>';
			}
		});
		return isValid;
	}
	$('.form-field').on('change', function(){
		if ( $(this).val() === '')
		{
			// $('#submitreg').hide();
			isValid = false;
			$('#terms1').attr('checked', false);
		}
	});

	$('#rootwizard2').on('click', function(){
		$('#msg').html('');
	});

	$('#submitreg').on('click', function(e){
		e.preventDefault();
		$('#msg').empty();
		var title = $('#title').val();
		var sname = $('#sname').val();
		var fname = $('#fname').val();
		var mname = $('#mname').val();
		var dob = $('#dob').val();
		var gender = $('#gender').val();
		var mstat = $('#mstat').val();
		var nationality = $('#nationality').val();
		var add1 = $('#add1').val();
		var add2 = $('#add2').val();
		var town = $('#town').val();
		var state = $('#state').val();
		var country = $('#country').val();
		var phoneno = $('#phoneno').val();
		var email = $('#email').val();
		var busnature = $('#busnature').val();
		var busadd1 = $('#busadd1').val();
		var busadd2 = $('#busadd2').val();
		var bustown = $('#bustown').val();
		var busstate = $('#busstate').val();
		var buscountry = $('#buscountry').val();
		var joinchurch = $('#joinchurch').val();
		var wofbi = $('#wofbi').val();
		var province = $('#province').val();
		var district = $('#district').val();
		var zone = $('#zone').val();
		var wsf = $('#wsf').val();
		var nktitle = $('#nktitle').val();
		var nksname = $('#nksname').val();
		var nkfname = $('#nkfname').val();
		var nkmname = $('#nkmname').val();
		var nkrel = $('#nkrel').val();
		var nkadd1 = $('#nkadd1').val();
		var nkadd2 = $('#nkadd2').val();
		var nktown = $('#nktown').val();
		var nkstate = $('#nkstate').val();
		var nkcountry = $('#nkcountry').val();
		var nkphoneno = $('#nkphoneno').val();
		var nkemail = $('#nkemail').val();
		var datejoin = $('#datejoin').val();
		var monthsave = $('#monthsave').val();
		var accno = $('#accno').val();
		var grpname = $('#grpname').val();
		var receiptno = $('#receiptno').val();
		var receiptdate = $('#receiptdate').val();
		var regamount = $('#regamount').val();
		var instrument = $('instrument').val();
		var refno = $('#refno').val();
		var refdate = $('#refdate').val();
		var bank = $('#bank').val();
		var remark = $('#remark').val();
		var receiptno1 = $('#receiptno1').val();
		var receiptdate1 = $('#receiptdate1').val();
		var shareamt = $('#shareamt').val();
		var instrument1 = $('#instrument1').val();
		var refno1 = $('#refno1').val();
		var refdate1 = $('#refdate1').val();
		var bank1 = $('#bank1').val();
		var refremark = $('#refremark').val();

		var passportupload =  $('#passportupload')[0].files[0];
		var regreceiptupload = $('#regreceiptupload')[0].files[0];
		var sharelotreceiptupload = $('#sharelotreceiptupload')[0].files[0];
		var reginstrumentupload = $('#reginstrumentupload')[0].files[0];
		var shareinstrumentupload = $('#shareinstrumentupload')[0].files[0];
		var regformupload = $('#regformupload')[0].files[0];

		var formdata = new FormData();
		formdata.append('passportupload', passportupload);
		formdata.append('regreceiptupload', regreceiptupload);
		formdata.append('sharelotreceiptupload', sharelotreceiptupload);
		formdata.append('reginstrumentupload', reginstrumentupload);
		formdata.append('shareinstrumentupload', shareinstrumentupload);
		formdata.append('regformupload', regformupload);
		formdata.append('refremark', refremark);
		formdata.append('bank1', bank1);
		formdata.append('refdate1', refdate1);
		formdata.append('refno1', refno1);
		formdata.append('instrument1', instrument1);
		formdata.append('shareamt', shareamt);
		formdata.append('receiptdate1', receiptdate1);
		formdata.append('receiptno1', receiptno1);
		formdata.append('remark', remark);
		formdata.append('bank', bank);
		formdata.append('refdate', refdate);
		formdata.append('refno', refno);
		formdata.append('instrument', instrument);
		formdata.append('regamount', regamount);
		formdata.append('receiptdate', receiptdate);
		formdata.append('receiptno', receiptno);
		formdata.append('grpname', grpname);
		formdata.append('accno', accno);
		formdata.append('monthsave', monthsave);
		formdata.append('datejoin', datejoin);
		formdata.append('nkemail', nkemail);
		formdata.append('nkphoneno', nkphoneno);
		formdata.append('nkcountry', nkcountry);
		formdata.append('nkstate', nkstate);
		formdata.append('nktown', nktown);
		formdata.append('nkadd2', nkadd2);
		formdata.append('nkadd1', nkadd1);
		formdata.append('nkrel', nkrel);
		formdata.append('nkmname', nkmname);
		formdata.append('nkfname', nkfname);
		formdata.append('nksname', nksname);
		formdata.append('nktitle', nktitle);
		formdata.append('wsf', wsf);
		formdata.append('zone', zone);
		formdata.append('district', district);
		formdata.append('province', province);
		formdata.append('wofbi', wofbi);
		formdata.append('joinchurch', joinchurch);
		formdata.append('buscountry', buscountry);
		formdata.append('busstate', busstate);
		formdata.append('bustown', bustown);
		formdata.append('busadd2', busadd2);
		formdata.append('busadd1', busadd1);
		formdata.append('busnature', busnature);
		formdata.append('email', email);
		formdata.append('phoneno', phoneno);
		formdata.append('country', country);
		formdata.append('state', state);
		formdata.append('town', town);
		formdata.append('add2', add2);
		formdata.append('add1', add1);
		formdata.append('nationality', nationality);
		formdata.append('mstat', mstat);
		formdata.append('gender', gender);
		formdata.append('dob', dob);
		formdata.append('mname', mname);
		formdata.append('fname', fname);
		formdata.append('sname', sname);
		formdata.append('title', title);
		formdata.append('dataname','save_member');

		$.ajax({
			method:'POST',
			url:'../include/myajax.php',
			data:formdata,
            contentType:false,
            processData:false,
            success:function(response){
				window.scrollTo({ top: 0, behavior: 'smooth' });
				$('#msg').html(response);
            }  			
		});

	});
});