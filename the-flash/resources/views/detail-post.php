<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('http://utbgeek.com/home/bradu25/public_html/utbgeek/wp-content/uploads/2016/01/the-flash-season-2-photos-wallpaper-widescreen-l28c1zq21w.jpg'); height: 450px">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="post-heading">
                    <h1><?php echo $post['title'] ?></h1>
                    <h2 class="subheading"><?php echo substr($post['content'],0,50)?></h2>
                    <span class="meta">Đăng bởi <a href="#"><?php echo $post['user_name'] ?></a> vào hồi <?php echo $post['created_time']?> trong <?php echo $post['category_name'] ?></span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <?php echo $post['content'] ; ?>
            </div>
        </div>
    </div>
</article>

<li class="next">
    <a href="<?php BASE_PATH ?>"> Back to home</a>
</li>
<hr>

