$(document).ready(function(){


    $(".selectbox").select2({
		placeholder: "",
		allowClear: true
    });
    
    $.ajax({
		type: 'post',
		url: '../include/appajax.php',
		data: {instruments:'instruments'},
		dataType: 'json',
		success: function(results){
			$(".instrument").append("<option value = '' selected></option>");
			for(var result in results){
				//console.log(results[result].title)
				$(".instrument").append("<option class='text-muted' value = '" + results[result].instrumentid + "'>"+ results[result].instrument +"</option>")
			}
		}
	});
	$.ajax({
		type: 'post',
		url: '../include/appajax.php',
		data: {banks:'banks'},
		dataType: 'json',
		success: function(results){
			$(".bank").append("<option value = '' selected></option>");
			for(var result in results){
				//console.log(results[result].title)
				$(".bank").append("<option class='text-muted' value = '" + results[result].id + "'>"+ results[result].bankname +"</option>")
			}
		}
	});

    //Function to calculate interest amount
    function getinterestamt() {
        let loanamt = $('#loanamount').val().replace(/,/g,'');
        let intrst = $('#interest').val().replace('%','');
        let intrstamt = (intrst * 0.01) * loanamt;
        $('#interestamt').val(intrstamt.toLocaleString());
    }
    
    //Function to calculate installment amount
    function getinstalment() {
        var loanamt = Number($('#loanamount').val().replace(/,/g,''));
        var intrstamt = Number($('#interestamt').val().replace(/,/g,''));
        var period = Number($('#periodinmnths').val());
        var montinstall = (loanamt + intrstamt)/period;
        $('#instalment').val(montinstall.toLocaleString());
    }

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

    //Get facillity details once facility changes
    $('#facilitytype').on('change', function() {
        let facid = $(this).val();
        
        if(facid !== '') {
            $.ajax({
                url: "../include/myajax.php",
                type:"post",
                dataType: 'json',
                data: {
                    facid: facid,
                    dataname:'getinterest'
                },  
                success: function(data) {
                    console.log(data);
                    $('#interest').val(data.interest +'%');
                    $('#maxperiod').val(data.maxperiod + ' months'); 
                    $('#appfee').val(data.facilityfee);
                    $('#maxamount').val(data.maxamount);
                    if($('#loanamount').val() !== '') {
                        getinterestamt();
                    }  
                    if($('#periodinmnths').val() !== '') {
                        getinstalment()
                    }
                    else {
                        $('#instalment').val('');
                    }
                }          
            });
        }
        else {
            $('#interest').val('');
            $('#maxperiod').val('');
        }
        
    });
    
    //Function to autocomplete and get member name
    function getmember(getid, setid) {
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
						$('#'+setid).val(ui.item.memid);
					}
				});	
			}
		});
    }

    //Check for duplicate names while typing guarantor1
    $('#guarantor1').on('keyup', function() {
        getmember('guarantor1', 'guarantor1id');
        let g1 = $(this).val();
        let g2 = $('#guarantor2').val();
        let witness = $('#witness').val();

        if((g1 == g2) || (g1 == witness)) {
            $(this).val('');
        }
    });

    //Check for duplicate names while typing guarantor2
    $('#guarantor2').on('keyup', function() {
        getmember('guarantor2', 'guarantor2id');
        let g2 = $(this).val();
        let g1 = $('#guarantor1').val();
        let witness = $('#witness').val();

        if((g2 == g1) || (g2 == witness)) {
            $(this).val('');
        }
    });

    //Check for duplicate names while typing witness
    $('#witness').on('keyup', function () {
        getmember('witness', 'witnessid');
        let g1 = $('#guarantor1').val();
        let g2 = $('#guarantor2').val();
        let witness = $(this).val();

        if((witness == g1) || (witness == g2) ) {
            $(this).val('');
        }
    });

    //Calculate interest on keyup
    $('#loanamount').on('keyup change', function () {
        if($('#interest').val() !== '') {
            getinterestamt();
        }
        if($('#periodinmnths').val() !== '') {
            getinstalment();
        }
        else {
            $('#instalment').val('');
        }
    });

    //Calculate instalment on keyup
    $('#periodinmnths').on('keyup change', function () {
        if(($('#loanamount').val() !== '') && ($('#interestamt').val() !== '') && ($(this).val() !== '')) {
            getinstalment();
        }
        else {
            $('#instalment').val('');
        }
    });


    //Function to change number to currency
    function numberWithCommas(x) {
        var parts = x.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return parts.join(".");
    }

    //Format number as currency on keyup
    $('.number').on('keyup change', function(event) {
         // skip for arrow keys
         if(event.which >= 37 && event.which <= 40){
            event.preventDefault();
           }
         
           $(this).val(function(index, value) {
               value = value.replace(/,/g,''); // remove commas from existing input
               return numberWithCommas(value); // add commas back in
           });
    });

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
    
    //Check receipt number
    $('.receiptno').on('change keyup', function() {
		var id = $(this).attr('id');
		checkrecpno(id);
    });
    
    $('.receiptno').on('blur', function(){
		if($('#errorreceiptno').html() !== '') {
            $(this).focus();
        }
			
    });
    
    //Check reference number
    $('.refno').on('change keyup', function() {
		var id = $(this).attr('id');
		checkrefno(id);
    });
    
    $('.refno').on('blur', function() {
		if($('#errorrefno').html() !== '') {
            $(this).focus();
        }			
    });
    

    $('#application-form').validate({
        ignore: "",
    });

    $('#submitreg').on('click', function(e) {
        if( $('#application-form').valid() ) {
            e.preventDefault();
            let memid = $('#memid').val();
            let facilitytype = $('#facilitytype').val();
            let interestrate = $('#interest').val().replace('%','');
            let maxperiod = $('#maxperiod').val().replace('months','');
            let max_amount = $('#maxamount').val();
            let loanamount = $('#loanamount').val();
            let periodinmnths = $('#periodinmnths').val();
            let purpose = $('#purpose').val();
            let guarantor1id = $('#guarantor1id').val();
            let gamount1 = $('#gamount1').val();
            let guarantor2id = $('#guarantor2id').val();
            let gamount2 = $('#gamount2').val();
            let witness = $("#witness").val();
            let appfee = $('#appfee').val();
            let receiptno = $('#receiptno').val();
            let receiptdate = $('#receiptdate').val();
            let instrument = $('#instrument').val();
            let refno = $('#refno').val();
            let refdate = $('#refdate').val();
            let bank = $('#bank').val();
            let remark = $('#remark').val();
    
            $.ajax({
                url: "../include/myajax.php",
                type:"post",
                dataType: 'json',
                data: {
                    memid: memid,
                    facilitytype: facilitytype,
                    interestrate: interestrate,
                    loanamount: loanamount,
                    max_amount: max_amount, 
                    maxperiod: maxperiod,
                    periodinmnths: periodinmnths,
                    purpose: purpose,
                    guarantor1id: guarantor1id,
                    gamount1: gamount1,
                    guarantor2id: guarantor2id,
                    gamount2: gamount2, 
                    witnessid: witnessid,
                    appfee: appfee,
                    receiptno: receiptno,
                    receiptdate: receiptdate,
                    instrument: instrument,
                    refno: refno,
                    refdate: refdate,
                    bank: bank,
                    remark: remark,
                    dataname:'savefacilityreg'
                },
                success: function(data) {
                    $('#formModal').modal('show');
                    $('#msg').html(data.msg); 
                    if(data.err == '') {
                        $('#application-form')[0].reset();
                    }               
                }
            });
        }
        else {
            $('#formModal').modal('show');
            $('#msg').html('<div class="alert alert-danger"></h5>Please fill all fields</h5></div>'); 
        }
       
    });
});