<!DOCTYPE html>
<html>
<head>
	<title>Actualizar Servicio</title>
	<style>
		.container {
			text-align: center;
		}
		body {
  		background-color: cornflowerblue;
		}
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
<a href="Menu_Inicial.php">
		<img id="logo" src="Icons-Land-Buildings-Hotel-5-Stars.512.png" alt="Logo del hotel" height="143px">
	</a>
  <div class="container">
		<img src="actualizar.jpg" alt="Imagen de Registrar"><br>
	<h1>Actualizar Servicio</h1>
	<?php
	// Conexión a la base de datos
	$conexion = mysqli_connect("localhost", "root", "", "hotel");

	// Verificar si se ha enviado el formulario
	if(isset($_POST['actualizar'])){
		// Recuperar los datos del formulario
		$id = $_POST['id'];
		$nombre = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$precio = $_POST['precio'];

		// Actualizar el servicio en la base de datos
		$sql = "UPDATE servicios SET nombre='$nombre', descripcion='$descripcion', precio='$precio' WHERE id=$id";
		if(mysqli_query($conexion, $sql)){
			echo "<p>Servicio actualizado correctamente.</p>";
		} else{
			echo "<p>Error al actualizar el servicio: " . mysqli_error($conexion) . "</p>";
		}
	} elseif(isset($_POST['eliminar'])) { // Verificar si se ha enviado el formulario de eliminación
		$id = $_POST['id'];

		// Eliminar el servicio de la base de datos
		$sql = "DELETE FROM servicios WHERE id=$id";
		if(mysqli_query($conexion, $sql)){
			echo "<p>Servicio eliminado correctamente.</p>";
		} else{
			echo "<p>Error al eliminar el servicio: " . mysqli_error($conexion) . "</p>";
		}
	}

	// Mostrar el formulario para buscar el servicio a actualizar
	?>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<label>Ingrese el ID del servicio a actualizar:</label>
		<input type="text" name="id_servicio">
		<input type="submit" name="buscar" value="Buscar">
	</form>
	<?php

	// Verificar si se ha enviado el formulario de búsqueda
	if(isset($_POST['buscar'])){
		$id_servicio = $_POST['id_servicio'];

		// Obtener los datos del servicio a actualizar
		$sql = "SELECT * FROM servicios WHERE id=$id_servicio";
		$resultado = mysqli_query($conexion, $sql);
		if(mysqli_num_rows($resultado) > 0){
			$servicio = mysqli_fetch_assoc($resultado);
			?>
			<!-- Mostrar el formulario para actualizar el servicio -->
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<input type="hidden" name="id" value="<?php echo $servicio['id']; ?>"><br>
				<label>Nombre:</label>
				<input type="text" name="nombre" value="<?php echo $servicio['nombre']; ?>"><br><br>
				<label>Descripción:</label><br>
				<textarea name="descripcion" rows="4" cols="50"><?php echo $servicio['descripcion']; ?></textarea><br><br>
				<label>Precio:</label>
				<input type="number" name="precio" value="<?php echo $servicio['precio']; ?>"><br><br>
				<input type="submit" name="actualizar" value="Actualizar">
                <input type="submit" name="eliminar" value="Eliminar">
			</form>
			<?php
		} else{
			echo "<p>No se encontró ningún servicio con ese ID.</p>";
		}
	}

	// Cerrar la conexión a la base de datos
	mysqli_close($conexion);
	?>
	<br><br>
	<a href="Menu_Inicial.php" class="button">Regresar al menú</a>
</body>
</html>