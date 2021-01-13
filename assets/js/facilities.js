$(document).ready(function(){
    function formatNumber(num) {
        return num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
    }

    $("#facilityfee").on('keyup', function(evt){
        var v = $(this).val();
        var v = $(this).val().replace('NaN', '');
        //$(this).val(formatNumber(v));
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

    $('#save_facility').on('click', function(e){
        e.preventDefault();
        var facilityname = $('#facilityname').val();
        var facilityfee = $('#facilityfee').val();

        console.log(facilityfee+' '+facilityname);
        $.ajax({
            method:'post',
            url:'../include/myajax.php',
            dataType:'json',
            data:{
                facilityname:facilityname,
                facilityfee:facilityfee,
                dataname:'addnewfacility'
            },
            success:function(data){
                $('#formModal').modal('show');
                if(data.err == ''){
                    $('#msg').html(data.msg);
                    $('#addfacility')[0].reset();
                }
                else{
                    
                    $('#msg').html(data.msg);
                }
            }
        });
		
    });
    
    $('#addfacility').on('click', function(){
        $('#msg').html('');
    })
});