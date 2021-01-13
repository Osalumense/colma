$(document).ready(function(){
    function getmonthlydeduction(){
        var yearmont = $('#yearmont').val();
        $('#dedtable').empty();
        $('#total_div').hide();
        $('#ajax_loader').show();
        $.ajax({
            url: '../include/myajax.php',
            type: 'post',
            dataType: 'json',
            data: {
                yearmont: yearmont,
                dataname:'getmonthlydeduction',
            },
            success: function(data){
                $('#ajax_loader').hide();
                $('#total_div').show();
                $('#totalrecords').val(data.totalrecs);
                $('#totalamt').val(data.totalamt);
                $('#dedtable').html(data.tbl);
                $('#rpstat').val('1');
            },
            error: function(request){
                $('#ajax_loader').hide();
                alert('Something went wrong please try again');
            },
            timeout: 20000
        });
    }

    $('#setupmonthlyded').on('click', function(e){
        e.preventDefault();
        var rpstat = $('#rpstat').val();
       
        if(rpstat == 1){
            if(confirm('Are you sure you want to setup monthly deduction again for this month?')){
                if(confirm('Are you aware that any individual edit you have made to this month\'s deduction will be wiped off?')){
                    getmonthlydeduction();
                }
            }
        } 
        else{
            getmonthlydeduction();
        }    

        
    });
});