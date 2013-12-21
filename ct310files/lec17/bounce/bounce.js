function Ball(x0, y0, dx0, dy0, wdth) {
	this.moveBall = moveBall;
	this.x = x0;
	this.y = y0;
	this.dx = dx0;
	this.dy = dy0;
	this.width = wdth;

	function moveBall() {
		minx = 0;
		maxx = 600;
		miny = 0;
		maxy = 400;
		this.x = this.x + this.dx;
		this.y = this.y + this.dy;
		if (this.x >= (maxx - 24) || this.x <= minx)
			this.dx = -this.dx;
		if (this.y >= (maxy - 24) || this.y <= miny)
			this.dy = -this.dy;
	}
}

var b1, b1obj;

function placeEm() {
	b1obj.moveBall();
	b1.style.left = parseInt(b1obj.x) + 'px';
	b1.style.top = parseInt(b1obj.y) + 'px';
	b2obj.moveBall();
	b2.style.left = parseInt(b2obj.x) + 'px';
	b2.style.top = parseInt(b2obj.y) + 'px';
}
function init() {
	b1 = document.getElementById("b1");
	b1obj = new Ball(50, 100, 2, 2, 24);
	b2 = document.getElementById("b2");
	b2obj = new Ball(525, 376, -4, -3, 24);
	placeEm();
	setTimeout(doStep, 1000);
}
function doStep() {
	placeEm();
	setTimeout(doStep, 10);
}