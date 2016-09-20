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
    <link rel="stylesheet" href="css/blog_detail.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>
    <?php include 'header.php'?>
    <div id="article">
        <div class="wrapper">
            <h1 class="title"><?php echo $blog->title;?></h1>
            <img src="<?php echo $blog->img;?>" alt="" class="img">
            <p class="content"><?php echo $blog->content;?></p>
            <ul class="article-info">
                <li class="date">
                    <i class="fa fa-calendar-check-o flag" aria-hidden="true"></i>&nbsp;
                    <?php echo $blog->post_time;?>
                </li>
                <li class="category">
                    <i class="fa fa-tag flag" aria-hidden="true"></i>&nbsp;
                    <?php echo $blog->cate_name;?>
                </li>
                <li class="clicked">
                    <i class="fa fa-heart flag" aria-hidden="true"></i>&nbsp;
                    <?php echo $blog->click;?>
                </li>
            </ul>
        </div>
    </div>

    <div id="article-comment">
        <div class="wrapper">
<!--            <h3><span class="comment-num" id="comment-num">--><?php //echo count($blog->comments);?><!--</span> Responses</h3>-->
            <h3><span class="comment-num" id="comment-num"><?php echo count($comments);?></span> Responses</h3>
            <ul class="comment-list">
                <?php
//                    foreach($blog -> comments as $comment){
                    foreach($comments as $comment){
                ?>
                    <li class="comment">
                        <ul class="comment-info">
                            <li><i class="fa fa-user flag" aria-hidden="true"></i>&nbsp;<?php echo $comment->username;?></li>
                            <li><i class="fa fa-calendar-o flag" aria-hidden="true"></i>&nbsp;<?php echo $comment->comment_date;?></li>
                        </ul>
                        <p class="content"><?php echo $comment->message;?></p>
                    </li>
                <?php
                    }
                ?>
            </ul>
            <div class="comment-form">
                <h3>Leave a comment</h3>
                <!--				<form action="" method="post">-->
                <input type="hidden" id="blogId" value="<?php echo $blog->blog_id;?>">
                <p><input type="text" placeholder="Name" id="username" class="text-box" name="username"></p>
                <p><input type="email" placeholder="Email" id="email" class="text-box" name="email"></p>
                <p><input type="tel" placeholder="Phone" id="phone" class="text-box" name="phone"></p>
                <p><textarea name="message" id="message" cols="30" rows="5" placeholder="Enter your messages.."></textarea></p>
                <p><input type="button" value="Send" id="btn-send"></p>
                <!--				<    /form>-->
            </div>
        </div>
    </div>
    <?php include 'footer.php'?>
    <script src="js/require.js" data-main="js/blog_detail"></script>
</body>
</html>