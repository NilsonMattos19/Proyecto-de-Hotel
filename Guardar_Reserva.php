<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $fecha_inicio = $_POST["fecha_inicio"];
    $fecha_fin = $_POST["fecha_fin"];
    $estado = $_POST["estado"];
    $precio_total = $_POST["precio_total"];
    $huesped_id = $_POST["huesped"];

    // Conexión a la base de datos
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "hotel";
    $conn = mysqli_connect($host, $user, $password, $dbname);

    // Consulta para insertar una nueva reserva
    $sql = "INSERT INTO reservas (fecha_inicio, fecha_fin, estado, precio_total, huesped) VALUES ('$fecha_inicio', '$fecha_fin', '$estado', '$precio_total', '$huesped_id')";

    // Ejecutar consulta y verificar si se realizó correctamente
    if (mysqli_query($conn, $sql)) {
        echo "Reserva registrada exitosamente";
    } else {
        echo "Error al registrar reserva: " . mysqli_error($conn);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conn);

    // Redirigir a la página 'Lista_Servicio.php' después de 3 segundos
    header("refresh:3;url=Lista_Servicio.php");
}
?>