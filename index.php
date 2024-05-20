<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CyberSphere Technologies</title>
    <script src="https://kit.fontawesome.com/ce9416b376.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            echo "<a id=\"cab_usuario\" class=\"px-2\" href=\"login.php\" style=\"color: #ffffff;\">Identifícate</a>";
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
                <li><a class="opciones">POR MARCAS</a></li>
                <li><a class="opciones price-sorting-link" href="#" data-sort="h2l">MÁS CAROS</a></li>
                <li><a class="opciones price-sorting-link" href="#" data-sort="l2h">MÁS BARATOS</a></li>
                <li><a class="separacion"></a></li>
                <li><a class="titulo">AYUDA Y AJUSTES</a></li>
                <li><a class="opciones" href="micuenta.php">MI CUENTA</a></li>
                <li><a class="opciones" href="contacto.php">ATENCIÓN AL CLIENTE</a></li>
                <?php 
                    if (isset($_SESSION['id_usuario'])) {
                     
                     echo "<li><a class=\"opciones\" href=\"login.php\">OTRA CUENTA</a></li>";
                     } else {
                    echo "<li><a class=\"opciones\" href=\"login.php\">IDENTIFICARSE</a></li>";
                    }
                ?>
                <li><a class="separacion"></a></li>
                <li><a class="titulo">ENCUENTRANOS AQUÍ</a></li>
                <img class="rrss" src="./img/instagram.png"><img id="twitter" class="rrss" src="./img/twitter.png">
            </ul>
        </div>
        <div id="overlay"></div>
        <div id="contenido" style="margin-left: 0px;">
            <div id="div_menu"><a id="abrir" class="abrir-cerrar" href="javascript:void(0)" onclick="mostrar()"
                    style="display: inline;"><i id="menu" class="fa-solid fa-bars" style="color: rgb(5,47,64);"></i></a>
            </div>
        </div>
        <a id="cerrar" class="abrir-cerrar" href="#" onclick="ocultar()" style="display: none;">
        </a>
        <div id="logos"><img id="logo" src="./img/logo.png" alt="Logo empresa">
            <img id="nombre" class="d-none d-lg-block" src="./img/logo_nombre.png" alt="Nombre empresa">
        </div>
        <div id="div_cesta"><a href="cesta.html"><i id="cesta" class="fa-solid fa-cart-shopping"
                    style="color: rgb(5,47,64);"></i></a></div>
    </header>

    <div id="despegable">

    </div>
    <div id="fondo_contenido">
        <div class="container mt-1 mb-4 ">
            <div class="carrusel">
                <div class="carrusel-slide">
                    <img class="imgcarrusel" src="./img/carrusel-4-removebg-preview.png" alt="Imagen 1">
                </div>
            </div>
            <h3 id="no">Recomendado para ti</h3>
            <div class="products-grid row">
            <?php
// Incluir el archivo de conexión
    include 'conexion.php';

    // Consulta SQL para obtener los productos
    $sql = "SELECT nombre, descripcion, precio_ud, imagen, marca FROM PRODUCTO";
    $stmt = $conn->query($sql);

    // Verificar si hay productos
    if ($stmt->rowCount() > 0) {
        // Generar HTML para cada producto
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $nombre = $row["nombre"];
            $descripcion = $row["descripcion"];
            $precio = number_format($row["precio_ud"], 2, '.', '');
            // $precio = sprintf('%.2f', $row["precio_ud"]);
            $imagen = $row["imagen"];

            echo '<div class="col-6 col-md-4 col-lg-3 col-xl-3">';
            echo '    <div class="producto my-3 px-3 py-3 d-flex flex-column align-items-center" data-price="' . $precio . '">';
            echo '        <img class="img-fluid" src="' . $imagen . '">';
            echo '        <h2 class="nombre">' . $nombre . '</h2>';
            echo '        <p class="description"> ' . $descripcion . '</p>';
            echo '        <div class="precio">';
            echo '            <h3 class="price">' . $precio . '€'.'</h3>';
            echo '            <a href="#"><img class="carro" src="./img/carro-blanco.png" /></a>';
            echo '        </div>';
            echo '    </div>';
            echo '</div>';
        }
    } else {
        echo "No hay productos disponibles.";
    }

// Cerrar la conexión
$conn = null;
?>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 CyberSphere Technologies. David Díaz y Héctor Marín.</p>
    </footer>
</body>
</html>
