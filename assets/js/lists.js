$(document).ready(function() {
    $.ajax({
		url: "../include/myajax.php",
		dataType:"json",
		type:"post",
		data: {
			dataname:'getlists'
        },
        success: function (data) {
            console.log(data);
            $('#allmemberstblbody').html(data.allmembertbl);
            $('#currentmemberstblbody').html(data.currmembertbl);
            $('#notcurrentmemberstblbody').html(data.notcurrmembertbl);
        }
    });

    $('.export_tbl').on('click', function(e){
        e.preventDefault();
        //let tbl = $(this).closest('.table');
        var name = $(this).siblings('.table').attr('id');
        $('#'+name).table2excel({
            filename: name+".xls"
        });
        
        // console.log()
        //let id = tbl.attr('id');
        // console.log(name);        
    });
});