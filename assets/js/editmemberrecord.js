$(document).ready(function(){
	$('#datatable1').DataTable({
		"dom": 'lCfrtip',
		"order": [],
		"colVis": {
			"buttonText": "Columns",
			"overlayFade": 0,
			"align": "right"
		},
		"language": {
			"lengthMenu": '_MENU_ entries per page',
			"search": '<i class="fa fa-search"></i>',
			"paginate": {
				"previous": '<i class="fa fa-angle-left"></i>',
				"next": '<i class="fa fa-angle-right"></i>'
			}
		}
	});

	$('#memname1').on('keyup', function(){
		var valid = $(this).val();
		
		$.ajax({
			url: "../include/myajax.php",
			dataType:"json",
			type:"post",
			data: {
				valid: valid,
				dataname:'searchmem'
			},
			success: function(data){
				$('#memname1').autocomplete({
					source: data,
					autoFocus:true,
					select: function( event, ui ) {
						$('#memid1').val(ui.item.memid);
					}
				});	
			}
		});
	});

	// $.ajax({
	// 	type: 'post',
	// 	url: '../include/appajax.php',
	// 	data: {joinchurch:'joinchurch'},
	// 	success: function(results){
	// 		console.log('get results');
	// 		$("#joinchurch").append(results);
	// 	}
	// });

	$('#searchbtn').on('click', function(e){
		e.preventDefault();
		var memid = $('#memid1').val();		
		$.ajax({
			url: "../include/myajax.php",
			dataType:"json",
			type:"post",
			data: {
				memid: memid,
				dataname:'showdetails'
			},
			success: function(data){
				$('#title').val(data.title);
				$('#sname').val(data.surname);
				$('#fname').val(data.fname);
				$('#mname').val(data.mname);
				$('#dob').val(data.dob);
				$('#gender').val(data.gender);
				$('#mstat').val(data.mstat);
				$('#nationality').val(data.nationality);
				$('#add1').val(data.homeadd1);
				$('#add2').val(data.homeadd2);
				$('#town').val(data.homeadd3);
				$('#state').val(data.homestate);
				$('#country').val(data.homecountry);
				$('#phoneno').val(data.phoneno);
				$('#email').val(data.email);
				$('#busnature').val(data.busnature);
				$('#busadd1').val(data.busadd1);
				$('#busadd2').val(data.busadd2);
				$('#bustown').val(data.busadd3);
				$('#busstate').val(data.busstate);
				$('#buscountry').val(data.buscountry);
				$('#joinchurch').val(data.chyr);
				$('#wsflocation').val(data.wsflocation);
				$('#wofbi').val(data.wofbilvl);
				$('#province').val(data.province);
				$('#district').val(data.district);
				$('#zone').val(data.zone);
				$('#nktitle').val(data.nkintitle);
				$('#nksname').val(data.nkinsname);
				$('#nkfname').val(data.nkinfname);
				$('#nkmname').val(data.nkinmname);
				$('#nkrel').val(data.nkinrel);
				$('#nkadd1').val(data.nkadd1);
				$('#nkadd2').val(data.nkadd2);
				$('#nktown').val(data.nkadd3);
				$('#nkstate').val(data.nkstate);
				$('#nkcountry').val(data.nkcountry);
				$('#nkphoneno').val(data.nkphoneno);
				$('#nkemail').val(data.nkemail);
				$('#datejoin').val(data.datejoin);
				$('#monthsave').val(data.monthlysavings);
				$('#accno').val(data.accountnumber);
				$('#grpname').val(data.groupid);
				$('#shares').val(data.shareamount);
				$('#totsavings').val(data.totalsavings);
				$('#debts').val(data.facbalance);
				$('#curr_balance').val(data.currentbalance);
				$('#share_tbl_body').html(data.sharedetails);
				$('#share_tbl_footer').html(data.sharedetailsfooter);
				$('#currfacilities_table_body').html(data.currentfac);
				$('#share_table, #currfacilities_table').DataTable();
				$('#searchform').hide();
				$('#rootwizard1, .tools').show();
			}
		});
	});

	$('#goback').on('click', function(e){
		e.preventDefault();
		$('#rootwizard1, .tools').hide();
		$('#searchform').show();
	});
	// function searchname(id){
	// 	$('#'+id).autocomplete({
	// 		source: function( request, response ) {
	// 			$.ajax( {
	// 				url: "../include/appajax.php",
	// 				dataType: "jsonp",
	// 				data: {
	// 					term: request.term
	// 				},
	// 				success: function( data ) {
	// 					if(data != '' && $('#'+id).val() != '')
	// 					{
	// 						response( data );
	// 					}
	// 				}
	// 			} );
	// 		},
	// 		minLength: 2,
	// 		select: function( event, ui ) {
	// 			$('#rootwizard1').show();
	// 			$('#memid1').val(ui.item.id);
	// 			$('#memid').val(ui.item.id);
	// 			$('#title').html(ui.item.editori);
	// 			$('#title').trigger('change');
	// 			$('#sname').val(ui.item.sname);
	// 			$('#sname').trigger('change');
	// 			$('#fname').val(ui.item.fname);
	// 			$('#fname').trigger('change');
	// 			$('#mname').val(ui.item.mname);
	// 			$('#mname').trigger('change');
	// 			$('#dob').val(ui.item.dob);
	// 			$('#dob').trigger('change');
	// 			$('#gender').html(ui.item.editgender);
	// 			$('#gender').trigger('change');
	// 			$('#mstat').html(ui.item.editmstat);
	// 			$('#mstat').trigger('change');
	// 			$('#nationality').html(ui.item.editnationality);
	// 			$('#nationality').trigger('change');
	// 			$('#add1').val(ui.item.homeadd1);
	// 			$('#add1').trigger('change');
	// 			$('#add2').val(ui.item.homeadd2);
	// 			$('#add2').trigger('change');
	// 			$('#town').val(ui.item.homeadd3);
	// 			$('#town').trigger('change');
	// 			$('#state').html(ui.item.editstate);
	// 			$('#state').trigger('change');
	// 			$('#country').html(ui.item.editcountry);
	// 			$('#country').trigger('change');
	// 			$('#phoneno').val(ui.item.phoneno);
	// 			$('#phoneno').trigger('change');
	// 			$('#email').val(ui.item.email);
	// 			$('#email').trigger('change');
	// 			$('#busnature').val(ui.item.busnature);
	// 			$('#busnature').trigger('change');
	// 			$('#busadd1').val(ui.item.busadd1);
	// 			$('#busadd1').trigger('change');
	// 			$('#busadd2').val(ui.item.busadd2);
	// 			$('#busadd1').trigger('change');
	// 			$('#bustown').val(ui.item.busadd3);
	// 			$('#bustown').trigger('change');
	// 			$('#busstate').html(ui.item.editbusstate);
	// 			$('#busstate').trigger('change');
	// 			$('#buscountry').html(ui.item.editbuscountry);
	// 			$('#buscountry').trigger('change');
	// 			$('#joinchurch').html(ui.item.editchyr);
	// 			$('#joinchurch').trigger('change');
	// 			$('#wofbi').html(ui.item.editwofbilevel);
	// 			$('#wofbi').trigger('change');
	// 			$('#province').val(ui.item.province);
	// 			$('#province').trigger('change');
	// 			$('#district').val(ui.item.district);
	// 			$('#district').trigger('change');
	// 			$('#zone').val(ui.item.zone);
	// 			$('#zone').trigger('change');
	// 			$('#nktitle').html(ui.item.editnkintitle);
	// 			$('#nktitle').trigger('change');
	// 			$('#nksname').val(ui.item.nkinsname);
	// 			$('#nksname').trigger('change')
	// 			$('#nkfname').val(ui.item.nkinfname);
	// 			$('#nkfname').trigger('change');
	// 			$('#nkmname').val(ui.item.nkinmname);
	// 			$('#nkmname').trigger('change');
	// 			$('#nkrel').val(ui.item.nkinrel);
	// 			$('#nkrel').trigger('change');
	// 			$('#nkadd1').val(ui.item.nkadd1);
	// 			$('#nkadd1').trigger('change');
	// 			$('#nkadd2').val(ui.item.nkadd2);
	// 			$('#nkadd2').trigger('change');
	// 			$('#nktown').val(ui.item.nkadd3);
	// 			$('#nktown').trigger('change');
	// 			$('#nkstate').html(ui.item.editnkstate);
	// 			$('#nkstate').trigger('change');
	// 			$('#nkcountry').html(ui.item.editnkcountry);
	// 			$('#nkcountry').trigger('change');
	// 			$('#nkphoneno').val(ui.item.nkphoneno);
	// 			$('#nkphoneno').trigger('change');
	// 			$('#nkemail').val(ui.item.nkemail);
	// 			$('#nkemail').trigger('change');
	// 			$('#datejoin').val(ui.item.datejoin);
	// 			$('#datejoin').trigger('change');
	// 			$('#monthsave').val(ui.item.monthlysavings);
	// 			$('#monthsave').trigger('change');
	// 			$('#accno').val(ui.item.accountnumber);
	// 			$('#accno').trigger('change');
	// 			$('#grpname').html(ui.item.editgroupname);
	// 			$('#grpname').trigger('change');
	// 			$('#receiptno').val(ui.item.receiptno);
	// 			$('#receiptno').trigger('change');
	// 			$('#receiptdate').val(ui.item.receiptdate);
	// 			$('#receiptdate').trigger('change');
	// 			$('#refno').val(ui.item.refno);
	// 			$('#refno').trigger('change');
	// 			$('#refdate').val(ui.item.refdate);
	// 			$('#refdate').trigger('change');
	// 			$('#amount').val(ui.item.amount);
	// 			$('#amount').trigger('change');
	// 			$('#instrument').html(ui.item.editinstrument);
	// 			$('#instrument').trigger('change');
	// 			$('#bank').html(ui.item.editbank);
	// 			$('#bank').trigger('change');
	// 			$('#remark').html(ui.item.remark);
	// 			$('#remark').trigger('change');
	// 			$('#receiptno1').val(ui.item.receiptno1);
	// 			$('#receiptno1').trigger('change');
	// 			$('#receiptdate1').val(ui.item.receiptdate1);
	// 			$('#receiptdate1').trigger('change');
	// 			$('#refno1').val(ui.item.refno1);
	// 			$('#refno1').trigger('change');
	// 			$('#refdate1').val(ui.item.refdate1);
	// 			$('#refdate1').trigger('change');
	// 			$('#shareamt').val(ui.item.amount1);
	// 			$('#shareamt').trigger('change');
	// 			$('#instrument1').html(ui.item.editinstrument1);
	// 			$('#instrument1').trigger('change');
	// 			$('#bank1').html(ui.item.editbank1);
	// 			$('#bank1').trigger('change');
	// 			$('#remark1').html(ui.item.remark1);
	// 			$('#remark1').trigger('change');
	// 			//$('#memid1').trigger('change');
	// 		}
	// 	});
	// }

	//Update record 
	$('#submitreg').on('click', function(e){
		e.preventDefault();
		$('#msg').empty();

		var memid = $('#memid').val();
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
		var wsflocation = $('#wsflocation').val();
		var province = $('#province').val();
		var district = $('#district').val();
		var zone = $('#zone').val();
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
		var grpname = $('#grpname').val();	


		$.ajax({
			url: '../include/myajax.php',
			type: 'post',
			data: {
				memid:memid,
				title:title,
				sname:sname,
				fname:fname,
				mname:mname,
				dob:dob,
				gender:gender,
				mstat:mstat,
				nationality:nationality,
				add1:add1,
				add2:add2,
				town:town,
				state:state,
				country:country,
				phoneno:phoneno,
				email:email,
				busnature:busnature,
				busadd1:busadd1,
				busadd2:busadd2,
				bustown:bustown,
				busstate:busstate,
				buscountry:buscountry,
				joinchurch:joinchurch,
				wofbi:wofbi,
				wsflocation:wsflocation,
				province:province,
				district:district,
				zone:zone,
				nktitle:nktitle,
				nksname:nksname,
				nkfname:nkfname,
				nkmname:nkmname,
				nkrel:nkrel,
				nkadd1:nkadd1,
				nkadd2:nkadd2,
				nktown:nktown,
				nkstate:nkstate,
				nkcountry:nkcountry,
				nkphoneno:nkphoneno,
				nkemail:nkemail,
				datejoin:datejoin,
				grpname:grpname,
				dataname:'updatememberrec'
			},
			success: function(data){
				window.scrollTo({ top: 0, behavior: 'smooth' });
				$('#msg').html(data);
			}
		});
	});

	$('#editmemberform').on('click', function(){
		$('#msg').empty();
	});

	
	var isnotempty = true;
	var isnotempty1 = true;
	var error = '';
	function checkemptyfields(classname, field){
		var bool = true;
		$('.' + classname).each(function() {
			console.log($(this)[0].value);
			if ( ($(this).val() == '' && $(this)[0].value !== undefined)){
				error += $('[for = ' + $(this).attr('id') + ']').html() + ' for ' + field + ' is empty<br />';
				
				bool = false;
			}
		});
		return bool;
	}
	function strikeoutRepeatedFunction(t) {
		var words = [];
		return t.split('<br />').map(function(v) {
			if (words.indexOf(v.toLowerCase()) === -1)
				words.push(v.toLowerCase());
			else
				return '';
			return v  + "<br />";

	  }).join('');
	}
	$('.reg').on('change', function(){
		isnotempty = checkemptyfields('reg', 'Registration fee');
	});
	$('.share').on('change', function(){
		isnotempty1 = checkemptyfields('share', 'share data');
	});
	
	$("#datejoin").datepicker({
	  changeMonth: true,
	  changeYear: true,
	  dateFormat: 'yy-mm-dd'
	});
	$(".selectbox").select2({
		placeholder: "",
		allowClear: true
	});
	// $('#memname1').on('keyup', function(){
	// 	$('#memberid').val('');
	// 	searchname('memname1');
	// });
	// $('.namesearch').on('change', function(){
	// 	$(this).attr('readonly', 'readonly');
	// 	if($('#memid1').val() == '')
	// 	{			
	// 		$('#memname1').val('');
	// 		$('#rootwizard1').hide();
	// 	}
	// });
	// $('.namesearch').on('click', function(){
	// 	$(this).removeAttr('readonly')
	// 		$('#rootwizard1').hide();
	// });

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
	var count = 0;
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
	$(".numbers").on('blur', function(){
		if($(this).val().replace(/\,/g, ' ') != '' )
		{
			if($(this).attr('id') == 'amount')
				checkamount(1, $(this).val().replace(/\,/g, ''), $(this).attr('id'));
			else if($(this).attr('id') == 'shareamt')
				checkamount(3, $(this).val().replace(/\,/g, ''), $(this).attr('id'));
		}
		
	});
	function checkrecpno(id){
		var checkrecpno = $('#' + id).val();
		//console.log(checkrecpno);
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
		//console.log(checkrefno);
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


});