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
	// 			$('#title').val(ui.item.ori);
	// 			$('#title').trigger('change');
	// 			$('#sname').val(ui.item.sname);
	// 			$('#sname').trigger('change');
	// 			$('#fname').val(ui.item.fname);
	// 			$('#fname').trigger('change');
	// 			$('#mname').val(ui.item.mname);
	// 			$('#mname').trigger('change');
	// 			$('#dob').val(ui.item.dob);
	// 			$('#dob').trigger('change');
	// 			$('#gender').val(ui.item.gender);
	// 			$('#gender').trigger('change');
	// 			$('#mstat').val(ui.item.mstat);
	// 			$('#mstat').trigger('change');
	// 			$('#nationality').val(ui.item.nationality);
	// 			$('#nationality').trigger('change');
	// 			$('#add1').val(ui.item.homeadd1);
	// 			$('#add1').trigger('change');
	// 			$('#add2').val(ui.item.homeadd2);
	// 			$('#add2').trigger('change');
	// 			$('#town').val(ui.item.homeadd3);
	// 			$('#town').trigger('change');
	// 			$('#state').val(ui.item.state);
	// 			$('#state').trigger('change');
	// 			$('#country').val(ui.item.country);
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
	// 			$('#busstate').val(ui.item.busstate);
	// 			$('#busstate').trigger('change');
	// 			$('#buscountry').val(ui.item.buscountry);
	// 			$('#buscountry').trigger('change');
	// 			$('#joinchurch').val(ui.item.chyr);
	// 			$('#joinchurch').trigger('change');
	// 			$('#wofbilevel').val(ui.item.wofbilevel);
	// 			$('#wofbilevel').trigger('change');
	// 			$('#province').val(ui.item.province);
	// 			$('#province').trigger('change');
	// 			$('#district').val(ui.item.district);
	// 			$('#district').trigger('change');
	// 			$('#zone').val(ui.item.zone);
	// 			$('#zone').trigger('change');
	// 			$('#nktitle').val(ui.item.nkintitle);
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
	// 			$('#nkstate').val(ui.item.nkstate);
	// 			$('#nkstate').trigger('change');
	// 			$('#nkcountry').val(ui.item.nkcountry);
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
	// 			$('#grpname').val(ui.item.groupname);
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
	// 			$('#instrument').val(ui.item.instrument);
	// 			$('#instrument').trigger('change');
	// 			$('#bank').val(ui.item.bank);
	// 			$('#bank').trigger('change');
	// 			$('#remark').val(ui.item.remark);
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
	// 			$('#instrument1').val(ui.item.instrument1);
	// 			$('#instrument1').trigger('change');
	// 			$('#bank1').val(ui.item.bank1);
	// 			$('#bank1').trigger('change');
	// 			$('#remark1').val(ui.item.remark1);
	// 			$('#remark1').trigger('change');
	// 			$('#step8').html(ui.item.table);
	// 			$('#step9').html(ui.item.guarantotable1 + ui.item.guarantotable2 + ui.item.witnesstable);
	// 			$('#step10').html(ui.item.montpaystable);
	// 			$('#step11').html(ui.item.montpaysstable);
	// 			//$('#rootwizard1').show();
	// 			//$('#memid1').trigger('change');
	// 		}
	// 	});
	// }

	// $('#memname1').on('keyup', function(){
	// 	$('#memberid').val('');
	// 	searchname('memname1');
	// });

	// $(function() {
	// 	var availableTutorials = [
	// 	   "ActionScript",
	// 	   "Bootstrap",
	// 	   "C",
	// 	   "C++",
	// 	];
	// 	$( "#automplete-2" ).autocomplete({
	// 	   source: availableTutorials,
	// 	   autoFocus:true
	// 	});
	//  });

	
	//Auto complete search input field
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

	//Get search result and populate fields
	$('#searchbtn').on('click', function(e){
		e.preventDefault();
		$('#share_table_body, #currfacilities_table_body, #facility_history_table_body, #savings_table_body').html('');
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
				console.log(data);
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
				$('#totsave').val(data.totalsavings);
				$('#debts').val(data.facbalance);
				$('#curr_balance').val(data.currentbalance);
				$('#totrec').val(data.numrecs);
				$('#totsavingrec').val(data.numsavingrec);
				$('#totguaranteerec').val(data.totguarantrec);
				$('#share_tbl_body').html(data.sharedetails);
				$('#share_tbl_footer').html(data.sharedetailsfooter);
				$('#currfacilities_table_body').html(data.currentfac);
				$('#facility_history_table_body').html(data.fachistory);
				$('#savings_table_body').html(data.stmtofacct);
				$('#montpays_table_body').html(data.montpays);
				$('#guarantees_table_body').html(data.guarantees);
				$('#share_table, #currfacilities_table, #facility_history_table, #savings_table, #montpays_table, #guarantees_table').DataTable();
				$('#searchform').hide();
				$('#tabs, .tools').show();
			}
		});
	});

	$('#goback').on('click', function(e){
		e.preventDefault();
		$('#tabs, .tools').hide();
		$('#searchform').show();
	});

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


	// $('#searchmem').on('keyup', function(){
	// 	var value = $(this).val();
	// 	if(value != ''){
	// 		$.ajax({
	// 			url: "../include/appajax.php",
	// 			dataType: "json",
	// 			type: "post",
	// 			data: {
	// 				searchmem: searchmem,
	// 				value:value
	// 			},
	// 			success: function( data ) {
	// 				alert(data);
	// 				// if(data != '' && $('#'+id).val() != '')
	// 				// {
	// 				// 	response( data );
	// 				// }
	// 				}
	// 		});
	// 	}
	// });

	// $('#searchbtn').on('click', function(){
	// 	var id = $('#searchmem').val();
	// 	alert(id);
	// });

});