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
        <h1 class="heading">
            <a href="<?php echo url('/post/' . seo($post->title) . '/' . $post->id); ?>"><?php echo $post->title; ?></a>
        </h1>
        <div class="date-container">
            <span class="fa fa-calendar"></span>
            <span class="date"><?php echo date('d/m/Y h:i A');?></span>
        </div>
        <div class="clearfix"></div>
        <a href="<?php echo url('/post/' . seo($post->title) . '/' . $post->id); ?>" class="image-box">
            <img src="<?php echo assets('images/' . $post->image); ?>" alt="<?php echo $post->title; ?>" />
        </a>
        <p class="details">
            <?php echo html_entity_decode(read_more($post->details, 20)) ;?>...
        </p>
        <a href="<?php echo url('/post/' . seo($post->title) . '/' . $post->id); ?>" class="read-more">
            Read More
            <span class="fa fa-long-arrow-right"></span>
        </a>
    </div>

    <div class="post-box-footer">
        <a href="#" class="user">
            By:
            <span class="main"><?php echo $post->first_name . ' ' . $post->last_name; ?></span>
        </a>
        <a href="#" class="category">
            In:
            <span class="main"><?php echo $post->category; ?></span>
        </a>
        <a href="#" class="comments">
            <span class="main"><?php echo $post->total_comments; ?></span>
            Comments
        </a>
    </div>
</div>
<!--/ Post Box -->