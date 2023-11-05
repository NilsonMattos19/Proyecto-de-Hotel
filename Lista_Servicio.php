<!DOCTYPE html>
<html>
<head>
	<title>Gestión de servicios</title>
	<style>
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
	<h1>Gestión de servicios</h1>
		<tbody>
		<?php
  // Conexión a la base de datos
  $conexion = mysqli_connect("localhost", "root", "", "hotel");

  // Verificación de la conexión
  if (mysqli_connect_errno()) {
    echo "Error de conexión a la base de datos: " . mysqli_connect_error();
    exit();
  }

  // Selección de los datos de la tabla servicios
  $seleccionar = "SELECT * FROM servicios";
  $resultados = mysqli_query($conexion, $seleccionar);

  // Comprobación de si hay resultados
  if (mysqli_num_rows($resultados) > 0) {
    // Mostrar los resultados en una tabla HTML
    echo "<table border='1' align= 'center'>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Precio</th></tr>";
    while ($fila = mysqli_fetch_assoc($resultados)) {
      echo "<tr>";
      echo "<td>" . $fila["id"] . "</td>";
      echo "<td>" . $fila["nombre"] . "</td>";
      echo "<td>" . $fila["descripcion"] . "</td>";
      echo "<td>" . $fila["precio"] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
  } else {
    echo "No hay servicios registrados.";
  }

  // Cierre de la conexión
  mysqli_close($conexion);
  ?>
		</tbody>
	</table>
	<h1>Lista de servicios reservados</h1>
	<table>
		<tbody>
			<?php
				// Conexión a la base de datos
				$conexion = mysqli_connect("localhost", "root", "", "hotel");
				if (mysqli_connect_errno()) {
					echo "Error al conectar a la base de datos: " . mysqli_connect_error();
					exit();
				}

				// Consulta a la tabla reservas
				$query = "SELECT id, fecha_inicio, fecha_fin, estado, precio_total, huesped FROM reservas";
				$resultado = mysqli_query($conexion, $query);

				// Mostrar resultados en la tabla
				echo "<table border='1' align= 'center'>";
   			 	echo "<tr><th>ID</th><th>Fecha Inicio</th><th>Fecha Fin</th><th>Estado</th><th>Precio Total</th><th>Huesped</th></tr>";
				while ($fila = mysqli_fetch_assoc($resultado)) {
					echo "<tr>";
					echo "<td>" . $fila["id"] . "</td>";
					echo "<td>" . $fila["fecha_inicio"] . "</td>";
					echo "<td>" . $fila["fecha_fin"] . "</td>";
					echo "<td>" . $fila["estado"] . "</td>";
					echo "<td>" . $fila["precio_total"] . "</td>";
					echo "<td>" . $fila["huesped"] . "</td>";
					echo "</tr>";
				}

				// Cerrar conexión a la base de datos
				mysqli_close($conexion);
			?>
		</tbody>
	</table><br><br>
	
	<a href="Menu_Inicial.php" class="button">Regresar al menú</a>
</body>
</html>