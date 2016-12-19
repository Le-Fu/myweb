define( [ 'jquery' ], function($){
    $( function(){
       $('#weixin').hover( function(){
           $('#weixinma').show();
       },function(){
           $('#weixinma').hide();
       });
    } );
} );