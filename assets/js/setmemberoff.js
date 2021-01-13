$(document).ready(function(){
	$('.tools').hide();
	$('.hidesection').hide();
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
				if($(this).attr('id') == 'memname1')
				{
					$('.tools').show();
					$('#seaarchform').hide();
					$('.hidesection').show();
					$('#memid1').val(ui.item.id);
					$('#memberid').val(ui.item.id);
					$('#djoin').html(ui.item.datejoin);
					$('#coopno').html(ui.item.id);
					$('#name').html(ui.item.ori + " " + ui.item.value);
					$('#gender').html(ui.item.gender);
					$('#street').html(ui.item.homeadd1);
					$('#city').html(ui.item.homeadd2);
					$('#state').html(ui.item.homeadd3);
					$('#phoneno').html(ui.item.phoneno);
					$('#memname1').attr('readonly', 'readonly');
					$.ajax({
						type: 'post',
						url: '../include/appajax.php',
						data: {setoffreasons:'reason'},
						dataType: 'json',
						success: function(results){
							$("#setoffreason").append("<option value = '' selected></option>");
							for(var result in results){
								//console.log(results[result].title)
								$("#setoffreason").append("<option value = '" + results[result].reasonid + "'>"+ results[result].reason +"</option>")
							}
						}
					});
				}
			}
		});
	}
	$('#memname1').on('keyup', function(){
		$('#memid1').val('');
		searchname('memname1');
	});
	$('.namesearch').on('change', function(){
		$(this).attr('readonly', 'readonly');
		if($('#memid1').val() == '')
		{			
			$('#memname1').val('');
			$('.hidesection').hide()
		}
	});
	$('.namesearch').on('click', function(){
		$(this).removeAttr('readonly')
	});
	$('#goback').on('click', function(e){
		e.preventDefault();
		$('#searchform').show();
		$('.hidesection').hide();
		$('.tools').hide();
	});
	$("#setoffdate").datepicker({
	  changeMonth: true,
	  changeYear: true,
	  dateFormat: 'yy-mm-dd'
	});
	$('#setoffdate').on('keyup', function(){
		if(/^\d{4}-((0\d)|(1[012]))-(([012]\d)|3[01])$/.test($(this).val()) == false){
			$(this).val('');
		}
	});
	$("#setoffreason").select2({
		placeholder: "",
		allowClear: true
	});
});