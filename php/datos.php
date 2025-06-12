<?php

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contacto";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Validar y procesar datos POST
if (
    $_SERVER["REQUEST_METHOD"] === "POST" &&
    isset($_POST['telefono'], $_POST['nombre'], $_POST['correo'], $_POST['mensaje'])
) {
    $telefono = $conn->real_escape_string($_POST['telefono']);
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $correo = filter_var($conn->real_escape_string($_POST['correo']), FILTER_SANITIZE_EMAIL);
    $mensaje = $conn->real_escape_string($_POST['mensaje']);

    // Guardar en base de datos
    $sql = "INSERT INTO contacto (telefono, nombre, correo, mensaje) VALUES ('$telefono', '$nombre', '$correo', '$mensaje')";

    if ($conn->query($sql) === TRUE) {
        echo "✅ Registro guardado correctamente.<br>";

        // Generar enlace para enviar mensaje por WhatsApp Web
        $mensajeWA = rawurlencode("¡Gracias por contactarnos, $nombre! Mensaje: $mensaje");
        $telefonoWA = preg_replace('/\D/', '', $telefono);
        echo "<a href='https://wa.me/52$telefonoWA?text=$mensajeWA' target='_blank'>Enviar este mensaje por WhatsApp</a>";
    } else {
        echo "❌ Error al guardar el registro: " . $conn->error;
    }
} else {
    echo "❗ Faltan datos en el formulario.";
}

$conn->close();
?>