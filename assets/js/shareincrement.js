$(document).ready(function(){

	//Function to check reference number
	function checkrefno(id){
		var checkrefno = $('#' + id).val();
		$.ajax({
			type: 'post',
			url: '../include/myajax.php',
			data: {
				refno: checkrefno,
				dataname: 'checkrefno'
			},
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

	//Check receipt number function
	function checkrecpno(id){
		var checkrecpno = $('#' + id).val();
		
		$.ajax({
			type: 'post',
			url: '../include/myajax.php',
			data: {
				receiptno: checkrecpno,
				dataname: 'checkrecpno'
			},
			success: function(results){
				if($.trim(results) != ''){
					$('#error'+id).html(results);
					$('#' + id).focus();
					$(id).html('');
				}else{
					$('#error'+id).html('');
				}
			}
		});
	}

	//function to get member and set present monthly savings amount
	function getmember(getid, setid, setsavings) {
		let valid = $('#'+getid).val();
		
		$.ajax({
			url: "../include/myajax.php",
			dataType:"json",
			type:"post",
			data: {
				valid: valid,
				dataname:'searchmem'
			},
			success: function(data){
				$('#'+getid).autocomplete({
					source: data,
					autoFocus: true,
					minlength: 1,
					select: function( event, ui ) {
						$('#' + setid).val(ui.item.memid);
						$('#' + setsavings).val(ui.item.shareamount);
					}
				});	
			}
		});
	}

	$('.receiptno').on('change keyup', function() {
		var id = $(this).attr('id');
		checkrecpno(id);
	});

	$('.receiptno').on('blur', function(){
		if($('#errorreceiptno').html() !== '') {
			$(this).focus();
		}
			
	});

	$('.refno').on('change keyup', function() {
		var id = $(this).attr('id');
		checkrefno(id);
	});

	$('.refno').on('blur', function(){
		if($('#errorrefno').html() !== '') {
			$(this).focus();
		}			
	});

	$('#accname1').on('keyup', function () {
		getmember('accname1', 'memid1', 'prsntshramt');

		if($(this).val() == '') {
			$('#memid1, #prsntshramt').val('');
		}
	});

	function numberWithCommas(x) {
		var parts = x.toString().split(".");
		parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		return parts.join(".");
	}

	//Format number as currency on keyup
	$('.number').on('keyup', function(event) {
		// skip for arrow keys
		if(event.which >= 37 && event.which <= 40){
			event.preventDefault();
		}
		
		$(this).val(function(index, value) {
			value = value.replace(/,/g,''); // remove commas from existing input
			return numberWithCommas(value); // add commas back in
		});
	});
	$(".selectbox").select2({
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
		if($(this).val().replace(/\,/g, '') != '' )
		{
			if($(this).attr('id') == 'prpshramt'){
				checkamount(3, $(this).val().replace(/\,/g, ''), $(this).attr('id'));
			}
		}
	});
	$(".numbers").on('blur', function(evt){
		var n = $(this).val().replace('NaN', '');
		$(this).val(n);
		if($(this).val().replace(/\,/g, '') != '' )
		{
			if($(this).attr('id') == 'prpshramt'){
				checkamount(3, $(this).val().replace(/\,/g, ''), $(this).attr('id'));
			}
		}
	});

	$('#shareincrementform').validate({
		ignore: ""
	});

	$('#submitreg').on('click', function(e) {
        e.preventDefault();
        if($('#shareincrementform').valid() ) {
            let memid = $('#memid1').val();
            let prpshramt = $('#prpshramt').val();
            let prsntshramt = $('#prsntshramt').val();
            let commencedate = $('#date').val();
            let bank = $('#bank').val();
            let receiptno = $('#receiptno').val();
            let receiptdate = $('#receiptdate').val();
            let instrument = $('#instrument').val();
            let refno = $('#refno').val();
            let refdate = $('#refdate').val();
			let remark = $('#remark').val();
			
			console.log(memid+' '+prpshramt+' '+prsntshramt+' '+commencedate+' '+bank+' '+receiptno+' '+receiptdate+' '+instrument+' '+refno+' '+refdate+' '+remark);

            $.ajax({
                url: "../include/myajax.php",
                type: "post",
                dataType: 'json',
                data: {
                    memid: memid,
                    prpshramt: prpshramt,
                    prsntshramt: prsntshramt,
                    commencedate: commencedate,
                    bank: bank,
                    receiptno: receiptno,
                    receiptdate: receiptdate,
                    instrument: instrument,
                    refno: refno,
                    refdate: refdate,
                    remark: remark,
                    dataname: 'updateshareamt'
                },
                success: function(data) {
                    $('#formModal').modal('show');
                    $('#msg').html(data.msg); 
                    if(data.err == '') {
                        $('#savings-form')[0].reset();
                    }
                }
            });
        }
        else {
            $('#formModal').modal('show');
            $('#msg').html('<div class="alert alert-danger"></h5>Please fill out all required fields</h5></div>'); 
        }
	});
	
});