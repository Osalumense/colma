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
				dataname: 'getusermontdeduction',
			},
			success: function(response){
				$('#displayinfo, .tools').show();
				$('#searchform').hide();
				$('#table').html(response.tbl);
			}
		});

	});

	$(document).on('keyup', '.editamt', function(){
		var sum = 0;
		
		$('#mdeductiontbl tr td').each(function(){
			var tr = $(this);
			var amt = tr.find('.editamt').val();
			if(typeof amt !== 'undefined'){
				amt.replace(amt.toLocaleString());
				var amount = Number(amt.replace(/,/g, ""));
				sum += amount;
			}			
		});
		$('#total_deduct').val(sum.toLocaleString());
	});

	//Update member deduction
	$('#updatememdeduct').on('click', function(e){
		e.preventDefault();

		var deductarr = [];
		$('#mdeductiontbl tr td').each(function(){
			var tr = $(this);
		    var amt = tr.find('.editamt').val();
			var id = tr.find('.editamt').attr('id');
			var arr = {};	
			if(typeof amt !== 'undefined'){
				arr.col1 = id;
				arr.col2 = amt;				
				deductarr.push(arr);
			}			
			
		});
		

		var deductedit=JSON.stringify(deductarr);

		$.ajax({
			url: '../include/myajax.php',
			type: 'post',
			dataType: 'json',
			data: {
				deductedit:deductedit,
				dataname:'updatememdeduction'
			},
			success: function(data){
				$('#msg').html(data.msg);
			}
		});

	});

	$('#mdeductiontbl').on('click', function(){
		$('#msg').empty();
	});

	$('#goback').on('click', function(e){
		e.preventDefault();
		$('#displayinfo, .tools').hide();
		$('#searchform').show();
		$('#msg').empty();		
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
	$(".numbers").on('change', function(){
		var n = $(this).val().replace('NaN', '');
		$(this).val(n);
	});
});