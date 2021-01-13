$(document).ready(function(){
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
			}
		});
	}
});