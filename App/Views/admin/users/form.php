  <div class="modal fade" id="<?php echo $target; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"><?php echo $heading; ?></h4>
        </div>
        <div class="modal-body">
            <form action="<?php echo $action; ?>" class="form-modal form">
            <div id="form-results"></div>
            <div class="form-group col-sm-6">
              <label for="first_name">First Name</label>
              <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $first_name; ?>" placeholder="First Name">
            </div>
            <div class="form-group col-sm-6">
              <label for="last_name">Last Name</label>
              <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $last_name; ?>" placeholder="Last Name">
            </div>

            <div class="form-group col-sm-6">
              <label for="users_group_id">Group</label>
              <select name="users_group_id" class="form-control" id="users_group_id">
                <?php foreach ($users_groups AS $users_group) { ?>
                    <option value="<?php echo $users_group->id; ?>" <?php echo $users_group->id == $users_group_id ? 'selected' : false; ?>><?php echo $users_group->name; ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group col-sm-6">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" id="email" value="<?php echo $email; ?>" placeholder="Email">
            </div>

            <div class="form-group col-sm-6">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>

            <div class="form-group col-sm-6">
              <label for="confirm_password">Confirm Password</label>
              <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Password">
            </div>

            <div class="form-group col-sm-6">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="enabled">Enabled </option>
                    <option value="disabled" <?php echo $status == 'disabled' ? 'selected': false; ?>>Disabled</option>
                </select>
            </div>

            <div class="form-group col-sm-6">
                <label for="status">Birthday</label>
                <input type="text" name="birthday" placeholder="Birth Day" class="form-control" value="<?php echo $birthday; ?>" />
            </div>

            <div class="form-group col-sm-6">
                <label for="gender">Gender</label>
                <select class="form-control" id="gender" name="gender">
                    <option value="male">Male </option>
                    <option value="female" <?php echo $gender == 'female' ? 'selected': false; ?>>Female</option>
                </select>
            </div>

            <div class="clearfix"></div>

            <div class="form-group col-sm-6">
                <label for="image">Image</label>
                <input type="file" name="image" />
            </div>

            <?php if ($image) { ?>
            <div class="form-group col-sm-6">
                <img src="<?php echo $image; ?>" style="width:50px; height: 50px;" alt="" />
            </div>
            <?php } ?>

            <div class="clearfix"></div>

            <br>
              <button class="btn btn-info submit-btn">Submit</button>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>