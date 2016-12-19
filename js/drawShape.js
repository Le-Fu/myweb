define([],function(){

			var canvas = document.getElementById('canvas');
			canvas.width = 400;
			canvas.height = 400;
			var context = canvas.getContext("2d");

			function drawRectangle(x, y, width, height, line_width, line_color) {
				context.beginPath();
				context.rect(x, y, width, height);
				context.closePath();

				context.lineWidth = line_width;
				context.strokeStyle = line_color;

				context.stroke();
			}

			function drawStar(r, R, x, y, rotate, line_width, line_color) {

				context.beginPath();
				for (var i = 0; i < 5; i++) {
					context.lineTo(
						Math.cos((18 + i * 72 - rotate) / 180 * Math.PI) * R + x,
						-Math.sin((18 + i * 72 - rotate) / 180 * Math.PI) * R + y
					);
					context.lineTo(
						Math.cos((54 + i * 72 - rotate) / 180 * Math.PI) * r + x,
						-Math.sin((54 + i * 72 - rotate) / 180 * Math.PI) * r + y
					);
				}
				context.closePath();

				context.lineWidth = line_width;
				context.strokeStyle = line_color;
				context.stroke();
			}
			function drawCircle(x, y, r, line_width, line_color){
				context.beginPath();
				context.lineWidth = line_width;
				context.strokeStyle = line_color;
				context.arc(x, y, r, 0, 2*Math.PI, true);
				context.stroke();
			}

			function drawTriangle(x, y, line_length, line_width, line_color) {

				context.beginPath();
				context.moveTo(x, y);
				context.lineTo(x + line_length / 2, y - Math.cos(30 / 180 * Math.PI) * line_length);
				context.lineTo(x + line_length, y);

				context.closePath();

				context.lineWidth = line_width;
				context.strokeStyle = line_color;
				context.stroke();
			}


			drawRectangle(50, 43, 320, 320, 2, 'white');
			drawTriangle(65, 340, 180, 2, 'white');
			// drawTriangle(65, 320, 120, 2, 'white');
			drawCircle( 299, 120, 55, 2, 'white');
			// drawStar(30, 70, 300, 270, 0, 2,'white');
});
