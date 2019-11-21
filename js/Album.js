var imagen = new Array();

imagen[0] = "imagenes/1.1.jpg";
imagen[1] = "imagenes/1.2.jpg";
imagen[2] = "imagenes/1.3.jpg";
imagen[3] = "imagenes/1.4.jpg";
imagen[4] = "imagenes/1.5.jpg";
imagen[5] = "imagenes/1.6.jpg";
imagen[6] = "imagenes/1.7.jpg";
imagen[7] = "imagenes/1.8.jpg";
imagen[8] = "imagenes/1.9.jpeg";
imagen[9] = "imagenes/1.10.jpg";

var cargar = new Array();

function cargarImagen() {
	for (var i=0; i<imagen.length; i++) {
        
		cargar[i] = new Image();
		cargar[i].src = imagen[i];
		document.getElementById("tabla").innerHTML = "Cargando...";
		document.getElementById("imgTumb"+i).innerHTML = "Cargando...";
		window.setTimeout("verificaCarga("+i+")",100);
	}
}

function verificaCarga(imgID) {
	if(cargar[imgID].complete ) {
		document.getElementById("imgTumb"+imgID).innerHTML = '<img src="'+cargar[imgID].src+'" width="120" height="90" onClick=abrirImagem('+imgID+')>';
		if (imgID == 0) {
			document.getElementById("tabla").innerHTML = '<img width="400" height="300" id="imgQuadro" src="'+imagen[imgID]+'">';
		}
	}else{
		window.setTimeout("verificaCarga("+imgID+")", 100);
	}
}

function abrirImagem(imgID) {
	document.getElementById("tabla").innerHTML = '<img width="400" height="300" id="imgQuadro" src="'+imagen[imgID]+'">';
}

window.onload = cargarImagen;