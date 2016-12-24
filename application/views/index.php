<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>首页</title>
    <base href="<?php echo site_url();?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta name="keywords" content=""/> -->
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
    <link rel="stylesheet" href="css/index.css">
</head>
<body>

    <div id="o">

        <div id="page1" class="section">
            <?php include 'header.php';?> 
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="welcome-message">
                            <h1>Less is more.</h1>
                            <h3>Welcome ! I'm so happy that you come here . As a web developer , I'd like to pursue nice design and enjoy coding .</h3>
                            <br>
                            <div>Konw more about me</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="canvas-board">
                            <canvas id="canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="page2" class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="caption">Topics of my blogs</h2>
                        <div class="radar">
                            
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="blog-show">
                            <a href="welcome/list_blog">
                                <h2 class="caption">My recent blogs</h2>
                            </a>
                            <h3 class="to-myblog"><a href="">click and read more of my blog!</a></h3>
                            <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
                              <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                    <li data-target="#myCarousel" data-slide-to="3"></li>
                                    <li data-target="#myCarousel" data-slide-to="4"></li>
                                    <li data-target="#myCarousel" data-slide-to="5"></li>
                                </ol>

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">

                                        <div class="item active">
                                            <a href="welcome/view_blog?blogId=1">
                                                <h3>Blog Title.</h3><br>   
                                            </a>
                                            <h4>This is a description of this blog, click the title, you can read the detail.</h4>
                                        </div>
                                    <?php 
                                        foreach ($blogs as $blog) {
                                    ?>
                                            <div class="item">
                                                <a href="welcome/view_blog?blogId= <?php echo $blog -> blog_id; ?>">
                                                    <h3><?php echo $blog -> title; ?></h3><br>   
                                                </a>    
                                                <h4><?php echo $blog -> desc; ?></h4>
                                            </div>
                                    <?php 
                                        }
                                     ?>
                                    
                                </div>
                                
                        
                            </div>      
                        </div>
                    </div>
                </div>
            </div>
        </div>
     
        <div id="page3" class="section">
            <div class="container">
                <div id="projects">
                    <div class="project-caption">
                        <h3>New Projects</h3>
                    </div>
                    <div class="project-row">
                        <div class="project">
                            <div class="project-img">
                                <img src="img/wellcee.jpg" alt="">
                            </div>
                            <div class="desc-box">
                                <h4 class="title">wellcee</h4>
                                <p class="desc">这是一个租房网站，主要客户是法国留学生。</>
                            </div>
                            <br>
                            <a href="http://wellcee.com"><div class="view-project">view detail</div></a>
                        </div>
                        <div class="project">
                             <div class="project-img">
                                <img src="img/wellcee.jpg" alt="">
                            </div>
                            <div class="desc-box">
                                <h4 class="title">色彩实验室</h4>
                                <p class="desc">网页配色一直以来都是让人前端开发人员头疼的一件事，我探索了一些良好的配色方案。</>
                            </div>
                            <br>
                            <a href=""><div class="view-project">view detail</div></a>
                        </div>
                        <div class="project">
                             <div class="project-img">
                                <img src="img/wellcee.jpg" alt="">
                            </div>
                            <div class="desc-box">
                                <h4 class="title">H5页面</h4>
                                <p class="desc">这是给一家珠宝公司做的H5宣传页。</>
                            </div>
                            <br>
                            <a href=""><div class="view-project">view detail</div></a>
                        </div>
                        <div class="project">
                             <div class="project-img">
                                <img src="img/wellcee.jpg" alt="">
                            </div>
                            <div class="desc-box">
                                <h4 class="title">京东服务商</h4>
                                <p class="desc">这是一个黑龙江3000余家商户接入和管理的平台。</>
                            </div>
                            <br>
                            <a href=""><div class="view-project">view detail</div></a>
                        </div>
                       
                    </div>
                </div>

            </div>
        </div>
         
        <div id="page4" class="section">
             
            <!-- info_panel -->
            <div id="stage" class="container">
                <a href="welcome/contact">
                    <div class="panel">    

                    </div>
                </a>
            </div>
         
        </div>

        <?php  include 'footer.php' ;?>
    </div>
    

    <script src="js/require.js" data-main="js/index"></script>
</body>
</html>