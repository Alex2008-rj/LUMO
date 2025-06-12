// Función para enviar los datos ingresados en un formulario
function enviarFormulario() {
    // Obtiene el valor del campo de entrada "telefono"
    var telefono = document.getElementById("telefono").value;

    // Obtiene el valor del campo de entrada "nombre"
    var nombre = document.getElementById("nombre").value;

    // Obtiene el valor del campo de entrada "correo"
    var correo = document.getElementById("correo").value;

    // Construye el mensaje con la información proporcionada por el usuario
    var mensaje = 'La información ingresada es:\n' + 
                  'Teléfono: ' + telefono + '\n' +
                  'Nombre: ' + nombre + '\n' +
                  'Correo: ' + correo;

    // Muestra el mensaje en un cuadro de diálogo
    prompt(mensaje);
}
