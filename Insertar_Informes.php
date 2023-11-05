<?php
	// Obtener datos del formulario
	$fecha_generacion = $_POST["fecha_generacion"];
	$tipo = $_POST["tipo"];
	$contenido = $_POST["contenido"];

	// Conexión a la base de datos
	$host = "localhost";
	$user = "root";
	$password = "";
	$dbname = "hotel";
	$conn = mysqli_connect($host, $user, $password, $dbname);

	// Consulta para insertar un nuevo informe
	$sql = "INSERT INTO informes ( fecha_generacion, tipo, contenido) VALUES ('$fecha_generacion', '$tipo', '$contenido')";
	$result = mysqli_query($conn, $sql);

	if ($result) {
        echo "El informe se ha guardado correctamente.";
        echo "<script>setTimeout(function() {window.location.href = 'Insertar_Informes.html';}, 3000);</script>";
    } else {
        echo "Error al guardar el informe: " . mysqli_error($conn);
    }

	// Cerrar la conexión a la base de datos
	mysqli_close($conn);
?>