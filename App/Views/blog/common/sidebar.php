        <!-- Widget -->
        <div class="col-sm-3 hidden-xs" id="widget">
            <!-- Social Widget -->
            <section class="box wow fadeInDown" data-wow-duration="2s" id="social-widget">
                <h3 class="heading">Social Media</h3>
                <div class="content">
                    <a href="#" class="facebook">
                        <span class="fa fa-facebook"></span>
                    </a>
                    <a href="#" class="google">
                        <span class="fa fa-google-plus"></span>
                    </a>
                    <a href="#" class="twitter">
                        <span class="fa fa-twitter"></span>
                    </a>
                    <a href="#" class="youtube">
                        <span class="fa fa-youtube"></span>
                    </a>
                    <a href="#" class="instagram">
                        <span class="fa fa-instagram"></span>
                    </a>
                    <a href="#" class="pinterest">
                        <span class="fa fa-pinterest"></span>
                    </a>
                    <a href="#" class="rss">
                        <span class="fa fa-rss"></span>
                    </a>
                </div>
            </section>
            <!--/ Social Widget -->
            <!-- Search Widget -->
            <section class="box wow fadeInDown" data-wow-duration="2s" id="search-widget">
                <h3 class="heading">Search Blog</h3>
                <div class="content">
                    <form action="#">
                        <input type="text" name="search" class="input placeholder" placeholder="Search Blog" />
                        <button class="button">Search</button>
                    </form>
                </div>
            </section>
            <!--/ Search Widget -->
            <!-- Categories Widget -->
            <section class="box wow fadeInDown" data-wow-duration="2s" id="categories-widget">
                <h3 class="heading">Categories</h3>
                <div class="content">
                    <?php foreach ($categories AS $category) { ?>
                    <a href="<?php echo url('category/' . seo($category->name) . '/' . $category->id); ?>">
                        <span class="name"><?php echo $category->name; ?></span>
                        <span class="total-posts" title="Posts"><?php echo $category->total_posts; ?></span>
                    </a>
                    <?php } ?>
                </div>
            </section>
            <!--/ Categories Widget -->
            <!-- Popular Posts Widget -->
            <section class="box wow fadeInDown" data-wow-duration="2s" id="popular-posts-widget">
                <h3 class="heading">Popular Posts</h3>
                <div class="content">
                    <a href="#">
                        Wildly Addictive Green Super Smoothie
                    </a>
                    <a href="#">
                        Bath in Rose Petals
                    </a>
                    <a href="#">
                        Orange Roulade with Mascar Filling
                    </a>
                    <a href="#">
                        China's Taste For Australian Products
                    </a>
                </div>
            </section>
            <!--/ Popular Posts Widget -->
            <!-- Ads Widget -->
            <section id="ads-widget" class="wow fadeInDown" data-wow-duration="2s">
                <?php foreach ($ads AS $ad) { ?>
                <a href="<?php echo $ad->link; ?>" class="ad" target="_blank">
                    <img src="<?php echo assets('images/' . $ad->image); ?>" alt="" />
                </a>
                <?php } ?>
            </section>
            <!--/ Ads Widget -->
        </div>
        <!--/ Widget -->
