define(['jquery'], function($){

    var panel = $('.panel');

    function rock(x, y) {
        panel.css({
            transform: 'rotateY('+ x +'deg) rotateX('+ y +'deg)',
            transition: 'all .006s ease-in-out'
        });
    };

    panel.on('mouseover', function (e) {

        panel.on('mousemove', function (e) {
            e.stopPropagation();

            var xPos = e.offsetX;
            var yPos = e.offsetY;
            var width = this.offsetWidth;
            var height = this.offsetHeight;

            var xRotate = ((xPos - width/2) / width/2)*15,
                yRotate = -((yPos - height/2) / height/2)*20;

            if (!(xPos < 50 || xPos > (width - 50) || yPos < 50 || yPos > (height - 50))) {
                rock(xRotate, yRotate);
            }

        });

    });

    panel.on('mouseout',function () {
        rock(0, 0);
    });
});