//department edit start//


$(document).ready(function() {
    $("#dept_edited tr").click(function(event){
        var dept_id = $(this).find('input:hidden').val();
        //alert(dept_id);
        var department_info_details = $('#department_info_details').val();
        
        $.ajax({
            url: department_info_details,
            type: 'POST',
            dataType: 'json',
            data: {'dept_id':dept_id},
            success:function(result){
                $('#deptName_id').val(result.deptName);
                $('#deptStatus_id').val(result.deptStatus);
                $('#deptID2').val(result.deptID);
             },
            error: function (jXHR, textStatus, errorThrown) {}
        });

    });
    
});