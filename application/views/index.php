<?php
    $cate_id = $this -> input -> get('cateId');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>首页</title>
    <base href="<?php echo site_url();?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="My Skills Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>
    <?php include 'header.php'?>
    <div id="banner">
        <div class="wrapper">
            <div id="banner-content">
                <h1>Creative Ideas Live Here</h1>
                <p>Aliquam suscipit vel nulla quis eleifend. Maecenas vitae tristique ante. Sed sit amet vehicula libero.</p>
            </div>
            <div id="tv"><img src="img/tv.png" alt=""></div>
            <div class="clearfix"></div>
            <hr>
        </div>
    </div>
    <div id="blog">
        <div class="wrapper">
            <div class="blog-top">
                <h2>Latest Blogs</h2>
                <ul class="blog-cate">
                    <li><a href="javascript:;" class="active">All</a></li>
                    <?php
                        foreach($categories as $category){
                    ?>
                            <li>
                                <a href="javascript:;" data-id="<?php echo $category->cate_id;?>"><?php echo $category->cate_name;?></a>
                            </li>
                    <?php
                        }
                    ?>
                    <li><a href="blog.php">more..</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>

            <ul class="blog-list">
                <?php
                    foreach ( $blogs as $blog) {
                ?>
                        <li class="blog-li">
                            <a href="welcome/view_blog?blogId=<?php echo $blog->blog_id ;?>/">
                                <img src="<?php echo $blog -> img?>" alt="">
                                <div class="mask">
                                    <h3 class="blog-title"><?php echo $blog -> title?></h3>
                                    <span class="view-more">view more</span>
                                </div>
                            </a>
                        </li>
                <?php
                    }
                ?>
            </ul>
        </div>
    </div>
    <div id="service"></div>
    <div id="meet"></div>
    <?php include 'footer.php'?>
    <script src="js/require.js" data-main="js/index" ></script>
</body>
</html>