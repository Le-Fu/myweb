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
    <div id="article-content">
        <div class="wrapper">
            <h3 class="title"><?php echo $blog->title;?></h3>
            <img src="<?php echo $blog->big_img;?>" alt="" class="img">
            <p class="content"><?php echo $blog->content;?></p>
            <ul class="article-info">
                <li class="date">
                    <small></small>
                    <?php echo $blog->post_date;?>
                </li>
                <li class="category"><?php echo $blog->cate_name;?></li>
                <li class="clicked"><?php echo $blog->clicked;?></li>
            </ul>
        </div>
    </div>
    <div id="article-comment">
        <div class="wrapper">
            <h3><span class="comment-num" id="comment-num"><?php echo count($blog->comments);?></span> Responses</h3>
            <ul class="comment-list">
                <?php
                    foreach($blog -> comments as $comment){
                ?>
                    <li class="comment">
                        <div class="comment-info">
                            <span class="username"><?php echo $comment->username;?></span>
                            <span class="post-date"><?php echo $comment->post_date;?></span>
                        </div>
                        <p class="content"><?php echo $comment->message;?></p>
                    </li>
                <?php
                    }
                ?>
            </ul>
            <div class="comment-form">
                <h3>leave a comment</h3>
                <!--				<form action="" method="post">-->
                <input type="hidden" id="blogId" value="<?php echo $blog->blog_id;?>">
                <p><input type="text" placeholder="Name" id="username" class="text-box" name="username"></p>
                <p><input type="email" placeholder="Email" id="email" class="text-box" name="email"></p>
                <p><input type="tel" placeholder="Phone" id="phone" class="text-box" name="phone"></p>
                <p><textarea name="message" id="message" cols="30" rows="10" class="text-box"></textarea></p>
                <p><input type="button" value="Send" id="btn-send"></p>
                <!--				</form>-->
            </div>
        </div>
    </div>
    <?php include 'footer.php'?>
    <script src="js/require.js" data-main="js/blog_detail"></script>
</body>
</html>