<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->

   <section class="content-header">
      <h1>
         Project Assign
         <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="">Project Assign</a></li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
   <div class="stepwizard col-md-offset-3">
    <div class="stepwizard-row setup-panel">
      <div class="stepwizard-step">
        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
        <p>Step 1</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
        <p>Step 2</p>
      </div>
    </div>
  </div>
  
  <form role="form" action="<?php echo base_url();?>assign_project/add_projects" method="post">

    <div class="row setup-content" id="step-1">
      <div class="col-md-6">
        <div class="col-md-12">
          <h4>Information</h4>
          <div class="form-group">
             <div class="input-group">
                  <div class="input-group-addon">Project Title</div>
                  <input type="text" class="form-control" name="project_title" required="required" >
              </div>
          </div>
          <div class="form-group">
              <div class="input-group">
                  <div class="input-group-addon">Recieve Date</div>
                  <input id="datefield1" type='date' class="form-control" name="project_receive_date"/>
                  <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
              </div>	
          </div>
          <div class="form-group">
              <div class="input-group">
                  <div class="input-group-addon">Project Deadline</div>
                  <input id="datefield2" type='date' class="form-control" name="project_deadline"/>
                  <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
              </div>	
          </div>

          <h4>Select Services</h4>
          <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">Seelct a Category</div>
                <?php echo form_dropdown('category_id',$pro_cat_info,'',' class="form-control" id="cat_select"');?>
                <a class="input-group-addon" data-toggle="modal" data-target="#addCategory" data-whatever="@mdo">+</a>
              </div>	
          </div>

          <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">Seelct a Product</div>
                <input type="hidden" id="show_cat_prod" value="<?php echo base_url();?>assign_project/get_cat_prod">
								<?php echo form_dropdown('product_id',$pro_info,'',' class="form-control" id="prod_select"');?>
									<a class="input-group-addon" data-toggle="modal" data-target="#addProduct" data-whatever="@mdo">+</a> 
              </div>	
          </div>

          <div class="form-group">
             <div class="input-group">
                <div class="input-group-addon">Seelct a Package</div>
                <input type="hidden" id="show_prod_pack" value="<?php echo base_url();?>assign_project/get_prod_pack">
									<?php echo form_dropdown('package_id',$pac_info,'',' class="form-control" id="pack_select"');?>
									<a class="input-group-addon" data-toggle="modal" data-target="#addPackage2" data-whatever="@mdo">+</a></div>
          </div>
          <div class="col-xs-6" id="dtils_pk">
									
          </div>
              <input type="hidden" id="pack_dtailss" value="<?php echo base_url();?>assign_project/get_pack_dtails">
							<input type="hidden" id="pack_dtailss_insert" value="<?php echo base_url();?>assign_project/add_addi_req2">
          </div>
      
    </div>



    <div class="col-md-6">
        <div class="col-md-12">
          <h4>Additional Requirement</h4>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon">Additional Requirement</div>
                    <input type="hidden" id="delelte_id" value="<?php echo base_url();?>assign_project/del_addi_req">
                    <input type="text" class="form-control" placeholder="Project Requirement" name="project_requirement_details" disabled>
                    <a class="input-group-addon" data-toggle="modal" data-target="#addAddiRequirement" data-whatever="@mdo">+</a>
                  </div>
                </div>
                <div class="col-xs-6" id="body_add_req">
                  
                </div>
           
        </div>


      <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
    </div>
  </div>
    <div class="row setup-content" id="step-2">
      <div class="col-md-12">
        <div class="col-md-12">
              <h3>Assign To Developer</h3>
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">Assign TO</div>
                  <?php echo form_dropdown('developerID[]',$em_info,'',' class="form-control select2" multiple="multiple" data-placeholder="Select a Developer"
                      style="width: 100%;"');?>
                </div>
              </div>

              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">Supervisor</div>
                  <?php echo form_dropdown('Supervisor',$em_info,'',' class="form-control select2_single"');?>
                </div>
              </div>

              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">Developer Deadline</div>
                  <input id="datefield3" type='date' class="form-control" name="project_dev_deadline"/>
                  <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                </div>
              </div>
          </div>
              <button class="btn btn-success btn-lg pull-right" type="submit">Submit</button>
    </div>


      
    </div>

  </form>
  
   </section>
   <!-- /.content -->
   
  <!--  
   <input type="checkbox" class="check" data-value="1"><span id="checkk1">Sample Data</span>
   <input type="checkbox" class="check" data-value="2"><span id="checkk2">Sample Data</span> -->
</div>




<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Update Category Info</h4>
      </div>
      <div class="modal-body">
        <form  action="<?php echo base_url();?>category/add_category2" method="post" id="cat_from">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">Category Title</div>
              <input type="text" class="form-control" name="category_title" required="required">
              <input type="hidden" id="catInfoList" value="<?php echo base_url();?>category/get_category_list" />
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">Status</div>
              <select class="form-control" name="category_status">
                <option>Category Status</option>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Update Product Info</h4>
      </div>
      <div class="modal-body">
        <form  action="<?php echo base_url();?>products/add_products2" method="post" id="pro_form">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">Category Title</div>
              <?php echo form_dropdown('category_id',$pro_cat_info,'',' class="form-control" id="clsss_id2"');?>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">Product Title</div>
              <input type="text" class="form-control" name="product_title" required="required">
              <input type="hidden" id="prodInfoList" value="<?php echo base_url();?>products/get_prod_list" />
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">Status</div>
              <select class="form-control" name="product_status">
                <option>Product Status</option>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addAddiRequirement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Add Additional Requirement</h4>
      </div>
      <div class="modal-body">
        <form  action="<?php echo base_url();?>assign_project/add_addi_req" method="post" id="add_requi_form">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">Requirement Title</div>
              <textarea class="form-control" name="project_requirement_details"></textarea>
              <input type="hidden" id="project_addi_req" value="<?php echo base_url();?>assign_project/get_project_add_req" />
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addPackage2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Add Package Info</h4>
      </div>
      <div class="modal-body">
        <form  action="<?php echo base_url();?>package/add_package2" method="post" id="pack_form">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">Product Title</div>
              <?php echo form_dropdown('product_id',$pro_info,'',' class="form-control" id="sessin_id"');?>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">Package Title</div>
              <input type="text" class="form-control" name="package_title" required="required">
              <input type="hidden" id="packInfoList" value="<?php echo base_url();?>package/get_package_list" />
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">Package Features</div>
              <input type="hidden" id="del_pack_feaa" value="<?php echo base_url();?>package/del_pack_fea">
              <input type="text" class="form-control" name="  package_feature_details" disabled>
              <a class="input-group-addon" data-toggle="modal" data-target="#addFeatures" data-whatever="@mdo">+</a>
            </div>
          </div>
          <div class="form-group">
            <div id="pack_fea_req">
              
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">Status</div>
              <select class="form-control" name="package_status">
                <option>Package Status</option>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="addFeatures" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Add Package Features</h4>
      </div>
      <div class="modal-body">
        <form  action="<?php echo base_url();?>package/add_pack_req2" method="post" id="add_pack_features">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">Requirement Title</div>
              <input type="text" class="form-control" name="package_feature_details" required="required">
              
              <input type="hidden" id="pack_features_req" value="<?php echo base_url();?>package/get_package_add_req" />
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /.content-wrapper -->
<script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script>
 	$(document).ready(function () {
	  $('#datefield1').bind( "keyup change", function(e) {
			   var input = $(this).val();
			   var vals = input.split("-");
			   var yyyy = vals[0];
			   var mm = vals[1];
			   var dd = vals[2];

				if(dd<10){
					dd='0'+dd
				} 
				if(mm<10){
					mm='0'+mm
				} 

			today = yyyy+'-'+mm+'-'+dd;
			document.getElementById("datefield2").setAttribute("min", today);
			
	  });
	});




  $(document).ready(function () {
    $('#datefield1').bind( "keyup change", function(e) {
         var input = $(this).val();
         var vals = input.split("-");
         var yyyy = vals[0];
         var mm = vals[1];
         var dd = vals[2];

        if(dd<10){
          dd='0'+dd
        } 
        if(mm<10){
          mm='0'+mm
        } 

      today = yyyy+'-'+mm+'-'+dd;
      document.getElementById("datefield3").setAttribute("min", today);
      
    });
  });
	
	 $('.check').click(function(e) {
		 var k = $(this).attr('data-value');
		 if($(this). prop("checked") == true){
			$('#checkk'+k).css('text-decoration','line-through');
		 }
		 else{
			 $('#checkk'+k).css('text-decoration','none');
		 }
	 });
</script>
