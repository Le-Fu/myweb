<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
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
    <link rel="stylesheet" href="css/blog.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <script src="js/require.js" data-main="js/index" ></script>
</head>
<body>
<?php include 'header.php'?>

<div id="blog">
    <div class="wrapper">
        <div class="blog-top">
            <h2>Latest Works</h2>
            <ul class="blog-cate">
                <li><a href="" class="active">All</a></li>
                <?php
                    foreach($categories as $category){
                ?>
                        <li><a href=""><?php echo $category -> cate_name?></a></li>
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
                        <a href="">
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

<?php include 'footer.php'?>
</body>
</html>