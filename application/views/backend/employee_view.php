<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee</h1>
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
                <h3 class="card-title">Employee</h3>
                <br><br>
                <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#addEmp" data-whatever="@mdo">Add New Employee</a>
                <br><br>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Designation</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                            
                        </tr>
                  </thead>
                    <tbody>
                        <tr> 
                            <td></td>
                            <td></td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td>
                                <a type="button" class="btn btn-primary">Edit</a>
                            </td> 
                        </tr>
                    </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- modal start-->
            <div class="modal fade" id="addEmp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="#" method="post">
                                <div class="form-group">
                                    <label class="col-form-label">Department Name:</label>
                                    <?php echo form_dropdown('deptID',$deptt_info,'',' class="form-control" id="dept_id"');?>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Designation Name:</label>
                                    <?php echo form_dropdown('designationID',$desg_info,'',' class="form-control" id="desg_ID"');?>
                                </div>

                                <div class="form-group">
                                    <label for="Emp_email" class="col-form-label">Employee Name:</label>
                                    <input type="text" class="form-control" id="Emp_email" name="e_name" required="required">
                                </div>

                                <div class="form-group">
                                    <label for="Emp_email" class="col-form-label">Employee Email:</label>
                                    <input type="email" class="form-control" id="Emp_email" name="user_email" required="required">
                                </div>

                                <div class="form-group">
                                    <label for="Emp_pass" class="col-form-label">Employee Password:</label>
                                    <input type="password" class="form-control" id="Emp_pass" name="user_password" required="required">
                                </div>

                                <div class="form-group">
                                    <label for="jDate" class="col-form-label">Employee Joined Date:</label>
                                    <input type="date" class="form-control" id="jDate" name="e_joined_date" required="required">
                                </div>

                    


                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Designation Status:</label>
                                      <select name="user_type" class="form-control">
                                        <option value="Admin">Admin</option>
                                        <option value="Developer">Developer</option>
                                        <option value="Manager">Manager</option>
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
 