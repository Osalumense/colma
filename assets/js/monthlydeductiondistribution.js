$(document).ready(function(){

    function numberWithCommas(x) {
        var parts = x.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return parts.join(".");
    }

    $('.number').keyup(function(event) {
        $('#total-error').html('');
        // skip for arrow keys
        if(event.which >= 37 && event.which <= 40){
         event.preventDefault();
        }
      
        $(this).val(function(index, value) {
            value = value.replace(/,/g,''); // remove commas from existing input
            return numberWithCommas(value); // add commas back in
        });
    });

    $('#checktotal').on('click', function(e){
        e.preventDefault();
        let total = $('#total').val();
        let totaldeduct = $('#totaldeduction').val();
        totaldeduction = totaldeduct.replace(/,/g, "");

        if(totaldeduction == '') {
            $('#total-error').html('Field Cannot be empty');
        }
        else {
            if(totaldeduction == total) {
               $('#distributemonthlyded').attr('disabled', false);
               $('#distributemonthlyded').focus();
            }
            else if(totaldeduction > total)  {
                alert('Input amount is greater than Monthly Deduction Setup. Go to Edit Monthly Deduction');
                $('#distributemonthlyded').attr('disabled', true);
            }
            else {
                alert('Input amount is less than Monthly Deduction Setup. Go to Edit Monthly Deduction');
                $('#distributemonthlyded').attr('disabled', true);
            }
        }

    });

    $('#distributemonthlyded').on('click', function(e){
        e.preventDefault();
        var userid = $('#userid').val();
        $('#total_div').hide();
        $('#ajax_loader').show();
        $.ajax({
            url: '../include/myajax.php',
            type: 'post',
            data: {
                userid: userid,
                dataname:'runmonthlydistribution',
            },
            success: function(response){
                $('#ajax_loader').hide();
                alert($.trim(response));
                window.location='monthlydeductiondistribution.php';
            },
            error: function(request){
                $('#ajax_loader').hide();
                alert('Something went wrong please try again');
            },
            timeout: 20000
        });
    });
});