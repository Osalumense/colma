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
		// url: '../include/appajax.php',
		// data: {facilities: 'facilities'},
		url: '../include/myajax.php',
		data: {
			dataname: 'get_facilities'
		},
		dataType: 'json',
		success: function(results){
			var sn = 0;
			var table = '<div class="table-responsive">' +
							'<table id="datatable1" class="table table-striped table-hover">'+
								'<thead><tr><th>SN</th><th>FACILITY</th><th>FACILITY FEE</th></tr></thead><tbody>';
			for(var result in results){
				
				//console.log(results[result].title)
				++sn;
				table += '<tr><td>' + sn + '</td><td>' + results[result].facility + '</td><td>' + results[result].facilityfee + '</td></tr>';
			}
			table +=  '</tbody></table></div>';
			$('.card-body').append(table);
			$('#datatable1').DataTable();
		}
	});
});