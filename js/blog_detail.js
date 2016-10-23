require([ 'jquery', 'searchbox','weixin' ], function($) {
    $(function () {
        //检测字数
        $('#message').on('keyup', function(){
            var str = $(this).val();
            $('#count-num').text(255-str.length);
        });
        $('#btn-send').on('click', function () {
            var $username = $('#username');
            var $email = $('#email');
            var $phone = $('#phone');
            var $message = $('#message');
            var $blogId = $('#blogId');
            var $commentNum = $('#comment-num');

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

        });
    });
});