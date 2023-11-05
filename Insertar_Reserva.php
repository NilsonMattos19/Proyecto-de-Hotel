<!DOCTYPE html>
<html>
<head>
	<title>Registro de Reserva</title>
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
	<h1>Registro de Reserva</h1>
	<form action="Guardar_Reserva.php" method="post">
		<label for="fecha_inicio">Fecha de inicio:</label>
		<input type="date" id="fecha_inicio" name="fecha_inicio"><br><br>
		<label for="fecha_fin">Fecha de fin:</label>
		<input type="date" id="fecha_fin" name="fecha_fin"><br><br>
		<label for="estado">Estado:</label>
		<select id="estado" name="estado">
			<option value="activo">Activo</option>
			<option value="cancelado">Cancelado</option>
			<option value="completado">Completado</option>
		</select><br><br>
		<label for="precio_total">Precio total:</label>
		<input type="number" id="precio_total" name="precio_total"><br><br>
		<label for="huesped">Huesped:</label>
		<select id="huesped" name="huesped">
			<?php
				// Conexión a la base de datos
				$host = "localhost";
				$user = "root";
				$password = "";
				$dbname = "hotel";
				$conn = mysqli_connect($host, $user, $password, $dbname);

				// Consulta para obtener todos los huespedes
				$sql = "SELECT id, nombre FROM huespedes";
				$result = mysqli_query($conn, $sql);

				// Mostrar opciones de selección para cada huesped
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<option value=\"" . $row["id"] . "\">" . $row["nombre"] . "</option>";
				}
				// Cerrar la conexión a la base de datos
				mysqli_close($conn);
			?>
		</select><br><br>
		<input type="submit" value="Guardar">
	</form>
</body>
</html>