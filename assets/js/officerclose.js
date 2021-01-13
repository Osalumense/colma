function searchname(id){
		$('#'+id).autocomplete({
			source: function( request, response ) {
				$.ajax( {
					url: "../include/appajax.php",
					dataType: "jsonp",
					data: {
						term2: request.term
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
				if($(this).attr('id') == 'payer')
				{			
					$('#payerid').val(ui.item.id);
					$('#post').val(ui.item.office);
					$('#datein').val(ui.item.dtin);
					$('#payerid').trigger('change');
					$('#post').trigger('change');
					$('#datein').trigger('change');
					//$('#memid').trigger('change');
				}
				
			}
		});
	}
	$('#payer').on('keyup', function(){
		$('#payerid').val('');
		searchname('payer');
	});
	$('.namesearch').on('change', function(){
		if($(this).attr('id') == 'payer' && $('#payerid').val() == '')
		{			
			$('#payer').val('');
		}
	});