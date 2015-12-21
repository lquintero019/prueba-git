function Slider(id,opciones){
	var _slider = this;
	var _contenedor = document.getElementById(id);
	_contenedor.style.width = opciones.width + 'px';
	_contenedor.style.height = opciones.height + 'px';
	_contenedor.className += ' slider';
	var _bullets = _contenedor.getElementsByTagName("ul")[0];
	var imagenes = _contenedor.getElementsByTagName("img");
	var html_bullets = "";
	var _slider_actual = 0;
	for (var i = 0; i < imagenes.length; i++){
		html_bullets += '<li data-indice-slider="' + i + '"><span>&nbsp;</span></li>';
	}
	_bullets.innerHTML = html_bullets;
	var lista_bullets = _contenedor.getElementsByTagName("li");
	for (var i = 0; i < lista_bullets.length; i++){
		lista_bullets[i].addEventListener('click', function(){
			var indice_bullets = this.getAttribute("data-indice-slider");
			clearInterval(interval);
			siguiente(indice_bullets);
			setTimeout(function(){
				interval = setInterval(siguiente,opciones.tiempo);
			},opciones.tiempo);
			console.log("click!!" + indice_bullets);
		});
	}
	function siguiente(indice_deseado){
		if(indice_deseado != undefined)
			_slider_actual = indice_deseado;
		for (var i = 0; i < imagenes.length; i++){
			var className = imagenes[i].className;
			var classNameB = lista_bullets[i].getElementsByTagName("span")[0].className;
			imagenes[i].className = className.replace("active","");
			lista_bullets[i].getElementsByTagName("span")[0].className = classNameB.replace("active","");
		}
		imagenes[_slider_actual].className += "active";
		lista_bullets[_slider_actual].getElementsByTagName("span")[0].className += "active";
		if(_slider_actual < (imagenes.length - 1))
			_slider_actual++;
		else
			_slider_actual = 0;
	}
	interval = setInterval(siguiente,opciones.tiempo);
}