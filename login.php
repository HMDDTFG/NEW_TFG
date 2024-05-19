<?php

// Iniciar la sesión
session_start();

// Incluir el archivo de conexión
$servername = "localhost";
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
    $password = $_POST['contraseña'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    // Preparar y ejecutar la consulta para buscar al usuario
    $sql = "SELECT `id_usuario`, `password` FROM `usuario` WHERE `id_usuario` LIKE '$username'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Verificar si se encontró el usuario
    if ($stmt->rowCount() == 1) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar la contraseña
        if (password_verify($password, $user['password'])) {
            // Las credenciales son correctas, iniciar sesión
            $_SESSION['username'] = $user['username'];
            header("Location: index.html"); // Redirigir a la página de inicio
            exit;
        } else {
            // La contraseña es incorrecta
            echo "Contraseña incorrecta.";
        }
    } else {
        // El usuario no existe
        echo "El usuario no existe.";
    }
}
?>