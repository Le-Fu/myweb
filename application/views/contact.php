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
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/contact.css">
</head>
<body>
<?php include 'header.php';?>
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-11">
                <div class="media">
                  <a class="media-left" href="javascript:;">
                        <img src="img/myphoto.png" alt="myphoto">
                  </a>
                  <div class="media-body">
                    <h4 class="media-heading">Self Introduce</h4>
                    Hey guys! I'm Simon, a designer and programer 
                  </div>
                </div>
            </div>
        </div>

        <div class="row">
            <form class="form-horizontal" role="form">
              <div class="form-group">
                <label for="email-addr" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="email-addr" placeholder="Please write your email...">
                </div>
              </div>

              <div class="form-group">
                <label for="email-name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="email-name" placeholder="Please write your name...">
                </div>
              </div>
            
            <div class="form-group">
                <label for="email-content" class="col-sm-2 control-label">Content</label>
                <div class="col-sm-10">
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
</body>
</html>
