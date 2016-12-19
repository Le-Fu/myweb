requirejs.config({
    shim: {
        'jquery.fullPage': {
            deps: ['jquery'],
            exports: 'jQuery.fn.fullpage'
        },
        'bootstrap.min': {
            deps: ['jquery'],
            exports: 'jQuery.fn.bootstrap'
        }
    },
});
require([ 'jquery', 'radar', 'drawShape', 'jquery.fullPage', '3d_panel' ,'bootstrap.min', 'weixin'], function($, H5ComponentRadar){

    $(function(){

         

        //雷达图配置        
        var radar_cfg = {

            type : 'radar',
            width : 450,
            height : 450,
            data:[
                ['ES6' , .8  ],
                ['CSS3' , .5 ],
                ['HTML5' , .6  ],
                ['REACT' , .4  ],
                ['OTHER' , .5 ]
            ],
            css : {
                top: 0,
                opacity:0
            },
            animateIn:{
                top: 100,
                opacity:1,
            },
            animateOut:{
                top: 0,
                opacity:0,
            },
            center: true,
        };
        var radar = new H5ComponentRadar( 'myRadar', radar_cfg );
        $('.radar').append(radar);




        $('#o').fullpage({
            // verticalCentered: false,
            autoScrolling: false,
            sectionsColor : ['#56D0B3', '#F5F5F5', '#99C0FF', '#19A7F7'],
            anchors: ['firstPage', 'secondPage', 'thirdPage', 'lastPage'],

            afterLoad: function(anchorLink, index){
                var loadedSection = $(this);

                //using index
                if(index == 2){
                    //轮播图
                    $('#myCarousel').carousel({
                        interval: 2000
                    });
                    //radar组件进入
                    $('.h5_component').trigger( 'onLoad' );

                }
                


            },
            onLeave: function(index, nextIndex, direction){
                var leavingSection = $(this);

                //after leaving section 2
                if(index == 2 && direction =='down'){
                    $('.h5_component').trigger( 'onLeave' );
                   
                }

                else if(index == 2 && direction == 'up'){
                    $('.h5_component').trigger( 'onLeave' );
                    
                }
            }
            
        });



    






    });


});