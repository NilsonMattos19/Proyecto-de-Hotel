<?php
// Obtener el ID del huésped a eliminar
$id = $_GET['id'];

// Conectar a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "hotel");

// Verificar si la conexión fue exitosa
if (!$conexion) {
    die("La conexión a la base de datos falló: " . mysqli_connect_error());
}

// Eliminar el huésped de la base de datos
$sql = "DELETE FROM huespedes WHERE id = $id";
if (mysqli_query($conexion, $sql)) {
    echo "El huésped ha sido eliminado exitosamente.";
} else {
    echo "Error al eliminar el huésped: " . mysqli_error($conexion);
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);

// Redirigir a la página 'Ver_Huespedes_Empleados.php' después de 3 segundos
header("refresh:3;url=Ver_Huespedes_Empleados.php");
?>