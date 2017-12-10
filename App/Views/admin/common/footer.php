  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.3
    </div>
    <strong>Copyright &copy; 2016 <a href="../http://www.aymanelash.com">Ayman Elash</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<div class="modal fade" id="user-profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">Update User Profile</h4>
    </div>
    <div class="modal-body">
        <form action="<?php echo url('/admin/profile/update'); ?>" class="form-modal form">
        <div id="form-results"></div>
        <div class="form-group col-sm-6">
          <label for="first_name">First Name</label>
          <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $user->first_name; ?>" placeholder="First Name">
        </div>
        <div class="form-group col-sm-6">
          <label for="last_name">Last Name</label>
          <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $user->last_name; ?>" placeholder="Last Name">
        </div>

        <div class="form-group col-sm-6">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email" value="<?php echo $user->email; ?>" placeholder="Email">
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
            <label for="status">Birthday</label>
            <input type="text" name="birthday" placeholder="Birth Day" class="form-control" value="<?php echo $user->birthday; ?>" />
        </div>

        <div class="form-group col-sm-6">
            <label for="gender">Gender</label>
            <select class="form-control" id="gender" name="gender">
                <option value="male">Male </option>
                <option value="female" <?php echo $user->gender == 'female' ? 'selected': false; ?>>Female</option>
            </select>
        </div>

        <div class="clearfix"></div>

        <div class="form-group col-sm-6">
            <label for="image">Image</label>
            <input type="file" name="image" />
        </div>

        <?php if ($user->image) { ?>
        <div class="form-group col-sm-6">
            <img src="<?php echo assets('images/' . $user->image); ?>" style="width:50px; height: 50px;" alt="" />
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


<!-- jQuery 2.2.0 -->
<!--  1.x.x -->
<!--  2.x.x -->
<script src="<?php echo assets('admin/plugins/jQuery/jQuery-2.2.0.min.js'); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo assets('admin/bootstrap/js/bootstrap.min.js'); ?>"></script>
<!-- CKEditor -->
<script src="<?php echo assets('admin/ckeditor/ckeditor.js'); ?>"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo assets('admin/plugins/morris/morris.min.js'); ?>"></script>
<!-- Sparkline -->
<script src="<?php echo assets('admin/plugins/sparkline/jquery.sparkline.min.js'); ?>"></script>
<!-- jvectormap -->
<script src="<?php echo assets('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>"></script>
<script src="<?php echo assets('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo assets('admin/plugins/knob/jquery.knob.js'); ?>"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo assets('admin/plugins/daterangepicker/daterangepicker.js'); ?>"></script>
<!-- datepicker -->
<script src="<?php echo assets('admin/plugins/datepicker/bootstrap-datepicker.js'); ?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo assets('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>"></script>
<!-- Slimscroll -->
<script src="<?php echo assets('admin/plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
<!-- FastClick -->
<script src="<?php echo assets('admin/plugins/fastclick/fastclick.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo assets('admin/dist/js/app.min.js'); ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo assets('admin/dist/js/pages/dashboard.js'); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo assets('admin/dist/js/demo.js');?>"></script>
<script>
    CKEDITOR.replaceAll( 'details' );

    // Steps to set the active sidebar link
    // 1- Get the current url
    var currentUrl = window.location.href;
    // 2- Get the last segment of the url
    var segment = currentUrl.split('/').pop();
    // 3- Add the "active" class to the id in sidebar of the current url
    $('#' + segment + '-link').addClass('active');

    $('.open-popup').on('click', function () {
        btn = $(this);
        url = btn.data('target');

        modalTarget = btn.data('modal-target');

        // remove the target from the page

        $(modalTarget).remove();

        $.ajax({
            url: url,
            type: 'POST',
            success: function (html) {
                $('body').append(html);
                $(modalTarget).modal('show');
            },
        });
               /*
        if ($(modalTarget).length > 0) {
            $(modalTarget).modal('show');
        } else {
            $.ajax({
                url: url,
                type: 'POST',
                success: function (html) {
                    $('body').append(html);
                    $(modalTarget).modal('show');
                },
            });
        }
*/
        return false;
    });

    $(document).on('click', '.submit-btn', function (e) {
        btn = $(this);

        e.preventDefault();

        form = btn.parents('.form');

        if (form.find('#details').length) {
            // if there is an element in the form has an id 'details'
            // then add the value for it to be gotten from ckeditor
            form.find('#details').val(CKEDITOR.instances.details.getData());
        }

        url = form.attr('action');

        data = new FormData(form[0]);

        formResults = form.find('#form-results');

        $.ajax({
            url: url,
            data: data,
            type: 'POST',
            dataType: 'json',
            beforeSend: function () {
                formResults.removeClass().addClass('alert alert-info').html('Loading...');
            },
            success: function(results) {
                if (results.errors) {
                    formResults.removeClass().addClass('alert alert-danger').html(results.errors);
                } else if (results.success) {
                    formResults.removeClass().addClass('alert alert-success').html(results.success);
                }

                if (results.redirectTo) {
                    window.location.href = results.redirectTo;
                }
            },
            cache: false,
            processData: false,
            contentType: false,
        });
    });


    /* Deleting */
    $('.delete').on('click', function (e) {
        e.preventDefault();

        button = $(this);

        var c = confirm('Are You Sure');

        if (c === true) {
            $.ajax({
                url: button.data('target'),
                type: 'POST',
                dataType: 'JSON',
                beforeSend: function () {
                    $('#results').removeClass().addClass('alert alert-info').html('Deleting...');
                },
                success: function(results) {
                    if (results.success) {
                        $('#results').removeClass().addClass('alert alert-success').html(results.success);
                        tr = button.parents('tr');

                        tr.fadeOut(function () {
                           tr.remove();
                        });
                    }
                }
            });
        } else {
            return false;
        }
    });
</script>
</body>
</html>