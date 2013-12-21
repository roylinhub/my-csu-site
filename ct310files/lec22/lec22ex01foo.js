var bar_hook_url = 'lec22ex01tell_bar.php';
var foo_hook_url = 'lec22ex01tell_foo.php';

function ajaxRequest() {
	if (navigator.appName == "Microsoft Internet Explorer") {
		http = new ActiveXObject("Microsoft.XMLHTTP");
	} else {
		http = new XMLHttpRequest();
	}
	return http;
}

function getSecrets(sitep, url) {
	var http = ajaxRequest();
	var c = smcode();
	var params = 'smcode=' + c;
	http.open("POST", url, true);
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.onreadystatechange = function() {
		if (http.readyState == 4) {
			var secret = http.responseText;
			var destin = document.getElementById(sitep);
			destin.innerHTML = secret;
		}
	}
	http.send(params);
}	


function init() {
	getSecrets('foop', foo_hook_url);
	getSecrets('barp', bar_hook_url);	
}