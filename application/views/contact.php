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
    <title>Contact</title>
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
    <link rel="stylesheet" href="css/contact.css">
</head>
<body>
<?php include 'header.php';?>
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="media">
                  <a class="media-left" href="javascript:;">
                        <img src="img/myphoto.png" alt="myphoto">
                  </a>
                  <div class="media-body">
                    <h1> </h1>
                    <h4 class="media-heading">Self Introduce</h4>
                    Hey guys! I'm Simon, a designer and programer. Let's make progress together!
                    
                    <h4>Just complete the infomation below. I'll receive your email. </h4>
                  </div>
                </div>
            </div>
        </div>

        <div class="row">
            <form class="form-horizontal" role="form">
              <div class="form-group">
                <label for="email-addr" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-9">
                  <input type="email" class="form-control" id="email-addr" placeholder="Please write your email...">
                </div>
              </div>

              <div class="form-group">
                <label for="email-name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="email-name" placeholder="Please write your name...">
                </div>
              </div>
            
            <div class="form-group">
                <label for="email-content" class="col-sm-2 control-label">Content</label>
                <div class="col-sm-9">
                  <textarea id="email-content" class="form-control" rows="3" placeholder="Please write what you want to tell me..."></textarea>
                  
                </div>
              </div>
                
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="button" id="send-email" class="btn btn-default">Send Email</button>
                </div>
              </div>
            </form>

        </div>
    </div>

<?php include 'footer.php';?>
<script src="js/require.js" data-main="js/contact" ></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-89543262-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
