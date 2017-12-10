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
        <li class="active">Settings</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
          <div class="col-sm-12">
              <div class="box box-danger" id="ads-list">
                <div class="box-header with-border">
                  <h3 class="box-title">
                    <span class="fa fa-cogs"></span>
                    Settings
                  </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form action="<?php echo $action; ?>" method="post">
                        <?php if ($errors) { ?>
                            <div id="form-results" class="alert alert-danger">
                                <?php echo $errors;?>
                            </div>
                        <?php } ?>
                        <?php if ($success) { ?>
                            <div id="form-results" class="alert alert-success">
                                <?php echo $success;?>
                            </div>
                        <?php } ?>
                        <div class="form-group col-sm-12">
                          <label for="site_name">Site Name</label>
                          <input type="text" class="form-control" name="site_name" id="site_name" value="<?php echo $site_name; ?>" placeholder="Site Name">
                        </div>
                        <div class="form-group col-sm-12">
                          <label for="site_email">Site E-Mail</label>
                          <input type="email" class="form-control" name="site_email" id="site_email" value="<?php echo $site_email; ?>" placeholder="Site E-Mail">
                        </div>
                          <div class="form-group col-sm-12">
                            <label for="site_status">Site Status</label>
                            <select class="form-control" id="site_status" name="site_status">
                                <option value="enabled">Enabled </option>
                                <option value="disabled" <?php echo $site_status == 'disabled' ? 'selected': false; ?>>Disabled</option>
                            </select>
                          </div>
                          <div class="form-group col-sm-12">
                            <label for="site_close_msg">Site Close Message</label>
                                <textarea name="site_close_msg" class="details" id="site_close_msg" cols="30" rows="10"><?php echo $site_close_msg;?></textarea>
                          </div>
                          <button class="btn btn-info">Save</button>
                    </form>
                </div>
                <!-- /.box-body -->
              </div>
          </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->