<!DOCTYPE html>
<html>
<head>
	<title>Búsqueda de Servicios</title>
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
		.container {
			text-align: center;
		}
		body {
  		background-color: cornflowerblue;
		}
	</style>
</head>
<body>
<a href="Menu_Inicial.php">
		<img id="logo" src="Icons-Land-Buildings-Hotel-5-Stars.512.png" alt="Logo del hotel" height="143px">
	</a>
  <div class="container">
		<img src="search.jpg" alt="Imagen de buscar"><br>
	<h1>Búsqueda de Servicios</h1>
	<form method="POST" action="buscar_servicios.php">
		<label for="nombre">Nombre:</label>
		<input type="text" name="nombre" id="nombre" placeholder="Ingrese el nombre del servicio"><br><br>

		<label for="id">ID:</label>
		<input type="text" name="id" id="id" placeholder="Ingrese el ID del servicio"><br><br>

		<input type="submit" name="buscar" value="Buscar">
	</form>

	<?php
		// Verificar si se envió el formulario
		if (isset($_POST['buscar'])) {
			// Conectar a la base de datos
			$conexion = mysqli_connect("localhost", "root", "", "hotel");

			// Verificar la conexión
			if (!$conexion) {
				die("Error al conectar a la base de datos: " . mysqli_connect_error());
			}

			// Obtener los datos del formulario
			$nombre = $_POST['nombre'];
			$id = $_POST['id'];

			// Construir la consulta SQL
			$sql = "SELECT * FROM servicios WHERE 1=1";

			if (!empty($nombre)) {
				$sql .= " AND nombre LIKE '%$nombre%'";
			}

			if (!empty($id)) {
				$sql .= " AND id = '$id'";
			}

			// Ejecutar la consulta
			$resultado = mysqli_query($conexion, $sql);

			// Verificar si se encontraron resultados
			if (mysqli_num_rows($resultado) > 0) {
				// Mostrar los resultados en una tabla
				echo "<h2>Resultados de la búsqueda:</h2>";
				echo "<table border='1' style='margin: 0 auto;'>";
				echo "<tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Precio</th></tr>";
				while ($fila = mysqli_fetch_assoc($resultado)) {
					echo "<tr><td>".$fila['id']."</td><td>".$fila['nombre']."</td><td>".$fila['descripcion']."</td><td>".$fila['precio']."</td></tr>";
				}
				echo "</table>";
			} else {
				echo "No se encontraron resultados para la búsqueda.";
			}

			// Cerrar la conexión
			mysqli_close($conexion);
		}
	?>
	<br><br>
	<a href="Menu_Inicial.php" class="button">Regresar al menú</a>
</body>
</html>