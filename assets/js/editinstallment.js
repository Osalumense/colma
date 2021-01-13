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
	// 			$('#memberid').val(ui.item.id);
	// 			$('#memberid').trigger('change');
	// 			$('#addtable').html(ui.item.table);
	// 			$('#datatable1').DataTable();
	// 		}
	// 	});
	// }
	// $('#member').on('keyup', function(){
	// 	$('#memberid').val('');
	// 	searchname('member');
	// });

	$('#member').on('keyup', function(){
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
				// console.log(data);
				$('#member').autocomplete({			
					source: data,
					autoFocus:true,
					select: function(event, ui){
						$('#memberid').val(data.memid);
						console.log(data.memid)
						$('#memberid').trigger('change');
					},
				});	
			}
		});
	});

	// function searchname(id){
	// 	$('#'+id).autocomplete({
	// 		source: function( request, response ) {
	// 			$.ajax( {
	// 				url: "../include/myajax.php",
	// 						dataType:"json",
	// 						type:"post",
	// 						data: {
	// 							valid: valid,
	// 							dataname:'searchmem'
	// 						},
	// 						success: function(data){
	// 					if(data != '' && $('#'+id).val() != '')
	// 					{
	// 						response( data );
	// 					}
	// 				}
	// 			} );
	// 		},
	// 		minLength: 2,
	// 		// select: function( event, ui ) {
	// 		// 	$('#memberid').val(ui.item.id);
	// 		// 	$('#memberid').trigger('change');
	// 		// 	$('#addtable').html(ui.item.table);
	// 		// 	$('#datatable1').DataTable();
	// 		// }
	// 	});
	// }

	// $('#member').on('keyup', function(){
	// 	$('#memberid').val('');
	// 	searchname('member');
	// });

	$('.namesearch').on('change', function(){
		$(this).attr('readonly', 'readonly');
		if($('#memberid').val() == '')
		{			
			$('#member').val('');
		}
	});

	$('.namesearch').on('click', function(){
		$(this).removeAttr('readonly')
	});

	$('#addtable').on('click', '.editinstallment', function(){
		$('#formModal').modal('show');
		id = $(this).attr('id').replace('editinstallment', '');
		$('#membername').val($('#name' + id).html())
		$('#membername').trigger('change')
		$('#tno').val($('#formno' + id).val())
		$('#principal').val($('#principal' + id).html())
		$('#principal').trigger('change')
		$('#interest').val($('#interest' + id).html())
		$('#interest').trigger('change')
		$('#paid').val($('#paid' + id).html())
		$('#paid').trigger('change')
		$('#installment').val($('#installment' + id).html())
		$('#installment').trigger('change')
		$('#balance').val($('#balance' + id).html())
		$('#balance').trigger('change')
		$('#period').val($('#period' + id).html())
		$('#period').trigger('change')
		$('#facilityname').trigger('change')
		$('#facilityname').val($('#facility' + id).html())
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
		if($(this).attr('id') == 'installment' && $(this).val() != ''){
			var val = $(this).val().replace(/\,/g,'');
			period = ($('#balance').val().replace(/\,/g,'') * 1) / (val * 1)
			console.log(period)
			if(period % 1 == 0 && period > 10){
				alert('The period is more');
			}
			else if(period % 1 != 0 && period > 10){
				alert('The period is more');
			}
			else if(period % 1 == 0 && period <= 10 && period >= 1){
				$('#period').val(period);
			}
		}
	});
	$(".numbers").on('click', function(evt){
		if($(this).attr('id') == 'installment'){
			$(this).removeAttr('readonly');
		}
	});
});