<?php
// Incluir el archivo de conexión
$servername = "localhost";
//$port = 9550; //especificamos puerto si no es el 3306
$username = "root";
$password = "";
$dbname = "store";

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<strong>Conexion exitosa</strong><br>";
}catch(PDOException $e){
    echo "Fallo de conexión" . $e->getMessage();
}


// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $username = $_POST['usuario'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_POST['correo'];
    $city = $_POST['ciudad'];
    $cp = $_POST['codigo_postal'];

    // Verificar que las contraseñas coincidan
    if ($password !== $confirm_password) {
        echo "Las contraseñas no coinciden.";
        exit;
    }

    // Encriptar la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Preparar y ejecutar la consulta de inserción
    $sql = "INSERT INTO `usuario` (`id_usuario`, `password`, `correo`, `ciudad`, `cp`, `rol`, `estado`) 
    VALUES ('$username', '$hashed_password', '$email', '$city', '$cp', '0', '1')";
    $stmt = $conn->prepare($sql);
 

    if ($stmt->execute()) {
        echo "Registro exitoso";
        header("Location: login.html"); // Redirigir a la página de inicio después del registro
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conn->close();
}
?>
