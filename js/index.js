requirejs.config({
    shim: {
        'jquery.fullPage': {
            deps: ['jquery'],
            exports: 'jQuery.fn.fullpage'
        }
    }
});
require([ 'jquery', 'jquery.fullPage'], function($){

    $(function(){
        $('#o').fullpage({
            sectionsColor : ['', '#4E927A', '#2B8E7B', '#4E927A'],
        });
    });


} );