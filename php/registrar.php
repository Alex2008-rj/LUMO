<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "contacto";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si los datos llegaron
if (!isset($_POST['telefono']) || !isset($_POST['nombre']) || !isset($_POST['correo'])) {
    die("Error: No se recibieron datos.");
}

$telefono = $_POST['telefono'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];

// Insertar en la tabla 'contacto'
$sql = "INSERT INTO contacto (telefono, nombre, correo) VALUES ('$telefono', '$nombre', '$correo')";

if ($conn->query($sql) === TRUE) {
    echo "Información guardada correctamente.";
} else {
    echo "Error en la consulta: " . $conn->error;
}

$conn->close();
?>
