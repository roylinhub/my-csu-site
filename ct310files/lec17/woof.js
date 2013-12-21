var woofs = new Array();

function Dog(name, breed, age) {
	this.name  = name;
	this.breed = breed;
	this.age   = age;

	this.addRow = function() {
		var i  = document.getElementById('wooftable').rows.length;
		var rr = document.getElementById('wooftable').insertRow(i);
		var rt = "<tr><td class=\"woofit\">" + this.name 
		+ "</td> <td class=\"woofit\">" + this.breed
		+ "</td> <td class=\"woofit\">" + this.age + "</td></tr>";
		rr.innerHTML = rt;
	}

	this.loadRow = function(i) {
		var rr = document.getElementById('wooftable').rows[i];
		var nt = "<tr><td class=\"woofit\">" + this.name 
		+ "</td> <td class=\"woofit\">" + this.breed
		+ "</td> <td class=\"woofit\">" + this.age + "</td></tr>";
		// document.getElementById('debug').innerHTML += "<br/>" + nt;
		rr.innerHTML = nt;
	}
}

woofs[0] = new Dog("Snoopy", "Beagle", 2);
woofs[1] = new Dog("Lassie", "Collie", 4);
woofs[2] = new Dog("Soccer", "Terrier", 3);

function init() {
	for (i = 0; i < woofs.length; i++) {
		woofs[i].addRow();
	}
}

function sortName() {
	woofs.sort(function(a, b) { var res = a.name > b.name ? 1 : -1; return(res) });
	redoDogs();
}

function sortBreed() {
	woofs.sort(function(a, b) { var res = a.breed > b.breed ? 1 : -1; return(res) });
	redoDogs();
}

function sortAge() {
	woofs.sort(function(a, b) { var res = a.age > b.age ? 1 : -1; return(res) });
	redoDogs();
}


function redoDogs() {
	for (i = 0; i < woofs.length; i++) {
		woofs[i].loadRow(i + 1);
	}
}
