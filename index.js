
function mostrar() {
    document.getElementById("sidebar").style.width = "300px";
    document.getElementById("contenido").style.marginLeft = "300px";
    document.getElementById("abrir").style.display = "none";
    document.getElementById("cerrar").style.display = "inline";
    document.getElementById("overlay").style.display = "block";
    
}

function ocultar() {
    document.getElementById("sidebar").style.width = "0";
    document.getElementById("contenido").style.marginLeft = "0";
    document.getElementById("abrir").style.display = "inline";
    document.getElementById("cerrar").style.display = "none";
    document.getElementById("overlay").style.display = "none";
}

function FUNCION(){
	var header = document.querySelector('header');
	header.classList.toggle("CLASE", window.scrollY > 5);
}

// window.addEventListener('scroll',FUNCION);
