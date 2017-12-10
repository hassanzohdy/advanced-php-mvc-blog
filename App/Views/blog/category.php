    <!-- Breadcrumb -->
    <ul class="breadcrumb box">
        <li>
            <a href="<?php echo url('/'); ?>">Home</a>
        </li>
        <li class="active"><?php echo $category->name; ?></li>
    </ul>
    <!-- /Breadcrumb -->
    <!-- Main Content -->
    <div class="col-sm-9 col-xs-12" id="main-content">
        <!-- Category Page -->
        <?php if ($category->posts) { ?>
        <div id="category-page">
            <?php foreach ($category->posts AS $chunked_posts) { ?>
                <?php foreach ($chunked_posts AS $post) { $post->category = $category->name; ?>
                <div class="col-sm-6">
                    <?php echo $post_box($post);?>
                </div>
                <?php } ?>
            <?php } ?>
        </div>
        <!--/ Category Page -->
        <div class="clearfix"></div>
        <!-- Pagination Links -->
        <nav aria-label="Page navigation" class="text-center">
          <ul class="pagination">
            <li>
                <a href="<?php echo $url . 1; ?>" title="First Page">
                    <span class="fa fa-angle-double-left"></span>
                </a>
            </li>
            <li>
              <a href="<?php echo $url . $pagination->prev(); ?>" aria-label="Previous" title="Previous Page">
                    <span class="fa fa-angle-left"></span>
              </a>
            </li>
            <?php for ($page = 1; $page <= $pagination->last(); $page++) { ?>
                <li<?php echo $page == $pagination->page() ? ' class="active"': false; ?>>
                    <a href="<?php echo $url . $page; ?>"><?php echo $page; ?></a>
                </li>
            <?php } ?>
            <li>
              <a href="<?php echo $url . $pagination->next(); ?>" aria-label="Next">
                <span class="fa fa-angle-right"></span>
              </a>
            </li>
            <li>
              <a href="<?php echo $url . $pagination->last(); ?>" aria-label="Next">
                <span class="fa fa-angle-double-right"></span>
              </a>
            </li>
          </ul>
        </nav>
        <!--/ Pagination Links -->
        <?php  } else { ?>
            <div class="box" style="padding: 10px;">
                <h1 class="bold">No Posts In This Categories</h1>
            </div>
        <?php } ?>
    </div>
    <!--/ Main Content -->