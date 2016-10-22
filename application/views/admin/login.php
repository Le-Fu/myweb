<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>后台管理 - 登录</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <base href="<?php echo site_url();?>">
    <link rel="alternate icon" type="image/png" href="assets/i/favicon.png">
    <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
    <style>
        .header {
            text-align: center;
        }
        .header h1 {
            font-size: 200%;
            color: #333;
            margin-top: 30px;
        }
        .header p {
            font-size: 14px;
        }
    </style>
</head>
<body>
<div class="header">
    <div class="am-g">
        <h1>个人网站后台登录</h1>
    </div>
    <hr />
</div>
<div class="am-g">
    <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
        <h3>登录</h3>
        <hr>
        <form class="am-form" action="">
            <label for="email">邮箱:</label>
            <input name="" id="email" value="">
            <br>
            <label for="password">密码:</label>
            <input  name="" id="password" value="">
            <br>
            <div class="am-cf">
                <input id="login" type="button" name="" value="登 录" class="am-btn am-btn-primary am-btn-sm am-fl">
            </div>
        </form>
        <hr>
    </div>
</div>
    <script src="js/jquery.js"></script>
    <script>
        $(function(){
            $('#login').on('click', function(){
                var iEmail = $('#email').val();
                var iPwd = $('#password').val();
                $.post('admin/do_login', {
                    'email': iEmail,
                    'pwd' : iPwd
                }, function(data){
                    if(data=='success'){
                        location.href = 'admin/index';
                    }else{
                        alert('邮箱或密码不正确！请重新输入。');
                    }
                },'text');
            });
        });
    </script>
</body>
</html>
