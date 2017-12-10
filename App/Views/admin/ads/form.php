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
              <label for="name">Ad Name</label>
              <input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>" placeholder="Ad Name">
            </div>

            <div class="form-group col-sm-12">
              <label for="link">Ad Url</label>
              <input type="text" class="form-control" name="link" id="link" value="<?php echo $link; ?>" placeholder="Ad Url">
            </div>

            <div class="form-group col-sm-6">
              <label for="start_at">Starts At</label>
              <input type="text" class="form-control" name="start_at" id="start_at" value="<?php echo $start_at; ?>" placeholder="Starting Ad Date">
            </div>

            <div class="form-group col-sm-6">
              <label for="end_at">Ends At</label>
              <input type="text" class="form-control" name="end_at" id="end_at" value="<?php echo $end_at; ?>" placeholder="Ending Ad Date">
            </div>

            <div class="form-group col-sm-6">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="enabled">Enabled </option>
                    <option value="disabled" <?php echo $status == 'disabled' ? 'selected': false; ?>>Disabled</option>
                </select>
            </div>

            <div class="form-group col-sm-6">
                <label for="page">Page</label>
                <select name="page" id="page" class="form-control">
                    <?php foreach ($pages AS $page) {?>
                    <option value="<?php echo $page; ?>" <?php echo $page == $ad_page ? 'selected' : false; ?>><?php echo $page; ?></option>
                    <?php } ?>
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