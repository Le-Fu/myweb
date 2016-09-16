define( [ 'jquery' ], function($){
    $( function(){
        var bBox = true;
        $('.search-btn').on( 'click', function(){
            if(bBox){
                $('#search input').animate({
                    width: 300
                });
                $('#search input').show();
                bBox =false;
            }else {
                $('#search input').animate({
                    width: 30
                });
                $('#search input').hide();
                bBox =true;
            }
        } );
    } );
} )