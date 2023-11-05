<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Lista de Empleados y Huespedes</title>
	
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
	</style>
</head>
<body>
<a href="Menu_Inicial.php">
		<img id="logo" src="Icons-Land-Buildings-Hotel-5-Stars.512.png" alt="Logo del hotel" height="143px">
	</a>
  <div class="container">
		<img src="gestion.jpg" alt="Imagen de Gestion"><br>
	<h1>Lista de Empleados</h1>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Cargo</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			<?php
			// Conexión a la base de datos
			$conexion = mysqli_connect('localhost', 'root', '', 'hotel');

			// Verificar si se estableció la conexión
			if (mysqli_connect_errno()) {
				echo "Error al conectar a la base de datos: " . mysqli_connect_error();
				exit();
			}

			// Consulta SQL para obtener la lista de empleados
			$sql = "SELECT * FROM empleados";

			// Ejecutar la consulta SQL y obtener los resultados
			$resultado = mysqli_query($conexion, $sql);

			// Mostrar los resultados en la tabla
			while ($fila = mysqli_fetch_assoc($resultado)) {
				echo "<tr>";
				echo "<td>" . $fila['id'] . "</td>";
				echo "<td>" . $fila['nombre'] . "</td>";
				echo "<td>" . $fila['apellido'] . "</td>";
				echo "<td>" . $fila['cargo'] . "</td>";
				echo "<td>";
				echo "<a href='Actualizar_Empleado.php?id=" . $fila['id'] . "'>Actualizar</a> | ";
				echo "<a href='Eliminar_Empleado.php?id=" . $fila['id'] . "' onclick='return confirm(\"¿Está seguro de que desea eliminar este registro?\")'>Eliminar</a>";
				echo "</td>";
				echo "</tr>";
			}

			// Liberar los recursos y cerrar la conexión a la base de datos
			mysqli_free_result($resultado);
			mysqli_close($conexion);
			?>
		</tbody>
	</table>

    <title>Lista de Huespedes</title>
	<style>
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
	<h1>Lista de Huespedes</h1>
	<table>
		<tr>
			<th>Id</th>
			<th>Nombre</th>
			<th>Telefono</th>
			<th>Email</th>
			<th>Acciones</th>
		</tr>
		<?php
			//Conectar a la base de datos
			$conexion = mysqli_connect("localhost", "root", "", "hotel");

			//Verificar si la conexion fue exitosa
			if (mysqli_connect_errno()) {
  				echo "Error al conectar con la base de datos: " . mysqli_connect_error();
			}

			//Query para obtener los huespedes de la tabla huespedes
			$query = "SELECT * FROM huespedes";

			//Ejecutar el query
			$resultado = mysqli_query($conexion, $query);

			//Iterar sobre los resultados y mostrarlos en la tabla
			while ($fila = mysqli_fetch_assoc($resultado)) {
				echo "<tr>";
				echo "<td>" . $fila["id"] . "</td>";
				echo "<td>" . $fila["nombre"] . "</td>";
				echo "<td>" . $fila["telefono"] . "</td>";
				echo "<td>" . $fila["email"] . "</td>";
				echo "<td>";
				echo "<a href='Actualizar_Huesped.php?id=" . $fila["id"] . "'>Editar</a> ";
				echo "<a href='Eliminar_Huesped.php?id=" . $fila["id"] . "' onclick='return confirm(\"¿Está seguro de que desea eliminar este huesped?\")'>Eliminar</a>";
				echo "</td>";
				echo "</tr>";
			}

			//Cerrar la conexion
			mysqli_close($conexion);
		?>
	</table><br><br>
	<a href="Menu_Inicial.php" class="button">Regresar al menú</a>
</body>
</html>