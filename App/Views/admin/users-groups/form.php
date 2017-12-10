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
            <div class="form-group col-sm-12">
              <label for="users-group-name">Group name</label>
              <input type="text" class="form-control" name="name" id="users-group-name" value="<?php echo $name; ?>" placeholder="Group Name">
            </div>

            <div class="form-group col-sm-12">
                <label for="pages">Permissions</label>
                <select name="pages[]" id="pages" class="form-control" multiple="multiple">
                    <?php foreach ($pages AS $page) {?>
                    <option value="<?php echo $page; ?>" <?php echo in_array($page, $users_group_pages) ? 'selected' : false; ?>><?php echo $page; ?></option>
                    <?php } ?>
                </select>
            </div>
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