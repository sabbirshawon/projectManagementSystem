//department edit start//


$(document).ready(function() {
    $("#dept_edited tr").click(function(event){
        var dept_id = $(this).find('input:hidden').val();
        //alert(dept_id);
        console.log(dept_id);
        var department_info_details = $('#department_info_details').val();
        alert(department_info_details);
        $.ajax({
            url: department_info_details,
            type: 'POST',
            dataType: 'json',
            data: {'dept_id':dept_id},
            success:function(result){
                console.log("success");
                $('#deptName_id').val(result.deptName);
                $('#deptStatus_id').val(result.deptStatus);
                $('#deptID2').val(result.deptID);
                console.log(result.deptName);
             },
            error: function (jXHR, textStatus, errorThrown) {}
        });

    });
    
});


//designation edit start//


$(document).ready(function() {
    $("#desg_edited tr").click(function(event){
        var desg_id = $(this).find('input:hidden').val();
        //alert(desg_id);
        console.log(desg_id);
        var designation_info_details = $('#designation_info_details').val();
        alert(designation_info_details);
        $.ajax({
            url: designation_info_details,
            type: 'POST',
            dataType: 'json',
            data: {'designationID':desg_id},
            success:function(result){
                console.log("success");
                $('#dept_name2').val(result.deptID);
                $('#designationName_id').val(result.designationName);
                $('#desgStatus_id').val(result.desgStatus);
                $('#designationID2').val(result.designationID);

                console.log();
             },
            error: function (jXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });

    });
    
});


//designation edit end//