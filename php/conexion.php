<?php
// Configuración de conexión a la base de datos
$nombre_servidor = "127.0.0.1"; // Dirección del servidor (localhost en este caso)
$nombre_bd = "contacto"; // Nombre de la base de datos a conectar
$usuario_bd = "root"; // Usuario con permisos para acceder a la base de datos
$contraseña_bd = ""; // Contraseña (vacía en entornos de desarrollo)

// Creación de la conexión a la base de datos utilizando MySQLi
$con = new mysqli($nombre_servidor, $usuario_bd, $contraseña_bd, $nombre_bd);

// Verificación de la conexión a la base de datos
if ($con->connect_errno) {
    // En caso de error, se detiene la ejecución y muestra el mensaje de error
    die("Fallo al conectar a MySQL: " . $con->connect_error);
} else {
    // Si la conexión es exitosa, se muestra un mensaje de confirmación
    echo "Conexión exitosa";
}
?>
