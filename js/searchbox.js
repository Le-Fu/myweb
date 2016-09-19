define( [ 'jquery' ], function($){
    $( function(){
        var bBox = true;
        $('.search-btn').on( 'click', function(){
            console.log(123);
            if(bBox){
                $('#search input').animate({
                    width: 300
                });
                //$('#search input').show();
                bBox =false;
            }else {
                $('#search input').animate({
                    width: 0
                });
                //$('#search input').hide();
                bBox =true;
            }
        } );
    } );
} )