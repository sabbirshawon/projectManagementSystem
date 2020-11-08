//department edit start//


$(document).ready(function() {
    $("#dept_edited tr").click(function(event){
        var dept_id = $(this).find('input:hidden').val();
        //alert(dept_id);
        console.log(dept_id);
        var department_info_details = $('#department_info_details').val();
        //alert(department_info_details);
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
        //alert(designation_info_details);
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
                console.log(textStatus);
            }
        });

    });
    
});


//designation edit end//

// department onchange designation start
$(document).ready(function() {
    $('#dept_id').change(function(){
        var clss_id = $('#dept_id').val();
        var i;
        var submiturl=$('#dept_to_desg').val();
        console.log(submiturl);
        var outputs="";
        if(clss_id!=''){
        $.ajax({
            url: submiturl,
            type: 'POST',
            dataType: 'json',
            data: {'deptID':clss_id},
            success:function(result){
            outputs+='<option>Select a Designation</option>';
            for(i=0; i<result.length; i++ ){
              outputs+='<option value="'+result[i].designationID+'">'+result[i].designationName+'</option>';
             }
              $("#desg_ID").html(outputs);
             },
            error: function (jXHR, textStatus, errorThrown) {}
        });
        }
    });
});


// department onchange designation end

// department2 onchange designation start on employee view page
$(document).ready(function() {
    $('#e_dept_id').change(function(){
        var clss_id = $('#e_dept_id').val();
        var i;
        var submiturl=$('#dept_to_desg').val();
        var outputs="";
        if(clss_id!=''){
        $.ajax({
            url: submiturl,
            type: 'POST',
            dataType: 'json',
            data: {'deptID':clss_id},
            success:function(result){
            outputs+='<option>Select a Designation</option>';
            for(i=0; i<result.length; i++ ){
              outputs+='<option value="'+result[i].designationID+'">'+result[i].designationName+'</option>';
             }
              $("#e_desg_ID").html(outputs);
             },
            error: function (jXHR, textStatus, errorThrown) {}
        });
        }
    });
});


// department2 onchange designation end on employee view page