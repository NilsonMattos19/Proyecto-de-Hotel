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

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];

// Insertar los datos en la base de datos
$sql = "INSERT INTO huespedes (nombre, telefono, email) 
		VALUES ('$nombre', '$telefono', '$email')";
if (mysqli_query($conn, $sql)) {
	$id = mysqli_insert_id($conn); // obtener el ID generado automáticamente
	echo "El huésped con ID " . $id . " se ha registrado correctamente";
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>
<br><br>
<html>
<head>
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
	</style>
</head>
<body>
<a href="Menu_Inicial.php" class="button">Regresar al menú</a>
</body>