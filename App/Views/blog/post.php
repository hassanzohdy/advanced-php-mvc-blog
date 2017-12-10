<!-- Breadcrumb -->
<ul class="breadcrumb box">
    <li>
        <a href="<?php echo url('/'); ?>">Home</a>
    </li>
    <li>
        <a href="<?php echo url('/category/' . seo($post->category) . '/' . $post->category_id); ?>"><?php echo $post->category; ?></a>
    </li>
    <li class="active"><?php echo $post->title; ?></li>
</ul>
<!-- /Breadcrumb -->
<!-- Main Content -->
<div class="col-sm-9 col-xs-12" id="main-content">
    <!-- Post Page -->
    <div id="post-page">
        <!-- Post Box -->
        <div class="box post-box wow fadeIn" data-wow-duration="3s">
            <div class="post-content">
                <div class="social-icons pull-right">
                    <a href="#" class="facebook">
                        <span class="fa fa-facebook"></span>
                    </a>
                    <a href="#" class="twitter">
                        <span class="fa fa-twitter"></span>
                    </a>
                    <a href="#" class="google">
                        <span class="fa fa-google-plus"></span>
                    </a>
                </div>
                <h1 class="heading"><?php echo $post->title; ?></h1>
                <div class="date-container">
                    <span class="fa fa-calendar"></span>
                    <span class="date"><?php echo date('d/m/Y h:i A', $post->created); ?></span>
                </div>
                <div class="clearfix"></div>
                <a href="#" class="image-box">
                    <img src="<?php echo assets('images/' . $post->image); ?>" alt="<?php echo $post->title; ?>" />
                </a>
                <p class="details">
                    <?php echo htmlspecialchars_decode($post->details); ?>
                </p>
            </div>
            <div id="post-author">
                <img src="<?php echo assets('images/' . $post->userImage); ?>" alt="" />
                <div class="name">
                    <?php echo $post->first_name . ' ' . $post->last_name; ?>
                    <div class="author-detials">
                        David Cage is a perfect Blog Publisher that creates wonderful
                    </div>
                </div>
            </div>
        </div>
        <!--/ Post Box -->
        <!-- Comments -->
        <div id="comments" class="box">
            <!-- Total Comments -->
            <div id="total-comments">
                <span><?php echo count($post->comments); ?></span> Comments
            </div>
            <!--/ Total Comments -->
            <?php foreach ($post->comments AS $comment) { ?>
            <div class="comment">
                <div class="author-image">
                    <img src="<?php echo assets('images/' . $comment->userImage); ?> " alt="" />
                </div>
                <div class="comment-container">
                    <div class="author-name">
                        <?php echo $comment->first_name . ' ' . $comment->last_name; ?>
                    </div>
                    <div class="comment-date">
                        <?php echo date('d/m/Y h:i A', $comment->created); ?>
                    </div>
                    <div class="comment-text">
                        <?php echo $comment->comment; ?>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <!--/ Comments -->
        <!-- Comment Form -->
        <form action="<?php echo url('/post/' . seo($post->title) . '/' . $post->id . '/add-comment'); ?>" method="post" id="comment-form" class="box">
            <h3 class="heading">Post Comment</h3>
            <textarea name="comment" id="comment" class="input" placeholder="Post Your Comment" cols="30" rows="10" required="required"></textarea>
            <button class="comment-button">Submit</button>
        </form>
        <!--/ Comment Form -->
    </div>
    <!--/ Post Page  -->
</div>
<!--/ Main Content -->