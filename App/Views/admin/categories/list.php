  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo url('/admin'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Categories</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
          <div class="col-sm-12">
              <div class="box box-danger" id="users-list">
                <div class="box-header with-border">
                  <h3 class="box-title">Manage Your Categories</h3>
                  <button class="btn btn-danger pull-right open-popup" type="button" data-modal-target="#add-category-form" data-target="<?php echo url('/admin/categories/add'); ?>">Add New Category</button>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div id="results"></div>
                  <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Category Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($categories AS $category) { ?>
                        <tr>
                          <td><?php echo $category->id;?></td>
                          <td><?php echo $category->name;?></td>
                          <td><?php echo ucfirst($category->status);?></td>
                          <td>
                            <button type="button" data-target="<?php echo url('admin/categories/edit/' . $category->id) ?>" data-modal-target="#edit-category-<?php echo $category->id; ?>" class="btn btn-primary open-popup">
                                Edit
                                <span class="fa fa-pencil"></span>
                            </button>
                            <button data-target="<?php echo url('admin/categories/delete/' . $category->id) ?>" class="btn btn-danger delete">
                                Delete
                                <span class="fa fa-trash"></span>
                            </button>
                          </td>
                        </tr>
                    <?php } ?>
                  </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                  <!-- <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">&raquo;</a></li>
                  </ul> -->
                </div>
              </div>
          </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->