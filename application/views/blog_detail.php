<!-- 
 ________  ________  ________  ________  ___  _________    ___    ___ 
|\   __  \|\   __  \|\   __  \|\   ____\|\  \|\___   ___\ |\  \  /  /|
\ \  \|\  \ \  \|\  \ \  \|\  \ \  \___|\ \  \|___ \  \_| \ \  \/  / /
 \ \  \\\  \ \   ____\ \   __  \ \  \    \ \  \   \ \  \   \ \    / / 
  \ \  \\\  \ \  \___|\ \  \ \  \ \  \____\ \  \   \ \  \   \/  /  /  
   \ \_______\ \__\    \ \__\ \__\ \_______\ \__\   \ \__\__/  / /    
    \|_______|\|__|     \|__|\|__|\|_______|\|__|    \|__|\___/ /     
                                                         \|___|/    
 -->
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
    
    <link rel="shortcut icon" type="favicon.ico" href="img/opacity_favicon.ico">
    <link rel="stylesheet" href="https://cdn.bootcss.com/highlight.js/9.9.0/styles/magula.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/blog_detail.css">
    <script src="https://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/marked/0.3.6/marked.min.js"></script>
    <script src="https://cdn.bootcss.com/highlight.js/9.9.0/highlight.min.js"></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-89543262-1', 'auto');
      ga('send', 'pageview');

    </script>

</head>
<body>
    <?php include 'header.php';?>
    <div id="article">
        <div class="container">
        <div class="wrap">

            <div class="title-zoom">
                <h1 class="title"> <?php echo $blog -> title;?> </h1>
                <h4 class="author-name">Author: <?php echo $blog -> author;?> </h4>
            </div>

        
            <div id="preview"><div class="content" style="display: none;"><?php echo $blog->content;?></div></div>

                
            
        </div>
        </div>
    </div>
        <div class="container">
        <div class="wrap">
            <ul class="article-info">
                <li class="clicked">
                    <i class="fa fa-heart flag" aria-hidden="true"></i>&nbsp;
                    <?php echo $blog->click;?>
                </li>
                <li class="category">
                    <i class="fa fa-tag flag" aria-hidden="true"></i>&nbsp;
                    <?php echo $blog->cate_name;?>
                </li>
                <li class="date">
                    <i class="fa fa-calendar-check-o flag" aria-hidden="true"></i>&nbsp;
                    <?php echo date('Y-m-d', strtotime($blog -> post_time));?>
                </li>
            </ul>
        </div>
        </div>
    <div id="article-comment">
        <div class="container">
        <div class="wrap">
            <h3><span class="comment-num" id="comment-num"><?php echo count($blog -> comments);?></span> Responses</h3>
            <ul class="comment-list">
                <?php
//                    foreach($blog -> comments as $comment){
                    foreach($blog -> comments as $comment){
                ;?>
                    <li class="comment">
                        <ul class="comment-info">
                            <li><i class="fa fa-user flag" aria-hidden="true"></i>&nbsp;<?php echo $comment->username;?></li>
                            <li><i class="fa fa-calendar-o flag" aria-hidden="true"></i>&nbsp;<?php echo date('Y-m-d', strtotime($comment->comment_date));?></li>
                        </ul>
                        <p class="content"><?php echo $comment->message;?></p>
                    </li>
                <?php
                    }
                ?>
            </ul>
            <div class="comment-form">
                <h3>Leave a comment</h3>
                <input type="hidden" id="blogId" value="<?php echo $blog->blog_id;?>">
                <p><input type="text" placeholder="Name*" id="username" class="text-box" name="username" required="required"></p>
                <p><input type="email" placeholder="Email" id="email" class="text-box" name="email"></p>
                <p><input type="tel" placeholder="Phone" id="phone" class="text-box" name="phone"></p>
                <p><textarea name="message" id="message" cols="30" rows="5" required="required" placeholder="Enter your messages..*"></textarea></p>
                <p><small>&nbsp;&nbsp;You have write <span id="count-num">0</span> letters。</small></p>
                <p><input type="button" value="Send" id="btn-send"></p>
            </div>
        </div>
    </div>    
    </div>
    
    <a id="go-top" href="#"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
    <?php include 'footer.php' ;?>


    <script>
        $(function(){
              //markdown
            var myblog = new marked.Renderer();
            marked.setOptions({
                renderer: myblog,
                gfm: true,
                tables: true,
                breaks: true,//回车换成br
                pedantic: false,
                sanitize: true,
                smartLists: true,
                smartypants: false
            });

            var $oContainer = $('#preview');
            var $content = $oContainer.text();
            var $preview = marked($content);
            $oContainer.append($preview);
            hljs.initHighlightingOnLoad();
                
            
        });

    </script>
    <script src="js/require.js" data-main="js/blog_detail"></script>

</body>
</html>