
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

$(document).ready(function() {
    $(".price-sorting-link").on("click", function(event) {
        event.preventDefault();
        var sortingMethod = $(this).data("sort");

        if(sortingMethod == 'l2h') {
            sortProducts(true);
        } else if(sortingMethod == 'h2l') {
            sortProducts(false);
        }
    });

    function sortProducts(asc) {
        var products = $('.producto').sort(function(a, b) {
            if(asc)
                return parseFloat($(a).data("price")) - parseFloat($(b).data("price"));
            return parseFloat($(b).data("price")) - parseFloat($(a).data("price"));
        });
        
        $(".products-grid").html(); //Vacía el contenido HTML.
        products.each((i) => {
            console.log(products.eq(i).parent());
            $(".products-grid").append(products.eq(i).parent()); //Añade los productos a ese HTML vacio de uno en uno que es un bucle.
        })
    }
});
