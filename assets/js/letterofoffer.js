$(document).ready(function (){
	function searchname(id){
		$('#'+id).autocomplete({
			source: function( request, response ) {
				$.ajax( {
					url: "../include/appajax.php",
					dataType: "jsonp",
					data: {
						term3: request.term
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
				if($(this).attr('id') == 'receiver')
				{
					$('#printdiv').show();
					$('.tools').show();
					$('#searchform').hide();
					$('#memid').val(ui.item.id);
					$('.membername').html(ui.item.ori + " " + ui.item.value);
					$('.address').html(ui.item.homeadd1 + ",");
					$('.city').html(ui.item.homeadd2 + ",");
					$('.state').html(ui.item.homeadd3 + " State.");
					$('.amount').html(ui.item.principal);
					$('#monthlysavings').html(ui.item.monthlysavings);
					$('#installment').html(ui.item.instalment);
					$('.period').html(ui.item.period);
					$('#repayment').html(ui.item.totalrepayment);
					$('#percentagefailure').html("10");
					$('#date').html(ui.item.date);
					$('#tbody').html(ui.item.table);
					$('#interest').html(ui.item.interestrate);
					console.log(ui.item.table);
					
				}
				
			}
		});
	}
	$('#goback').on('click', function(e){
		e.preventDefault();
		$('#searchform').show();
		$('#printdiv').hide();
		$('.tools').hide();
	});
	$('#print').on('click', function(e){
		e.preventDefault();
		var divToPrint= $('#printdiv');
		//var newWin=window.open('','Print-Window');
		/*newWin.*/document.open();
		/*newWin.*/document.write("<html>");
		/*newWin.*/document.write("<title>LETTER OF OFFER</title><link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>" +
		"<link type=\"text/css\" rel=\"stylesheet\" href=\"../assets/css/theme-default/bootstrap.css?1422792965\" />" +
		"<link type=\"text/css\" rel=\"stylesheet\" href=\"../assets/css/theme-default/materialadmin.css?1425466319\" />" +
		"<link type=\"text/css\" rel=\"stylesheet\" href=\"../assets/css/theme-default/font-awesome.min.css?1422529194\" />" +
		"<link type=\"text/css\" rel=\"stylesheet\" href=\"../assets/css/theme-default/material-design-iconic-font.min.css?1421434286\" />" +
		"<link type=\"text/css\" rel=\"stylesheet\" href=\"../assets/css/theme-default/libs/wizard/wizard.css?1425466601\" />");
		/*newWin.*/document.write("<body class='menubar-hoverable header-fixed' onload='window.print()'><div class = 'card-body'>"+divToPrint.html()+"</div></body></html>");
		document.close();
		setTimeout(function(){/*newWin.*/close();
		window.location.href = 'letterofoffer.php';
		}, 10);
	});
	
	$('#facility').on('change', function(){
		if($(this).val() != ''){
			$.ajax({
				type: 'post',
				url: '../include/appajax.php',
				data: {facilityamount: $(this).val(), memid:$('#memid').val()},
				success: function(results){
					results = $.trim(results);
					$('#appfee').val(results);
					$('#appfee').trigger('change');
				}
			});
		}
	});
	$('#receiver').on('keyup', function(){
		$('#memid').val('');
		searchname('receiver');
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
});