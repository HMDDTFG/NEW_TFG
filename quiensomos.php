<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CyberSphere Technologies</title>
    <link rel="stylesheet" href="index.css">
    <script src="https://kit.fontawesome.com/ce9416b376.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="index.js"></script>

</head>

<body>
    <div class="cabecera">
        <i id="logo_user" class="fa-regular fa-user" style="color: white;"></i>
        <?php session_start();
        if (isset($_SESSION['id_usuario'])) {
            $username = htmlspecialchars($_SESSION['id_usuario'], ENT_QUOTES, 'UTF-8');
            echo "<a id=\"cab_usuario\" class=\"px-2\" href=\"micuenta.php\" style=\"color: #ffffff;\">$username</a>";
        } else {
            echo "<a id=\"cab_usuario\" class=\"px-2\" href=\"login.html\" style=\"color: #ffffff;\">Identifícate</a>";
        }
        ?>
    </div>
    <header class="subcabecera">
        <div id="sidebar" class="sidebar" style="width: 0px;">
            <a href="#" id="equis" class="boton-cerrar" onclick="ocultar()">×</a>
            <ul class="menu_opciones">
                <li><a class="titulo" id="botoninicio" href="index.php">INICIO</a></li>
                <li><a class="separacion"></a></li>
                <li><a class="titulo" id="botonquien" href="quiensomos.php">¿QUIÉNES SOMOS?</a></li>
                <li><a class="separacion"></a></li>
                <li><a class="titulo">PRODUCTOS</a></li>
                <li><a class="opciones" href="marcas.php">POR MARCAS</a></li>
                <li><a class="opciones" href="masprecio.php">MÁS CAROS</a></li>
                <li><a class="opciones" href="menosprecio.php">MÁS BARATOS</a></li>
                <li><a class="separacion"></a></li>
                <li><a class="titulo">AYUDA Y AJUSTES</a></li>
                <li><a class="opciones" href="micuenta.php">MI CUENTA</a></li>
                <li><a class="opciones" href="contacto.php">ATENCIÓN AL CLIENTE</a></li>
                <li><a class="opciones" href="login.html">IDENTIFICARSE</a></li>
                <li><a class="separacion"></a></li>
                <li><a class="titulo">ENCUENTRANOS AQUÍ</a></li>
                <img class="rrss" src="./img/instagram.png"><img id="twitter" class="rrss" src="./img/twitter.png">
            </ul>
            
        </div>
        <div id="overlay"></div>
        <div id="contenido" style="margin-left: 0px;">
                <div id="div_menu"><a id="abrir" class="abrir-cerrar" href="javascript:void(0)" onclick="mostrar()" style="display: inline;"><i id="menu" class="fa-solid fa-bars" style="color: rgb(5,47,64);"></i></a></div>
        </div>
        <a id="cerrar" class="abrir-cerrar" href="#" onclick="ocultar()" style="display: none;">
        </a>
        <div id="logos"><img id="logo" src="./img/logo.png" alt="Logo empresa">
            <img id="nombre" src="./img/logo_nombre.png" alt="Nombre empresa">
        </div>
        <div id="div_cesta"><a href="cesta.html"><i id="cesta" class="fa-solid fa-cart-shopping" style="color: rgb(5,47,64);"></i></a></div>
    </header>

    <div id="despegable">

    </div>

    <div id="fondo_contenido">
        <div id="container">
            <h1>¿QUIÉNES SOMOS?</h1>
            <p class="parr_quien">CyberSphere Technologies es un referente en el mercado de la tecnología, ofreciendo una amplia gama de productos innovadores que van desde teléfonos móviles hasta dispositivos electrónicos de última generación. Nos destacamos como una opción confiable para aquellos que buscan calidad, variedad y excelencia en productos tecnológicos.</p>
            <img class="imagenquien" src="./img/carrusel-2.PNG">
            <p id="parr_img" class="parr_quien">Nuestro compromiso radica en brindar a nuestros clientes una experiencia de compra única y satisfactoria, respaldada por un equipo dedicado y conocedor de las últimas tendencias del mercado. Desde teléfonos inteligentes hasta dispositivos domésticos inteligentes, en CyberSphere Technologies nos esforzamos por ser su destino definitivo para todas sus necesidades tecnológicas.</p>
            <img class="imagenquien" src="./img/carrusel-1.PNG">
            <p class="parr_quien">Con una amplia selección de marcas reconocidas y productos de alta calidad, CyberSphere Technologies se destaca como un centro de referencia para aquellos que buscan lo último en tecnología. Nuestro compromiso con la excelencia se refleja en cada aspecto de nuestro negocio, desde la atención al cliente hasta la garantía de satisfacción del producto.</p>
            <p class="parr_quien">Además de ofrecer una variedad de dispositivos tecnológicos, en CyberSphere Technologies nos esforzamos por proporcionar un servicio al cliente excepcional. Nuestro equipo de expertos está siempre disponible para brindar asesoramiento personalizado y ayudar a nuestros clientes a encontrar la solución tecnológica perfecta para sus necesidades específicas.</p>
            <img class="imagenquien" id="ultparr" src="./img/carrusel-3.PNG">
            
        </div>
    </div>
    
    <footer>
        <p>&copy; 2024 CyberSphere Technologies. David Díaz y Héctor Marín.</p>
    </footer>
</body>

</html>