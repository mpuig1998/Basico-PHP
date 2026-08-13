<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = htmlspecialchars($_POST['nombre'] ?? '');
    $correo = htmlspecialchars($_POST['correo'] ?? '');
    $movil = htmlspecialchars($_POST['movil'] ?? ''); 
    $mensaje = htmlspecialchars($_POST['mensaje'] ?? '');

    // Validación básica
    if (empty($nombre) || empty($correo)) {
        header("Location: pages/contacto.html?estado=vacio");
        exit;
    }

    // Email destino (CAMBIA ESTO)
    $destino = "tuemail@ejemplo.com";

    $asunto = "Nuevo mensaje de formulario";

    $contenido = "Nombre: $nombre\nCorreo: $correo\nMóvil: $movil\nMensaje: $mensaje";

    $headers = "From: $correo";

    if (mail($destino, $asunto, $contenido, $headers)) {
        header("Location: pages/contacto.html?estado=ok");
    } else {
        header("Location: pages/contacto.html?estado=error");
    }

    exit;
}
?>