<!DOCTYPE html>
<html>
<head>
	<title>Información Financiera</title>
    <style>
        h1 {
        text-align: center;
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
	<h1>Información Financiera</h1>
	<table>
		<tr>
			<th>ID</th>
			<th>Total Ingresos</th>
			<th>Total Gastos</th>
			<th>Acciones</th>
		</tr>

		<?php
		// Conexión a la base de datos
		$conexion = mysqli_connect("localhost", "root", "", "hotel");

		// Consulta SQL
		$sql = "SELECT * FROM informacion_financiera";

		// Ejecutar consulta y obtener resultados
		$resultado = mysqli_query($conexion, $sql);

		// Recorrer resultados y mostrar en tabla
		while ($fila = mysqli_fetch_array($resultado)) {
			echo "<tr>";
			echo "<td>" . $fila['id'] . "</td>";
			echo "<td>" . $fila['total_ingresos'] . "</td>";
			echo "<td>" . $fila['total_gastos'] . "</td>";
			echo "<td>";
			echo "<a href='Actualizar_Financia.php?id=" . $fila['id'] . "'>Actualizar</a> | ";
			echo "<a href='Eliminar_Financia.php?id=" . $fila['id'] . "' onclick='return confirm(\"¿Está seguro de que desea eliminar este registro?\")'>Eliminar</a>";
			echo "</td>";
			echo "</tr>";
		}

		// Cerrar conexión a la base de datos
		mysqli_close($conexion);
		?>
	</table><br><br>
    <a href="Menu_Inicial.php" class="button">Regresar al menú</a>
</body>
</html>