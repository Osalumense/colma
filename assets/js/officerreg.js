$(document).ready(function(){
	$.ajax({
		type: 'post',
		url: '../include/appajax.php',
		data: {posts:'posts'},
		dataType: 'json',
		success: function(results){
			$("#post").append("<option value = '' selected></option>");
			for(var result in results){
				//console.log(results[result].title)
				$("#post").append("<option value = '" + results[result].officeid + "'>"+ results[result].office +"</option>")
			}
		}
	});
});