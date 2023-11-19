<!DOCTYPE html>
<html>
<head>
	<title>Actualizar Empleado</title>
	<style>
		.container {
			text-align: center;
		}
		body {
			background-color: cornflowerblue;
		}
	</style>
	<meta charset="utf-8">
</head>
<body>
	<a href="Menu_Inicial.php">
		<img id="logo" src="Icons-Land-Buildings-Hotel-5-Stars.512.png" alt="Logo del hotel" height="143px">
	</a>

	<div class="container">
		<img src="actualizar.jpg" alt="Imagen de Actualizar"><br>
		<h1>Actualizar Empleado</h1>

		<?php
		// Conexión a la base de datos
		$conexion = mysqli_connect("localhost", "root", "", "hotel");

		// Verificar si se ha enviado el formulario
		if (isset($_POST['actualizar'])) {
			// Recuperar los datos del formulario
			$id = $_POST['id'];
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$cargo = $_POST['cargo'];

			// Actualizar el empleado en la base de datos
			$sql = "UPDATE empleados SET nombre='$nombre', apellido='$apellido', cargo='$cargo' WHERE id=$id";
			if (mysqli_query($conexion, $sql)) {
				echo "<p>Empleado actualizado correctamente.</p>";
				header("Location: Ver_Huespedes_Empleados.php");
				exit();
			} else {
				echo "<p>Error al actualizar el empleado: " . mysqli_error($conexion) . "</p>";
			}
		}

		// Mostrar el formulario para actualizar el empleado
		if (isset($_GET["id"])) {
			$id = $_GET["id"];

			// Obtener los datos del empleado de la base de datos
			$sql = "SELECT * FROM empleados WHERE id=$id";
			$resultado = mysqli_query($conexion, $sql);

			// Verificar si se encontró un empleado con ese ID
			if (mysqli_num_rows($resultado) > 0) {
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
						<option value="Recepcionista" <?php if ($empleado['cargo'] == "Recepcionista") {
							echo "selected";
						} ?>>Recepcionista
						</option>
						<option value="Personal de limpieza" <?php if ($empleado['cargo'] == "Personal de limpieza") {
							echo "selected";
						} ?>>Personal de limpieza
						</option>
						<option value="Personal de mantenimiento" <?php if ($empleado['cargo'] == "Personal de mantenimiento") {
							echo "selected";
						} ?>>Personal de mantenimiento
						</option>
						<option value="Personal de cocina" <?php if ($empleado['cargo'] == "Personal de cocina") {
							echo "selected";
						} ?>>Personal de cocina
						</option>
						<option value="Personal de seguridad" <?php if ($empleado['cargo'] == "Personal de seguridad") {
							echo "selected";
						} ?>>Personal de seguridad
						</option>
						<option value="Gerente" <?php if ($empleado['cargo'] == "Gerente") {
							echo "selected";
						} ?>>Gerente
						</option>
					</select><br><br>
					<input type="submit" name="actualizar" value="Actualizar">
				</form>
				<?php
			} else {
				echo "<p>No se encontró ningún empleado con ese ID.</p>";
			}
		}

		// Cerrar la conexión a la base de datos
		mysqli_close($conexion);
		?>
	</div>
</body>
</html>