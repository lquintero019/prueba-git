function Ajax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
  		}
	}
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

function OrdenarPor(campo, orden){
	divListado = document.getElementById('listado');	
	ajax=Ajax();
	ajax.open("GET", "listado.php?campo="+campo+"&orden="+orden);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divListado.innerHTML = ajax.responseText
		}
	}
	ajax.send(null)
}