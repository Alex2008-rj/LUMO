function guardarYEnviar() {
    const telefono = document.getElementById("telefono").value;
    const nombre = document.getElementById("nombre").value;
    const correo = document.getElementById("correo").value;

    if (!telefono || !nombre || !correo) {
        alert("Por favor, completa todos los campos antes de enviar.");
        return;
    }

    // Enviar datos a PHP para guardar en la base de datos
    fetch("registrar.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `telefono=${encodeURIComponent(telefono)}&nombre=${encodeURIComponent(nombre)}&correo=${encodeURIComponent(correo)}`
    })
    .then(response => response.text())
    .then(data => {
        console.log("Respuesta del servidor:", data);
        alert("Datos guardados correctamente.");

        // Enviar mensaje a WhatsApp
        const mensaje = `¡Hola!, me gustaría recibir más información.\n\nNombre: ${nombre}\nTeléfono: ${telefono}\nCorreo: ${correo}`;
        const enlace = `https://wa.me/${telefono}?text=${encodeURIComponent(mensaje)}`;
        window.open(enlace, '_blank');
    })
    .catch(error => console.error("Error al guardar datos:", error));
}
