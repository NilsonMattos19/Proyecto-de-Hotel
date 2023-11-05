<?php
// Verificación de si se ha enviado el formulario
if (isset($_POST['enviar'])) {
    // Obtención de los datos del formulario
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];

    // Validación de los datos
    if (empty($nombre) || empty($descripcion) || empty($precio)) {
        echo "Por favor, complete todos los campos del formulario.";
    } else {
        // Conexión a la base de datos
        $conexion = mysqli_connect("localhost", "root", "", "hotel");

        // Verificación de la conexión
        if (mysqli_connect_errno()) {
            echo "Error de conexión a la base de datos: " . mysqli_connect_error();
            exit();
        }

        // Inserción de los datos en la tabla servicios
        $insertar = "INSERT INTO servicios (nombre, descripcion, precio) VALUES ('$nombre', '$descripcion', '$precio')";
        if (mysqli_query($conexion, $insertar)) {
            // Cierre de la conexión
            mysqli_close($conexion);

            // Redirección a la página de lista de servicios
            header("Location: Lista_Servicio.php");
            exit();
        } else {
            echo "Error al guardar el servicio: " . mysqli_error($conexion);
        }

        // Cierre de la conexión
        mysqli_close($conexion);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Guardar Servicio</title>
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
    <h1>Guardar Servicio</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre"><br><br>
        <label>Descripción:</label><br>
        <textarea name="descripcion" rows="4" cols="50"></textarea><br><br>
        <label>Precio:</label>
        <input type="number" name="precio"><br><br>
        <input type="submit" name="enviar" value="Guardar">
    </form>
</body>
</html>