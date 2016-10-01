
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
    <link rel="stylesheet" href="css/blog-list.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>
<?php include 'header.php';?>
  <div class="wrapper">
    <ul id="blog-list">
      <?php
        foreach ($blogs as $blog) {
      ?>
        <li class="blog-li">
          <img src="<?php echo $blog -> img ?>" alt="">
          <p>
              <?php echo $blog -> content?>
          </p>
          <a href="welcome/view_blog?blogId=<?php echo $blog -> blog_id?>">READ</a>
          <br>
        </li>
      <?php
        }
      ?>
    </ul>
      <div class="load-more">
        <button id="btn-more">
            Load more ...
        </button>
      </div>
  </div>

<?php include 'footer.php';?>
  <script src="js/require.js" data-main="js/blog_list" ></script>
</body>
</html>