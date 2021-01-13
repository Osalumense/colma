function datep(id){
	$('#'+id).datepicker({ 
		yearRange: "2016:2020",
		changeMonth: true,
		changeYear: true,
		dateFormat: 'yy-mm-dd'
		
	});
}
// nametext = stdname, btnautocomplete =  btn, studentregno, regno
function autocompletefunc(nametext, btnautocomplete, studentregno){
	$( "#"+nametext ).autocomplete();
		$( "#"+nametext ).autocomplete( "disable" );
		$("#"+nametext).on('click', function(){
			$(this).removeAttr('readonly');
			$("#"+btnautocomplete).css('display', 'block');
		});
		$("#"+btnautocomplete).on('click', function(){
			$( "#"+nametext ).autocomplete( "enable" );
			$( "#"+nametext ).addClass('studentname');
			$("#"+nametext).autocomplete('search', $("#"+nametext).val());
		});
		$( "#"+nametext ).autocomplete({
			delay: 0,
			source: function( request, response ) {
				$.ajax( {
					url: "../includes/studentaccajax.php",
					dataType: "jsonp",
					data: {
						term: request.term
					},
					success: function( data ) {
						if(data != '' && $("#"+nametext).val() != '')
						{
							//response(data.slice(0, 10));
							response( data );
						}
					}
				} );
				$('#comment').hide();
			},
			minLength: 2,
			select: function( event, ui ) {
				$("#"+nametext).val(ui.item.value);
				$("#"+studentregno).val(ui.item.id);
				$( "#"+nametext ).autocomplete( "disable" );
				$( "#"+nametext ).removeClass('studentname');
				$( "#"+nametext ).removeClass('ui-autocomplete-loading');
				$("#"+nametext).attr('readonly', 'readonly');
				$("#"+btnautocomplete).css('display', 'none');
					//$("form[name='frmSearch']").submit();
			}
		});
}