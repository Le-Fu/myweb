require([ 'jquery', 'searchbox','weixin' ], function($) {
    $(function () {
        $('#btn-send').on('click', function () {
            var $username = $('#username');
            var $email = $('#email');
            var $phone = $('#phone');
            var $message = $('#message');
            var $blogId = $('#blogId');
            $.post('welcome/comment',{
                username: $username.val(),
                email: $email.val(),
                phone: $phone.val(),
                message: $message.val(),
                blogId: $blogId.val()
            },function(data){
                var html = '';
                if(data == 'success'){
                    for(var i=0; i<data.length; i++){
                        var comment =data[i];
                        html += `
                            <li class="comment">
                                <ul class="comment-info">
                                    <li><i class="fa fa-user flag" aria-hidden="true"></i>&nbsp;`+comment.username+`</li>
                                    <li><i class="fa fa-calendar-o flag" aria-hidden="true"></i>&nbsp;`+comment.comment_date+`</li>
                                </ul>
                                <p class="content">`+comment.message+`</p>
                            </li>
                        `;

                    }
                    alert("评论成功！");

                }else{
                    alert("评论失败！");
                }
            },'text');

        });
    });
});