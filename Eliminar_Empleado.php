<!DOCTYPE html>
<html>
<head>
	<title>Eliminar Empleado</title>
	<meta http-equiv="refresh" content="3;url=Ver_Huespedes_Empleados.php">
</head>
<body>
	<h1>Empleado eliminado exitosamente.</h1>
	<?php
// Obtener el ID del empleado a eliminar
$id = $_GET['id'];

// Conectar a la base de datos
$conexion = mysqli_connect('localhost', 'root', '', 'hotel');

// Ejecutar la consulta DELETE
$sql = "DELETE FROM empleados WHERE id = ".$id;
$resultado = mysqli_query($conexion, $sql);

// Verificar si se eliminó el empleado correctamente
if ($resultado) {
	echo "Empleado eliminado correctamente.";
} else {
	echo "Error al eliminar el empleado: ".mysqli_error($conexion);
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
</body>
</html>
