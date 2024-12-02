<?php
// Muestra errores para depuración (desactívalo en producción)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura los datos enviados desde el formulario
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Valida que todos los campos estén completos
    if (empty($name) || empty($email) || empty($message)) {
        die("Por favor, completa todos los campos.");
    }

    // Configuración del correo
    $to = "tuemail@example.com"; // Reemplaza con tu dirección de correo
    $subject = "Nuevo mensaje de contacto";
    $body = "Nombre: $name\nCorreo: $email\nMensaje:\n$message";
    $headers = "From: $email";

    // Intenta enviar el correo
    if (mail($to, $subject, $body, $headers)) {
        echo "Mensaje enviado correctamente.";
    } else {
        echo "Hubo un problema al enviar el mensaje. Por favor, intenta nuevamente.";
    }
} else {
    // Si no es POST, muestra un mensaje de error
    echo "Método no permitido.";
}
?>
