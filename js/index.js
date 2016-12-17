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
            sectionsColor : ['#EDEDED'],
        });

        /*3D-info-panel*/

        var panel = $('.panel');

        function rock(x, y, per) {
            panel.css({
                transform: 'rotateY('+ x +'deg) rotateX('+ y +'deg)',
                transition: 'all .006s ease-in-out'
            });
        };

        panel.on('mouseover', function (e) {
            panel.on('mousemove', function (e) {

                var xPos = e.offsetX;
                var yPos = e.offsetY;
                var width = this.offsetWidth;
                var height = this.offsetHeight;

                var xRotate = ((xPos - width/2) / width/2)*15,
                    yRotate = -((yPos - height/2) / height/2)*20;
                if (!(xPos < 50 || xPos > (width-50) || yPos < 50 || yPos > (height - 50))) {
                    rock(xRotate, yRotate);
                }

            });

        });

        panel.on('mouseout', function (e) {
            var xRotate = ((e.offsetX - this.offsetWidth/2) / this.offsetWidth/2)*15,
                yRotate = -((e.offsetY - this.offsetHeight/2) / this.offsetHeight/2)*20;
            rock(0, 0);
        })




    });


} );