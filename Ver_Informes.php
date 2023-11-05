<!DOCTYPE html>
<html>
<head>
	<title>Ver Informes</title>
	<style>
			h1 {
        text-align: center;
        }
		.container {
			text-align: center;
		}
		body {
  		background-color: cornflowerblue;
		}
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
		table, th, td {
			margin: auto;
			align-self: center;
  			border: 1px solid black;
  			border-collapse: collapse;
		}
		th, td {
  			padding: 10px;
		}
	</style>
</head>
<body>
<a href="Menu_Inicial.php">
		<img id="logo" src="Icons-Land-Buildings-Hotel-5-Stars.512.png" alt="Logo del hotel" height="143px">
	</a>
  <div class="container">
		<img src="gestion.jpg" alt="Imagen de Gestion"><br>
	<h1>Ver Informes</h1>

	<?php
	// Conectarse a la base de datos
	$conexion = mysqli_connect("localhost", "root", "", "hotel");

	// Verificar si la conexión fue exitosa
	if (mysqli_connect_errno()) {
		echo "Error al conectar con la base de datos: " . mysqli_connect_error();
		exit();
	}

	// Obtener los informes de la base de datos
	$sql = "SELECT id, fecha_generacion, tipo, contenido FROM informes";
	$resultado = mysqli_query($conexion, $sql);

	if (mysqli_num_rows($resultado) > 0) {
		// Mostrar los informes en una tabla
		echo "<table>";
		echo "<tr><th>ID</th><th>Fecha Generación</th><th>Tipo</th><th>Contenido</th><th>Acciones</th></tr>";

		while ($fila = mysqli_fetch_assoc($resultado)) {
			echo "<tr>";
			echo "<td>" . $fila["id"] . "</td>";
			echo "<td>" . $fila["fecha_generacion"] . "</td>";
			echo "<td>" . $fila["tipo"] . "</td>";
			echo "<td>" . $fila["contenido"] . "</td>";
			echo "<td>";
			echo "<a href='Actualizar_Informes.php?id=" . $fila['id'] . "'>Actualizar</a> | ";
			echo "<a href='Eliminar_Informes.php?id=" . $fila['id'] . "' onclick='return confirm(\"¿Está seguro de que desea eliminar este registro?\")'>Eliminar</a>";
			echo "</td>";
			echo "</tr>";
		}

		echo "</table>";
	} else {
		echo "No hay informes registrados.";
	}

	// Cerrar la conexión con la base de datos
	mysqli_close($conexion);
	?><br><br>
 <a href="Menu_Inicial.php" class="button">Regresar al menú</a>
</body>
</html>