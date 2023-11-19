<?php
// Obtener los datos del formulario
$fecha_generacion = $_POST['fecha_generacion'];
$total_ingresos = $_POST['total_ingresos'];
$total_gastos = $_POST['total_gastos'];
$reservas = $_POST['reservas'];

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

// Insertar los datos en la tabla de informes financieros
$sql = "INSERT INTO informacion_financiera (fecha_generacion, total_ingresos, total_gastos, reservas) VALUES ('$fecha_generacion', '$total_ingresos', '$total_gastos', '$reservas')";
if (mysqli_query($conn, $sql)) {
	echo "El informe financiero se ha guardado correctamente.";
	echo "<script>alert('Finanza registrada exitosamente.'); setTimeout(function(){ window.location.href='Ver_Financia.php'; }, 3000);</script>";
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>