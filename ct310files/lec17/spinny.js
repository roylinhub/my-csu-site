var i, dots, row, col;
var stones; // This will be the image object displaying the stones.
var radius = 64;
var theta = 0.0;
var delta = Math.PI / 8;
var voff = 138;
var hoff = 138;

function placeEm() {
	for (i = 0; i < dots.length; i++) {
		row = voff + (radius * Math.cos(theta + (i * delta)));
		col = hoff + (radius * Math.sin(theta + (i * delta)));
		dots[i].style.top = parseInt(row) + 'px';
		dots[i].style.left = parseInt(col) + 'px';
	}
}
function init() {
	dots   = document.getElementsByName("dot");
	stones = document.getElementById("stones");
	placeEm();
	setTimeout(doStep, 100);
	//setInterval(doStep,100);
}
function doStep() {
	theta = theta - delta;
	placeEm();
	setTimeout(doStep, 100);
}