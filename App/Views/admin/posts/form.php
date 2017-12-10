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
              <label for="title">Post Title</label>
              <input type="text" class="form-control" name="title" id="title" value="<?php echo $title; ?>" placeholder="Enter Post Title">
            </div>

            <div class="form-group col-sm-12">
              <label for="details">Details</label>
              <textarea name="details" class="details" id="details" cols="30" rows="10"><?php echo $details;?></textarea>
            </div>

            <div class="form-group col-sm-12">
              <label for="tags">Tags</label>
              <input type="text" class="form-control" name="tags" id="tags" value="<?php echo $tags; ?>" placeholder="Tags">
            </div>

            <div class="form-group col-sm-6">
              <label for="category_id">Category</label>
              <select name="category_id" class="form-control" id="users_group_id">
                <?php foreach ($categories AS $category) { ?>
                    <option value="<?php echo $category->id; ?>" <?php echo $category->id == $category_id ? 'selected' : false; ?>><?php echo $category->name; ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group col-sm-6">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="enabled">Enabled </option>
                    <option value="disabled" <?php echo $status == 'disabled' ? 'selected': false; ?>>Disabled</option>
                </select>
            </div>

            <div class="form-group col-sm-12">
              <label for="related_posts">Related Posts</label>
              <select name="related_posts[]" class="form-control" id="related_posts" multiple="multiple">
                <?php foreach ($posts AS $post) { if ($post->id == $id) continue; ?>
                    <option value="<?php echo $post->id; ?>" <?php echo in_array($post->id, $related_posts) ? 'selected' : false; ?>><?php echo $post->title; ?></option>
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
  <script>
    for(name in CKEDITOR.instances) {
        CKEDITOR.instances[name].destroy();
    }

    CKEDITOR.replaceAll( 'details' );

  </script>