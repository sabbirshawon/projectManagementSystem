<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category</h1>
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
                <h3 class="card-title">Category</h3>
                <br>
                <br>
                <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCat" data-whatever="@mdo">Add New Category</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>Category Title</th>
                        <th>Category Status</th>
                        <th>Action</th>
                            
                    </tr>
                  </thead>
                    <tbody>
                    <?php foreach ($cat_info as $c_info):?>
                        <tr> 
                            <td><?php echo $c_info['category_title'];?></td>
                            <td>
                            <?php 
                                if($c_info['category_status'] == '1'){
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


            <!-- modal for add Designation -->
            <div class="modal fade" id="addCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url();?>category/add_cat" method="post">
                                <div class="form-group">
                                    <label class="col-form-label">Category Title: </label>
                                    <input type="text" class="form-control" name="category_title" required="required">
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Category Status: </label>
                                    <select name="category_status" class="form-control" required="required">
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
 