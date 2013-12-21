var vurl = 'lec18ex06getDogs.php';
var http = false;

if (navigator.appName == "Microsoft Internet Explorer") {
	http = new ActiveXObject("Microsoft.XMLHTTP");
} else {
	http = new XMLHttpRequest();
}

function getDogs() {
	var dogs;
	http.open("POST", vurl, true);
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.onreadystatechange = function() {
		if (http.readyState == 4) {
			dogs = JSON.parse(http.responseText);
			dogsToTable(dogs);
		}
	}
	http.send(null);
}
function dogsToTable(dogs) {
	var tab = document.getElementById('dogtab');
	var i = tab.rows.length;
	for (j = 0; j < dogs.length; j++) {
		var rt = "<tr> <td>" + dogs[j].Name + "</td> <td>" + dogs[j].Creator
				+ "</td> <td>" + dogs[j].Person + "</td></tr>";
		var rr = tab.insertRow(i);
		rr.innerHTML = rt;
	}
}
function init() {
	getDogs();
}

rows
insertRow(i)
innerHTML
