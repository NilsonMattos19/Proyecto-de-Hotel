<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Conexión a la base de datos
$host = "localhost";
$user = "root";
$password = "";
$database = "hotel";
$conn = mysqli_connect($host, $user, $password, $database);

// Verificar la conexión
if (!$conn) {
    die("La conexión a la base de datos falló: " . mysqli_connect_error());
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$apartamento = $_POST['apartamento']; // Nuevo campo

// Verificar si el correo ya existe en la base de datos
$consultaCorreoExistente = "SELECT * FROM huespedes WHERE email = '$email'";
$resultadoCorreoExistente = mysqli_query($conn, $consultaCorreoExistente);

if (mysqli_num_rows($resultadoCorreoExistente) > 0) {
    // El correo ya existe, enviar correo de confirmación
    $asunto = "Confirmación de registro";
    $mensaje = "Este correo ya está registrado en nuestro fantástico hotel.";

    // Envía el correo usando la función
    enviarCorreo($email, $asunto, $mensaje);

    // Mostrar un mensaje al usuario
    echo "Ya estás registrado. Se ha enviado un correo de confirmación.";
} else {
    // El correo no existe, procede con la inserción en la base de datos
    $sql = "INSERT INTO huespedes (nombre, telefono, email, apartamento) 
            VALUES ('$nombre', '$telefono', '$email', '$apartamento')";

    if (mysqli_query($conn, $sql)) {
        $id = mysqli_insert_id($conn); // Obtener el ID generado automáticamente
        echo "El huésped con ID " . $id . " se ha registrado correctamente";

        // Envía el correo de bienvenida para nuevos registros
        enviarCorreo($email, "¡Bienvenido al hotel!", "¡Gracias por registrarte en nuestro hotel!");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
// Función para enviar correo
function enviarCorreo($destinatario, $asunto, $mensaje) {
    require 'C:\xampp\htdocs\Proyecto_Hotel_5to\PHPMailer-master\src\PHPMailer.php';
    require 'C:\xampp\htdocs\Proyecto_Hotel_5to\PHPMailer-master\src\Exception.php';
    require 'C:\xampp\htdocs\Proyecto_Hotel_5to\PHPMailer-master\src\SMTP.php';

    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'niljumatt19@gmail.com'; 
        $mail->Password = 'xlwl oxsw kdjr ufzz'; 
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Configuración del mensaje
        $mail->setFrom('niljumatt19@gmail.com', 'Hotel Las Sevillas');
        $mail->addAddress($destinatario);
        $mail->Subject = $asunto;

        // Añadir una imagen al cuerpo del correo
        $imagenPath = 'C:\xampp\htdocs\Proyecto_Hotel_5to\messientofeliz.png'; 
        $mail->addEmbeddedImage($imagenPath, 'logo'); 

        $mensajeConImagen = $mensaje . '<p><img src="cid:logo" alt="Logo"></p>';
        $mail->msgHTML($mensajeConImagen);

        // Establecer la codificación
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';

        // Envío del correo
        $mail->send();
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
}
?>

<br><br>
<html>
<head>
    <style>
        /* Estilos para los botones */
        .button {
          background-color: #4CAF50; /* Color de fondo */
          border: none; /* Sin borde */
          color: white; /* Color de letra */
          padding: 15px 32px; /* Espacio interno */
          text-align: center; /* Alineación del texto */
          text-decoration: none; /* Sin subrayado */
          display: inline-block; /* Mostrar como bloque */
          font-size: 16px; /* Tamaño de letra */
          margin: 4px 2px; /* Margen */
          cursor: pointer; /* Cambiar el cursor al pasar el mouse */
        }
    </style>
</head>
<body>
<a href="Menu_Inicial.php" class="button">Regresar al menú</a>
</body>