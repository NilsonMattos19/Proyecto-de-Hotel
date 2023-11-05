<!DOCTYPE html>
<html>
<head>
	<title>Actualizar Empleado</title>
</head>
<body>
	<h1>Actualizar Empleado</h1>
	<?php
	// Conexión a la base de datos
	$conexion = mysqli_connect("localhost", "root", "", "hotel");

	// Verificar si se ha enviado el formulario
	if(isset($_POST['actualizar'])){
		// Recuperar los datos del formulario
		$id = $_POST['id'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$cargo = $_POST['cargo'];

		// Actualizar el empleado en la base de datos
		$sql = "UPDATE empleados SET nombre='$nombre', apellido='$apellido', cargo='$cargo' WHERE id=$id";
		if(mysqli_query($conexion, $sql)){
			echo "<p>Empleado actualizado correctamente.</p>";
			header("Location: Ver_Huespedes_Empleados.php");
			exit();
		} else{
			echo "<p>Error al actualizar el empleado: " . mysqli_error($conexion) . "</p>";
		}
	}

	// Mostrar el formulario para buscar el empleado a actualizar
	?>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<label>Ingrese el ID del empleado a actualizar:</label>
		<input type="text" name="id_empleado">
		<input type="submit" name="buscar" value="Buscar">
	</form>
	<?php

	// Verificar si se ha enviado el formulario de búsqueda
	if(isset($_POST['buscar'])){
		$id_empleado = $_POST['id_empleado'];

		// Obtener los datos del empleado a actualizar
		$sql = "SELECT * FROM empleados WHERE id=$id_empleado";
		$resultado = mysqli_query($conexion, $sql);
		if(mysqli_num_rows($resultado) > 0){
			$empleado = mysqli_fetch_assoc($resultado);
			?>
			<!-- Mostrar el formulario para actualizar el empleado -->
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<input type="hidden" name="id" value="<?php echo $empleado['id']; ?>"><br>
				<label>Nombre:</label>
				<input type="text" name="nombre" value="<?php echo $empleado['nombre']; ?>"><br><br>
				<label>Apellido:</label>
				<input type="text" name="apellido" value="<?php echo $empleado['apellido']; ?>"><br><br>
				<label>Cargo:</label>
				<select name="cargo">
					<option value="Recepcionista" <?php if($empleado['cargo'] == "Recepcionista"){ echo "selected"; } ?>>Recepcionista</option>
					<option value="Personal de limpieza" <?php if($empleado['cargo'] == "Personal de limpieza"){ echo "selected"; } ?>>Personal de limpieza</option>
					<option value="Personal de mantenimiento" <?php if($empleado['cargo'] == "Personal de mantenimiento"){ echo "selected"; } ?>>Personal de mantenimiento</option>
					<option value="Personal de cocina" <?php if($empleado['cargo'] == "Personal de cocina"){ echo "selected"; } ?>>Personal de cocina</option>
<option value="Personal de seguridad" <?php if($empleado['cargo'] == "Personal de seguridad"){ echo "selected"; } ?>>Personal de seguridad</option>
<option value="Gerente" <?php if($empleado['cargo'] == "Gerente"){ echo "selected"; } ?>>Gerente</option>
</select><br><br>
<input type="submit" name="actualizar" value="Actualizar">
</form>
<?php
} else{
echo "<p>No se encontró ningún empleado con ese ID.</p>";
}
}
// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
</body>
</html>