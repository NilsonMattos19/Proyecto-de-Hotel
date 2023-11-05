<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "hotel");

// Verificación del parámetro de ID
if (!isset($_GET['id'])) {
    header('Location: Lista_Servicio.php');
    exit;
}

// Obtención del ID del servicio a eliminar
$id = $_GET['id'];

// Eliminación del servicio de la base de datos
$sql = "DELETE FROM servicios WHERE id = ?";
$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

// Redirección a la lista de servicios
header('Location: Lista_Servicio.php');
exit;
?>