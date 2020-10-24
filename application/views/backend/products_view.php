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
                <br>
                <br>
                <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#addEmploy" data-whatever="@mdo">Add New Employee</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Category Title</th>
                      <th>Product Title</th>
                      <th>Product Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                      <tbody>
                        <tr> 
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
 