<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
              Clients
    
            </h1>
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
                <h3 class="card-title">Clients</h3>
                <br>
                <br>
                <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCli" data-whatever="@mdo">Add New Clients</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Client Name</th>
                      <th>Company Name</th>
                      <th>Address</th>
                      <th>Contact No</th>
                      <th>Email</th>
                      <th>Product</th>
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



             <!-- modal for Add clients -->
             <div class="modal fade" id="addCli" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Package</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url();?>clients/add_client" method="post">
                                <div class="form-group">
                                    <label class="col-form-label">Client Name: </label>
                                    <input type="text" class="form-control" name="clientName" required="required">
                                    
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Company Name: </label>
                                    <input type="text" class="form-control" name="companyName" required="required">
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Address: </label>
                                    <input type="text" class="form-control" name="clientAddress" required="required">
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Mobile No: </label>
                                    <input type="text" class="form-control" name="clientMobileNo" required="required">
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Email: </label>
                                    <input type="email" class="form-control" name="clientEmailAddress" required="required">
                                </div>
                              
            
                                <div class="form-group">
                                    <label class="col-form-label">Product: </label>
                                    <?php echo form_dropdown('product_id',$prod_info,'',' class="form-control"');?>
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

          <!-- Add clients modal finished -->

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
 