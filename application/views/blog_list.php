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
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/blog-list.css">
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
                                <span><?php echo $blog -> post_time; ?></span>
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


        



        <div class="col-md-4">
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