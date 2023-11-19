<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registrar Informe Financiero</title>
	<style>
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
		<img src="Registrar.jpg" alt="Imagen de Registrar"><br>
	<h1>Registrar informe financiero</h1>
	<form action="Guardar_Financia.php" method="POST">
		<label for="fecha_generacion">Fecha de Generación: </label>
		<input type="date" id="fecha_generacion" name="fecha_generacion"><br><br>

		<label for="total_ingresos">Total de ingresos:</label>
		<input type="text" id="total_ingresos" name="total_ingresos"><br><br>
		
		<label for="total_gastos">Total de gastos:</label>
		<input type="text" id="total_gastos" name="total_gastos"><br><br>
		
		<label for="reservas">Reservas:</label>
		<select id="reservas" name="reservas">
			<option value="">Seleccione una reserva</option>
			<?php
			// Conexión a la base de datos
			$host = "localhost";
			$user = "root";
			$password = "";
			$database = "hotel";
			$conn = mysqli_connect($host, $user, $password, $database);
			// Verificar la conexión
			if (!$conn) {
				die("La conexión a la base de datos falló: " . mysqli_connect_error());
			}
			// Obtener todas las reservas disponibles
			$sql = "SELECT id FROM reservas";
			$result = mysqli_query($conn, $sql);
            
			// Imprimir las opciones del select
	        while ($row = mysqli_fetch_assoc($result)) {
		    echo "<option value='" . $row['id'] . "'>" . $row['id'] . "</option>";
	}
			// Cerrar la conexión a la base de datos
			mysqli_close($conn);
			?>
		</select><br><br>
		
		<input type="submit" value="Guardar">
	</form>
</body>
</html>