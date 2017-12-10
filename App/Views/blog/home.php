        <!-- Slideshow -->
        <div id="slideshow" class="carousel slide wow fadeInDown"  data-wow-duration="3s" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#slideshow" data-slide-to="0" class="active"></li>
            <li data-target="#slideshow" data-slide-to="1"></li>
            <li data-target="#slideshow" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="<?php echo assets('blog/images/slides/1.jpg'); ?>" alt="...">
            </div>
            <div class="item">
                <img src="<?php echo assets('blog/images/slides/2.jpg'); ?>" alt="...">
            </div>
            <div class="item">
                <img src="<?php echo assets('blog/images/slides/3.jpg'); ?>" alt="...">
            </div>
          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#slideshow" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#slideshow" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <!--/ Slideshow -->
        <!-- Main Content -->
        <div class="col-sm-9 col-xs-12" id="main-content">
            <?php foreach ($posts AS $post) { ?>
                <?php echo $post_box($post);?>
             <?php } ?>
        </div>
        <!--/ Main Content -->