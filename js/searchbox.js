define( [ 'jquery' ], function($){
    $( function(){
        $('.search-btn').on( 'click', function(){
            $('#search input').animate({
                width: 300
            });
            $('#search input').show();
        } );
    } );
} )