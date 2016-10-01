require([ 'jquery', 'weixin' ], function($){
  $(function(){
    var myOffset = 0;
    var $btnMore = $('#btn-more');
    $btnMore.on('click', function(){
      $btnMore.hide();
      $.get('welcome/get_more',{
        offset: myOffset+=6
      },function(data){
          console.log(data.length);
          if(data.length<6){
            $btnMore.html('No more blogs!').prop('disabled', true);
          }
          var html = '';
          for(var i=0; i<data.length; i++){
            var blog = data[i];
            html += `
               <li class="blog-li">
                <img src="`+blog.img+`" alt="">
                <p>
                    `+blog.content+`
                </p>
                <a href="welcome/view_blog?blogId=`+blog.blog_id+`">READ</a>
                <br>
              </li>
            `;
          }
          $('#blog-list').append(html);
          $btnMore.show();
      },'json');
    });
  });
});
