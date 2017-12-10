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
        <li class="active">
            <span class="fa fa-user"></span>
            Users
        </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
          <div class="col-sm-12">
              <div class="box box-danger" id="users-list">
                <div class="box-header with-border">
                  <h3 class="box-title">Manage Your Users </h3>
                  <button class="btn btn-danger pull-right open-popup" type="button" data-modal-target="#add-user-form" data-target="<?php echo url('/admin/users/add'); ?>">Add New User</button>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div id="results"></div>
                  <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Group Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Joined</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($users AS $user) { ?>
                        <tr>
                          <td style="vertical-align: middle;"><?php echo $user->id;?></td>
                          <td>
                            <img src="<?php echo assets('images/' . $user->image); ?>" style="width:50px; height: 50px; border-radius: 50%;" alt="" />
                            <?php echo $user->first_name . ' ' . $user->last_name;?>
                          </td>
                          <td style="vertical-align: middle;"><?php echo $user->group;?></td>
                          <td style="vertical-align: middle;"><?php echo $user->email;?></td>
                          <td style="vertical-align: middle;"><?php echo ucfirst($user->status);?></td>
                          <td style="vertical-align: middle;"><?php echo date('d-m-Y', $user->created);?></td>
                          <td style="vertical-align: middle;">
                            <button type="button" data-target="<?php echo url('admin/users/edit/' . $user->id) ?>" data-modal-target="#edit-user-<?php echo $user->id; ?>" class="btn btn-primary open-popup">
                                Edit
                                <span class="fa fa-pencil"></span>
                            </button>
                            <?php if ($user->id != 1) { ?>
                            <button data-target="<?php echo url('admin/users/delete/' . $user->id) ?>" class="btn btn-danger delete">
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