<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header"
        style="background-image: url(<?php BASE_PATH; ?>'public/img/The_Flash_title_card.png'); height: 450px">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading"></div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
<!--    <form id="search" method="get" action="search/view" style="text-align: center;">-->
<!--        <input name="s" type="text" novalidate placeholder="Search here..."-->
<!--               style="border-radius: 10px; width: 400px; height: 50px; padding-left: 20px">-->
<!--        <button type="submit" id="butt">-->
<!--            <li class="fa fa-search" style="color: white;"></li>-->
<!--        </button>-->
<!--    </form>-->

    <div class="add"></div>
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <?php foreach ($result as $row) : ?>
                <div class="post-preview">
                    <a href="post/<?php echo $row['id'] ?>">
                        <h2 class="post-title"><?php echo $row['title'] ?></h2>
                    </a>
                    <h4 class="post-subtitle" style="font-weight: 300">
                        <span><?php echo substr($row['content'], 0, 200); ?>
                            <a href="post/<?php echo $row['id'] ?>">
                                <span class="see-more">
                                    <p style="font-size: 19px; font-weight: bold; font-style: italic; !important;">
                                        Detail &rsaquo;&rsaquo; </p>
                                </span>
                            </a>
                        </span>
                    </h4>
                    <p class="post-meta">Posted on <?php echo $row['created_time'] ?></p>
                </div>
                <hr>
            <?php endforeach; ?>
            <?php if($current_page > $total_page) :?>
                <hr>
                <h4 style="text-align: center"><?php echo $back_to_home ?></h4>
            <?php endif ?>
            <!--
                        <!-- Pager -->
            <ul class="pager">
                <?php if ($current_page > $total_page) : ?>
                    <li class="back_to_home">
                        <a style="text-align: center" href="<?php echo BASE_PATH ?>"> Back to homepage </a>
                    </li>
                <?php endif; ?>
                <?php if ($current_page > 1 && $current_page <= $total_page) : ?>
                    <li class="prev">
                        <a style="float: left" href="?page=<?php echo($current_page - 1) ?>">&#x2190; Newer Posts </a>
                    </li>
                <?php endif; ?>
                <?php if ($current_page < $total_page) : ?>
                    <li class="next">
                        <a href="?page=<?php echo($current_page + 1) ?>">Older Posts →</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>
<hr>
