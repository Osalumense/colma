$(document).ready(function(){

	// function searchname(id){
	// 	var valid = $('#'+id).val();
		
	// 	$.ajax({
	// 		url: "../include/myajax.php",
	// 		dataType:"json",
	// 		type:"post",
	// 		data: {
	// 			valid: valid,
	// 			dataname:'searchmember'
	// 		},
	// 		success: function(data){
	// 			$('#'+id).autocomplete({
	// 				source: data,
	// 				autoFocus:true
	// 			});	
				
	// 		}
	// 	});
	// }

	// function getaccountnumber(id, acctid){
	// 	var acctname = $('#'+id).val();
	// 	$.ajax({
	// 		url: "../include/myajax.php",
	// 		//dataType:"json",
	// 		type:"post",
	// 		data: {
	// 			acctname: acctname,
	// 			dataname:'searchacct'
	// 		},
	// 		success: function(data){
	// 			$('#'+acctid).val(data);
	// 			//console.log(data);
	// 		}
	// 	});
	// }

	$('#accname1').on('keyup', function(){
		// $('#memid1').val('');
		// searchname('accname1');
		// getaccountnumber('accname1', 'accno1');
		var valid = $('#accname1').val();
		
		$.ajax({
			url: "../include/myajax.php",
			dataType:"json",
			type:"post",
			data: {
				valid: valid,
				dataname:'searchmem'
			},
			success: function(data){
				$('#accname1').autocomplete({
					source: data,
					autoFocus:true,
					select: function( event, ui ) {
						$('#memid1').val(ui.item.memid);
						$('#memid1').trigger('change');
						$('#accno1').val(ui.item.accountnumber);
						$('#accno1').trigger('change');
						$('#grpname').val(ui.item.groupname);
						$('#grpname').trigger('change');
					}
				});
			}	
		});
	});
	$('#accname2').on('keyup', function(){
		//$('#memid2').val('');
		var valid = $('#accname2').val();
		
		$.ajax({
			url: "../include/myajax.php",
			dataType:"json",
			type:"post",
			data: {
				valid: valid,
				dataname:'searchmem'
			},
			success: function(data){
				$('#accname1').autocomplete({
					source: data,
					autoFocus:true,
					select: function( event, ui ) {
						$('#memid2').val(ui.item.memid);
						$('#memid2').trigger('change');
						$('#accno2').val(ui.item.accountnumber);
						$('#accno2').trigger('change');
					}
				});
			}	
		});
	});

	// $('#accname1').on('change', function(){
	// 	getaccountnumber('accname1', 'accno1');
	// });

	// $('#accname2').on('change', function(){
	// 	getaccountnumber('accname2', 'accno2');
	// });
	// $('.namesearch').on('change', function(){
	// 	if($(this).attr('id') == 'accname1' && $('#memid1').val() == '')
	// 	{			
	// 		$('#accname1').val('');
	// 	}
	// 	else if($(this).attr('id') == 'accname2' && $('#memid2').val() == '')
	// 	{			
	// 		$('#accname2').val('');
	// 	}
	// });
	$("#date").datepicker({
	  changeMonth: true,
	  changeYear: true,
	  dateFormat: 'yy-mm-dd'
	});
	$('#date').on('keyup', function(){
		if(/^\d{4}-((0\d)|(1[012]))-(([012]\d)|3[01])$/.test($(this).val()) == false){
			$(this).val('');
		}
	});
	// $.ajax({
	// 	type: 'post',
	// 	url: '../include/appajax.php',
	// 	data: {grpnames:'grpname'},
	// 	dataType: 'json',
	// 	success: function(results){
	// 		$("#grpname").append("<option value = '' selected></option>");
	// 		for(var result in results){
	// 			//console.log(results[result].title)
	// 			$("#grpname").append("<option value = '" + results[result].grpnameid + "'>"+ results[result].grpname +"</option>")
	// 		}
	// 	}
	// });
	$.ajax({
		type: 'post',
		url: '../include/appajax.php',
		data: {loadgroupnames:'loadgroupnames'},
		dataType: 'json',
		success: function(results){
			$("#grpname").append("<option value = '' selected></option>");
			for(var result in results){
				console.log(results[result].groupname)
				$("#grpname").append("<option value = '" + results[result].groupid + "'>"+ results[result].groupname +"</option>");
			}
		}
	});
	// $("#grpname").select2({
	// 	placeholder: "",
	// 	allowClear: true
	// });
	$.ajax({
		type: 'post',
		url: '../include/appajax.php',
		data: {reasons:'reason'},
		dataType: 'json',
		success: function(results){
			$("#reason").append("<option value = '' selected></option>");
			for(var result in results){
				//console.log(results[result].title)
				$("#reason").append("<option value = '" + results[result].reasonid + "'>"+ results[result].reason +"</option>")
			}
		}
	});
	$("#reason").select2({
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

	//Submit transfer request
	$('#submit_transfer').on('click', function(e){
		e.preventDefault();
		var accname1 = $('#accname1').val();
		var accno1 = $('#accno1').val();
		var grpname = $('#grpname').val();
		var reason = $('#reason').val();
		var amount_transfer = $('#amount').val();
		var accname2 = $('#accname2').val();
		var accno2 = $('#accno2').val();
		var date = $('#date').val();
		console.log('You entered: '+accname1+' '+accno1+' '+grpname+' '+reason+' '+amount_transfer+' '+accname2+' '+accno2+' '+date);
	});
});