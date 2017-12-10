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
        <li class="active">Users Groups</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
          <div class="col-sm-12">
              <div class="box box-danger" id="users-list">
                <div class="box-header with-border">
                  <h3 class="box-title">Manage Your Users Groups</h3>
                  <button class="btn btn-danger pull-right open-popup" type="button" data-modal-target="#add-users-group-form" data-target="<?php echo url('/admin/users-groups/add'); ?>">Add New Users Group</button>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div id="results"></div>
                  <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Group Name</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($users_groups AS $users_group) { ?>
                        <tr>
                          <td><?php echo $users_group->id;?></td>
                          <td><?php echo $users_group->name;?></td>
                          <td>
                            <button type="button" data-target="<?php echo url('admin/users-groups/edit/' . $users_group->id) ?>" data-modal-target="#edit-users-group-<?php echo $users_group->id; ?>" class="btn btn-primary open-popup">
                                Edit
                                <span class="fa fa-pencil"></span>
                            </button>
                            <?php if ($users_group->id != 1) { ?>
                            <button data-target="<?php echo url('admin/users-groups/delete/' . $users_group->id) ?>" class="btn btn-danger delete">
                                Delete
                                <span class="fa fa-trash"></span>
                            </button>
                             <?php } ?>
                          </td>
                        </tr>
                    <?php } ?>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
          </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->