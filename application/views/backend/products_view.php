<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
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
                <h3 class="card-title">Products</h3>
                <br>
                <br>
                <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProd" data-whatever="@mdo">Add New Product</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <input type="hidden" id="prod_info_details" value="<?php echo base_url();?>product/get_prod_info_for_edit">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Category Title</th>
                      <th>Product Title</th>
                      <th>Product Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="prod_edited">
                      <?php foreach ($pro_info as $p_info):?>
                        <tr> 
                        <input type="hidden" id="pro_<?php echo $p_info['product_id'];?>" value="<?php echo $p_info['product_id'];?>">
                            <td> <?php echo $p_info['category_title'];?> </td>
                            <td> <?php echo $p_info['product_title'];?> </td>
                            <td> 
                              <?php 
                                if($p_info['product_status'] == '1'){
                                  echo '<span class="text-success">Active</span>';
                                } 
                                else{
                                  echo '<span class="text-danger">Inactive</span>';
                                }
                              ?>
                            
                            </td>
                            <td>
                              <input type="hidden" name="product_id" value="<?php echo $p_info['product_id'];?>" style="display: none;">
                              <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#editProd" data-whatever="@mdo">Edit</a>
                            </td> 
                        </tr>
                        <?php endforeach;?>
                      </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- modal for add Products -->
            <div class="modal fade" id="addProd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url();?>product/add_prod" method="post">
                                <div class="form-group">
                                    <label class="col-form-label">Category Title: </label>
                                    <?php echo form_dropdown('category_id',$cat_info,'',' class="form-control"');?>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Product Title</label>
                                    <input type="text" class="form-control" name="product_title" required="required">
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Category Status: </label>
                                    <select name="product_status" class="form-control" required="required">
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


            <!-- modal for start edit Products -->
            <div class="modal fade" id="editProd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Products</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url();?>product/edit_prod" method="post">
                                <div class="form-group">
                                    <label class="col-form-label">Category Title: </label>
                                    <?php echo form_dropdown('category_id',$cat_info,'',' id="cat_id2" class="form-control"');?>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Product Title</label>
                                    <input type="text" class="form-control" name="product_title" id="product_title2" required="required">
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Category Status: </label>
                                    <select name="product_status" id="product_status2" class="form-control" required="required">
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

            <!-- modal  end for edit Products -->

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
 