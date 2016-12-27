requirejs.config({
    //To get timely, correct error triggers in IE, force a define/shim exports check.
    paths: {
        'jquery': [
            'https://cdn.bootcss.com/jquery/3.1.1/jquery.min',
            'jquery'
        ],
        'bootstrap': [
             'https://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min',
             'bootstrap.min'
        ],
    },
    shim: {
        'bootstrap': {
            deps: ['jquery'],
            exports: 'jQuery.fn.bootstrap'
        }
    },

    
});

require([ 'jquery', 'weixin', 'bootstrap', 'goTop' ], function($){
  $(function(){
    var myOffset = 0;
    var $btnMore = $('#btn-more');
    var $liCateId = $('.active').data('id');
    $btnMore.on('click', function(){
      $btnMore.hide();
      $.get('welcome/get_more',{
        offset: myOffset += 5,
        liCateId: $liCateId 
      },function(data){
          console.log(data.length);
          if(data.length<5){
            $btnMore.html('No more blogs!').prop('disabled', true);
          }
          var html = '';
          for(var i=0; i<data.length; i++){
            var blog = data[i];
            html += `
               <div class="blog">
                        <a href="welcome/view_blog?blogId=`+ blog.blog_id +`">
                            <h2 class="blog-title">`+ blog.title +`</h2>
                            <h5>
                                <i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp;
                                <span>`+ blog.post_time +`</span>
                                <span class="author">Author:</span>&nbsp;
                                <span>`+ blog.author +`</span>
                            </h5>

                            <div class="img-hover">

                                <img src=" `+ blog.img +` " alt="">
                            </div>

                            <div class="desc"><p>`+ blog.desc +`</p></div>
                            <h5>
                                <i class="fa fa-heart-o" aria-hidden="true"></i>&nbsp;
                                <span>`+ blog.click +`</span>

                                <span class="res"><span class="res-num">`+ blog.click +`</span>&nbsp;responses</span>

                            </h5>
                        </a>
                    </div>
            `;
          } 
          $('#blog-list').append(html);
          $btnMore.show();
      },'json');
    });
  });
});
