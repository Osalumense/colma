$(document).ready(function (){
	

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

	$.ajax({
		type: 'post',
		url: '../include/myajax.php',
		data: {
			dataname: 'get_facilities'
		},
		dataType: 'json',
		success: function(results){
			var sn = 0;
			var table = '<div class="table-responsive"><table id="datatable1" class="table table-striped table-hover"><thead><tr><th>SN</th><th>FACILITY</th><th>FACILITY FEE</th><th>EDIT</th><th>DELETE</th></tr></thead><tbody>';
			for(var result in results){
				++sn;
				table += '<tr><td>' + sn + '</td><td id = "facility1' + results[result].fidno + '">' + results[result].facility + '</td><td id = "facilityfee1' + results[result].fidno + '">' + number(results[result].facilityfee) + '</td><td><button class = "btn btn-flat btn-default ink-reaction edit" id = "edit' + results[result].fidno + '" name = "edit' + results[result].fidno +'">EDIT</button></td><td><button class = "btn btn-flat btn-default ink-reaction delete" id = "delete' + results[result].fidno + '" name = "delete' + results[result].fidno + '">DELETE</button></td></tr>';
			}
			table += '</tbody></table></div>';			
			//console.log(table);
			$('#card-body').append(table);
			$('#datatable1').DataTable();
		}
	});

	$('#card-body').on('click', '.edit', function(){
		id = $(this).attr('id').replace('edit', '');
		$('#formModal').modal('show');
		//console.log($('#facility1' + id).val());
		$('#facility').val($('#facility1' + id).html());
		$('#facilityid').val(id);
		$('#facilityfee').val($('#facilityfee1' + id).html());
	});
	

	$('#card-body').on('click', '.delete', function(){
		facilityid = $(this).attr('id').replace('delete', '');
		if(confirm('Are you sure you want to delete this facility?')){
			$.ajax({
				url: '../include/myajax.php',
				method: 'post',
				data: {
					facilityid:facilityid,
					dataname:'deletefacility'
				},
				success: function(response){
					alert($.trim(response));
					window.location='editfacilities.php';
				}				
			});
		}
	});

	function number(v){
		v = v.replace('NaN', '');
		v = v.replace(/\,/g,'');
		if (v.indexOf('.') > -1 ){
			n = v.toString().split(".")[0];
			a = v.toString().split(".")[1];
			n = parseFloat(n.replace(/\,/g,''),10);
			return n.toLocaleString() + "." + a;
		}
		else{
			n = v;
			n = parseFloat(n.replace(/\,/g,''),10);
			return n.toLocaleString();	
		}
	}
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
	});

	//Update facilities
	$('#editfacilities').on('click', function(e){
		e.preventDefault();
		var facility = $('#facility').val();
		var facilityid = $('#facilityid').val();
		var facilityfee = $('#facilityfee').val();
		// console.log(facilityfee + ' ' + facilityid + ' ' + facility);

		$.ajax({
			url: '../include/myajax.php',
			method: 'post',
			data: {
				facilityfee:facilityfee,
				facilityid:facilityid,
				facility:facility,
				dataname:'updatefacility'
			},
			success: function(response){
				alert($.trim(response));
				window.location='editfacilities.php';
			}
		});
	});
});