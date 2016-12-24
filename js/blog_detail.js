requirejs.config({
    shim: {
        'bootstrap.min': {
            deps: ['jquery'],
            exports: 'jQuery.fn.bootstrap'
        }
    },
});
require([ 'jquery','bootstrap.min', 'weixin', 'goTop' ], function($) {
    $(function () {
        //检测字数
        $('#message').on('keyup', function(){
            var str = $(this).val();
            $('#count-num').text(str.length);
        });
        
        $('#btn-send').on('click', function () {
            var $username = $('#username');
            var $email = $('#email');
            var $phone = $('#phone');
            var $message = $('#message');
            var $blogId = $('#blogId');
            var $commentNum = $('#comment-num');

            if ($username.val() && $message.val()) {


                $.post('welcome/comment',{
                    username: $username.val(),
                    email: $email.val(),
                    phone: $phone.val(),
                    message: $message.val(),
                    blogId: $blogId.val()
                },function(data){
                    if(data=='success'){
                        alert("评论成功！");
                        var now = new Date();
                        var html = `
                                <li class="comment">
                                    <ul class="comment-info">
                                        <li><i class="fa fa-user flag" aria-hidden="true"></i>&nbsp;`+$username.val()+`</li>
                                        <li><i class="fa fa-calendar-o flag" aria-hidden="true"></i>&nbsp;`+now.toLocaleDateString()+`</li>
                                    </ul>
                                    <p class="content">`+$message.val()+`</p>
                                </li>
                            `;
                        $('.comment-list').prepend(html);
                        $commentNum.text(parseInt($commentNum.text())+1);
                    }else{
                        alert("评论失败！");
                    }
                },'text');

            }else{
                alert('请输入昵称和评论内容！');
            }
        });
    });
});