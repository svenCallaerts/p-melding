/**
 * 
 */

function visDeltagere(aktivitetId) {
	if (aktivitetId == "") {
		document.getElementById("deltagerListe_"+aktivitetId).innerHTML = "";
		return;
	}
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("deltagerListe_"+aktivitetId).innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET", "DeltagerListeOpen.php?aktivitetId=" + aktivitetId, true);
	xmlhttp.send();
}

function lukkDeltagere(aktivitetId){
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("deltagerListe_"+aktivitetId).innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET", "DeltagerListeClose.php?aktivitetId=" + aktivitetId, true);
	xmlhttp.send();
}

function meldPaa(aktivitetId, brukerNavn){
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("deltagerListe_"+aktivitetId).innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET", "DeltagerListeOpen.php?aktivitetId=" + aktivitetId+"&brukernavn=true", true);
	xmlhttp.send();
}