require([ 'jquery', 'searchbox' ,'weixin'], function($){
    $(function(){
        $('.blog-cate a').on('click', function(){
            $(this).parent().siblings().children('a').removeClass('active');
            $(this).addClass('active');

            var cateId = $(this).data('id');
            var $blogList = $('.blog-list');
            $.get('welcome/get_blogs',{
                cateId: cateId
            },function(data){
                var html = '';
                $blogList.empty();
                for(var i=0; i<data.length; i++){
                    var blog = data[i];
                    html +=`
                        <li class="blog-li">
                            <a href="welcome/view_blog?blogId=`+blog.blog_id+`">
                                <img src="`+blog.img+`" alt="">
                                <div class="mask">
                                    <h3 class="blog-title">`+blog.title+`</h3>
                                    <span class="view-more">view more</span>
                                </div>
                            </a>
                        </li>
                    `;
                }
                $blogList.append(html);
            },'json');
        });
    });
} );