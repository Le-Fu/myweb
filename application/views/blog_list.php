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
<?php 
    $cate_id = $this -> input -> get('cateId');
 ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blogs</title>
    <base href="<?php echo site_url();?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="" />
    <script type="application/x-javascript">
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    
    <link rel="shortcut icon" type="favicon.ico" href="img/opacity_favicon.ico">
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/blog-list.css">
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
    <div class="container">
        <div class="col-md-8">
            <div class="row" id="blog-list">
                <?php 
                    foreach ($blogs as $blog) {
                 ?>  
                    <div class="blog">
                        <a href="welcome/view_blog?blogId=<?php echo $blog -> blog_id; ?>">
                            <h2 class="blog-title"><?php echo $blog -> title; ?></h2>
                            <h5>
                                <i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp;
                                <span><?php echo date('Y-m-d', strtotime($blog -> post_time)) ; ?></span>
                                <span class="author">Author:</span>&nbsp;
                                <span><?php echo $blog -> author; ?></span>
                            </h5>

                            <div class="img-hover">

                                <img src=" <?php echo $blog -> img; ?> " alt="">
                            </div>

                            <div class="desc"><p><?php echo $blog -> desc; ?></p></div>
                            <h5>
                                <i class="fa fa-heart-o" aria-hidden="true"></i>&nbsp;
                                <span><?php echo $blog -> click; ?></span>

                                <span class="res"><span class="res-num"><?php echo $blog -> click; ?></span>&nbsp;responses</span>

                            </h5>
                        </a>
                    </div>
                <?php 
                    }
                 ?>                

            
            </div>
            
            
           <div class="loadmore"><button id="btn-more">Load more ...</button></div> 
        </div>


        



        <div class="col-md-4 sidebar">
            <h2>Category</h2>
            <hr>
            <ul class="list-group">
                <li class="list-group-item <?php echo !$cate_id ? 'active' : ''; ?>"><a href="welcome/list_blog">All</a></li>
                <?php 
                    foreach ($categories as $cate) {
                ?>
                    <li class="list-group-item <?php echo $cate_id == $cate -> cate_id ? 'active' : ''; ?>"  data-id="<?php echo $cate -> cate_id; ?>"><a href="welcome/list_blog?cateId=<?php echo $cate -> cate_id; ?>"><?php echo $cate -> cate_name; ?></a></li>
                <?php
                    }
                 ?>
            </ul>
        </div>
    </div>    
    <a id="go-top" href="#"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>






















<?php include 'footer.php';?>
<script src="js/require.js" data-main="js/blog_list" ></script>

</body>
</html>

<!-- <div class="load-more">
  <button id="btn-more">
      Load more ...
  </button>
</div> -->