<!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Clients
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>Department">Department</a></li>
        <li><a href="">Clients</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box" id="department_box">
        <div class="box-header with-border">
          <h3 class="box-title">Client</h3> <br><br>


          <a type="button" class="btn btn-primary" href="<?php echo base_url();?>attendence/add_clockin"> Clock In </a>

          

        </div>
        <div class="box-body">
          <input type="hidden" id="cli_info_details" value="<?php echo base_url();?>clients/get_cli_info_for_edit">
          <table id="example3" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Clock In</th>
                    <th>Clock Out</th>
                    <th>Clock Out</th>
                  </tr>
                </thead>
                <tbody id="cli_edited">
                <?php foreach ($attn_info as $c_info):?>
                <tr>
                  <input type="hidden" id="cli_<?php echo $c_info['a_id'];?>" value="<?php echo $c_info['a_id'];?>">
                  <td><?php echo $c_info['e_name'];?></td>
                  <td><?php echo $c_info['clock_in'];?></td>
                  <td><?php echo $c_info['clock_out'];?></td>
                  <td> 
                      <form  action="<?php echo base_url();?>attendence/add_clockout" method="post">
                        <input type="hidden" name="a_id" value="<?php echo $c_info['a_id'];?>" style="display: none;">
                        <input type="hidden" name="c_status" value="3">
                        <button type="submit" >Clock Out</button>
                        
                      </form>
                  </td>
                </tr>
               <?php endforeach;?>
                </tbody>
              </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->






    <div class="modal fade" id="editCli" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Update Client Info</h4>
          </div>
          <div class="modal-body">
            <form  action="<?php echo base_url();?>clients/edit_cli" method="post">
              <div class="form-group">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">Client Name</div>
                        <input type="text" class="form-control" name="clientName" id="clientName2" required="required">
                      </div>
                    </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                        
                      </div>
                   </form>
                </div>
                
              </div>
            </div>
          </div>

 
    <!-- modal end-->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


