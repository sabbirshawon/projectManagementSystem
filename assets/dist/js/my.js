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

//employee edit start//


$(document).ready(function() {
    $("#emp_edited tr").click(function(event){
        var user_id = $(this).find('input:hidden').val();
        //alert(user_id);
        var emp_info_details = $('#emp_info_details').val();
        //alert(emp_info_details);
        $.ajax({
            url: emp_info_details,
            type: 'POST',
            dataType: 'json',
            data: {'user_id':user_id},
            success:function(result){
                $('#e_dept_id').val(result.deptID);
                $('#e_desg_ID').val(result.designationID);
                $('#user_type_id').val(result.user_type);
                $('#user_status_id').val(result.user_status);
                $('#user_id2').val(result.user_id);
             },
            error: function (jXHR, textStatus, errorThrown) {html()}
        });

    });
    
});


//employee edit end//


//category edit start//

$(document).ready(function() {
    $("#cat_edited tr").click(function(event){
        var category_id = $(this).find('input:hidden').val();
        //alert(category_id);
        var cat_info_details = $('#cat_info_details').val();
        console.log(cat_info_details);
        $.ajax({
            url: cat_info_details,
            type: 'POST',
            dataType: 'json',
            data: {'category_id':category_id},
            success:function(result){
                console.log(result);
                $('#category_title2').val(result.category_title);
                $('#category_status2').val(result.category_status);
                $('#category_id2').val(result.category_id);
             },
            error: function (jXHR, textStatus, errorThrown) {html()}
        });

    });
    
});


//category edit end//


//product edit start//

$(document).ready(function() {
    $("#prod_edited tr").click(function(event){
        var product_id = $(this).find('input:hidden').val();
        //alert(product_id);
        var prod_info_details = $('#prod_info_details').val();
        //console.log(prod_info_details);
        $.ajax({
            url: prod_info_details,
            type: 'POST',
            dataType: 'json',
            data: {'product_id':product_id},
            success:function(result){
                console.log(result);
                $('#cat_id2').val(result.category_id);
                $('#product_title2').val(result.product_title);
                $('#product_status2').val(result.product_status);
                $('#product_id2').val(result.product_id);
             },
            error: function (jXHR, textStatus, errorThrown) {
                console.log(textStatus);
            }
        });

    });
    
});


//product edit end//


//client edit start//

$(document).ready(function() {
    $("#cli_edited tr").click(function(event){
        var client_id = $(this).find('input:hidden').val();
      //  alert(client_id);
        var cli_info_details = $('#cli_info_details').val();
        $.ajax({
            url: cli_info_details,
            type: 'POST',
            dataType: 'json',
            data: {'client_id':client_id}, 
            success:function(result){
                $('#clientName2').val(result.clientName);
                $('#companyName2').val(result.companyName);
                $('#clientAddress2').val(result.clientAddress);
                $('#clientMobileNo2').val(result.clientMobileNo);
                $('#clientEmailAddress2').val(result.clientEmailAddress);
                $('#product_title2').val(result.product_title);
                $('#clientStatus2').val(result.clientStatus);
                $('#prod_id2').val(result.product_id);
                $('#client_id2').val(result.client_id);
             },
            error: function (jXHR, textStatus, errorThrown) {html()}
        });

    });
    
});
//client edit end//

//package edit start//

$(document).ready(function() {
    $("#pack_edited tr").click(function(event){
        var package_id = $(this).find('input:hidden').val();
      
        var pack_info_details = $('#pack_info_details').val();


        alert(pack_info_details);
        $.ajax({
            url: pack_info_details,
            type: 'POST',
            dataType: 'json',
            data: {'package_id':package_id},
            success:function(result){
                $('#package_title2').val(result.package_title);
                $('#package_status2').val(result.package_status);
                $('#package_id2').val(result.package_id);
             },
            error: function (jXHR, textStatus, errorThrown) {html()}
        });

    });
    
});


//package edit end//