<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card" id="department_card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
                <br>
                <br>
                <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDepat" data-whatever="@mdo">Add New Department</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Department ID</th>
                    <th>Department Name</th>
                    <th>Department Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($department_info as $d_info):?>
                        <tr> 
                            <td><?php echo $d_info['deptID'];?></td>
                            <td><?php echo $d_info['deptName'];?></td>
                            <td>    
                                <?php 
                                    if($d_info['deptStatus'] == '1'){
                                        echo '<span class="text-success">Active</span>';
                                    } 
                                    else{
                                        echo '<span class="text-danger">Inactive</span>';
                                    }

                                ?>
                    
                            </td>

                            <td>
                                <a type="button" class="btn btn-primary">Edit</a>
                            </td> 
                        </tr>
                    <?php endforeach;?>
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


            <div class="card" id="department_card">
              <div class="card-header">
                <h3 class="card-title">Designation</h3>
                <br>
                <br>
                <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDesg" data-whatever="@mdo">Add New Designation</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                        <th>Designation ID</th>
                        <th>Department Name</th>
                        <th>Designation Name</th>
                        <th>Designation Status</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($designation_info as $d_info):?>
                        <tr> 
                            <td><?php echo $d_info['designationID'];?></td>
                            <td><?php echo $d_info['deptName'];?></td>
                            <td><?php echo $d_info['designationName'];?></td>
                            <td>
                                <?php 
                                    if($d_info['desgStatus'] == '1'){
                                        echo '<span class="text-success">Active</span>';
                                    } 
                                    else{
                                        echo '<span class="text-danger">Inactive</span>';
                                    }
                                ?>
                            </td>

                            <td>
                                <a type="button" class="btn btn-primary">Edit</a>
                            </td> 
                        </tr>
                    <?php endforeach;?>
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->



            <div class="modal fade" id="addDepat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Department</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url();?>department/add_dept" method="post">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Department Name:</label>
                                    <input type="text" class="form-control" id="recipient-name" name="deptName" required="required">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Department Status:</label>
                                    <select name="deptStatus" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            
                        
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>    

            
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 