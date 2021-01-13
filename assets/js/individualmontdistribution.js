$(document).ready(function(){
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

	$('#searchbtn').on('click', function(e){
		e.preventDefault();
		$("#table, #msg").html('');
		$('#displayinfo, .tools').hide();
		$('#searchform').show();
		var id = $('#memid1').val();
		
		$.ajax({
			url: '../include/myajax.php',
			type: 'post',
			dataType: 'json',
			data:{
				id: id,
				dataname: 'getindividualmontdistribution',
			},
			success: function(response){
				$('#displayinfo, .tools').show();
				$('#searchform').hide();
				$('#table').html(response.tbl);
			}
		});

    });
    
    $('#goback').on('click', function(e){
		e.preventDefault();
		$('#displayinfo, .tools').hide();
		$('#searchform').show();
		$('#msg').empty();		
    });
    
    $(document).on('click', '#mdeductiontbl .editamt', function(){
        var tr = $(this);
        var amt = tr.closest('tr').find('.amount');
        amt.attr('disabled', false);
		amt.focus();
	});
	
	$(document).on('keyup', '.amount', function() {
		var sum = 0;
		$('#mdeductiontbl tr').each(function() {
			var tr = $(this);
			var amt = tr.find('.amount').val();
			if(typeof amt !== 'undefined') {
				amt.replace(amt.toLocaleString());
				var amount = Number(amt.replace(/,/g, ""));
				sum += amount;			
			}
		});

		$('#mdeductiontbl #totalamt').val(sum.toLocaleString());
	});

    function numberWithCommas(x) {
        var parts = x.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return parts.join(".");
    }

    $(document).on('keyup', '.number', function(event) {
        // skip for arrow keys
        if(event.which >= 37 && event.which <= 40){
         event.preventDefault();
        }
      
        $(this).val(function(index, value) {
            value = value.replace(/,/g,''); // remove commas from existing input
            return numberWithCommas(value); // add commas back in
        });
	});
	
	var chek = 0;
	$(document).on('click', '#mdeductiontbl .checkamt', function() {
		var chkbox = $(this);
		chkbox.each(function(){
			if($(this).is(":checked")) {
				chek++;
			}
			else {
				chek--;
			}
			
		});
		
		if(chek > 0) {
			$('#updatememdeduct').attr('disabled', false);
		}
		else {
			$('#updatememdeduct').attr('disabled', true);
		}
		
	});

	$('#updatememdeduct').on('click', function(e) {
		e.preventDefault();
		$('#msg').html('<div class="alert alert-warning"><h5>Are you sure you want to update this record?</h5></div><br><div><button type="button" class="btn btn-success" id="submit-final">Yes</button><button type="button" class="btn btn-danger" id="cancel-final">No</button></div>');
		$('.modal-footer').attr('hidden', true);
		$('#formModal').modal('show');		
		
	});

	$(document).on('click', '#submit-final', function() {
		$(this).attr('disabled', true);
		var id = [];
		$('#mdeductiontbl .checkamt').each(function() {
			if($(this).is(":checked")) {
				var vals = {};
				var getid = $(this).attr('id').replace('check', '');
				var amount = $(this).closest('tr').find('.amount').val();
				vals.col1 = getid;
				vals.col2 = amount;
				id.push(vals);
			}
		});
		var arr = JSON.stringify(id);
		
		$.ajax({
			url: '../include/myajax.php',
			type: 'post',
			//dataType: 'json',
			data:{
				arr: arr,
				dataname: 'updateindividualmdeduction',
			},
			success: function(response){
				$('#msg').html(response);
				$('.modal-footer').attr('hidden', false);
				$('#submit-final').attr('disabled', false);
			}
		});
	});

	$(document).on('click', '#cancel-final', function() {
		$('#formModal').modal('hide');
	});
});