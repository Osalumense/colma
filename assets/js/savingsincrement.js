$(document).ready(function () {

    $(".selectbox").select2({
		placeholder: "",
		allowClear: true
    });
    
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
                        $('#' + setsavings).val(ui.item.monthlysavings);
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

    $('#savings-form').validate({
        ignore: "",
    });

    $('#submitreg').on('click', function(e) {
        e.preventDefault();
        if($('#savings-form').valid() ) {
            let memid = $('#memid1').val();
            let prpsavingsamt = $('#prpshramt').val();
            let prsntshramt = $('#prsntshramt').val();
            let commencedate = $('#date').val();
            let bank = $('#bank').val();
            let receiptno = $('#receiptno').val();
            let receiptdate = $('#receiptdate').val();
            let instrument = $('#instrument').val();
            let refno = $('#refno').val();
            let refdate = $('#refdate').val();
            let remark = $('#remark').val();

            $.ajax({
                url: "../include/myajax.php",
                type: "post",
                dataType: 'json',
                data: {
                    memid: memid,
                    prsntsavingsamt: prsntshramt,
                    prpsavingsamt: prpsavingsamt,
                    commencedate: commencedate,
                    bank: bank,
                    receiptno: receiptno,
                    receiptdate: receiptdate,
                    instrument: instrument,
                    refno: refno,
                    refdate: refdate,
                    remark: remark,
                    dataname: 'updatesavings'
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