$(document).ready(function(){
    $.ajax({
        url: '../include/myajax.php',
        type: 'post',
        dataType:"json",
        data: {
            dataname: 'viewmonthdeduction'
        },
        success: function(data){
            $('#totalrecords').val(data.totalrecs);
            $('#totalamt').val(data.totalamt);
            $('#dedtable').html(data.tbl);
            
        }
    });

    $('#export_tbl').on('click', function(e){
        e.preventDefault();
        $('#mdeductiontbl').table2excel({
            filename: "Monthly Deduction.xls"
        });
        
    });

    // $('#mdeductiontbl').tableExport({
    //     filename: 'Monthly Deduction',
    //     formats: ['xls', 'csv', 'txt'],
    //     position: 'top'
    // });
});